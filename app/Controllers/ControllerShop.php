<?php

namespace App\Controllers;

use App\Models\modelProduct;

class ControllerShop extends BaseController
{
    public function dashboard()
    {
        $modelProduct = new modelProduct();
        $listProduct = $modelProduct->findAll();
        $listBannerProduct = array();
        $listBestProduct = array();
        $listRandomProduct = array();

        for($i = 0; $i < 3 && $i < count($listProduct);) {
            $product = $listProduct[rand(0, count($listProduct) - 1)];

            if(!in_array($product, $listBannerProduct)){
                array_push($listBannerProduct, $product);
                $i++;
            }
        }

        foreach($listProduct as $product){
            if(count($listBestProduct) >= 3){
                break;
            }

            if($product['star'] >= 3) {
                array_push($listBestProduct, $product);
            }
        }

        for ($i = 0; $i < 3 && $i < count($listProduct); $i++) {
            array_push($listRandomProduct, $listProduct[rand(0, count($listProduct) - 1)]);
        }

        $data = [
            'title' => 'Dashboard',
            'listProduct' => $listProduct,
            'listBannerProduct' => $listBannerProduct,
            'listBestProduct' => $listBestProduct,
            'listRandomProduct' => $listRandomProduct
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
