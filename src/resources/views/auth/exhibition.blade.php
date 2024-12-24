{{-- 商品出品ページ --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/exhibition.css') }}">
@endsection

@section('content')
<div class="exhibition-form">
    <h1>商品の出品</h1>
    <form class="exhibition-form-inner" action="/sell" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="exhibition-form-group">
            <label class="form-item" for="image">商品画像</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="error-message">
                @error('image')
                {{$message}}
                @enderror
            </div>
        </div>
        <h2>商品の詳細</h2>
        <div class="exhibition-form-group">
            <label class="form-item" for="categories_id">カテゴリー</label>
            <div>
                @foreach ($categories as $category)
                    <label>
                        <input class="checkbox-item" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        {{ $category->category }}
                    </label>
                @endforeach
            </div>
            <div class="error-message">
                @error('categories')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="exhibition-form-group">
            <label class="form-item" for="condition_id">商品の状態</label>
            <select class="condition" name="condition_id" id="condition" >
                <option value="" disabled selected hidden>選択してください</option>
                @foreach ($conditions as $condition)
                    <option value="{{ $condition->id }}"
                        @if(old('condition_id') == $condition->id) selected @endif>
                        {{ $condition->condition }}
                    </option>
                @endforeach
            </select>
            <div class="error-message">
                @error('condition_id')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="exhibition-form-group">
            <label class="form-item" for="name">商品名</label>
            <input class="name" type="text" name="name" id="name" value="{{ old('name') }}">
            <div class="error-message">
                @error('name')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="exhibition-form-group">
            <label class="form-item" for="description">商品の説明</label>
            <textarea class="description" name="description" id="description">{{ old('description') }}</textarea>
            <div class="error-message">
                @error('description')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="exhibition-form-group">
            <label class="form-item" for="price">販売価格</label>
            <input class="price" type="integer" name="price" id="price" value="{{ old('price') }}">
            <div class="error-message">
                @error('price')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="exhibition-form-btn">
            <button type="submit" class="exhibition-btn">出品する</button>
        </div>
    </form>
</div>
@endsection