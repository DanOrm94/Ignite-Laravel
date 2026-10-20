@extends('layouts.site')

@section('title', 'FinTech, Payments & Digital Assets | Ignite Sales')
@section('meta_description', 'Specialist recruitment for FinTech, payments, crypto and digital assets, with senior sales, legal and compliance search.')

@section('body')
  <div class="utility-bar">
    <div class="page-width utility-inner">
      <span>Manchester-based · UK-wide recruitment</span>
      <div>
        <a href="{{ $contact['phone_href'] }}">{{ $contact['phone'] }}</a>
        <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
      </div>
    </div>
  </div>

  <header class="site-header">
    <div class="page-width specialist-header-inner">
      <a class="brand" href="{{ route('sector', 'sales') }}" aria-label="Ignite Sales home">
        <img src="{{ asset('assets/ignite-sales.svg') }}" alt="Ignite Sales">
      </a>
      <nav class="specialist-nav" aria-label="Primary navigation">
        <a href="{{ route('sector', 'sales') }}#expertise">Expertise</a>
        <a href="#fintech">FinTech, Payments &amp; Digital Assets</a>
        <a href="{{ route('sector', 'sales') }}#senior-search">Senior Search</a>
        <a href="{{ route('sector', 'sales') }}#volume-recruitment">Volume Recruitment</a>
        <a href="{{ route('sector', 'sales') }}#meet-the-team">Meet the Team</a>
        <a href="{{ route('sector', 'sales') }}#clients">Clients</a>
        <a href="{{ route('sector', 'sales') }}#candidates">Candidates</a>
        <a href="{{ route('testimonials.index', 'sales') }}">Testimonials</a>
        <a href="{{ route('landing') }}">Ignite Talent Group</a>
      </nav>
    </div>
  </header>

  <main id="main">
    <section class="specialist-hero" id="fintech">
      <div class="page-width specialist-hero-grid">
        <div>
          <p class="sales-specialist-kicker">Ignite Sales · Specialist Search</p>
          <h1>FinTech, Payments &amp; Digital Assets</h1>
          <p class="specialist-lead">Ignite Sales is a specialist recruiter for FinTech, payments, crypto and digital asset businesses. We support employers with focused search across senior commercial, sales, legal and compliance appointments in these specialist markets.</p>
          <div class="specialist-actions">
            <a class="button primary" href="mailto:{{ $contact['email'] }}?subject=FinTech%2C%20Payments%20%26%20Digital%20Assets%20%7C%20Hiring%20enquiry">I’m hiring <span aria-hidden="true">→</span></a>
            <a class="button ghost" href="mailto:{{ $contact['email'] }}?subject=FinTech%2C%20Payments%20%26%20Digital%20Assets%20%7C%20Candidate%20enquiry">I’m looking for work</a>
          </div>
        </div>
        <div class="specialist-hero-card">
          <img src="{{ asset('assets/ignite-people-hero.png') }}" alt="Professionals collaborating in a modern Manchester workplace" width="900" height="700">
          <span>FinTech · Payments · Crypto · Digital Assets</span>
        </div>
      </div>
    </section>

    <section class="specialist-content-section">
      <div class="page-width specialist-content-grid">
        <article>
          <p class="sales-specialist-kicker">FinTech Recruitment</p>
          <h2>FinTech Recruitment</h2>
          <p>FinTech businesses need people who understand commercial growth alongside product, technology, regulation and customer expectations. Ignite Sales focuses recruitment around the brief, the market and the level of appointment rather than treating FinTech as a generic sales category.</p>
        </article>
        <article>
          <p class="sales-specialist-kicker">Payments Recruitment</p>
          <h2>Payments Recruitment</h2>
          <p>Payments businesses operate across complex commercial and operational environments. We support recruitment conversations for senior sales and functional appointments where understanding the proposition, customer base and role context is important to the search.</p>
        </article>
        <article>
          <p class="sales-specialist-kicker">Crypto &amp; Digital Assets</p>
          <h2>Crypto &amp; Digital Asset Recruitment</h2>
          <p>Crypto and digital asset businesses require specialist conversations about growth, risk, regulation and market change. Our search approach is designed to give employers and candidates clear information about the opportunity and the requirements of each appointment.</p>
        </article>
      </div>
    </section>

    <section class="specialist-list-section">
      <div class="page-width specialist-list-grid">
        <div>
          <p class="sales-specialist-kicker">Search capability</p>
          <h2>Sales Roles We Recruit For</h2>
          <p>Current focus areas can be confirmed against each brief. The list below is intentionally limited to areas already established for this specialist service.</p>
        </div>
        <ul>
          <li>C-suite and VP-level sales leadership</li>
          <li>Senior sales leadership</li>
        </ul>
      </div>
    </section>

    <section class="specialist-list-section specialist-list-section-alt">
      <div class="page-width specialist-list-grid">
        <div>
          <p class="sales-specialist-kicker">Market coverage</p>
          <h2>Businesses We Work With</h2>
          <p>We can support recruitment for specialist businesses across the markets below, with the exact brief and scope agreed before a search begins.</p>
        </div>
        <ul>
          <li>FinTech businesses</li>
          <li>Payments businesses</li>
          <li>Crypto businesses</li>
          <li>Digital asset businesses</li>
        </ul>
      </div>
    </section>

    <section class="specialist-senior-section">
      <div class="page-width specialist-senior-grid">
        <div>
          <p class="sales-specialist-kicker">Senior Search</p>
          <h2>C-suite and VP-level recruitment across sales, legal and compliance.</h2>
        </div>
        <p>Ignite Sales does more than recruit salespeople. For FinTech, payments, crypto and digital asset businesses, our senior search proposition includes C-suite and VP-level appointments across sales, legal and compliance, with the search shaped around the organisation and role.</p>
      </div>
    </section>

    <section class="specialist-cta-section">
      <div class="page-width specialist-cta-grid">
        <div>
          <p class="sales-specialist-kicker">For employers</p>
          <h2>Hiring in FinTech, payments, crypto or digital assets?</h2>
          <p>Tell us about the role, the business and the outcome you need. We’ll discuss the brief and the appropriate search approach.</p>
          <a class="button primary" href="mailto:{{ $contact['email'] }}?subject=FinTech%2C%20Payments%20%26%20Digital%20Assets%20%7C%20Hiring%20enquiry">Talk to Ignite Sales <span aria-hidden="true">→</span></a>
        </div>
        <div>
          <p class="sales-specialist-kicker">For candidates</p>
          <h2>Looking for your next specialist-market opportunity?</h2>
          <p>Share your background and the kind of opportunity you want to explore. We’ll keep the conversation clear and focused on relevant roles.</p>
          <a class="button light" href="mailto:{{ $contact['email'] }}?subject=FinTech%2C%20Payments%20%26%20Digital%20Assets%20%7C%20Candidate%20enquiry">Start a conversation <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </section>
  </main>

  <footer class="specialist-footer">
    <div class="page-width specialist-footer-inner">
      <a href="{{ route('sector', 'sales') }}">Ignite Sales</a>
      <a href="{{ route('landing') }}">Ignite Talent Group</a>
      <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
    </div>
  </footer>
@endsection
