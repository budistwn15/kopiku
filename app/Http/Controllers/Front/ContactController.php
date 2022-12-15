<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => ['email','required'],
            'name' => ['required','string'],
            'subject' => ['required','string'],
            'message' => ['required','string']
        ]);

        Contact::create($validate);
        Alert::success('Sukses',"Terimakasih telah menghubungi kami, harap menunggu balasan dari kami");

        return back();
    }
}
