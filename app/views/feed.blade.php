@extends('layouts.master')

@section('nav')
    @include('_navigation', array('location'=>'feed'))
@show

@section('content')
    <div class="container">
        <div class="container-pins">
            @foreach ($activities as $activity)
                @include('_activity', array('activity'=>$activity))
            @endforeach
        </div>
    </div>
@stop
