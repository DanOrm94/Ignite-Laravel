@component('mail::message')
# New website enquiry

A new contact enquiry has been submitted through the website.

- **Sector:** {{ ucfirst($contactMessage->sector) }}
- **Name:** {{ $contactMessage->name }}
- **Email:** {{ $contactMessage->email }}
- **Received:** {{ $contactMessage->created_at->format('d M Y H:i') }}

**Message**

{{ $contactMessage->message }}

@component('mail::button', ['url' => route('admin.messages.index')])
View in admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
