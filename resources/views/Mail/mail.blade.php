@if($status_order=='accept')
<center>
<br>
<table>
	<tr>
		<td><h4><b>Your order has been confirmed for</b></h4></td>
	</tr>
	<tr>
		<td><b>Date and Time: {{ $date_using }}</b></td>
	</tr>
	<tr>
		<td><b>Booking code: {{ $booking_code }}</b></td>
	</tr>
	<tr>
		<td><b>Total Payment : Rp. {{number_format($total_payment,2,',','.')}}</b></td>
	</tr>
	<tr>
		<td>To follow up your order, please do the payment by sending the needful expense to : BNI #0296-35-1450 on behalf of Debora</td>
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
	<tr><td>Please contact admin in 085 743 680 646 (sms/whatsapp) for
	more information. Thank you</td></tr>
	<tr>
	<td>Precious Party Planner
	</td>
	</tr>
</table>
</center></div><br>
@endif
