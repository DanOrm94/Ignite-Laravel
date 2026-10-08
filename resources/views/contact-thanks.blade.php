@extends('layouts.site')

@php /** @var array $contact */ @endphp

@section('title', 'Thank you | Ignite Talent Group')

@section('body')
  <main class="review-page">
    <div class="review-wrap">
      <section class="review-form-card">
        <p class="eyebrow">Thank you</p>
        <h1>Your message is on its way.</h1>
        <p class="review-intro">{{ session('status', 'Thanks — your message has reached the right Ignite team. We will be in touch shortly.') }}</p>
        <p class="review-privacy">Prefer to talk now? Call <a href="{{ $contact['phone_href'] }}">{{ $contact['phone'] }}</a> or email <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>.</p>
        <a class="button primary" href="{{ route('landing') }}">Back to Ignite Talent Group <span aria-hidden="true">→</span></a>
      </section>
    </div>
  </main>
@endsection
