<?php

namespace App\Controllers;

use App\Models\modelCart;
use App\Models\modelProduct;
use App\Models\modelShipped;

class ControllerShop extends BaseController
{
    private $modelProduct;
    private $modelCart;
    private $modelShipped;

    public function __construct()
    {
        $this->modelProduct = new modelProduct();
        $this->modelCart = new modelCart();
        $this->modelShipped = new modelShipped();
    }

    public function dashboard()
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Dashboard',
            'listProduct' => $listProduct,
            'listBannerProduct' => $this->GetListBannerProduct($listProduct),
            'listBestProduct' => $this->GetListBestProduct($listProduct),
            'listRandomProduct' => $this->GetListRandomProduct($listProduct),
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewDashboard', $data);
    }

    public function shop($type)
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Shop',
            'listProduct' => $listProduct,
            'type' => $type,
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewShop', $data);
    }

    public function shopSingle($id)
    {
        $product = $this->modelProduct->where('id', $id)->first();

        $data = [
            'title' => $product['title'],
            'product' => $product,
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewShopSingle', $data);
    }

    public function cart()
    {
        $listProduct = $this->modelProduct->findAll();

        $data = [
            'title' => 'Cart',
            'listProduct' => $listProduct,
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewCart', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewProfile', $data);
    }

    public function stock()
    {
        $data = [
            'title' => 'Product Stock',
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewProductStock', $data);
    }

    private function GetListCartProduct(){
        $listCartProduct = null;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
        }

        if (!empty($account)) {
            if ($account['type'] == "Customer") {
                $this->modelCart->where('id_customer', $account['id'], 'shipped', 0);
                $listCartProduct = $this->modelCart->findAll();
            } else {
                $listShipped = $this->modelShipped->where('delivered', 0)->findAll();
                $listCartProduct = array();

                foreach ($listShipped as $shipped) {
                    $cart = $this->modelCart->where('id', $shipped['id_cart'])->first();
                    $product = $this->modelProduct->where('id', $cart['id_product'])->first();
                    if ($product['id_seller'] == $account['id']) {
                        array_push($listCartProduct, $cart);
                    }
                }
            }
        }

        return $listCartProduct;
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
