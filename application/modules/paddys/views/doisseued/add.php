<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" 
            id="form"
            action="<?php echo site_url("paddy/doisseued/add");?>" >

            <div class="form-header">
            
                <h4>DO Issued Entry</h4>
            
            </div>

            <div class="form-group row">

                <label for="dist" class="col-sm-2 col-form-label">District:</label>

                <div class="col-sm-4">

                    <select name="dist" id="dist" class="form-control required">

                        <option value="">Select</option>

                        <?php

                            foreach($dist as $dlist){

                        ?>

                            <option value="<?php echo $dlist->district_code;?>"><?php echo $dlist->district_name;?></option>

                        <?php

                            }

                        ?>     

                    </select>

                </div>

                <label for="block" class="col-sm-2 col-form-label">Block:</label>

                <div class="col-sm-4">

                    <select name="block" id="block" class="form-control required">

                        <option value="">Select</option>    

                        <option value="">Select District First</option>    

                    </select>

                </div>

            </div>

            <div class="form-group row">

                <label for="soc_name" class="col-sm-2 col-form-label">Society Name:</label>

                <div class="col-sm-10">

                    <select type="text"
                        class="form-control required sch_cd"
                        name="soc_name"
                        id="soc_name"
                    >

                        <option value="">Select</option>    

                        <option value="">Select Block First</option>    

                    </select>    

                </div>

            </div>  

            <div class="form-group row">

                <label for="mill_name" class="col-sm-2 col-form-label">Mill Name:</label>

                <div class="col-sm-10">

                    <select type="text"
                        class="form-control required sch_cd"
                        name="mill_name"
                        id="mill_name"
                    >

                        <option value="">Select</option>    

                        <option value="">Select District First</option>    


                    </select>

                </div>

            </div>  

            <div class="form-group row">

                <label for="tot_cmr_offered" class="col-sm-2 col-form-label">Total CMR offered:</label>

                <div class="col-sm-10">

                    <input type="text"
                            class="form-control"
                            name="tot_cmr_offered"
                            id="tot_cmr_offered"
                            readonly
                        />

                </div>

            </div>

            <div class="form-group row">

                <label for="state_pool_offer" class="col-sm-2 col-form-label">State Pool:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control"
                        name="state_pool_offer"
                        id="state_pool_offer"
                        readonly
                    />   

                </div>

                <label for="central_pool_offer" class="col-sm-2 col-form-label">Central Poll:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control"
                        name="central_pool_offer"
                        id="central_pool_offer"
                        readonly
                    />

                </div>   

                <label for="fci_offer" class="col-sm-2 col-form-label">FCI:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control"
                        name="fci_offer"
                        id="fci_offer"
                        readonly
                    />

                </div>                 

            </div>

            <div class="form-group row">

                <label for="trans_dt" class="col-sm-2 col-form-label">Transaction Date:</label>

                <div class="col-sm-10">

                    <input type="date"
                            class="form-control required"
                            name="trans_dt"
                            id="trans_dt"
                            value="<?php echo date('Y-m-d');?>"
                        />

                </div>

            </div>      

            <div class="form-header">
            
                <h4>DO Issued</h4>
            
            </div>

            <div class="form-group row">

                <label for="state_pool" class="col-sm-2 col-form-label">State Pool:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control offer_type"
                        name="state_pool"
                        id="state_pool"
                    />   

                </div>

                <label for="central_pool" class="col-sm-2 col-form-label">Central Poll:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control offer_type"
                        name="central_pool"
                        id="central_pool"
                    />

                </div>   

                <label for="fci" class="col-sm-2 col-form-label">FCI:</label>

                <div class="col-sm-2">

                    <input type="text"
                        class="form-control offer_type"
                        name="fci"
                        id="fci"
                    />

                </div>                 

            </div>

            <div class="form-group row">

                <label for="tot_cmr_doisseued" class="col-sm-2 col-form-label">Total DO Isseued:</label>

                <div class="col-sm-10">

                    <input type="text"
                        class="form-control"
                        name="tot_cmr_doisseued"
                        id="tot_cmr_doisseued"
                        style="text-align: center"
                        readonly
                    />

                </div>                    

            </div> 

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>

    </div>

</div>

<script>

$("#form").validate();

$( ".sch_cd" ).select2();

</script>

<script>

    $(document).ready(function(){

        var i = 0;

        $('#dist').change(function(){

            //For District wise Block
            $.get( 

                '<?php echo site_url("paddy/blocks");?>',

                { 

                    dist: $(this).val()

                }

            ).done(function(data){

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.sl_no + '">' + value.block_name + '</option>'

                });

                $('#block').html(string);

            });
            
            //For District wise Mill
            $.get( 

                '<?php echo site_url("paddy/mills");?>',

                { 

                    dist: $(this).val()

                }

                ).done(function(data){

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.sl_no + '">' + value.mill_name + '</option>'

                });

                $('#mill_name').html(string);

            });

        });

    });
</script>

<script>

    $(document).ready(function(){

        var i = 0;

        $('#block').change(function(){

            $.get( 

                '<?php echo site_url("paddy/societies");?>',

                { 

                    block: $(this).val()

                }

            ).done(function(data){

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.sl_no + '">' + value.soc_name + '</option>'

                });

                $('#soc_name').html(string);

            });

        });

    });

</script>

<script>

    $(document).ready(function(){

        $('#mill_name').change(function(){
            
            //Progressive Paddy Procurement
            $.get('<?php echo site_url("paddy/totoffer"); ?>',

                {

                    soc_id:  $('#soc_name').val(),

                    mill_id: $(this).val()

                }
            
            )
            .done(function(data){
                
                let temp = JSON.parse(data);

                $('#tot_cmr_offered').val(temp.tot);

                $('#state_pool_offer').val(temp.sp);
                $('#central_pool_offer').val(temp.cp);
                $('#fci_offer').val(temp.fci);

                if(temp.tot == '0.000'){

                    $('#submit').attr('type', 'button');

                }
                else{
    
                    $('#submit').attr('type', 'submit');

                }
                
            });

        });

    });

</script>

<script>

    $(document).ready(function(){

        $('.offer_type').change(function(){
            
            let total = 0;

            $("#tot_cmr_doisseued").val('');
  
            $('.offer_type').each(function(){
                
                total += +$(this).val();
                
            });

            if(total <= $('#tot_cmr_offered').val()){

                $("#tot_cmr_doisseued").val(total);

                $('#submit').attr('type', 'submit');

            }
            else{

                $('#submit').attr('type', 'button');

            }
        });

    });

</script>