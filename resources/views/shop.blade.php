@extends('layouts.master')

@section('content')
    <p>Your shop ID: {{ Auth::user()->id }}</p>
    <p>Your shop name: {{ explode('.', Auth::user()->name)[0] }}</p>
@endsection

