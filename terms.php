<?php
include('header.php');
?>
<div class="section">
   <div class="abt">
   <h2>Terms & Conditions</h2>
   <ul class="faq">
        <li class="hpoint"> Payment Options</li>
        <li> After pressing the "Continue" button, if the "Ticket reservation output page" is not displayed on your monitor due to power failure or Internet link failure, the amount will not be debited and you can call our customer care for assistance. </li>
        <li> All prices are listed in Indian Rupees. If you use a non-Indian credit card, your bank will automatically convert to your home currency based on that day's exchange rates. </li>
        <li> When you press "Continue" button in payment gateway page, the server will process your credit-card in about 5 seconds, but it may be longer at certain times. So wait for some more time. To avoid double charge, DO NOT press the "Continue" button more than once, or press the back or Refresh buttons. </li>
        <li> Non-authorization of payment more than once by payment gateway for tickets booked by you is liable to result in de-registration of your account with this site, without any notice </li>
        <li class="hpoint"> Refund in failed transactions/cancelled tickets</li>
        <li> Though this web-site payment reconciliation team works on a Daily basis except holidays, we offer no guarantees whatsoever for the accuracy or timeliness of the refunds reaching the Customers card/bank accounts. This is on account of the multiplicity of organizations involved in processing of online transactions, the problems with Internet infrastructure currently available and working days/holidays of financial institutions. E-tickets can be cancelled based on the operator's cancellation procedures and we request you to read through them before booking the tickets. </li>
        <li> To get the refund quickly, customers are advised to cancel their tickets within the prescribed time limits, wherever possible. In cases where the tickets are not cancelled within the prescribed time limits, the time taken and amount of refund granted in such cases is dependent on the merit of each case and is to be decided by the Management. M.R Associates.com is not responsible for delays at in any such case. Amount of refund whenever received from the operator to M.R Associates.com shall be credited to the customer's account immediately. </li>
        <li class="hpoint"> New Registration</li>
        <li> You will receive a password and account designation upon completing our registration process. You are responsible for maintaining the confidentiality of the password and account, and are fully responsible for all activities that occur under your password or account. You agree to Immediately notify support@M.R Associates.com of any unauthorized use of your password or account or any other breach of security. </li>
        <li> Ensure that you exit from your account at the end of each session. M.R Associates.com Limited cannot and will not be liable for any loss or damage arising from your failure to comply with this </li>
        <li class="hpoint"> Complaints Procedure</li>
        <li> If you have any suggestions or complaints, please mail us to support@M.R Associates.com </li>
        <li class="hpoint"> Use of the Online Reservation Service</li>
        <li>You may only use this service to make legitimate bookings / reservations i.e., you may not use this service to book tickets for the purpose of commercial re-sale and profit. Without limitation, any speculative, false or fraudulent reservation or any reservation in anticipation of demand is prohibited. </li>
        <li class="hpoint"> USE OF TICKETS</li>
        <li>You must check your ticket for errors, if any, as soon as you receive it. If an error is noticed and the ticket does not comply with the information set out in the reservation page, you must inform us of the same immediately through e-mail support@M.R Associates.com or call our customer care numbers displayed in the web-site. </li>
        <li class="hpoint"> Definitions</li>
        <li> "Journey" means each journey a passenger is entitled to make as per his / her request as set out in his / her ticket. </li>
        <li> "Coach" means luxury coach, Air bus and including Volvo Buses provided by us on which passengers are entitled to travel. </li>
        <li> "Luggage" means any article which a passenger brings onto a bus including his/her belongings carried on in the journey. </li>
        <li> "Boarding   Point" means any of our branch offices or stops where journey is to   start to be joined, left or through which the journey may pass. </li>
        <li> "Ticket"   means the valid ticket issued by us or on our behalf, to carry the   valid ticket holder on which travel is permitted and the fare is payable   by the passenger. </li>
        <li> "Boarding   pass" Each passenger is advised to exchange his/her ticket at the   counter of our ticket issuing office into a Boarding Pass for getting   into our Bus, before the departure of the vehicle. </li>
        <li> We   will not be obliged to carry any child under 14 years of age unless   that child is accompanied by a responsible person aged 16 or over. </li>
        <li class="hpoint"> Supply By Us</li>
        <li> We   agree to provide online ticket booking facilities to registered users   who agree to the terms and condition set forth in this document. </li>
        <li class="hpoint"> Standard of Service</li>
        <li> We will supply the service to you with reasonable care and skill. </li>
        <li class="hpoint"> Service Hours</li>
        <li> Booking through Internet is allowed for 24 Hrs a day. </li>
        <li class="hpoint"> User Registration</li>
        <li> No user can register more than once on the site. </li>
        <li class="hpoint"> Issue of Tickets</li>
        <li> All   payments towards the cost of the tickets issued will be through payment   gateway page. Our payment gateway site is VeriSign secured and your   credit card details will travel on the Internet in a fully encrypted(128   bit, browser independent encryption)form. To ensure security, your card   details are NOT stored in our web-site. </li>
        <li class="hpoint"> Scope of Service</li>
        <li> We make no guarantee that any service will be uninterrupted, timely, secure or error-free. </li>
        <li> All   rules and regulations applicable for reservation of seats/berths and   charging of fare for bus reservation will apply to reservation through   the Internet. </li>
        <li class="hpoint"> Confirmation of Booking</li>
        <li>The   system will issue you a unique Boarding pass number for each booking.   Payment on your credit card is processed by CCAVENUE Payment Gateway. </li>
        <li> Booking   of tickets is subject to realization of fare and the service charges   (including Service Tax) from CCAVENUE through the Payment Gateway. </li>
        <li> If,   for any reason, the reservation does not materialize, the entire amount   debited from your card account will be credited back to your card   account with in 5 working days. </li>
        <li> If you want to try for the same reservation again, it will be treated as a fresh booking. </li>
        <li class="hpoint"> Cash on delivery terms </li>
        <li> Cash on delivery charges are applicable with addition of Total ticket amount. </li>
        <li> If the ticket is cancelled after booking,customer has to bear the cancellation charges in addition to the delivery charges. </li>
        <li> Ticket delivery is not available on Sunday's and government holidays. </li>
        <li> Want to know the status of the ticket, need to contact TG customer care  088 80 80 80 80 </li>
        <li> If the ticket needs to be cancelled after delivery of the ticket, then refund amount will be credited to your account or you can collect from M.R Associates office with on production of appropriate photo identity proof. </li>
        <li> Ticket cancellation charges will be deducted as per the operator policy mentioned in the ticket. </li>
        <li> For the current day travel, cash on delivery option is not available. </li>
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