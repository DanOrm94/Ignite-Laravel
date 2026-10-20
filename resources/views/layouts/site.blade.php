<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="@yield('meta_description', 'Specialist recruitment across Construction, Engineering, Technology, Legal and Sales from Ignite Talent Group.')">
  <meta name="theme-color" content="#111318">
  <title>@yield('title', 'Ignite Talent Group | Specialist Recruitment')</title>
  <link rel="icon" href="/{{ $site['logo'] ?? 'assets/ignite-talent-group.svg' }}" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <link rel="stylesheet" href="{{ asset('main-enhancements.css') }}">
  <link rel="stylesheet" href="{{ asset('css/site-extras.css') }}">
  @if (request()->routeIs('sales.fintech'))
    <link rel="stylesheet" href="{{ asset('css/fintech.css') }}">
  @endif
  @stack('styles')
  @isset($site)
  <style>
    :root {
      --accent: {{ $site['accent'] }};
      --accent-rgb: {{ $site['accent_rgb'] }};
      --accent-text: {{ $site['accent_text'] }};
    }
  </style>
  @endisset
</head>
<body @isset($key) data-site="{{ $key }}" @endisset>
  @yield('body')
  <script src="{{ asset('js/site.js') }}" defer></script>
  @stack('scripts')
</body>
</html>
