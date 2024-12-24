<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExibitionRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 新規会員登録処理をしてプロフィール設定ページを表示
    public function store(RegisterRequest $request)
    {
        $form = $request->only(['name', 'email', 'password']);
        $user = User::create($form);
        return view('auth.profile-edit')->with('user_id', $user->id);
    }

    // ログインページを表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理をして商品一覧ページを表示
    public function login(LoginRequest $request)
    {
    // バリデーション済みのデータを取得
    $credentials = $request->validated();

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('index');
    }
        // パスワードが間違っている場合
        return back()->withErrors([
            'email' => '認証情報が一致しません。',
        ])->onlyInput('email');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ログイン画面へリダイレクト
        return redirect()->route('login');
    }

    // プロフィールページを表示
    public function showMypage()
    {
        return view('auth.profile');
    }

    // プロフィール編集ページを表示
    public function editMypage()
    {
        return view('auth.profile-edit');
    }

    // 変更内容の保存処理をしてプロフィール編集ページを表示
    public function update()
    {
        return view('auth.profile-edit');
    }

    // 購入した商品一覧ページを表示
    public function indexBuy()
    {
        return view('auth.profile');
    }

    // 出品した商品一覧ページを表示
    public function indexSell()
    {
        return view('auth.profile');
    }
}
