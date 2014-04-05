<?php
include('header.php');
?>
<div class="section">
   <div class="abt">
        <h2>FAQ</h2>
		<ul class="faq">
			<li class="hpoint">How can I make payment to book e-ticket?</li>
			<li>CCAVENUE Payment Gateway for Credit cards, direct debit option (Internet    Banking) of major Banks and a cash card option (ITZ cash) are available to book e-tickets.</li>
			<li class="hpoint">How can I cancel e-ticket and how will I get refund?</li>
			<li>Cancellation would be confirmed online and the refund would be credited back to the account used for booking as for normal Internet tickets.</li>
			<li class="hpoint">What can I take on the Bus?</li>
			<li>Luggage is limited to two medium sized suitcases per person, plus one piece of hand luggage on all services.<br>
			  You cannot carry animals, except Assistance Dogs.</li>
			<li class="hpoint">What do I do if I miss my bus?</li>
			<li>Our conditions state that if you miss the bus you are booked on, through no fault of the Travels, and you do not cancel your seat before the time of departure then the ticket is no longer valid and is not eligible for a refund or amendment.</li>
			<li class="hpoint">Can do I book the return tickets?</li>
			<li>Yes, you can book your return tickets from our coverage cities to your source.</li>
			<li class="hpoint">How can I receive my tickets?</li>
			<li>There are two ways to receive your tickets when you book online</li>
			<li> Print your travel ticket online in a matter of minutes.</li>
			<li> An e-mail is sent to your mail ID wit which you can take any number of copies of your ticket any time</li>
			<li class="hpoint">Do I have to register to book online?</li>
			<li>No need, but there are several reasons why registering could be beneficial to you as below.</li>
			<li> When you book, details such as your name and address are provided automatically, saving you time. (Please note that for security reasons, your credit card details are not stored and have to be entered each time.</li>
			<li> We have an idea to benefit our customers based on their travel trips with us. Based on the above details we will give you the discounts on the ticket fares</li>
			<li class="hpoint">Can I buy a ticket for someone else with my credit/debit card?</li>
			<li>Yes. As long as you supply a valid address for the credit card holder, then you can buy tickets for any other person. There is no requirement for the credit card to be produced either on collection of tickets or when boarding the bus.</li>
			<li class="hpoint">Do I have to pay a booking fee?</li>
			<li>No. If you book online at, you do not pay a booking fee.</li>
			<li class="hpoint">How to postpone/prepone journey?</li>
			<li>This can be done on line by canceling the original ticket and booking a fresh ticket.</li>
			<li class="hpoint">How to change name of passenger?</li>
			<li>This can be done on line by canceling the original ticket and booking a fresh ticket.</li>
			<li class="hpoint">Can partial cancellation be done?</li>
			<li>He/She can log on and go to cancel link and enter the PNR Number of the ticket to be cancelled and can initiate the cancellation by selecting the passengers to be cancelled.</li>
			<li class="hpoint">Can I Cancel/Transfer my e-Ticket?</li>
			<li>You can Cancel your Ticket. But, we don't have facility to transfer it.</li>
      </ul>
   </div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
$(".from").change(function()
{

var from=$(this).val();
var dataString = 'id='+ from;


$.ajax
({
type: "POST",
url: "to.php",
data: dataString,
cache: false,
success: function(html)
{
$(".to").html(html);
}
});

});

});



</script>


<?php
include('footer.php')
?>