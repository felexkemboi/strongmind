@component('mail::message')
# Password Reset

Hello {{ $user->name }}, we received a password reset request from your account.
<p>If it wasn't you that made this request, please ignore this email</p>
<p>Kindly use this token to reset your password </p>
{{ $token  }}
@component('mail::button', ['url' => ''])
Click Here to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
