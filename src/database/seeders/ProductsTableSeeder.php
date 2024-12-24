<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        // 商品データ
        $products = [
            [
                'user_id' => $user->id,
                'name' => '腕時計',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'price' => 15000,
                'condition_id' => 1,
                'category_id' => [1, 5],
                'image' => 'storage/images/Armani+Mens+Clock.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'HDD',
                'description' => '高速で信頼性の高いハードディスク',
                'price' => 5000,
                'condition_id' => 2,
                'category_id' => [10],
                'image' => 'storage/images/HDD+Hard+Disk.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => '玉ねぎ3束',
                'description' => '新鮮な玉ねぎ3束のセット',
                'price' => 300,
                'condition_id' => 3,
                'category_id' => [10],
                'image' => 'storage/images/iLoveIMG+d.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => '革靴',
                'description' => 'クラシックなデザインの革靴',
                'price' => 4000,
                'condition_id' => 4,
                'category_id' => [1, 5],
                'image' => 'storage/images/Leather+Shoes+Product+Photo.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'ノートPC',
                'description' => '高性能なノートパソコン',
                'price' => 45000,
                'condition_id' => 1,
                'category_id' => [2],
                'image' => 'storage/images/Living+Room+Laptop.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'マイク',
                'description' => '高音質のレコーディング用マイク',
                'price' => 8000,
                'condition_id' => 2,
                'category_id' => [2],
                'image' => 'storage/images/Music+Mic+4632231.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'ショルダーバッグ',
                'description' => 'おしゃれなショルダーバッグ',
                'price' => 3500,
                'condition_id' => 3,
                'category_id' => [1, 4],
                'image' => 'storage/images/Purse+fashion+pocket.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'タンブラー',
                'description' => '使いやすいタンブラー',
                'price' => 500,
                'condition_id' => 4,
                'category_id' => [10],
                'image' => 'storage/images/Tumbler+souvenir.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'コーヒーミル',
                'description' => '手動のコーヒーミル',
                'price' => 4000,
                'condition_id' => 1,
                'category_id' => [10],
                'image' => 'storage/images/Waitress+with+Coffee+Grinder.jpg',
            ],

            [
                'user_id' => $user->id,
                'name' => 'メイクセット',
                'description' => '便利なメイクアップセット',
                'price' => 2500,
                'condition_id' => 2,
                'category_id' => [6],
                'image' => 'storage/images/cosme.jpg',
            ],
        ];

        foreach ($products as $productData) {
            // 商品データ挿入
            $product = Product::create([
                'user_id' => $productData['user_id'],
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'condition_id' => $productData['condition_id'],
                'image' => $productData['image'],
            ]);
            $product->categories()->attach($productData['category_id']);
        }
    }
}
