<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
   public function index(){
    $session = session();

    if ($session->has('nama')) {

        $username = $session->get('nama');

        $data['greeting'] = 'Hi, ' . $username;
    } else {

        $data['greeting'] = 'Hi, Guest';
    }
    
    $Datauser = New AdminModel;
    $data['ListUser'] = $Datauser->findAll();
    return view('user/dataUser',$data);
   }
    
    public function add(){
        $session = session();

        if ($session->has('nama')) {
    
            $username = $session->get('nama');
    
            $data['greeting'] = 'Hi, ' . $username;
        } else {
    
            $data['greeting'] = 'Hi, Guest';
        }
        return view('user/user_add',$data);
    }

   public function add_post(){
     helper(['form']);
    $DataUser = New AdminModel;
    $datanya=[
        'nama'=>$this->request->getPost('nama'), 
        'username'=>$this->request->getPost('username'),
        'password'=>sha1($this->request->getPost('password')),
        'jenis_kelamin'=>$this->request->getPost('jenis_kelamin')
    ];
    $DataUser->insert($datanya);

    return redirect()->to('/user');
 
}

public function edit($admin_id){
    $session = session();

    if ($session->has('nama')) {

        $username = $session->get('nama');

        $data['greeting'] = 'Hi, ' . $username;
    } else {

        $data['greeting'] = 'Hi, Guest';
    }

    $DataUser = New AdminModel;
$data['detailUser']=$DataUser->where('admin_id',$admin_id)->findAll();
return view('user/user_edit',$data);
}

public function update(){
    $DataUser = New AdminModel;

    $data=[
        'nama'=>$this->request->getPost('nama'), 
        'username'=>$this->request->getPost('username'),
        'password'=>sha1($this->request->getPost('password')),
        'jenis_kelamin'=>$this->request->getPost('jenis_kelamin')
    ];

    $DataUser->update($this->request->getPost('admin_id'),$data);
    return redirect()->to('/user');
}

public function delete($idAdmin){

    $DataUser = New AdminModel;
    $DataUser->where('admin_id',$idAdmin)->delete();
    return redirect()->to('/user');
}


}


