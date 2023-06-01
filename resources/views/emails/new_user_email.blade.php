@extends('layouts.mail')

@section('content')
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h2 class="text-primary">Welcome, {{ $user->name }}!</h2>
                    <p>Your account has been created. Here are your account details:</p>
                    <ul>
                        <li><strong>Username:</strong> {{ $user->email }}</li>
                        <li><strong>Password:</strong> {{ $password }}</li>
                    </ul>
                    <p>Please log in using this information and change your password after logging in.</p>
                   
                </td>
            </tr>
        </tbody>
    </table>
@endsection
