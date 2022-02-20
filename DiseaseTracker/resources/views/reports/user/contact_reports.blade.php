@extends('layout')

@section('content')

<h1>All cases reported by your contacts</h1>

@foreach ($cases as $caseInfo)
    <h1>Report {{$caseInfo->report_id}}</h1>
    <p>Reported by: {{$caseInfo->user->first_name}}</p>
    <p>Report type: {{$caseInfo->type}}</p>
    <p>Report date: {{$caseInfo->reported}}</p>
@endforeach


@endsection 
 29  DiseaseTracker/resources/v