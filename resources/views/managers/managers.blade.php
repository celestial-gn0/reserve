@extends('layouts.app')

@section('content')
        <div class="center jumbotron">
        <div class="text-reft">
            <h1>管理人トップ</h1>
                {!! link_to_route('reservations.index', '予約をする', ['user' => Auth::id()], ['class' => 'btn btn-lg btn-primary']) !!}
@endsection