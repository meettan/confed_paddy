    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                id="form"
                action="<?php echo site_url("paddy/workorder/add");?>" >

                <div class="form-header">
                
                    <h4>Workorder Entry</h4>
                
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

                    <label for="mills" class="col-sm-2 col-form-label">Mill Names:</label>

                    <div class="col-sm-10">

                        <textarea id="mill_name" class="form-control" readonly></textarea>  

                    </div>

                </div> 
 
                <div class="form-group row">

                    <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-4">

                        <input type="date"
                            class="form-control required"
                            name="trans_dt"
                            id="trans_dt"
                        />

                    </div>

                    <label for="paddy_qty" class="col-sm-2 col-form-label">Paddy Qty:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class="form-control required"
                            name="paddy_qty"
                            id="paddy_qty"
                        />

                    </div>

                </div>  

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

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

            $.get( 

            '<?php echo site_url("paddy/socmills");?>',

            { 

                soc_id: $(this).val()

            }

            ).done(function(data){

                var string = '';

                $.each(JSON.parse(data), function( index, value ) {

                string += value.mill_name + ', ';

            });

                $('#mill_name').html(string);

            });

        });

    });

</script>
