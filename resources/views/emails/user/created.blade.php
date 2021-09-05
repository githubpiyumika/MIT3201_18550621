@component('mail::message')
# Hi {{$user->name}},

You are welcome to {{ config('app.name') }}. Please find your login details below.
<br><br>
<strong>Username:</strong> {{$user->email}}<br>
<strong>Password:</strong> {{$password}}

@component('mail::button', ['url' => config('app.url').'/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent