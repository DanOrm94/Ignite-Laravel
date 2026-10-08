@extends('layouts.site')

@php
    use App\Support\SiteContent;
    /** @var array $sites */
    /** @var array $sectorOrder */
@endphp

@section('title', 'Ignite Talent Group | Specialist Recruitment')
@section('meta_description', 'Choose an Ignite specialist recruitment company across Construction, Engineering, Technology, Legal and Sales.')

@section('body')
  <main class="brand-landing-page">
    <div class="brand-landing-head">
      <img src="/assets/ignite-talent-group.svg" alt="Ignite Talent Group">
      <p class="brand-landing-tagline" data-fold-text="Specialists in the markets that matter."><span aria-hidden="true"></span></p>
    </div>
    <div class="brand-grid landing-brand-grid">
      @foreach ($sectorOrder as $sk)
        @php $item = $sites[$sk]; @endphp
        <a class="brand-card" href="{{ $sk === 'construction' ? route('sector.construction') : route('sector', $sk) }}" style="--brand:{{ $item['accent'] }}">
          <img src="/{{ $item['logo'] }}" alt="{{ $item['name'] }}">
          <span>{{ str_replace('Specialist ', '', $item['eyebrow']) }}</span>
          <b aria-hidden="true">→</b>
        </a>
      @endforeach
    </div>
    <a class="button brand-landing-group-link" href="{{ route('group') }}">Explore Ignite Talent Group <span aria-hidden="true">→</span></a>
    <canvas class="brand-landing-fibers" aria-hidden="true"></canvas>
  </main>
@endsection

@push('scripts')
  <script src="/js/landing.js" defer></script>
@endpush
