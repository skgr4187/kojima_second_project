{{-- プロフィール編集画面（設定画面） --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/profile-edit.css') }}">
@endsection

@section('content')
<div class="progile-form">
    <h1>プロフィール設定</h1>
    <form action=/mypage/profile method="POST">
    @csrf
        <div class="profile-image">
            <label for="user_image">画像を選択する</label>
            <input type="file" name="user_image" id="user_image">
        </div>
        <div class="progile-form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" />
            <div class="error-message">
                @error('name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="progile-form-group">
            <label for="postal_code">郵便番号</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" />
            <div class="error-message">
                @error('postal_code')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="progile-form-group">
            <label for="address">住所</label>
            <input type="text" id="password" name="address" value="{{ old('address') }}">
            <div class="error-message">
                @error('address')
                {{$message}}
                @enderror
            </div>
        </div>
        <button type="submit" class="profile-edit-btn">更新する</button>
    </form>
</div>
@endsection