@extends('layouts.profile')
@section('title', 'My プロフィール')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>My プロフィール</h2>
            <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">氏名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{$profile->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">性別</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="gender" value="{{$profile->gender}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">趣味</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="hobby" value="{{$profile->hobby}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">自己紹介欄</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="20">{{$profile->introduction}}</textarea>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $profile->id }}">
                @csrf
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection