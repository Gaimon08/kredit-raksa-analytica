<?php

namespace App\Libraries; 
class Fungsi
{
    protected $CI;

    public function __construct()
    {
        $this->CI = \Config\Services::instance();
    }

    public function admin_login()
    {
        $adminModel = new \App\Models\AdminModel();

        $adminId = session('admin_id');
        $adminData = $adminModel->find($adminId);

        return $adminData;
    }
}
