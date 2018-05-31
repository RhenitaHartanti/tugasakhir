@if($payment_status=='paid off')
<center><div>
<h4><b>Payment Confirmation</b></h4><br>
Thank you for having paid payment, your payment status is <b>paid off</b>.
<br>You can check your payment status on your account at Precious Party Planner Website.
Your order will be processed soon.<br>
And you can contact the admin for more information <br>
Thankyou,<br>
Precious Party Planner
</div></center>
@else
<center><div>
<h4><b>Payment Confirmation</b></h4><br>
Sorry your payment process is <b>fail</b>.Please check your booking code or the total payment that you send<br>
And you can contact the admin for more information <br>
Thankyou,<br>
Precious Party Planner
</div></center>
@endif