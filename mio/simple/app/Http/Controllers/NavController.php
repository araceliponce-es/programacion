<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {

        $navLinks = [
            [
                'display' => 'link 1',
                'url' => 'https://'
            ],
            [
                'display' => 'link 2',
                'url' => 'https://'
            ]
        ];

        return view('def');
    }
}
