@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>予約フォーム</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <!-- 完了メッセージ -->
            @if (session('result'))
                <div style="color:green;">
                    {{ session('result') }}
                </div>
                <br>
            @endif
            
            {!! Form::open(['route' => 'reservations.store']) !!}
                <div class="form-group">
                    {!! Form::label('reserve_start', '開始時間') !!}
                    {!! Form::input('date','reserve_start_date', old('reserve_start_date'), ['class' => 'form-control']) !!}
                    {!! Form::input('time','reserve_start_time', old('reserve_start_time'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('reserve_end', '終了時間') !!}
                    {!! Form::input('date','reserve_end_date', old('reserve_end_date'), ['class' => 'form-control']) !!}
                    {!! Form::input('time','reserve_end_time', old('reserve_end_time'), ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('予約する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection