@extends('layouts.app')

@section('content')
        <div class="center jumbotron">
            <div class="text-reft">
                <h1>予約一覧</h1>
                @if (count($reservations) > 0)
                    <div class="text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>日時</th>
                                    <th>承認</th>
                                </tr>
                            </thead>
                            @foreach ($reservations as $reservation)
                                <tbody>
                                    <tr>
                                        <th>{!! ($reservation->user->name) !!}</th>
                                        <th>{!! ($reservation->reserve_start)~($reservation->reserve_end) !!}</th>
                                        <th>{!! ($micropost->approval) !!}</th>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>
        </div>
@endsection