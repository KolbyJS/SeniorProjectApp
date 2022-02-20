<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Reports = \App\Models\Report::all();
        return view('reports.index', ['Reports'=>$Reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
       //
        return view('reports.create', ['user'=>Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $validatedData = $request->validate(['type'=>'required']);
        $allData = array(
            'user_id'=>Auth::user()->id, 
            'type'=> $request->type,
            'reported'=> new \DateTime(),
            'notes'=> $request->notes,
            'has_attachment' =>'false', //CHANGE THIS WHEN FILES ARE IMPLEMENTED
            'is_anonymous' => ($request->anonymous == 'on') ? 'true' : 'false');
        

       \App\Models\Report::create($allData);
       $this->sendReportNotification($user);
       return redirect()->route('users.show', $user); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $case = \App\Models\Report::find($id);

        return view('reports.show', ['caseInfo'=>$case]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Cesar: Show all the reports in a users network.
     *
     * @param  int  $id
     * @return Illuminate\Support\Collection
     */
    public function showContactReports($id){
        $userReq = \App\Models\User::find($id)->contactsOfMine;
        $userAcc= \App\Models\User::find($id)->contactsOf;
        $contacts = $userReq->merge($userAcc);
        $cases  = collect([]);
        foreach($contacts as $user){
            $userCases = $user->cases;
            foreach($userCases as $case){
                $cases->push($case);
            }
        }
        //dd($cases);
        return view('reports.user.contact_reports', ['cases'=>$cases]);
    }

    public function sendReportNotification($user){
        $reportData = [
            'body'=> "Hello a user in your network has made a report",
            'reportText'=> 'View Report',
            'url'=> url('/'),
            'thankyou'=> 'Thank you',
            'user' => $user->first_name
        ];
        $users = $this->fetchContacts($user->id);
        Notification::send($users, new \App\Notifications\Report($reportData));
    }

     /** 
     * Cesar: This function fetches the user contacts from sent
     * and recieved requests.
     * 
     * @param int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function fetchContacts($id){
        $userReq = \App\Models\User::find($id)->contactsOfMine;
        $userAcc= \App\Models\User::find($id)->contactsOf;
        return $userReq->merge($userAcc);
    }

}