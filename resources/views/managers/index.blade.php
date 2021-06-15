@extends('layouts.app')

@section('content')
        <div class="center jumbotron">
            <div class="text-reft">
                <h3>予約一覧</h3>
                    <div class="text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>日時</th>
                                    <th>承認</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            @if (count($reservations) > 0)
                                @foreach ($reservations as $reservation)
                                    <tbody>
                                        <tr>
                                            <th>{!! ($reservation->id) !!}</th>
                                            <th>{!! ($reservation->user->name) !!}</th>
                                            <th>{!! ($reservation->reserve_start) !!} ~ {!! ($reservation->reserve_end) !!}</th>
                                            <th>{!! ($reservation->approval) !!}</th>
                                            <th>
                                                <form action="{{ route('reservations.destroy', $reservation->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" name="" value="削除">
                                                </form>
                                            </th>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @endif
                        </table>
                        {{-- ページネーションのリンク --}}
                        {{ $reservations->links() }}
                    </div>
            </div>
        </div>
@endsection