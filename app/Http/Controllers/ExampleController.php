<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ExampleController extends Controller
{
    //31b51f1196-8fef62@inbox.mailtrap.io

    public function basic()
    {
        Mail::send([], [], function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('31b51f1196-8fef62@inbox.mailtrap.io', 'Test User');
            $message->subject('Test Email');
            $message->setBody('Hello This is test Body');
        });
        echo 'Mail Sent Success';
    }

    public function html()
    {
        $data = array(
            'name' => "Khayrul"
        );

        Mail::send('email.mail', $data, function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('31b51f1196-8fef62@inbox.mailtrap.io', 'Test User');
            $message->subject('Test Email');
            $message->setBody('Hello This is test Body');
        });
        echo 'Mail Sent Success';
    }

    public function mailAtachment()
    {
        $data = array(
            'name' => "Khayrul"
        );
        $image = asset('upload/others/user.png');
        Mail::send('email.mail', $data, function ($message) use ($image) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('31b51f1196-8fef62@inbox.mailtrap.io', 'Test User');
            $message->subject('Atachment Email');
            $message->setBody('Hello This is Atachment Body');
            $message->attach($image);
        });
        echo 'Mail Sent Success';
    }

    public function session_set()
    {
        Session::put('name', 'Khayrul');
        echo 'Session Set Success';
    }

    public function session_get()
    {
        echo Session::get('name');
    }

    public function session_delete()
    {
        Session::forget('name');
        echo 'Session Delete Success';
    }

    public function cookie_set()
    {
        $response = Response('Set Cookie');
        $response->withCookie('email', 'khayrulshanto@gmail.com', 30);
        return $response;
    }

    public function cookie_get(Request $request)
    {
        echo $request->cookie('email');
    }
}
