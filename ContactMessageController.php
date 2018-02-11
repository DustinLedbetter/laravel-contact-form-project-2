<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    //function for creating and retuning contact form
    public function create()
    {
      return view('contact');
    }

    //function for storing dat recieved from the contact form
    public function store(Request $request)
    {

      //validate email
      $this->validate($request, [
        'name' => 'required|max:50',
        'email' => 'nullable|email|max:250',
        'message' => 'required|max:750'
      ]);

      //store data for use in view
      $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'bodyMessage' => $request->message
      );

      //send email
      Mail::send('emails.contact-message', $data, function($message) use($data){
          $message->from($data['email']);
          $message->to('zxTesttseTxz@gmail.com');
          $message->subject($data['name']);

      });

      //return message for user
      return redirect()->back()->with('flash_message', 'Thank you for your message.');
    }
}
