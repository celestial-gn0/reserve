@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="center jumbotron">
            <div class="text-center">
                <h1>予約をする</h1>
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそABC美容院へ！</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    
    @endif
@endsection