<section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">

   			<section>  

					<div class="primary-content">

						<h1 class="entry-title add-bottom">Login Form.</h1>	

						<?php if($this->session->tempdata('success')){?>
							<span class="text-success"><?php echo $this->session->tempdata('success'); ?></span>
						<?php } ?>

						<?php if($this->session->tempdata('error')){?>
							<span class="text-danger"><?php echo $this->session->tempdata('error'); ?></span>
						<?php } ?>
						<form id="lForm" action="javascript:void(0)" method="post" class="lForm">
	  					   <fieldset>

	                     <div class="form-field">
	  						      <input name="email" type="email" id="email" class="full-width" autocomplete="off" placeholder="Your Email">
									<span class="text-danger"><?php echo form_error('email')?></span>
	                     </div>

						 <div class="form-field">
	  						      <input name="password" type="password" id="password" class="full-width" autocomplete="off" placeholder="Password" >
								  <span class="text-danger"><?php echo form_error('password')?></span>
	                     </div>
	    
	                     <button type="submit" id="submitBtn" class="submit button-primary full-width-on-mobile">Submit</button>

	  					   </fieldset>
						</form>

				</section>
   		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->		
   </section> <!-- end content -->

   <script>


        $('#lForm').validate({
            rules : {
               
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                },
               
            },
            messages : {
                email : 'Please enter your correct email address!',          
                password : 'Please enter correct password!',
            },
            submitHandler : function(form){

                let formData = $('#lForm').serialize();
                $('#submitBtn').css('background','grey');
				$('#submitBtn').attr('disabled','disabled');

                $.ajax({
                    method: 'post',
                    url : '<?php echo base_url()?>login/loginForm',
                    data: formData,
                    dataType: 'json',
                    success : function(response){
                        //console.log(response);
                        if(response == true){
                            window.location.href = "<?php echo base_url()?>";
                        }else{
                            window.location.href = "<?php echo base_url()?>login";
                        }
                      
                    }
                })
            }
        });
			

	
   </script>