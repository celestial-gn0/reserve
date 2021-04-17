@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>会員登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation','パスワード確認' ) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('birthday', '生年月日') !!}
                    {!! Form::date('birthday', old('birthday'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('gender','性別') !!}
                    {!! Form::text('gender','男性/女性',old('gender'),['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection