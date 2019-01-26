<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function About(){
        $title="About Page Title";
//        return view('pages.About',compact('title'));
//         return view('pages.About')->with('title',$title);

         //same as

         $data=array(
           'title'=>'About From Array' ,
           'services'=>['web','SEO',"Desktop"]
         );

        return view('pages.About')->with($data);

    }
}
