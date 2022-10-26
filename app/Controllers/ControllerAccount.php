<?php

namespace App\Controllers;

use App\Models\modelAccount;

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

        $listAccount = $this->modelAccount->where('username', $username)->findAll();

        foreach($listAccount as $user){
            if(password_verify($password, $user['password'])){
                $account = $user;
                break;
            }
        }

        if(!empty($account)) {
            session_start();
            $_SESSION['account'] = $account;

            return redirect()->to('/dashboard');
        }

        echo "<script>alert('Username/Password is incorect!');window.location.href='signin';</script>";
    }

    public function signingUp()
    {
        $this->modelAccount->save([
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'type' => $this->request->getVar('type')
        ]);

        return redirect()->to('/signin');
    }
}