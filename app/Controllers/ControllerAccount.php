<?php

namespace App\Controllers;

use App\Models\modelAccount;

enum enumType
{
    case Seller;
    case Customer;
}

class ControllerAccount extends BaseController
{
    private $modelAccount;

    public function __construct()
    {
        $this->modelAccount = new modelAccount();
    }

    public function signIn()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        session_destroy();

        $data = [
            'title' => 'Sign In'
        ];

        return view('content/viewSignIn', $data);
    }

    public function signUp()
    {
        $data = [
            'title' => 'Sign Up'
        ];

        return view('content/viewSignUp', $data);
    }

    public function signingIn()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $account = $this->modelAccount->where('username', $username, 'password', $password)->first();

        if(!empty($account)) {
            session_start();
            $_SESSION['account'] = $account;

            return redirect()->to('/dashboard');
        }

        echo "<script>alert('Username/Password is incorect!');window.location.href='signin';</script>";
    }
}