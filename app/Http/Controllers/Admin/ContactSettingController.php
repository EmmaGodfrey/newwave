<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    /**
     * Display the contact settings form.
     */
    public function edit()
    {
        $setting = ContactSetting::first();
        return view('admin.contact.settings', compact('setting'));
    }

    /**
     * Update the contact settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'map_url' => 'nullable|url',
        ]);

        $setting = ContactSetting::first();

        if ($setting) {
            $setting->update($request->all());
        } else {
            ContactSetting::create($request->all());
        }

        return redirect()->back()->with('success', 'Contact settings updated successfully!');
    }
}
