@extends('layouts.admin')
@section('title', 'プロフィール一覧')

@section('content')
<div class="container">
    <div class="row">
        <h2>プロフィール一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
    </div>
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">氏名</th>
                            <th width="50%">性別</th>
                            <th width="10%">趣味</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                            </td>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->gender}}</td>
                            <td>{{ $profile->hobby }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection