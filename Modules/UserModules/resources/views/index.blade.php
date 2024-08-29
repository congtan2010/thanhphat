@extends('usermodules::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('usermodules.name') !!}</p>
@endsection
