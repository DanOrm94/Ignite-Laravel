<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        return view('admin.messages', [
            'messages' => ContactMessage::latest()->paginate(25),
        ]);
    }

    public function markHandled(ContactMessage $message): RedirectResponse
    {
        $message->update([
            'handled_at' => $message->handled_at ? null : now(),
        ]);

        return back()->with('status', 'Message status updated.');
    }
}
