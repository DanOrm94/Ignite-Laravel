@extends('layouts.site')

@php
    use App\Support\SiteContent;
    /** @var array $sites */
    /** @var array $sectorOrder */
    /** @var array $group */
    /** @var array $contact */
    /** @var string $contactHeadline */
    /** @var bool $reviewsOpen */
    /** @var \Illuminate\Support\Collection $testimonials */
@endphp

@section('title', 'Ignite Talent Group | Specialist Recruitment')
@section('meta_description', 'Choose an Ignite specialist recruitment company across Construction, Engineering, Technology, Legal and Sales.')

@push('styles')
  <link rel="stylesheet" href="{{ asset('testimonials.css') }}">
  <link rel="stylesheet" href="{{ asset('css/landing-extras.css') }}">
@endpush

@section('body')
  <main class="brand-landing-page" id="main">
    <div class="brand-landing-head">
      <img src="{{ asset('assets/ignite-talent-group.svg') }}" alt="Ignite Talent Group">
      <p class="brand-landing-tagline" data-fold-text="Specialists in the markets that matter."><span aria-hidden="true"></span></p>
    </div>
    <div class="brand-grid landing-brand-grid">
      @foreach ($sectorOrder as $sk)
        @php $item = $sites[$sk]; @endphp
        <a class="brand-card" href="{{ $sk === 'construction' ? route('sector.construction') : route('sector', $sk) }}" style="--brand:{{ $item['accent'] }}">
          <img src="{{ asset($item['logo']) }}" alt="{{ $item['name'] }}">
          <span>{{ str_replace('Specialist ', '', $item['eyebrow']) }}</span>
          <b aria-hidden="true">→</b>
        </a>
      @endforeach
    </div>
    <div class="landing-hero-links">
      <nav class="landing-jump" aria-label="On this page">
        <a href="#hiring">I’m hiring</a>
        <a href="#candidates">I’m looking for work</a>
        <a href="#reviews">Reviews</a>
        <a href="#contact">Contact</a>
      </nav>
      <a class="button brand-landing-group-link" href="{{ route('group') }}">Explore Ignite Talent Group <span aria-hidden="true">→</span></a>
    </div>
    <canvas class="brand-landing-fibers" aria-hidden="true"></canvas>
  </main>

  <div class="landing-sections">

    {{-- Hiring / looking for work --}}
    <section class="landing-section landing-paths" aria-labelledby="paths-title">
      <div class="page-width">
        <div class="landing-section-head">
          <p class="eyebrow">How we can help</p>
          <h2 id="paths-title">Whichever side of the hire you’re on.</h2>
        </div>
        <div class="landing-path-grid">
          <article class="landing-path-card landing-path-client" id="hiring">
            <p class="eyebrow">For hiring teams</p>
            <h3>Build the team that moves the work forward.</h3>
            <p>{{ $group['client_copy'] }}</p>
            <a class="button light" href="#contact">Brief the team <span aria-hidden="true">→</span></a>
          </article>
          <article class="landing-path-card landing-path-candidate" id="candidates">
            <p class="eyebrow">For candidates</p>
            <h3>Make your next move with better context.</h3>
            <p>{{ $group['candidate_copy'] }}</p>
            <a class="button dark-button" href="#contact">Start a conversation <span aria-hidden="true">→</span></a>
          </article>
        </div>
      </div>
    </section>

    {{-- Why Ignite --}}
    <section class="landing-section landing-why" aria-labelledby="why-title">
      <div class="page-width">
        <div class="landing-section-head">
          <p class="eyebrow">Why Ignite</p>
          <h2 id="why-title">Specialist focus, shared standards.</h2>
        </div>
        <ul class="landing-why-grid">
          <li>
            <strong>{{ count($sectorOrder) }}</strong>
            <h3>Specialist companies</h3>
            <p>Each sector has its own team, so your brief goes to people who know your market.</p>
          </li>
          <li>
            <strong>UK</strong>
            <h3>Manchester insight, UK-wide reach</h3>
            <p>{{ $group['image_label'] }}</p>
          </li>
          <li>
            <strong>1</strong>
            <h3>Set of group standards</h3>
            <p>Data protection, ethical recruitment and equality policies apply across every Ignite company.</p>
            <a class="text-link" href="{{ route('policies') }}">View our policies <span aria-hidden="true">→</span></a>
          </li>
        </ul>
      </div>
    </section>

    {{-- Testimonials --}}
    <section class="landing-section landing-reviews" id="reviews" aria-labelledby="reviews-title">
      <div class="page-width">
        <div class="landing-section-head">
          <p class="eyebrow">Testimonials</p>
          <h2 id="reviews-title">What people say.</h2>
        </div>

        @if ($testimonials->isNotEmpty())
          <div class="testimonials-grid landing-testimonials-grid">
            @foreach ($testimonials as $testimonial)
              @php $tSite = $sites[$testimonial->sector] ?? null; @endphp
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
                  @if ($tSite)<span>{{ $tSite['name'] }}</span>@endif
                </div>
              </article>
            @endforeach
          </div>
        @else
          <p class="landing-reviews-empty">Approved reviews from candidates, clients and employers will appear here once they have been through moderation.</p>
        @endif

        <div class="landing-review-cta">
          <div>
            <h3>Worked with one of our teams?</h3>
            <p>
              @if ($reviewsOpen)
                Choose the company you dealt with and leave a review. Every review is moderated before it is published.
              @else
                Review submissions are not open yet. Choose a company below to see its testimonials or check back soon.
              @endif
            </p>
          </div>
          <ul class="landing-review-links">
            @foreach ($sectorOrder as $sk)
              @php $item = $sites[$sk]; @endphp
              <li style="--brand:{{ $item['accent'] }}">
                <span class="landing-review-name">{{ $item['short'] ?? $item['name'] }}</span>
                @if ($reviewsOpen)
                  <a href="{{ route('testimonials.create', $sk) }}">Leave a review</a>
                @endif
                <a href="{{ route('testimonials.index', $sk) }}">Read reviews</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>

    {{-- Contact --}}
    @include('partials.contact', ['site' => $group, 'contact' => $contact, 'contactHeadline' => $contactHeadline, 'key' => 'group'])

    <footer class="landing-footer">
      <div class="page-width landing-footer-inner">
        <span>© {{ date('Y') }} {{ $group['entity'] }}</span>
        <span>Company number {{ $group['company_number'] }} · ICO {{ $group['ico'] }}</span>
        <span>
          <a href="{{ route('policies') }}">Policies</a> ·
          <a href="mailto:{{ $contact['data_protection_email'] }}">Data protection</a> ·
          <a href="{{ $contact['linkedin'] }}" target="_blank" rel="noopener noreferrer">LinkedIn</a>
        </span>
        <a href="#main">Back to top ↑</a>
      </div>
    </footer>
  </div>
@endsection

@push('scripts')
  <script src="/js/landing.js" defer></script>
  @if ($errors->any())
    <script>document.addEventListener('DOMContentLoaded', function () { var c = document.getElementById('contact'); if (c) c.scrollIntoView(); });</script>
  @endif
@endpush
