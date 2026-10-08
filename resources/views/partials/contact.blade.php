@php
    /** @var array $site */
    /** @var array $contact */
    /** @var string $contactHeadline */
    /** @var string $key */
@endphp

<section class="contact-section" id="contact">
  <div class="page-width contact-grid">
    <div class="contact-copy">
      <p class="eyebrow">Talk to us</p>
      <h2>{{ $contactHeadline }}</h2>
      <p>Whether you're hiring, considering your next move or simply want to understand how we can help, send us a few details and the right Ignite team will get back to you.</p>
      <div class="contact-details">
        <a href="mailto:{{ $contact['email'] }}"><small>Email</small><strong>{{ $contact['email'] }}</strong></a>
        <a href="{{ $contact['phone_href'] }}"><small>Telephone</small><strong>{{ $contact['phone'] }}</strong></a>
        <address><small>Address</small><strong>{{ $contact['address'] }}</strong></address>
      </div>
    </div>
    <div class="contact-form-wrap">
      @if (session('status'))
        <p class="contact-form-note" role="status">{{ session('status') }}</p>
      @endif
      @if ($errors->any())
        <div class="contact-form-errors" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="contact-form" id="contact-form" method="POST" action="{{ route('contact.store') }}">
        @csrf
        <input type="hidden" name="sector" value="{{ $key }}">
        {{-- Honeypot: hidden from humans, catches bots. --}}
        <div class="hp-field" aria-hidden="true">
          <label for="website">Website</label>
          <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
        </div>
        <label for="contact-name">Name</label>
        <input id="contact-name" name="name" type="text" autocomplete="name" placeholder="Name" value="{{ old('name') }}" required>
        <label for="contact-email">Email</label>
        <input id="contact-email" name="email" type="email" autocomplete="email" placeholder="Email" value="{{ old('email') }}" required>
        <label for="contact-message">Message</label>
        <textarea id="contact-message" name="message" rows="6" placeholder="Message" required>{{ old('message') }}</textarea>
        <button class="contact-submit" type="submit">Submit</button>
        <p class="contact-form-note">Your message goes straight to the Ignite team at {{ $contact['email'] }}.</p>
      </form>
    </div>
  </div>
</section>
