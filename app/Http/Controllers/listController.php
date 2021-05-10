<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listController extends Controller
{
    public function index(){
        return('index');
    }

    public function create(){
        $msg = 'well done';
        return response()->json(array('msg' => $msg), 200);
    }
}
