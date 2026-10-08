@extends('layouts.site')

@php
    /** @var string $key */
    /** @var array $site */
    /** @var bool $reviewsOpen */
    $homeRoute = $key === 'construction' ? route('sector.construction') : route('sector', $key);
@endphp

@section('title', 'Leave a review | '.$site['name'])

@push('styles')
  <link rel="stylesheet" href="{{ asset('testimonials.css') }}">
@endpush

@section('body')
  <div class="utility-bar">
    <div class="page-width utility-inner">
      <span>Manchester-based · UK-wide recruitment</span>
      <div><a href="mailto:{{ config('ignite.contact.email') }}">{{ config('ignite.contact.email') }}</a></div>
    </div>
  </div>
  <header class="site-header">
    <div class="page-width header-inner">
      <a class="brand" href="{{ $homeRoute }}" aria-label="{{ $site['name'] }} home"><img src="{{ asset($site['logo']) }}" alt="{{ $site['name'] }}"></a>
    </div>
  </header>
  <main class="review-page">
    <div class="review-wrap">
      @if (! $reviewsOpen)
        <section class="review-form-card review-closed">
          <p class="eyebrow">Reviews</p>
          <h1>Review submissions are currently closed.</h1>
          <p class="review-intro">We are preparing the review process for {{ $site['name'] }}. Once the submission and moderation process is ready, this page will be updated.</p>
          <p class="review-privacy">If you have feedback you would like to share in the meantime, please contact {{ config('ignite.contact.email') }}.</p>
          <a class="button primary" href="{{ $homeRoute }}">Back to {{ $site['name'] }} <span aria-hidden="true">→</span></a>
        </section>
      @else
        <section class="review-form-card">
          <p class="eyebrow">Reviews · {{ $site['name'] }}</p>
          <h1>Share your experience.</h1>
          <p class="review-intro">Your review will be submitted for moderation before it is published. We only publish approved reviews.</p>

          @if (session('status'))
            <p class="contact-form-note" role="status">{{ session('status') }}</p>
          @endif
          @if ($errors->any())
            <div class="contact-form-errors" role="alert">
              <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
          @endif

          <form method="POST" action="{{ route('testimonials.store', $key) }}" class="review-form">
            @csrf
            <div class="hp-field" aria-hidden="true">
              <label for="website">Website</label>
              <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
            </div>
            <label for="author_name">Your name</label>
            <input id="author_name" name="author_name" type="text" value="{{ old('author_name') }}" required>
            <label for="author_role">Role / company (optional)</label>
            <input id="author_role" name="author_role" type="text" value="{{ old('author_role') }}">
            <label for="author_email">Email (optional, not published)</label>
            <input id="author_email" name="author_email" type="email" value="{{ old('author_email') }}">
            <label for="rating">Rating (1–5, optional)</label>
            <input id="rating" name="rating" type="number" min="1" max="5" value="{{ old('rating') }}">
            <label for="body">Your review</label>
            <textarea id="body" name="body" rows="6" required>{{ old('body') }}</textarea>
            <button class="button primary" type="submit">Submit for moderation</button>
          </form>
        </section>
      @endif
    </div>
  </main>
  <footer class="review-footer">
    <div class="page-width"><span>© {{ date('Y') }} {{ $site['name'] }}</span><a href="{{ $homeRoute }}">Back to {{ $site['name'] }}</a></div>
  </footer>
@endsection
