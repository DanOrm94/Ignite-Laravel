<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use App\Support\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Store a contact enquiry. This replaces the original front-end
     * mailto: workflow with a real server-side submission.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
            'sector' => ['nullable', 'string', 'max:40'],
            // Honeypot: bots fill this hidden field, humans never see it.
            'website' => ['prohibited'],
        ]);

        $sector = $validated['sector'] ?? 'group';

        if (SiteContent::site($sector) === null) {
            $sector = 'group';
        }

        $message = ContactMessage::create([
            'sector' => $sector,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Notify the Ignite inbox. Failure to send must not lose the record,
        // which is already safely persisted above.
        $to = config('mail.contact_to', config('mail.from.address'));

        if ($to) {
            try {
                Mail::to($to)->send(new ContactMessageReceived($message));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return redirect()
            ->route('contact.thanks')
            ->with('status', 'Thanks — your message has reached the right Ignite team.');
    }

    /**
     * Simple confirmation page after a successful submission.
     */
    public function thanks(): View
    {
        return view('contact-thanks', [
            'contact' => SiteContent::contact(),
        ]);
    }
}
