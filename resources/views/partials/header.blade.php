@php
    /** @var string $key */
    /** @var array $site */
    /** @var array $sites */
    /** @var array $contact */

    use App\Support\SiteContent;

    $isGroup = $key === 'group';

    // Brand switcher: on the group page it lists the sectors; on a sector
    // page it links back to the group.
    $sectorKeys = SiteContent::sectorOrder();
@endphp

<a class="skip-link" href="#main">Skip to content</a>

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
  <div class="page-width header-inner">
    <a class="brand" href="{{ $isGroup ? route('group') : route('landing') }}" aria-label="{{ $isGroup ? $site['name'] : 'Ignite Talent Group' }} home">
      <img src="/{{ $site['logo'] }}" alt="{{ $site['name'] }}">
    </a>
    <nav class="brand-switcher" aria-label="Ignite group websites">
      @if ($isGroup)
        @foreach ($sectorKeys as $sk)
          @php $item = $sites[$sk]; @endphp
          <a href="{{ $sk === 'construction' ? route('sector.construction') : route('sector', $sk) }}">{{ $item['short'] }}</a>
        @endforeach
      @else
        <a href="{{ route('landing') }}">Ignite Talent Group</a>
      @endif
    </nav>
    <button class="menu-button" type="button" aria-expanded="false" aria-controls="primary-nav">
      <span></span><span></span><span></span><span class="sr-only">Open menu</span>
    </button>
    <a class="header-cta" href="#contact">Talk to us <span aria-hidden="true">→</span></a>
  </div>
  <nav class="primary-nav page-width" id="primary-nav" aria-label="Primary navigation">
    @if ($key === 'construction')
      <a href="#main">Home / Construction</a>
      <a href="#about">About Ignite Construction</a>
      <a href="#clients">Clients / Employers</a>
      <a href="#candidates">Candidates</a>
      <a href="#markets">Sectors / Disciplines</a>
      <a href="#compliance">Compliance &amp; Accreditations</a>
      <a href="{{ route('policies') }}">Policies</a>
      <a href="#contact">Contact</a>
    @elseif ($key === 'sales')
      <a href="#expertise">Expertise</a>
      <a href="#senior-search">Senior Search</a>
      <a href="#clients">Clients</a>
      <a href="#candidates">Candidates</a>
      <a href="#compliance">Compliance</a>
      <a href="{{ route('testimonials.index', 'sales') }}">Testimonials</a>
      <a href="{{ route('landing') }}">Ignite Talent Group</a>
    @elseif ($isGroup)
      <a href="#expertise">Expertise</a>
      <a href="#clients">Clients</a>
      <a href="#candidates">Candidates</a>
      <a href="#compliance">Compliance</a>
      <a href="#group">The group</a>
    @else
      <a href="#expertise">Expertise</a>
      <a href="#clients">Clients</a>
      <a href="#candidates">Candidates</a>
      <a href="#compliance">Compliance</a>
      <a href="{{ route('testimonials.index', $key) }}">Testimonials</a>
      <a href="{{ route('landing') }}">Ignite Talent Group</a>
    @endif
  </nav>
</header>
