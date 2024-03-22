<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('v_login');
    }

    public function login()
    {
        $adminModel = new AdminModel();
    
        $username = $this->request->getPost('txtUsername');
        $password = sha1($this->request->getPost('txtPassword')); 
    
        $userData = $adminModel->where(['username' => $username, 'password' => $password])->first();
    
        if ($userData) {
            $sessionData = [
                'username'      => $userData['username'],
                'nama'      => $userData['nama'],
                'admin_id'      => $userData['admin_id'],
                'level'         => $userData['level'],
                'sudahkahLogin' => true,
            ];
    
            session()->set($sessionData);
    
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/admin/login');
        }
    }
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
