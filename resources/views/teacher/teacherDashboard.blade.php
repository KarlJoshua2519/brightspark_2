@extends('layouts.app')

@section('title', 'Teacher')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-4 sm:ml-64">

<div class="p-4 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

    <h1> Welcome, Teacher {{$teacher->name}}!</h1>

</div>

</div>





@endsection