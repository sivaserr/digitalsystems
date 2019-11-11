<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        // $name = 'Welcom To Ivisual!...';
        $data = array(
            'title' => 'ARRAY VALUE',
            'service'=>['WEB','PROGRAM','DATA']
        );
        // return view('pages.about',compact('name'));
        return view('pages.about')->with($data);
    }
}
