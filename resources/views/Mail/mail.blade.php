@if($status_order=='accept')
<center>
<br>
<table>
	<tr>
		<td><h4><b>Your order has been confirmed</b></h4></td>
	</tr>
	<tr>
		<td><b>For date: {{ $date_using }}</b></td>
	</tr>
	<tr>
		<td>With booking code: <b>{{ $booking_code }}</b></td>
	</tr>
	<tr>
		<td>Please doing the payment process immediately , Thankyou	
		</td>
	</tr>
	<tr>
		<td>Precious Party Planner</td>
	</tr>
</table>
<br>
@else
<table>
	<tr><td><h4><b>Your order has been rejected</b></h4><br></td></tr>
	<tr><td><b>For date: {{ $date_using }}</b></td></tr>
	<tr><td>Please contact admin in 085 743 680 646 (sms/whatsapp) for more information. Thank you</td></tr>
	<tr>
	<td>Precious Party Planner
	</td>
	</tr>
</table>
</center></div><br>
@endif
