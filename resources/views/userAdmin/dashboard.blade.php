<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">This is the admin dashboard</label>
    </div>
</form>
