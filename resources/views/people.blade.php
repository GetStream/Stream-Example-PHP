@extends('layouts.master')

@section('nav')
    @include('_navigation', array('location'=>'people'))
@show

@section('content')
    @foreach ($people as $profile)
        @include('_profile', array('profile'=>$profile, 'follow'=>(count($profile->followers) > 0 ? $profile->followers[0] : false), 'full'=>false))
    @endforeach
@stop
