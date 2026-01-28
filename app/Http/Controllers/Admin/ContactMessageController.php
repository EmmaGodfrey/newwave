<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactMessageDataTable;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index(ContactMessageDataTable $dataTable)
    {
        return $dataTable->render('admin.contact.messages');
    }

    /**
     * Display the specified contact message.
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();
        return view('admin.contact.show', compact('message'));
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return response()->json(['success' => 'Contact message deleted successfully!']);
    }
}
