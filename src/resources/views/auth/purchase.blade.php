{{-- 商品購入画面 --}}
@extends('layouts.app')

@section('content')
<div class="purchase-form">
    {{-- <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" class="product-image"> --}}
    <h2>{{ $product->name }}</h2>
    <p class="product-price">¥ {{ number_format($product->price) }}</p>
    <div class="purchase-form-info">
        <h3>商品代金</h3>
        <p class="price">¥ {{ number_format($product->price) }}</p>
        <h3>支払い方法</h3>
        <p class="payment">¥ {{ $payment->payment }}</p>
    </div>
    <hr>
    <form method="post" action="{{ route('purchase.store') }}">
        @csrf
        <select class="purchase-form-select" name="payment" placeholder="選択してください">
            @foreach($paymentMethods as $method)
                <option value="{{ $method }}">{{ $method }}</option>
            @endforeach
        </select>
        <button class="purchase-btn" type="submit">購入する</button>
    </form>
    <form action="{{ route('purchase.address') }}" class="purchase-address" method="get">
        @csrf
        <h3>配送先</h3>
        <p class="purchase-form-address">
            〒 {{ $user->postal_code }}<br>
            {{ $user->address }}<br>
            {{ $user->building }}
        </p>
        <button class="edit-btn" type="submit">変更する</button>
    </form>
</div>
@endsection
