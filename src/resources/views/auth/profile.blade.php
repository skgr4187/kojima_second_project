{{-- プロフィール画面 --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
@endsection

@section('content')
<div class="profile-header">
    {{-- <img src="{{ asset('storage/' . $user->image) }}" alt="プロフィール画像" > --}}
    {{-- <h3 class="name">{{ $user->name }}</h3> --}}
    <a href="{{ route('editMypage') }}" class="profile-edit-btn">プロフィールを編集</a>
</div>

<div class="tabs">
    <!-- タブの定義 -->
    <input type="radio" id="tab1" name="tab" checked>
    <label for="tab1">出品した商品</label>
    <input type="radio" id="tab2" name="tab">
    <label for="tab2">購入した商品</label>
    <hr>

    {{-- <!-- タブの内容 -->
    <div class="tab-content">
        <!-- 出品した商品 -->
        <div class="tab-panel" id="listed">
            <div class="row">
                @foreach($likes as $like)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ $product->image }}" class="card-img-top" alt="商品画像">
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 購入した商品 -->
        <div class="tab-panel" id="purchased">
            <div class="row">
                @foreach($purchasedProducts as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ $product->image }}" class="card-img-top" alt="商品画像">
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</div>
@endsection
