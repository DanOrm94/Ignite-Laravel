@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <h1>Dashboard</h1>
  <div class="admin-stat-grid">
    <a class="admin-stat" href="{{ route('admin.testimonials.index') }}">
      <span class="admin-stat-number">{{ $pendingTestimonials }}</span>
      <span class="admin-stat-label">Testimonials awaiting moderation</span>
    </a>
    <div class="admin-stat">
      <span class="admin-stat-number">{{ $approvedTestimonials }}</span>
      <span class="admin-stat-label">Approved testimonials</span>
    </div>
    <a class="admin-stat" href="{{ route('admin.messages.index') }}">
      <span class="admin-stat-number">{{ $unhandledMessages }}</span>
      <span class="admin-stat-label">Unhandled contact messages</span>
    </a>
    <div class="admin-stat">
      <span class="admin-stat-number">{{ $totalMessages }}</span>
      <span class="admin-stat-label">Total contact messages</span>
    </div>
  </div>
@endsection
