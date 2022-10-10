<?php

namespace App\Controllers;

use App\Models\modelProduct;

class ControllerShop extends BaseController
{
    public function dashboard()
    {
        $modelProduct = new modelProduct();

        $data = [
            'title' => 'Dashboard',
            'listProduct' => $modelProduct->findAll()
        ];

        return view('content/viewDashboard', $data);
    }

    public function shop()
    {
        $modelProduct = new modelProduct();
        $listProduct = $modelProduct->findAll();

        $data = [
            'title' => 'Shop',
            'listProduct' => $listProduct
        ];

        return view('content/viewShop', $data);
    }

    public function shopSingle($id)
    {
        $modelProduct = new modelProduct();
        $product = $modelProduct->where('id', $id)->first();

        $data = [
            'title' => $product['title'],
            'product' => $product
        ];

        return view('content/viewShopSingle', $data);
    }

    public function cart()
    {
        $modelProduct = new modelProduct();
        $listProduct = $modelProduct->findAll();

        $data = [
            'title' => 'Cart',
            'listProduct' => $listProduct
        ];

        return view('content/viewCart', $data);
    }
}
