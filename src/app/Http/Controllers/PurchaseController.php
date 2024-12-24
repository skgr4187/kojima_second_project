<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;

class PurchaseController extends Controller
{
    // 商品購入ページを表示
    public function create(Request $request)
    {
        $itemId = $request->query('item_id');
        $product = Product::find($itemId);

        return view('auth.purchase', compact('product'));
    }

    // 商品購入処理
    public function store(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        $order = new Order([
            'user_id' => $user->id,
            'product_id' => $productId,
            'payment_id' => $request->input('payment_id'),
            'postal_code' => $user->postal_code,
            'address' => $user->address,
            'building_name' => $user->building_name,
        ]);

        $order->save();

        return redirect()->route('index')->with('success', '注文が完了しました。');
    }

    // 住所変更ページを表示
    public function editAddress()
    {
        return view('auth.address');
    }

    // 変更内容の保存処理
    public function update(AddressRequest $request)
    {
        $form = $request->all();
        User::create($form);
        return view('auth.address');
    }
}
