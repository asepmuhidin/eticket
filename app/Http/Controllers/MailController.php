<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function index(){
        $mailData=[
            'title'=>'Test Email',
            'body'=> 'Test body email from laravel',
        ];
        FacadesMail::to('asep.muhidin@gmail.com')->send(new TestMail($mailData));
        dd('sukses kirim email');
    }
}
