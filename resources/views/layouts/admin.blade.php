<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Admin') | Ignite Talent Group</title>
  <link rel="icon" href="{{ asset('assets/ignite-talent-group.svg') }}" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">
  <header class="admin-header">
    <div class="page-width admin-header-inner">
      <a class="admin-brand" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('assets/ignite-talent-group.svg') }}" alt="Ignite Talent Group">
        <span>Admin</span>
      </a>
      <nav class="admin-nav">
        <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
        <a href="{{ route('admin.testimonials.index') }}" @class(['active' => request()->routeIs('admin.testimonials.*')])>Testimonials</a>
        <a href="{{ route('admin.messages.index') }}" @class(['active' => request()->routeIs('admin.messages.*')])>Messages</a>
        <form method="POST" action="{{ route('logout') }}" class="admin-logout">
          @csrf
          <button type="submit">Sign out</button>
        </form>
      </nav>
    </div>
  </header>
  <main class="admin-main page-width">
    @if (session('status'))
      <div class="admin-flash" role="status">{{ session('status') }}</div>
    @endif
    @yield('content')
  </main>
</body>
</html>
