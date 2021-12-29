<section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">

   			<section>  

					<div class="primary-content">

						<h1 class="entry-title add-bottom">Registration Form.</h1>	

						<?php if($this->session->tempdata('success')){?>
							<span class="text-success"><?php echo $this->session->tempdata('success'); ?></span>
						<?php } ?>

						<?php if($this->session->tempdata('error')){?>
							<span class="text-danger"><?php echo $this->session->tempdata('error'); ?></span>
						<?php } ?>
						<form id="rForm" action="javascript:void(0)" method="post" class="rForm">
	  					   <fieldset>

	                     <div class="form-field">
	  						      <input name="fullname" type="text" id="fullname" class="full-width" autocomplete="off" placeholder="Your fullname">
								  <span class="text-danger"><?php echo form_error('fullname')?></span>
	                     </div>

                         <div class="form-field">
	  						      <input name="username" type="text" id="username" class="full-width" autocomplete="off" placeholder="Your Username">
								  <span class="text-danger"><?php echo form_error('username')?></span>
	                     </div>

	                     <div class="form-field">
	  						      <input name="email" type="email" id="email" class="full-width" autocomplete="off" placeholder="Your Email">
									<span class="text-danger"><?php echo form_error('email')?></span>
	                     </div>

						 <div class="form-field">
	  						      <input name="password" type="text" id="password" class="full-width" autocomplete="off" placeholder="Password" >
								  <span class="text-danger"><?php echo form_error('password')?></span>
	                     </div>

	                     <div class="message form-field">
                             <label>Gender : </label>
	  						<input name="gender" type="radio" id="gender1" >Male
	  						<input name="gender" type="radio" id="gender2">Female
							<span class="text-danger"><?php echo form_error('gender')?></span>
	                     </div>

	                     <button type="submit" class="submit button-primary full-width-on-mobile">Submit</button>

	  					   </fieldset>
						</form>

				</section>
   		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->		
   </section> <!-- end content -->

   <script>


        $('#rForm').validate({
            rules : {
                fullname : {
                    required : true
                },
                username : {
                    required : true
                },
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true
                },
                gender : {
                    required : true
                },
            },
            messages : {
                fullname : 'Please enter your fullname!',
                username : 'Please enter your username!',
                email : 'Please enter your correct email address!',
                password : 'Please enter your password!',
                gender : 'Please select your gender!',
            },
            submitHndler : function(form){

                let formData = $('#rForm').serialize();

                $.ajax({
                    method: 'post',
                    url : '<?php echo base_url()?>register/registerForm',
                    data: formData,
                    dataType: 'json',
                    success : function(response){
                        console.log(response);
                    }
                })
            }
        });
			

	
   </script>