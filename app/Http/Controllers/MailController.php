<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $settings = Setting::all()->keyBy('key');
        $toEmail = $settings['email']->value ?? config('mail.from.address');

        Mail::to($toEmail)->send(new ContactMail($request->name, $request->email, $request->message));

        return redirect()->route('contact')
            ->with('success', 'Your message has been sent successfully!');
    }
}
