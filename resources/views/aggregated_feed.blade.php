@extends('layouts.master')

@section('nav')
    @include('_navigation', array('location'=>'aggregated_feed'))
@show

@section('content')
    <div id="wrapper">
        @foreach ($activities as $activity)
            @include('stream-laravel::render_activity', array('activity'=>$activity))
        @endforeach
    </div>
@stop
