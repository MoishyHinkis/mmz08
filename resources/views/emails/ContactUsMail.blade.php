@component('mail::message')
# New Contact Us Recived

<div>
    Name: {{ $contactUs->name }} <br>
    Email: {{ $contactUs->email }} <br>
    Phone: {{ $contactUs->phone }} <br>
    Subject: {{ $contactUs->subject }} <br>
</div>
@component('mail::button', ['url' => 'http://localhost:8000/contactUs'])
To All Contact Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
