@extends('layouts.app')
@section('content')
@include('common.errors')
<div class="card-body">
    <hr>
    <ul>
        <li>ユーザー名 : {{ $user->name }}</li>
        <li>誕生年月 : {{ $user->birth_year}} / {{ $user->birth_month}}</li>
        <li>自己紹介 : {{ $user->user_desc }}</li>
    </ul>
    @if(Auth::id() == $user->user_id)
        <form action="{{ url('useredit/'.$user->id) }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">
                編集
            </button>
        </form>
    @endif
</div>
    
@endsection