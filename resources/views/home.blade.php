@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>{{ auth()->user()->name }}</p>
    <p>{{ auth()->user()->id }}</p>
    
@stop