{{-- 送付先住所変更画面 --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/address.css') }}">
@endsection

@section('content')
<div class="address-inner">
    <h1>住所の変更</h1>
    <form method="post" action=/purchase/:item_id>
        @csrf
        <div class="address-form-group">
            <label for="postal_code">郵便番号</label>
            <input type="text" id="postal_code" name="postal_code">
        </div>
        <div class="address-form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address">
        </div>
        <div class="address-form-group">
            <label for="building_name">建物名</label>
            <input type="text" id="building_name" name="building_name">
        </div>
        <button claa="address-btn" type="submit">更新する</button>
    </form>
    <form method="GET" action=/purchase/:item_id>
        @csrf
        <button class="back-btn" type="submit">購入画面へ戻る</button>
    </form>
</div>
@endsection
