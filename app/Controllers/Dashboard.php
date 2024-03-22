<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {

    $session = session();

    if ($session->has('nama')) {

        $username = $session->get('nama');

        $data['greeting'] = 'Hi, ' . $username;
    } else {

        $data['greeting'] = 'Hi, Guest';
    }

    return view('dashboard', $data);
    }
}
