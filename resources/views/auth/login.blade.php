@extends('layouts.site')

@section('title', 'Admin sign in | Ignite Talent Group')

@section('body')
  <main class="review-page">
    <div class="review-wrap">
      <section class="review-form-card">
        <p class="eyebrow">Ignite admin</p>
        <h1>Sign in.</h1>
        @if ($errors->any())
          <div class="contact-form-errors" role="alert">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
          </div>
        @endif
        <form method="POST" action="{{ route('login.attempt') }}" class="review-form">
          @csrf
          <label for="email">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
          <label for="password">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required>
          <label class="remember"><input type="checkbox" name="remember" value="1"> Remember me</label>
          <button class="button primary" type="submit">Sign in</button>
        </form>
      </section>
    </div>
  </main>
@endsection
