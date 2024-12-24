{{-- 商品一覧画面（トップ画面） --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="inner">
    <div class="tab">
        <input type="radio" id="tab1" name="tab" checked>
        <label for="tab1">おすすめ</label>
        <input type="radio" id="tab2" name="tab">
        <label for="tab2">マイリスト</label>
        <hr>
    </div>

    <!-- おすすめの商品 -->
    <div class="tab-content" id="recommended">
        <div class="recommended-inner">
            @foreach($products as $product)
            <div class="product">
                <div class="product-card">
                    <a href="{{ route('products.show', ['item_id' => $product->id]) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                    <p class="product-name">{{ $product->name }}</p>
                    @if($product->is_sold)
                        <span class="sold_out">Sold</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- マイリストの商品（ログインしている場合のみ表示） -->
    @auth
    <div class="tab-content" id="likes">
        <div class="likes-inner">
            @foreach($likes as $like)
            <div class="product">
                <div class="product-card">
                    <a href="{{ route('products.show', ['id' => $like->product->id]) }}">
                        <img src="{{ $like->product->image }}" alt="{{ $like->product->name }}" class="product-image">
                    <p class="product-name">{{ $product->name }}</p>
                    @if($product->is_sold)
                        <span class="sold_out">Sold</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endauth
@endsection
