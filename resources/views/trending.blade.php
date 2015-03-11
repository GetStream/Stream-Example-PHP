@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="container-pins">
            @foreach ($items as $item)
                @include('_pin', array('item'=>$item))
            @endforeach
        </div>
    </div>
@stop