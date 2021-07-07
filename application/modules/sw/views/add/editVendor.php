<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("sw/updateNewVendor");?>" onsubmit="return validate()" >
            

            <div class="form-header">
            
                <h4>Add New Vendor</h4>
            
            </div>

            <?php 
                foreach($data as $key)
                { ?>

                    <div class="form-group row">

                        <label for="vendor_name" class="col-sm-2 col-form-label">Vendor Name:<font color="red">*</font></label>

                        <div class="col-sm-6">

                            <input type="text" name="vendor_name" value= "<?php echo $key->vendor_name; ?>" class="form-control required" id="vendor_name" required>
                                    
                        </div>
                        <input type="hidden" name="sl_no" value= "<?php echo $key->sl_no; ?>" class="form-control required" id="vendor_name" required>

                    </div>

                    <div class="form-group row">
                        <label for="contact_no" class="col-sm-2 col-form-label">Contact No:</label>
                        
                        <div class="col-sm-6">

                            <input type="text" name="contact_no" value= "<?php echo $key->contact_no; ?>" class="form-control required" id="contact_no" >
                                    
                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="email_id" class="col-sm-2 col-form-label">Email :<font color="red">*</font></label>

                        <div class="col-sm-6">

                            <input type="text" name="email_id" value= "<?php echo $key->email_id; ?>" class="form-control required" id="email_id" >
                            
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                        
                        <div class="col-sm-6">

                            <textarea name="address" id="address" class="form-control required" cols="30" rows="2" ><?php echo $key->address; ?></textarea>
                                    
                        </div>

                    </div>
                
            <?php
                } ?>    


            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>


    </div>

</div>



