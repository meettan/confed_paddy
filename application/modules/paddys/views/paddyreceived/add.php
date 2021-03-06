    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                id="form"
                action="<?php echo site_url("paddy/received/add");?>" >

                <div class="form-header">
                
                    <h4>Delivery Entry</h4>
                
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

                    <label for="trans_dt" class="col-sm-2 col-form-label">Received Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                class="form-control required"
                                name="trans_dt"
                                id="trans_dt"
                                value="<?php echo date('Y-m-d');?>"
                            />

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="paddy_qty" class="col-sm-2 col-form-label">Paddy Delivered:</label>

                    <div class="col-sm-4">

                        <input type="number"
                                class="form-control"
                                name="paddy_qty"
                                id="paddy_qty"
                                min="0"
                            />

                    </div>

                    <label for="progressive" class="col-sm-2 col-form-label">Progressive of Paddy Procurement:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class="form-control"
                            id="progressive"
                            readonly
                        />

                    </div>                    

                </div> 
                
                <div class="form-group row">

                    <label for="trans_dt" class="col-sm-2 col-form-label">Already Delivered:</label>

                    <div class="col-sm-4">

                        <input type="text"
                                class="form-control"
                                id="already_delivered"
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

        $('#soc_name').change(function(){
            
            //Progressive Paddy Procurement
            $.get('<?php echo site_url("paddy/progressive"); ?>',

                {

                    soc_id: $(this).val()

                }
            
            )
            .done(function(data){
                
                $('#progressive').val(parseFloat(data));

                if(data == '0.000'){

                    $('#submit').attr('type', 'button');

                }
                else{
    
                    $('#submit').attr('type', 'submit');

                }
                
            });

            //Progressive Paddy Procurement
            $.get('<?php echo site_url("paddy/alreadyDelivered"); ?>',

                {

                    soc_id: $(this).val()

                }

            )
            .done(function(data){

                $('#already_delivered').val(data);
                
                if(parseFloat(data) > parseFloat($('#progressive').val())){
                    
                    $('#submit').attr('type', 'button');

                }
                else{

                    $('#submit').attr('type', 'submit');

                }

            });

        });

        $('#paddy_qty').change(function(){
            
            if($('#already_delivered').val((parseFloat($(this).val()) + parseFloat($('#already_delivered').val()))) > parseFloat($('#progressive').val())){
                $('#submit').attr('type', 'button');
            }

        });
        
    });

</script>