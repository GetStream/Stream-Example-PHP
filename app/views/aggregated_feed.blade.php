@extends('layouts.master')

@section('nav')
    @include('_navigation', array('location'=>'aggregated_feed'))
@show

@section('content')
    <div id="wrapper">
        @foreach ($activities as $activity)
            @include('_aggregated_activity', array('aggregated_activity'=>$activity))
        @endforeach
    </div>
@stop
