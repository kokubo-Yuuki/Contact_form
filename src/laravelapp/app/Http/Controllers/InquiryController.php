<?php

namespace App\Http\Controllers;


use App\Inquiry;
use Illuminate\Http\Request;


class InquiryController extends Controller
{
    public function index()
    {

        $inquiries = Inquiry::all();

        return view('inquiries/index',[
            'inquiries' => $inquiries,
        ]);
        
    }

}
