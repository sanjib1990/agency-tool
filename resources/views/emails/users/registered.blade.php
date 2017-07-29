@component('mail::message')
# Welcome {!! $user->fname !!}  to {!! config('app.name') !!}!

Have a wonderfull experience.

@component('mail::button', ['url' => route('home')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
