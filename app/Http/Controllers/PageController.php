<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about', [
            'title' => 'About Us - NeuroProfile'
        ]);
    }

    public function science()
    {
        return view('pages.science', [
            'title' => 'Our Science - NeuroProfile'
        ]);
    }

    public function research()
    {
        return view('pages.research', [
            'title' => 'Research - NeuroProfile'
        ]);
    }

    public function blog()
    {
        return view('pages.blog', [
            'title' => 'Blog - NeuroProfile'
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact Us - NeuroProfile'
        ]);
    }

    public function help()
    {
        return view('pages.help', [
            'title' => 'Help Center - NeuroProfile'
        ]);
    }

    public function faq()
    {
        return view('pages.faq', [
            'title' => 'FAQ - NeuroProfile'
        ]);
    }

    public function support()
    {
        return view('pages.support', [
            'title' => 'Technical Support - NeuroProfile'
        ]);
    }

    public function privacy()
    {
        return view('pages.privacy', [
            'title' => 'Privacy Policy - NeuroProfile'
        ]);
    }

    public function terms()
    {
        return view('pages.terms', [
            'title'=> 'Terms of Service - NeuroProfile'
        ]);
    }

    public function cookies()
    {
        return view('pages.cookies', [
            'title' => 'Cookie Policy - NeuroProfile'
        ]);
    }

    public function dataProtection()
    {
        return view('pages.data-protection', [
            'title' => 'Data Protection - NeuroProfile'
        ]);
    }
}
