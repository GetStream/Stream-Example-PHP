@extends('layouts.master')

@section('nav')
    @include('_navigation', array('location'=>'profile'))
@show

@section('content')
    @include('_profile', array('profile'=>$profile, 'followed'=>$profile->follows, 'full'=>true))
@stop
