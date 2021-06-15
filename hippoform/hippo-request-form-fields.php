
<div class="hippo">
<form method="post" action="" name="registration" id="accountform" novalidate="novalidate">
	<div class="form-group">
		<div class="row">
			<div class="col-md-4">
				<input type="text" name="first_name" placeholder="First Name"  id="first_name" />
			</div>
			<div class="col-md-4">
				<input type="text" name="middle_name" placeholder="Middle Name"  id="middle_name" />
			</div>
			<div class="col-md-4">
				<input type="text" name="last_name" placeholder="Last Name"  id="last_name" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-8">
				<input type="text" name="street" placeholder="Street Address"  id="street" />
			</div>
			<div class="col-md-4">
				<input type="text" name="unit" placeholder="UNIT #"  id="unit" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-4">
				<input type="text" name="city" placeholder="City"  id="city" />
			</div>
			<div class="col-md-4">
				<select name="state" id="state">
					<option value="">Select State</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</div>
			<div class="col-md-4">
				<input type="text" name="zip_code" placeholder="ZIP Code"  id="zip_code" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				<input type="text" name="date_of_birth" placeholder="Date Of Birth"  id="date_of_birth" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				<input type="text" name="phone" placeholder="Phone Number"  id="phone" />
			</div>
			<div class="col-md-6">
				<input type="text" name="hippo_email" placeholder="Email"  id="hippo_email" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label>IS THIS A HOUSE, CONDO OR HO5?</label>
				<div class="radio-block">
					<input type="radio" name="house_type" value="House" id="radio1" checked >
					<label for="radio1">House<em> ( This may be a single-family home, townhouse or duplex you own and live in. )</em></label>
				</div>
				<div class="radio-block">
					<input type="radio" value="Condo" name="house_type" id="radio2" >
					<label for="radio2">Condo<em> ( This is likely a multi-family building or complex in which you own a unit. )</em></label>
				</div>
				<div class="radio-block">
					<input type="radio" value="HO5" name="house_type" id="radio3" >
					<label for="radio3">HO5<em> ( The HO5 is an open perils insurnace policy for a single family home or duplex. )</em></label>
				</div>
			</div>
		</div>
	</div>
    <div class="form-submit">
        <input type="submit" name="submit" value="Submit" class="submit btn btn-flat2">
    </div>
</form>
<div class="message_box"></div>
</div>
<script  src="https://code.jquery.com/jquery-1.12.4.min.js"></script>  
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js
"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">


    $('#accountform').each(function() {
		
			$.validator.addMethod("email", function(value, element) {
                return this.optional(element) || /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/.test(value);
            }, "Email Address is invalid: Please enter a valid email address.");

        $(this).validate({
            rules: {
				hippo_email:{
      					required: true,
     					email: true,
						maxlength:50,
    				},
				first_name:{
      					required: true,
    				},
				last_name:{
      					required: true,
    				},
				street:{
      					required: true,
    				},
				city:{
      					required: true,
    				},	
				state:{
      					required: true,
    				},
				zip_code:{
      					required: true,
    				},
				date_of_birth:{
      					required: true,
    				},	
				phone:{
      					required: true,
    				},
				house_type:{
      					required: true,
    				},		
				
            },
			messages: {
			hippo_email: {
      					required: "Please Enter Your Email",
      					email: "Invalid email address",
    			},
			first_name:{
      					required: "Please Enter Your First Name",
    			},
			last_name:{
      					required: "Please Enter Your Last Name",
    			},
 			street:{
      					required: "Please Enter Your Street",
    			},
			city:{
      					required: "Please Enter Your City",
    			},
			state:{
      					required: "Please Select State",
    			},	
			zip_code:{
      					required: "Please Enter Zip Code",
    			},
			date_of_birth:{
      					required: "Please Enter Date Of Birth",
    			},
			phone:{
      					required: "Please Enter Phone Number",
    			},
			house_type:{
      					required: "Please Select House Type",
    			},	
				
			},
            submitHandler: function(form) {
             
	
    var delay = 1000;
	
    $.ajax
   ({
   type: "POST",
   url: "<?php echo plugin_dir_url( __FILE__ ).'hippo-request-submission.php'?>",
   data: $('form').serialize(),
   async:false,
   success: function(data)
   {
	setTimeout(function() {
		   $('.message_box').html(data);
		   }, delay);
                   
  
   }
   });
 
				
            }
        });
    });
 

</script>
