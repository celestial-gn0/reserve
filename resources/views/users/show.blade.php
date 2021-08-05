@extends('layouts.app')

@section('content')
        <h3>プロフィール</h3>
            <div class="text-center">
                <table class="table table-striped">  
                    <tr>
                        <th>氏名</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>  
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>  
                    <tr>
                        <th>生年月日</th>
                        <td>{{ Auth::user()->birthday }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ Auth::user()->gender }}</td>
                    </tr>
                </table>
            </div>
@endsection