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
}
