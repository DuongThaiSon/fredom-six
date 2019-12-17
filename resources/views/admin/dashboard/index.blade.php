@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Dashboard')])
@section('content')
{{-- <div id="main-content">
    Dashboard
    <button class="btn" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</button>
    <form id="logout" method="POST" action="/admin/logout">
        @csrf
    </form>
</div> --}}
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            Dashboard go here
        </div>
    </div>
</div>
@endsection
