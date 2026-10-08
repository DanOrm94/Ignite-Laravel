@extends('layouts.site')

@php
    use App\Support\SiteContent;

    /** @var array $site */
    /** @var array $contact */

    $dp = $contact['data_protection_email'];

    // Controlled policy suite (category, title, filename-or-url).
    $policyCards = [
        ['People & H&S', 'Health & Safety Policy', 'IG-POL-001_Health_and_Safety_Policy.pdf'],
        ['ESG', 'Environmental & Sustainability Policy', 'IG-POL-006_Environmental_and_Sustainability_Policy.pdf'],
        ['Governance', 'Quality Management Policy', 'IG-POL-007_Quality_Management_Policy.pdf'],
        ['Ethical labour', 'Modern Slavery & Labour Exploitation Statement', 'IG-POL-002_Modern_Slavery_and_Labour_Exploitation_Statement.pdf'],
        ['Recruitment', 'Right to Work & Candidate Vetting Policy', 'IG-POL-004_Right_to_Work_and_Candidate_Vetting_Policy.pdf'],
        ['Data & privacy', 'Data Protection Statement / Privacy Policy', 'IG-POL-003_Data_Protection_Statement.pdf'],
        ['People & H&S', 'Equal Opportunities / EDI Policy', 'IG-POL-016_Equality_Diversity_and_Inclusion_Policy.pdf'],
        ['Recruitment', 'Ethical Recruitment Policy', 'IG-POL-005_Ethical_Recruitment_Policy.pdf'],
        ['Governance', 'Anti-Bribery & Corruption Policy', 'IG-POL-008_Anti_Bribery_and_Corruption_Policy.pdf'],
        ['Labour supply', 'Supplier / Umbrella / Labour Supply Code', 'IG-POL-010_Supplier_Umbrella_and_Labour_Supply_Code_of_Conduct.pdf'],
        ['People & H&S', 'Training & Competence Statement', 'IG-POL-011_Training_and_Competence_Statement.pdf'],
        ['Construction', 'Construction Labour Supply Compliance Statement', 'IG-POL-012_Construction_Labour_Supply_Compliance_Statement.pdf'],
        ['ESG', 'Carbon Reduction Plan', 'https://drive.google.com/drive/folders/1_ZLBzHEPtI0WPOxJM_Rt-7rITJ9roTm7?usp=drive_link'],
    ];

    $websiteCards = [
        ['Privacy', 'Privacy Notice', 'IG-WEB-001_Privacy_Notice.pdf'],
        ['Cookies', 'Cookie Policy', 'IG-WEB-002_Cookie_Policy.pdf'],
        ['Accessibility', 'Accessibility Statement', 'IG-WEB-003_Accessibility_Statement.pdf'],
        ['Terms', 'Website Terms of Use', 'IG-WEB-004_Website_Terms_of_Use.pdf'],
        ['Compliance', 'Policies & Compliance Hub Page', 'IG-WEB-005_Policies_and_Compliance_Hub_Page.pdf'],
    ];

    $resolve = fn (string $ref) => str_starts_with($ref, 'http') ? $ref : SiteContent::documentPath($ref);
    $label = fn (string $ref) => str_starts_with($ref, 'http') ? 'Open controlled document library' : 'Open PDF';
@endphp

@section('title', 'Compliance & Policies | Ignite Construction')
@section('meta_description', 'Ignite Construction compliance, policies and controlled policy documents.')

@section('body')
<div class="policy-page">
  <header class="policy-header">
    <div class="page-width policy-header-inner">
      <a href="{{ route('sector.construction') }}" class="policy-brand"><img src="{{ asset($site['logo']) }}" alt="Ignite Construction"></a>
      <a class="button ghost" href="{{ route('sector.construction') }}">Back to Construction <span aria-hidden="true">↗</span></a>
    </div>
  </header>
  <main>
    <section class="policy-hero">
      <div class="page-width">
        <p class="eyebrow">Compliance &amp; policies</p>
        <h1>Clear standards for construction recruitment and labour supply.</h1>
        <p>Ignite Construction maintains a controlled suite of policies and statements covering health &amp; safety, candidate vetting, ethical labour supply, data protection, quality, sustainability and responsible business.</p>
        <a class="button primary" href="#policy-library">Browse policies <span aria-hidden="true">↓</span></a>
      </div>
    </section>
    <section class="policy-assurance">
      <div class="page-width policy-assurance-grid">
        <div>
          <p class="eyebrow">Procurement assurance</p>
          <h2>Information that can be reviewed quickly.</h2>
        </div>
        <div>
          <p>For PQQ, PSL and supplier-approval reviews, the current approved policy documents are available directly below. Each document is hosted with the website so procurement teams can open the relevant controlled PDF without leaving the Ignite Construction site.</p>
          <div class="policy-credentials">
            <strong>CHAS Standard — SSIP Approved / Deem to Satisfy</strong>
            <span>Membership No. 181755 · Certificate valid until 20 July 2027</span>
            <a href="{{ SiteContent::documentPath('Certificate_Standard_GB.pdf') }}" target="_blank" rel="noopener">View CHAS certificate <span aria-hidden="true">↗</span></a>
          </div>
          <div class="policy-credentials">
            <strong>Disability Confident Committed Employer</strong>
            <span>Certificate DCS050626</span>
            <a href="{{ SiteContent::documentPath('certificate-committed (1).pdf') }}" target="_blank" rel="noopener">View Disability Confident certificate <span aria-hidden="true">↗</span></a>
          </div>
          <a class="data-contact policy-data" href="mailto:{{ $dp }}">Data protection enquiries: {{ $dp }}</a>
        </div>
      </div>
    </section>
    <section class="policy-library" id="policy-library">
      <div class="page-width">
        <div class="section-title">
          <div><p class="eyebrow">Controlled policy suite</p><h2>Policies, statements and standards.</h2></div>
          <p>Current approved policy and website documents.</p>
        </div>
        <div class="policy-card-grid">
          @foreach ($policyCards as [$cat, $titleText, $ref])
            <article class="policy-card">
              <small>{{ $cat }}</small>
              <h2>{{ $titleText }}</h2>
              <a href="{{ $resolve($ref) }}" target="_blank" rel="noopener">{{ $label($ref) }} <span aria-hidden="true">↗</span></a>
            </article>
          @endforeach
        </div>
        <section class="website-documents" id="website-documents">
          <div class="section-title">
            <div><p class="eyebrow">Website documents</p><h2>Privacy, cookies, accessibility and terms.</h2></div>
            <p>Supporting documents for visitors and website users.</p>
          </div>
          <div class="policy-card-grid">
            @foreach ($websiteCards as [$cat, $titleText, $ref])
              <article class="policy-card">
                <small>{{ $cat }}</small>
                <h2>{{ $titleText }}</h2>
                <a href="{{ $resolve($ref) }}" target="_blank" rel="noopener">Open PDF <span aria-hidden="true">↗</span></a>
              </article>
            @endforeach
          </div>
        </section>
        <div class="policy-note"><strong>Controlled documents</strong><span>The approved PDFs are hosted directly with the Ignite website. When a controlled document is formally replaced, the corresponding PDF can be updated without changing the page structure.</span></div>
      </div>
    </section>
  </main>
  <footer class="policy-footer">
    <div class="page-width"><strong>{{ $site['entity'] }}</strong><span>Manchester · UK-wide construction recruitment</span><a href="mailto:{{ $dp }}">Data protection</a></div>
  </footer>
</div>
@endsection
