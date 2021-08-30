@component('mail::message')
# New Order Recived

Name: {{ $order->name }} <br>
Email: {{ $order->email }} <br>
Phone: {{ $order->phone }} <br>
Times: {{ $order->times }} <br>
Text: {{ $order->text }} <br>
Comments: {{ $order->comments }} <br>


@component('mail::button', ['url' => 'http://localhost:8000/order'])
To All Orders
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
