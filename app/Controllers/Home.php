<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function main(): string
    {
        return view('index');
    }
    public function admin(): string
    {
        return view('admin/index');
    }
}
