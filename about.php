<?php
include('header.php');
?>
<div class="section">
   <div class="abt">
		<h2>ABOUT US</h2>
		<img src="images/abt.jpg" alt="">
		<p>Launched on 15th August, 2007, M.R Associates is today one of the leading bus ticket booking web portals of India. We serve to more than 3000 destinations pan India, aggregate 700+ bus operators with 10,000+ buses plying on 20,000+ routes. We reach customers not connected to the net through our extensive network of 6000+ agents. Through our Vahana software platform, we enable bus operators to seamlessly manage their operations. <p>
	</div>
   <div class="abt abt1">
		<h4>ALL to enable you to explore The India with us</h4>
		<p>We, at M.R Associates believe in aspiring together and achieving together. All our teams starting from Customer Support, Inventory, Technology, Operations, Marketing and Sales are focused on providing dedicated and relentless service to our customers. Leveraging the experience of our world class technology team on cutting edge technologies and we strive to create the best bus ticket booking experience for our customers. We are in the journey of creating the best experience in bus ticket booking. We believe this journey doesn't have an end. There are and will be many more challenges and opportunities for us to improve this experience. With our customers on our side, we stride confidently on this never ending journey. <p>
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