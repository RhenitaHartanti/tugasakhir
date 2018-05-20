@if($status_order=='accept')
<div>
<b>Your order has been confirmed</b><p>
<b>For date: {{ $date_using }}</b><p>
With booking code: <b>{{ $booking_code }}</b> <p>
Please doing the payment process immediately <p>
Thankyou,<p>
Precious Party Planner
</div>;
@else
<div>
<b>Your order has been rejected</b><p>
<b>For date: {{ $date_using }}</b><p>
Please contact admin in 0857652432537 for more information <p>
Thankyou,<p>
Precious Party Planner
</div>;
@endif
