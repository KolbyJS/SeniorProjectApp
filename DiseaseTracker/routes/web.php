<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Network_MemberController;
use App\Http\Controllers\Organization_MemberController;
use App\Http\Controllers\Organization_NetworkController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});*/

Route::get('/createorg', [OrganizationController::class, 'create']);
Route::post('/createorg', [OrganizationController::class, 'store']);

Route::resource('users', UserController::class);

Route::resource('attachments', AttachmentController::class);
Route::resource('contacts', ContactController::class);
Route::resource('network_members', Network_MemberController::class);
Route::resource('organization_members', Organization_MemberController::class);

Route::resource('organization_networks', Organization_NetworkController::class);

Route::get('reports.user.contact_reports/{id}', [ReportController::class, 'showContactReports'])->name('reports.user');
Route::resource('reports', ReportController::class);


Route::resource('organizations', OrganizationController::class);

require __DIR__.'/auth.php';