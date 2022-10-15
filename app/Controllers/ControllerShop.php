<?php

namespace App\Controllers;

use App\Models\modelProduct;

class ControllerShop extends BaseController
{
    private $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new modelProduct();
    }

    public function dashboard()
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Dashboard',
            'listProduct' => $listProduct,
            'listBannerProduct' => $this->GetListBannerProduct($listProduct),
            'listBestProduct' => $this->GetListBestProduct($listProduct),
            'listRandomProduct' => $this->GetListRandomProduct($listProduct)
        ];

        return view('content/viewDashboard', $data);
    }

    public function shop()
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Shop',
            'listProduct' => $listProduct
        ];

        return view('content/viewShop', $data);
    }

    public function shopSingle($id)
    {
        $product = $this->modelProduct->where('id', $id)->first();

        $data = [
            'title' => $product['title'],
            'product' => $product
        ];

        return view('content/viewShopSingle', $data);
    }

    public function cart()
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Cart',
            'listProduct' => $listProduct
        ];

        return view('content/viewCart', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile'
        ];

        return view('content/viewProfile', $data);
    }

    private function GetListBannerProduct($listProduct)
    {
        $listBannerProduct = array();

        for ($i = 0; $i < 3 && $i < count($listProduct);) {
            $product = $listProduct[rand(0, count($listProduct) - 1)];

            if (!in_array($product, $listBannerProduct)) {
                array_push($listBannerProduct, $product);
                $i++;
            }
        }

        return $listBannerProduct;
    }

    private function GetListBestProduct($listProduct)
    {
        $listBestProduct = array();

        foreach ($listProduct as $product) {
            if (count($listBestProduct) >= 3) {
                break;
            }

            if ($product['star'] >= 3) {
                array_push($listBestProduct, $product);
            }
        }

        return $listBestProduct;
    }

    private function GetListRandomProduct($listProduct)
    {
        $listRandomProduct = array();

        for ($i = 0; $i < 3 && $i < count($listProduct); $i++) {
            array_push($listRandomProduct, $listProduct[rand(0, count($listProduct) - 1)]);
        }

        return $listRandomProduct;
    }
}
