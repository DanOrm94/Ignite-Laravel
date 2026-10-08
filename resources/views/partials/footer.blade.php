@php
    /** @var string $key */
    /** @var array $site */
    /** @var array $contact */

    use App\Support\SiteContent;

    $policyHubHref = route('policies');
    $cookiePolicy = SiteContent::documentPath('IG-WEB-002_Cookie_Policy.pdf');
@endphp

<footer class="site-footer">
  <div class="page-width footer-hero">
    <div class="footer-hero-copy">
      <p class="eyebrow">Ignite Talent Group</p>
      <h2>People who move<br><span>industries forward.</span></h2>
    </div>
    <a class="footer-hero-link" href="#contact" aria-label="Start a conversation">
      <span>Start a conversation</span><b aria-hidden="true">↗</b>
    </a>
  </div>
  <div class="page-width footer-grid">
    <div class="footer-brand">
      <img src="{{ asset($site['logo']) }}" alt="{{ $site['name'] }}">
      <p>Specialist recruitment with group standards.</p>
      <a class="footer-social" href="{{ $contact['linkedin'] }}" target="_blank" rel="noopener noreferrer" aria-label="Ignite Talent Group on LinkedIn">LinkedIn <span aria-hidden="true">↗</span></a>
    </div>
    <div>
      <strong>Explore</strong>
      <a href="#expertise">Expertise</a>
      <a href="#clients">Clients</a>
      <a href="#candidates">Candidates</a>
      <a href="#compliance">Compliance</a>
      @if ($key !== 'construction')
        <a href="{{ $cookiePolicy }}" target="_blank" rel="noopener">Cookie Policy</a>
      @endif
    </div>
    <div>
      <strong>Contact</strong>
      <a href="{{ $contact['phone_href'] }}">{{ $contact['phone'] }}</a>
      <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
      <a href="{{ $policyHubHref }}">Policies</a>
    </div>
    <div>
      <strong>Company</strong>
      <span>{{ $site['entity'] }}</span>
      @if (! empty($site['company_number']))
        <span>Company number: {{ $site['company_number'] }}</span>
      @endif
      @if (! empty($site['registered_office']))
        <span>Registered office: {{ $site['registered_office'] }}</span>
      @endif
      <span>ICO registration reference: {{ $site['ico'] }}</span>
      <a href="mailto:{{ $contact['data_protection_email'] }}">Data protection: {{ $contact['data_protection_email'] }}</a>
      <a href="{{ route('landing') }}">Ignite Talent Group</a>
    </div>
  </div>
  <div class="page-width footer-bottom">
    <span>© {{ date('Y') }} {{ $site['entity'] }}</span>
    <span>Recruitment services · Manchester, UK</span>
    <a href="#main">Back to top ↑</a>
  </div>
</footer>
