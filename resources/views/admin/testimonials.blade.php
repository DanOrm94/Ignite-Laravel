@extends('layouts.admin')

@section('title', 'Testimonials')

@php
    $render = function ($items, $showActions) {
        return [$items, $showActions];
    };
@endphp

@section('content')
  <h1>Testimonial moderation</h1>

  <section class="admin-section">
    <h2>Pending ({{ $pending->count() }})</h2>
    @forelse ($pending as $t)
      <article class="admin-card">
        <div class="admin-card-head">
          <strong>{{ $t->author_name }}</strong>
          <span class="admin-badge">{{ ucfirst($t->sector) }}</span>
          @if ($t->rating)<span class="admin-rating">{{ str_repeat('★', $t->rating) }}</span>@endif
        </div>
        @if ($t->author_role)<p class="admin-muted">{{ $t->author_role }}</p>@endif
        <p>{{ $t->body }}</p>
        <div class="admin-card-actions">
          <form method="POST" action="{{ route('admin.testimonials.approve', $t) }}">@csrf @method('PATCH')<button class="button primary" type="submit">Approve</button></form>
          <form method="POST" action="{{ route('admin.testimonials.reject', $t) }}">@csrf @method('PATCH')<button class="button ghost" type="submit">Reject</button></form>
          <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial permanently?');">@csrf @method('DELETE')<button class="button danger" type="submit">Delete</button></form>
        </div>
      </article>
    @empty
      <p class="admin-muted">Nothing awaiting moderation.</p>
    @endforelse
  </section>

  <section class="admin-section">
    <h2>Approved ({{ $approved->count() }})</h2>
    @forelse ($approved as $t)
      <article class="admin-card is-approved">
        <div class="admin-card-head">
          <strong>{{ $t->author_name }}</strong>
          <span class="admin-badge">{{ ucfirst($t->sector) }}</span>
        </div>
        <p>{{ $t->body }}</p>
        <div class="admin-card-actions">
          <form method="POST" action="{{ route('admin.testimonials.reject', $t) }}">@csrf @method('PATCH')<button class="button ghost" type="submit">Unpublish</button></form>
          <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial permanently?');">@csrf @method('DELETE')<button class="button danger" type="submit">Delete</button></form>
        </div>
      </article>
    @empty
      <p class="admin-muted">No approved testimonials yet.</p>
    @endforelse
  </section>

  <section class="admin-section">
    <h2>Rejected ({{ $rejected->count() }})</h2>
    @forelse ($rejected as $t)
      <article class="admin-card is-rejected">
        <div class="admin-card-head"><strong>{{ $t->author_name }}</strong><span class="admin-badge">{{ ucfirst($t->sector) }}</span></div>
        <p>{{ $t->body }}</p>
        <div class="admin-card-actions">
          <form method="POST" action="{{ route('admin.testimonials.approve', $t) }}">@csrf @method('PATCH')<button class="button primary" type="submit">Approve</button></form>
          <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial permanently?');">@csrf @method('DELETE')<button class="button danger" type="submit">Delete</button></form>
        </div>
      </article>
    @empty
      <p class="admin-muted">No rejected testimonials.</p>
    @endforelse
  </section>
@endsection
