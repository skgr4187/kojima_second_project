{{-- 商品詳細画面 --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<div class="product-inner">
    <div>{{$categories}}test</div>
    <div class="product-detail">
        <!-- 商品画像 -->
        <div class="product-image">
            <img src="{{ asset($product->image) }}" alt="商品画像">
        </div>

        <!-- 商品情報 -->
        <div class="product-info">
            <h1>{{$product->name}}</h1>
            <p>ブランド: N/A</p>
            <div class="product-price">
                ￥<span class="price">{{$product->price}}</span> (税込)
            </div>

            <div class="product-like">
                <form action="{{ route('products.like', $product->id) }}" method="post">
                @csrf
                    <button type="submit" class="like-btn">いいね</button>
                </form>
                <form action="{{ route('purchase.create', $product->id) }}" method="get">
                @csrf
                    <button type="submit" class="purchase-btn">購入手続きへ</button>
                </form>
            </div>

            <div class="product-description">
                <h2>商品説明</h2>
                <div class="description">
                    {{$product->description}}
                </div>
            </div>

            <div class="product--info">
                <h2>商品の情報</h2>
                <div class="product-category">
                    カテゴリー: <span class="category">{{$product->category_id}}</span>
                </div>
                <div class="product-condition">
                    商品の状態: {{$product->condition_id}}
                </div>
            </div>

            <!-- コメント欄 -->
            <div class="comments-section">
                <h2>コメント (1)</h2>
                <div class="comment">
                    <p><strong>admin:</strong> こちらにコメントがあります。</p>
                </div>

                <form action="/comments" method="POST">
                    @csrf
                    <div class="comment-form">
                        <textarea name="comment" placeholder="商品のコメント" required></textarea>
                        <button type="submit">コメントを送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
