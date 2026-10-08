@extends('layouts.site')

@php
    /** @var string $key */
    /** @var array $site */
    /** @var \Illuminate\Support\Collection $testimonials */
    $homeRoute = $key === 'construction' ? route('sector.construction') : route('sector', $key);
@endphp

@section('title', 'Testimonials | '.$site['name'])
@section('meta_description', 'Approved testimonials from candidates, clients and employers who have worked with '.$site['name'].'.')

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
      <a class="header-cta" href="{{ $homeRoute }}">Back to {{ $site['short'] }} <span aria-hidden="true">→</span></a>
    </div>
  </header>
  <main class="testimonials-page">
    <section class="testimonials-hero">
      <div class="page-width testimonials-hero-grid">
        <div class="testimonials-hero-copy">
          <p class="eyebrow">Testimonials · {{ $site['name'] }}</p>
          @if ($testimonials->isEmpty())
            <h1>Testimonials are coming soon.</h1>
            <p>Approved reviews from candidates, clients and employers will be published here once available.</p>
          @else
            <h1>What people say.</h1>
            <p>Approved reviews from candidates, clients and employers who have worked with {{ $site['name'] }}.</p>
          @endif
        </div>
        <div class="testimonials-hero-note">
          <strong>Approved reviews only.</strong>
          <span>Every testimonial published here has been through a moderation process.</span>
        </div>
      </div>
    </section>
    <section class="testimonials-content">
      <div class="page-width">
        <div class="testimonials-toolbar">
          <div><p class="eyebrow">The Ignite experience</p><h2>What people say.</h2></div>
          <p>Approved reviews are published here once the review process is complete.</p>
        </div>
        <div class="testimonials-grid">
          @forelse ($testimonials as $testimonial)
            <article class="testimonial-card">
              @if ($testimonial->rating)
                <div class="testimonial-rating" aria-label="{{ $testimonial->rating }} out of 5">
                  {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', 5 - $testimonial->rating) }}
                </div>
              @endif
              <blockquote>{{ $testimonial->body }}</blockquote>
              <div class="testimonial-author">
                <strong>{{ $testimonial->author_name }}</strong>
                @if ($testimonial->author_role)<span>{{ $testimonial->author_role }}</span>@endif
              </div>
            </article>
          @empty
            <div class="testimonials-empty">
              <h3>No published testimonials yet.</h3>
              <p>We are preparing a moderated review library for {{ $site['name'] }}. There is nothing available to publish at present.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </main>
@endsection
