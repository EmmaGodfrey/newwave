<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ContactSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        $contactSettings = ContactSetting::first();
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('frontend.pages.contact', compact('contactSettings', 'testimonials'));
    }

    /**
     * Handle the contact form submission.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the message to the database
        $contactMessage = ContactMessage::create($request->all());

        // Get admin email from settings
        $contactSettings = ContactSetting::first();
        
        if ($contactSettings && $contactSettings->email) {
            try {
                // Send email to admin
                Mail::send('emails.contact', [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'messageBody' => $request->message,
                ], function ($message) use ($request, $contactSettings) {
                    $message->to($contactSettings->email)
                        ->subject('New Contact Form Submission: ' . $request->subject)
                        ->from(config('mail.from.address'), config('mail.from.name'))
                        ->replyTo($request->email, $request->name);
                });
            } catch (\Exception $e) {
                \Log::error('Contact email failed: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Your message was sent successfully!'
        ]);
    }
}
