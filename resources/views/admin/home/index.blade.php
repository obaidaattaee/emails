@extends("layouts.admin")

@section("title",  "Home")

@section("content")



<div class='alert alert-info'><b>Welcome {{ auth()->user()->name }} </b>Please select from left menu</div>
@endsection
