@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
  <h1>Contact messages</h1>

  <table class="admin-table">
    <thead>
      <tr><th>Received</th><th>Sector</th><th>Name</th><th>Email</th><th>Message</th><th>Status</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($messages as $message)
        <tr @class(['is-unhandled' => ! $message->handled_at])>
          <td>{{ $message->created_at->format('d M Y H:i') }}</td>
          <td>{{ ucfirst($message->sector) }}</td>
          <td>{{ $message->name }}</td>
          <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
          <td class="admin-message-cell">{{ $message->message }}</td>
          <td>{{ $message->handled_at ? 'Handled' : 'New' }}</td>
          <td>
            <form method="POST" action="{{ route('admin.messages.handled', $message) }}">
              @csrf @method('PATCH')
              <button class="button ghost" type="submit">{{ $message->handled_at ? 'Mark new' : 'Mark handled' }}</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="admin-muted">No messages yet.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div class="admin-pagination">{{ $messages->links() }}</div>
@endsection
