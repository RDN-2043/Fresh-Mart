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

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        return view('content/viewAbout', $data);
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

    public function contact()
    {
        $data = [
            'title' => 'Contact Us'
        ];

        return view('content/viewContact', $data);
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

    public function stockProduct()
    {
        $data = [
            'title' => 'Product Stock',
            'type' => 'Product',
            'listCartProduct' => $this->GetListCartProduct()
        ];

        return view('content/viewProductStock', $data);
    }

    public function stockTransaction()
    {
        $data = [
            'title' => 'Product Stock',
            'type' => 'Transaction',
            'listShippedProduct' => $this->GetListShipped()
        ];

        return view('content/viewTransaction', $data);
    }

    public function addProduct()
    {
        $data = [
            'title' => 'Add Product'
        ];

        return view('content/viewAddProduct', $data);
    }

    public function updateProduct($productId)
    {
        $data = [
            'title' => 'Add Product',
            'productId' => $productId
        ];

        return view('content/viewAddProduct', $data);
    }

    public function addNewProduct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
        }

        $this->modelProduct->save([
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('desc'),
            'type' => $this->request->getVar('type'),
            'available' => $this->request->getVar('qty'),
            'star' => 0,
            'price' => $this->request->getVar('price'),
            'imgLink' => $this->request->getVar('imgLink'),
            'id_seller' => $account['id']
        ]);

        return redirect()->to('/stock/product');
    }

    public function addToCart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
        }

        $id_product = $this->request->getVar('id_product');
        $total = $this->request->getVar('quantity');
        $qty = $this->modelProduct->where('id', $id_product)->first()['available'];

        $this->modelCart->save([
            'id_customer' => $account['id'],
            'id_product' => $id_product,
            'total' => $total,
            'shipped' => 0
        ]);

        $this->modelProduct->save([
            'id' => $id_product,
            'available' => $qty - $total
        ]);

        return redirect()->to('/shop-single/' . $id_product);
    }

    public function deliver($shipped_id){
        $this->modelShipped->save([
            'id' => $shipped_id,
            'delivered' => 1
        ]);

        return redirect()->to('/stock/transaction');
    }

    public function buy()
    {
        $listCart = $this->GetListCartProduct();

        foreach($listCart as $cart){
            $this->modelShipped->save([
                'id_cart' => $cart['id'],
                'delivered' => 0
            ]);

            $this->modelCart->save([
                'id' => $cart['id'],
                'shipped' => 1
            ]);
        }

        return redirect()->to('/cart');
    }

    private function GetListCartProduct(){
        $listCartProduct = null;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
        }

        if (!empty($account))
        {
            if ($account['type'] == "Customer")
            {
                $listCartProduct = $this->modelCart->where('id_customer', $account['id'])->where('shipped', 0)->findAll();
            }
            else
            {
                $listCartProduct = $this->modelProduct->where('id_seller', $account['id'])->findAll();
            }
        }

        return $listCartProduct;
    }

    private function GetListShipped()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
        }

        $listShipped = $this->modelShipped->where('delivered', 0)->findAll();
        $listCartProduct = array();

        foreach ($listShipped as $shipped) {
            $cart = $this->modelCart->where('id', $shipped['id_cart'])->first();
            $product = $this->modelProduct->where('id', $cart['id_product'])->first();
            if ($product['id_seller'] == $account['id']) {
                array_push($listCartProduct, $cart);
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
