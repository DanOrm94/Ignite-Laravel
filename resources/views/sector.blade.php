@extends('layouts.site')

@php
    use App\Support\SiteContent;

    /** @var string $key */
    /** @var array $site */
    /** @var array $sites */
    /** @var array $contact */
    /** @var array $heroImage */
    /** @var array $policyLinks */
    /** @var string $contactHeadline */

    $isGroup = $key === 'group';
    $hiringSubject = rawurlencode('Hiring enquiry — '.$site['name']);
    $candidateSubject = rawurlencode('Candidate enquiry — '.$site['name']);
    $sectorKeys = SiteContent::sectorOrder();
@endphp

@section('title', $site['name'].' | '.$site['eyebrow'])
@section('meta_description', $site['lead'])

@section('body')
  @include('partials.header')

  <main id="main">
    {{-- Hero --}}
    <section class="hero">
      <div class="page-width hero-grid">
        <div class="hero-copy">
          <p class="eyebrow">{{ $site['eyebrow'] }}</p>
          <h1>{{ $site['title'] }}</h1>
          <p class="hero-lead">{{ $site['lead'] }}</p>
          <div class="button-row">
            <a class="button primary" href="#contact">I’m hiring <span aria-hidden="true">→</span></a>
            <a class="button ghost" href="#contact">I’m looking for work</a>
          </div>
          <div class="hero-note"><span class="pulse"></span><strong>{{ $site['image_label'] }}</strong></div>
        </div>
        <div class="hero-media">
          <img src="{{ asset($heroImage['src']) }}" alt="{{ $heroImage['alt'] }}">
          <div class="hero-tint"></div>
          <div class="hero-stamp"><small>Ignite standards</small><strong>Integrity<br>Speed<br>Compliance<br>Expertise</strong></div>
        </div>
      </div>
    </section>

    {{-- Intro --}}
    <section class="intro-section" id="about">
      <div class="page-width intro-grid">
        <div><p class="eyebrow">Why {{ $site['name'] }}</p><h2>{{ $site['intro_title'] }}</h2></div>
        <div class="intro-copy"><p>{{ $site['intro'] }}</p><blockquote>{{ $site['highlight'] }}</blockquote></div>
      </div>
    </section>

    {{-- Services --}}
    <section class="services-section" id="expertise">
      <div class="page-width">
        <div class="section-title">
          <div><p class="eyebrow">How we help</p><h2>Recruitment built around the brief.</h2></div>
          <p>Focused expertise, responsive delivery and a clear experience for everyone involved.</p>
        </div>
        <div class="service-grid">
          @foreach ($site['services'] as [$svcTitle, $svcCopy])
            <article class="service-card">
              <h3>{{ $svcTitle }}</h3>
              <p>{{ $svcCopy }}</p>
              <a href="#contact">Discuss your brief <span aria-hidden="true">→</span></a>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Markets --}}
    <section class="markets-section" id="markets">
      <div class="page-width markets-grid">
        <div class="markets-copy">
          <p class="eyebrow">Markets &amp; appointments</p>
          <h2>{{ $site['market_intro'] }}</h2>
          <a class="text-link" href="#contact">Speak to a specialist <span aria-hidden="true">→</span></a>
        </div>
        <ol class="market-list">
          @foreach ($site['markets'] as $market)
            <li>{{ $market }}</li>
          @endforeach
        </ol>
      </div>
    </section>

    {{-- Process --}}
    <section class="process-section">
      <div class="page-width">
        <div class="section-title compact">
          <div><p class="eyebrow">A clearer search</p><h2>From brief to placement.</h2></div>
          <p>A simple, accountable recruitment journey with communication at every stage.</p>
        </div>
        <ol class="process-grid">
          <li><h3>Understand</h3><p>We define the role, context, priorities and non-negotiables.</p></li>
          <li><h3>Search</h3><p>We focus the market and speak to relevant people with care.</p></li>
          <li><h3>Select</h3><p>Clear information and proportionate checks support the shortlist.</p></li>
          <li><h3>Support</h3><p>We stay close through interview, offer and placement.</p></li>
        </ol>
      </div>
    </section>

    {{-- Journeys --}}
    <section class="journeys-section">
      <div class="page-width journeys-grid">
        <article class="journey-card client-card" id="clients">
          <p class="eyebrow">For clients</p>
          <h2>Build the team that moves the work forward.</h2>
          <p>{{ $site['client_copy'] }}</p>
          <a class="button light" href="#contact">Brief the team <span aria-hidden="true">→</span></a>
        </article>
        <article class="journey-card candidate-card" id="candidates">
          <p class="eyebrow">For candidates</p>
          <h2>Make your next move with better context.</h2>
          <p>{{ $site['candidate_copy'] }}</p>
          <a class="button dark-button" href="#contact">Start a conversation <span aria-hidden="true">→</span></a>
        </article>
      </div>
    </section>

    @if ($key === 'sales')
      {{-- Senior search --}}
      <section class="sales-specialist-section sales-senior-section" id="senior-search">
        <div class="sales-specialist-inner sales-senior-inner">
          <div class="sales-specialist-copy">
            <p class="sales-specialist-kicker">Senior Appointments</p>
            <h2>C-suite, VP and senior leadership search</h2>
            <p>We do more than recruit salespeople. Our senior search work spans C-suite and VP-level appointments across sales, legal and compliance, alongside senior commercial and functional leadership.</p>
          </div>
          <div class="sales-senior-list">
            <span>C-suite</span><span>VP-level</span><span>Sales leadership</span><span>Legal leadership</span><span>Compliance leadership</span>
          </div>
        </div>
      </section>

      {{-- Volume recruitment --}}
      <section class="sales-specialist-section sales-volume-section" id="volume-recruitment">
        <div class="sales-specialist-inner sales-volume-inner">
          <div class="sales-specialist-copy">
            <p class="sales-specialist-kicker">Volume Recruitment</p>
            <h2>Need to hire 5, 10 or 50+ salespeople?</h2>
            <h3>We can scale with you.</h3>
            <p>Whether you're launching a new sales team, expanding an existing operation or replacing multiple vacancies, Ignite can deliver a recruitment campaign built around your volume requirements.</p>
            <p>Our reach across the market allows us to build targeted campaigns designed to engage multiple relevant candidates at short notice, while keeping the process structured and consistent.</p>
          </div>
          <div class="sales-volume-service">
            <p class="sales-volume-label">Our volume recruitment service can include:</p>
            <ul>
              <li>Multiple-role campaigns</li>
              <li>Dedicated recruitment support</li>
              <li>Targeted advertising</li>
              <li>Proactive candidate sourcing</li>
              <li>Screening &amp; shortlisting</li>
              <li>Interview coordination</li>
              <li>Offer management</li>
              <li>Ongoing candidate engagement</li>
            </ul>
          </div>
        </div>
      </section>

      {{-- Meet the team --}}
      <section class="sales-team-section" id="meet-the-team">
        <div class="sales-team-inner">
          <div class="sales-team-heading">
            <p class="sales-specialist-kicker">Meet the Team</p>
            <h2>Specialist market knowledge, direct access.</h2>
          </div>
          <div class="sales-team-grid">
            <article class="sales-team-card">
              <div class="sales-team-photo-wrap">
                <img class="sales-team-photo" src="{{ asset('kyle.jpg') }}" alt="Kyle Maslen, Senior Recruitment Consultant at Ignite Talent Group" loading="lazy" width="520" height="390">
              </div>
              <div class="sales-team-profile">
                <p class="sales-specialist-kicker">Senior Recruitment Consultant</p>
                <h3>Kyle Maslen</h3>
                <p class="sales-team-role">Senior Recruitment Consultant · Ignite Talent Group</p>
                <p>Kyle specialises in recruitment across FinTech, payments and digital assets, partnering with founders and leadership teams to build the talent behind their growth.</p>
                <p>His expertise spans embedded payments, banking and remittance infrastructure, crypto liquidity, institutional staking, tokenisation and DeFi. He recruits across commercial and executive functions, from specialist sales and business development hires to Heads of Sales, Chief Commercial Officers, Chief Revenue Officers, CEOs and General Counsel.</p>
                <p>Kyle’s particular strength is placing the right Head of Sales or C level leader, then working closely with them to build their go to market team. By understanding their strategy and the capabilities they need, he helps shape teams that can deliver their growth ambitions.</p>
                <p>Combining an entrepreneurial background with a strong understanding of these markets, Kyle takes a direct, relationship led approach, connecting businesses with people who bring the expertise, networks and commercial impact they need.</p>
                <div class="sales-team-links">
                  <a href="mailto:kyle.maslen@ignitetalentgroup.co.uk">Email Kyle</a>
                  <a href="https://www.linkedin.com/in/kyle-maslen-33068a40/" target="_blank" rel="noopener noreferrer">LinkedIn <span aria-hidden="true">↗</span></a>
                </div>
              </div>
            </article>
            <article class="sales-team-card">
              <div class="sales-team-photo-wrap">
                <img class="sales-team-photo" src="{{ asset('danielle.jpg') }}" alt="Danielle Finney, Associate Director of Sales at Ignite Talent Group" loading="lazy" width="520" height="390">
              </div>
              <div class="sales-team-profile">
                <p class="sales-specialist-kicker">Sales</p>
                <h3>Danielle Finney</h3>
                <p class="sales-team-role">Associate Director of Sales</p>
                <p>As an Associate Director of Sales Recruitment, I bring 15+ years of experience delivering high-volume recruitment solutions across both agency and in-house environments.</p>
                <p>A hands-on leader, excellent in connecting exceptional talent with ambitious organisations, providing a consultative, transparent and commercially focused recruitment service that delivers results for clients, candidates and stakeholders alike.</p>
                <p>My recruitment expertise spans a broad range of sectors, including Sales &amp; Service, PMI, Finance, Legal, Utilities and Insurance from entry level to Exec Searches.</p>
                <p>Throughout my career, I have built a strong track record of managing complex and high-volume recruitment campaigns, developing trusted client partnerships and identifying talent that delivers long-term value.</p>
                <p>I’m passionate about recruitment, the people behind it and the ever-changing challenges the industry presents. I take pride in delivering a high-quality, honest and results-driven service while continuing to build strong relationships and contribute to the growth of the businesses and people I work with.</p>
                <div class="sales-team-links">
                  <a href="mailto:danielle.finney@ignitetalentgroup.co.uk">Email Danielle</a>
                  <a href="https://www.linkedin.com/in/danielle-finney-03210013b/" target="_blank" rel="noopener noreferrer">LinkedIn <span aria-hidden="true">↗</span></a>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
    @endif

    {{-- Compliance --}}
    <section class="compliance-section" id="compliance">
      <div class="page-width compliance-grid">
        @if (! empty($site['accreditations']))
          <div class="compliance-copy">
            <p class="eyebrow">Accreditations &amp; assurance</p>
            <h2>{{ $site['compliance_title'] }}</h2>
            <p>{{ $site['compliance_copy'] }}</p>
            <div class="compliance-actions">
              <a class="button primary" href="{{ route('policies') }}">View policies <span aria-hidden="true">→</span></a>
              <a class="button light" href="{{ route('policies') }}#website-documents">Website documents <span aria-hidden="true">↗</span></a>
              <a class="button light" href="{{ SiteContent::documentPath('Certificate_Standard_GB.pdf') }}" target="_blank" rel="noopener">CHAS certificate <span aria-hidden="true">↗</span></a>
              <a class="button light" href="{{ SiteContent::documentPath('certificate-committed (1).pdf') }}" target="_blank" rel="noopener">Disability Confident certificate <span aria-hidden="true">↗</span></a>
            </div>
            <a class="data-contact" href="mailto:{{ $contact['data_protection_email'] }}">Data protection enquiries: {{ $contact['data_protection_email'] }}</a>
          </div>
          <div>
            <div class="assurance-grid">
              @foreach ($site['accreditations'] as [$accName, $accDetail])
                @continue($accName === 'HS Direct')
                <article class="assurance-card"><strong>{{ $accName }}</strong><span>{{ $accDetail }}</span></article>
              @endforeach
            </div>
            <div class="assurance-provider"><strong>Health &amp; safety support</strong><span>HS Direct — external health &amp; safety support provider.</span></div>
            <p class="assurance-note">Ignite Construction Talent Ltd holds SSIP approval through SMAS Worksafe (certificate reference 183806, valid until 20 July 2027), CHAS Standard certification as a Deem to Satisfy contractor (membership no. 181755, certificate valid until 20 July 2027), and Disability Confident Committed Employer status (certificate DCS050626). These statuses apply to Construction only; they are not presented as group-wide accreditations.</p>
          </div>
        @else
          <div class="compliance-copy">
            <p class="eyebrow">Policies &amp; compliance</p>
            <h2>{{ $site['compliance_title'] }}</h2>
            <p>{{ $site['compliance_copy'] }}</p>
            <a class="button primary" href="{{ route('policies') }}">Open policy hub <span aria-hidden="true">→</span></a>
            <small>Links open the current controlled document folder.</small>
          </div>
          <div class="policy-panel">
            <div class="panel-title"><strong>Public policy library</strong><span>Controlled documents</span></div>
            <div class="policy-links">
              @foreach ($policyLinks as [$polName, $polFile])
                <a href="{{ SiteContent::documentPath($polFile) }}" target="_blank" rel="noopener"><span>{{ $polName }}</span><b aria-hidden="true">↗</b></a>
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </section>

    {{-- Group section --}}
    @if ($isGroup)
      <section class="group-section" id="group">
        <div class="page-width">
          <div class="section-title">
            <div><p class="eyebrow">The Ignite group</p><h2>Five specialist companies. Shared purpose.</h2></div>
            <p>Explore the recruitment company closest to your market.</p>
          </div>
          <div class="brand-grid">
            @foreach ($sectorKeys as $sk)
              @php $item = $sites[$sk]; @endphp
              <a class="brand-card" href="{{ $sk === 'construction' ? route('sector.construction') : route('sector', $sk) }}" style="--brand:{{ $item['accent'] }}">
                <img src="{{ asset($item['logo']) }}" alt="{{ $item['name'] }}">
                <span>{{ str_replace('Specialist ', '', $item['eyebrow']) }}</span><b aria-hidden="true">→</b>
              </a>
            @endforeach
          </div>
        </div>
      </section>
    @else
      <section class="group-section" id="group">
        <div class="page-width">
          <div class="section-title">
            <div><p class="eyebrow">Ignite Talent Group</p><h2>Specialist recruitment, backed by one group.</h2></div>
            <p>Return to the group landing page to explore the wider Ignite network.</p>
          </div>
          <a class="group-home-link" href="{{ route('landing') }}">
            <span>Back to</span>
            <img src="{{ asset('assets/ignite-talent-group.svg') }}" alt="Ignite Talent Group">
            <b aria-hidden="true">→</b>
          </a>
        </div>
      </section>
    @endif

    {{-- Contact --}}
    @include('partials.contact', ['site' => $site, 'contact' => $contact, 'contactHeadline' => $contactHeadline, 'key' => $key])
  </main>

  @include('partials.footer')
@endsection
