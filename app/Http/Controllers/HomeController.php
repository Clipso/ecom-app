<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        return view('home.index');
    }

    public function about_us()
    {
        return view('admin.about_us');
    }

    public function hadith()
    {
        $response = file_get_contents('https://www.hadithapi.com/api/hadiths?apiKey=$2y$10$FV9uPqCmpxTeMDZRhbj7ufU7MubF5qddHZJBSEG0PTdpxAiwmoy');
        $response = json_decode($response);
        echo"<pre>"; print_r($response->hadiths->data); echo"</pre>";
        // return view('hadith.index');
    }
}
