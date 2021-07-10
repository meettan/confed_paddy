  
    <div class="wraper">      

        <form method="POST" 
            id="form"
            action="<?php echo site_url("paddy/socmill/edit");?>" >
            
            <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>Society Mill Details</h4>
                    
                </div>

                <div class="form-group row">

                    <label for="dist" class="col-sm-2 col-form-label">District:</label>

                    <div class="col-sm-4">

                        <select name="dist" id="dist" class="form-control required" disabled>

                            <option value="">Select</option>

                            <?php

                                foreach($dist as $dlist){

                            ?>

                                <option value="<?php echo $dlist->district_code;?>"
                                                <?php echo ($dlist->district_code == $society_dtls->dist)?"selected":"";?>
                                        ><?php echo $dlist->district_name;?></option>

                            <?php

                                }

                            ?>     

                        </select>

                    </div>


                    <label for="block" class="col-sm-2 col-form-label">Block:</label>

                    <div class="col-sm-4">

                        <select name="block" id="block" class="form-control required" disabled>

                            <option value="">Select</option>

                            <?php

                                foreach($block as $blist){

                            ?>

                                <option value="<?php echo $blist->sl_no;?>"
                                                <?php echo ($blist->sl_no == $socmill->soc_mill_block)?"selected":"";?>
                                        ><?php echo $blist->block_name;?></option>

                            <?php

                                }

                            ?>     

                        </select>

                    </div>

                </div>  

             
                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">Society Name:</label>

                    <div class="col-sm-10">

                        <input type="hidden" name="soc_id" value="<?php echo $society_dtls->sl_no;?>" />
                        <input
                            class="form-control required"
                            name="name"
                            id="name"
                            value="<?php echo $society_dtls->soc_name; ?>"
                            readonly
                        />

                    </div>

                </div>

            </div>

            <div class="col-md-5 container form-wraper" style="margin-left: 10px; width: 48%;">
                        
                <div class="form-header">
                    
                    <h4>Mills</h4>
                
                </div>

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>Sl. No.</th>
                            <th>Mill</th>
                            <th>Option</th>

                        </tr>

                    </thead>
                        
                    <tbody> 
                            <?php
                                if($mills){
                                    $i = 1;
                                    
                                    foreach($mills as $list){

                                    ?>
                                        <tr>
                                           
                                            <td><?php echo $i++; ?></td>

                                            <td><?php echo $list->mill_name; ?></td>
                                            
                                            <td>
                                                <button type="button" class="delete" 
                                                        id="<?php echo $list->checkId; ?>/<?php echo $society_dtls->sl_no;?>/<?php echo $socmill->soc_mill_block;?>/<?php echo $this->session->userdata('kms_yr');?>"
                                                        data-toggle="tooltip" data-placement="bottom" title="Delete"
                                                ><i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i></button>
                                                
                                            </td>
                                        </tr>

                                    <?php
                                        }
                                    }
                            ?>
                    </tbody>

                    <tfoot>

                        <tr>
                        
                            <th>Sl.No.</th>
                            <th>Mill</th>
                            <th>Option</th>
                        </tr>
                    
                    </tfoot>

                </table>

            </div>

        </form>

    </div>

<script>

    $("#form").validate();


</script>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id');
                
            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('paddy/socmill/delete?sl_no="+id+"');?>";

            }
            
        });

    });

</script>