@component('mail::message')
# New Contact Us Recived

<div>
    Name: {{ $contactus->name }} <br>
    Email: {{ $contactus->email }} <br>
    Phone: {{ $contactus->phone }} <br>
    Subject: {{ $contactus->subject }} <br>
</div>
@component('mail::button', ['url' => 'http://localhost:8000/contactus'])
To All Contact Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
