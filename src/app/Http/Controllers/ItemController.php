<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExhibitionRequest;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Like;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // 商品検索
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")->orWhere('description', 'like', "%{$query}%")->get();
        return view('index', compact('products'));
    }

    // 商品一覧ページの表示
    public function index()
    {
        $user = auth()->user();
        // ログインしている場合、ユーザーの出品商品を除外
        if ($user) {
            $products = Product::where('user_id', '!=', $user->id)->get();
        } else {
            // ログインしていない場合はすべての商品を取得
            $products = Product::all();
        }
        return view('index', compact('products', 'user'));
    }

    // マイリストを表示
    // public function myList(Request $request)
    // {
    //     if (Auth::check()) {
    //         $likes = Product::whereIn(
    //             'id',
    //             Like::where('user_id', Auth::id())->pluck('product_id')
    //         )->get();
    //         return view('index', compact('likes'))->with('tab', 'mylist');
    //     }

    //     return redirect()->route('login');
    // }

    // 商品詳細ページを表示
    public function show($id)
    {
        // 商品IDを取得して表示する
        $conditions = Condition::all();
        $categories = Category::all();
        $product = Product::with(['condition', 'comments.user', 'categories'])->findOrFail($id);
        return view('product', compact('product', 'conditions', 'categories'));
    }

    // 商品出品ページを表示
    public function create()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('auth.exhibition', compact('categories', 'conditions'));
    }

    // 商品の出品処理
    public function store(ExhibitionRequest $request)
    {
        $form = $request->all();
        Product::create($form);
        return view('product');
    }
}
