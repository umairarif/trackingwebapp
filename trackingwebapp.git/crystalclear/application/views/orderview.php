
<!DOCTYPE HTML>
<html>
<head>
<title>Crystal Dry Cleaners::Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>


</head>
<body>
  <div class="header">
  	 <div class="header_top">
	        <div class="wrap">		
		 		<div class="logo">
					<a href="<?php echo base_url();?>index.html"><img src="<?php echo base_url();?>images/crystal.png" alt="Crystal Dry Cleaners" style="width:292px;height:92px" ></a>
					</div>	
	        </div>
	    </div>
	</div>	
 
      <div class="main">
	 	<div class="wrap">
	 		 <div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
      				</div>
      			
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Your Order</h3>
					    <form id="orderform" method="post" action="orderbook">
					    	 <?php foreach($items as $l): ?>
                            <div class="item">
						    	<span><label>Enter Quantity of <?php echo $l['name'] ?>    (Unit Price is £<?php echo $l['price'] ?>)</label></span>
						    	<span><input name="quantity[<?php echo $l['id'] ?>]" type="text" class="textbox"></span>
								<input type="hidden" value="<?php echo $l['price'] ?>" class="price">
						    </div>
                            <?php endforeach; ?>
							<div>
						    	<span><label>Total Price in £ </label></span>
						    	<span><input id="tprice" name="tprice" type="text" class="textbox" readonly></span>
						    </div>
							<div class='log'><div>
						   <div>
						   <span>
			   	<a href="orderfirst" class="mybutton">Cancel</a>
						   <input type="submit" name="o2" class="mybutton" value="Next">
							</span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
	 	  </div>
      </div>
   <script>
$(".item .textbox").keyup(function(){
var inputs= $(".item .textbox").map(function() {
   return $(this).val();
}).get();
var prices=$('input[type="hidden"]').map(function() {
   return $(this).val();
}).get();
calc(inputs,prices)
});
function calc(inputs,prices) {
  var v=0;
  for(var i=0; i< inputs.length; i++) {
    v = (inputs[i]*prices[i])+v;
  }
   document.getElementById("tprice").value=v;
}
</script>
<script>
$(document).ready(function () {

      jQuery.validator.addClassRules('textbox', {
        required: true,
		   number: true,
        });
    $('#orderform').validate();
          
	

});
</script>
</body>

</html>

