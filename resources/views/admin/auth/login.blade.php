@extends('admin.layout')

@section('content')
<div class="card" style="max-width: 560px; margin: 0 auto;">
    <h1>Admin Login</h1>
    <p class="muted-text">Sign in to manage reports, TIGW items, and media updates.</p>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="admin@tzigf.or.tz" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <label class="checkbox-row">
            <input type="checkbox" name="remember"> Remember me
        </label>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
    </form>
</div>
@endsection
