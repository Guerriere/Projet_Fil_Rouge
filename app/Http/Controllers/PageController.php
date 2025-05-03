<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function accueil()
    {
        return view('page.index');
    }
    public function about()
    {
        return view('page.about');
    }
    public function contact()
    {
        return view('page.contact');
    }
    public function services()
    {
        return view('page.services');
    }
    public function agence()
    {
        return view('page.agence');
    }
    
    public function booking()
    {
        return view('page.booking');
    }
    public function faq()
    {
        return view('page.faq');
    }
    public function terms()
    {
        return view('page.terms');
    }
    public function privacy()
    {
        return view('page.privacy');
    }
    public function error()
    {
        return view('page.error');
    }
}
