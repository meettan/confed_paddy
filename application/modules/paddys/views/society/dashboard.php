<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Society</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">
    
            <h3>
                <a href="<?php echo site_url("paddy/society/add");?>" class="btn btn-primary" style="width: 100px;">Add</a>
                <span class="confirm-div" style="float:right; color:green;"></span>
                <!--<div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>-->
            </h3>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>

                    <tr>
                    
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Registration<br>No.</th>
                        <th>Phone No.</th>
                        <th>Distrist</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                </thead>

                <tbody> 

                    <?php 
                    
                    if($society_dtls) {

                        foreach($society_dtls as $list) {

                            foreach($dist as $d_list) {

                                if($d_list->district_code == $list->dist) {
               

                    ?>

                            <tr>

                                <td><?php echo $list->sl_no; ?></td>
                                <td><?php echo $list->soc_name; ?></td>
                                <td><?php echo $list->reg_no; ?></td>
                                <td><?php echo $list->ph_no; ?></td>
                                <td><?php echo $d_list->district_name; ?></td>
                                <td>
                                
                                    <a href="society/edit?sl_no=<?php echo $list->sl_no; ?>" 
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Edit"
                                    >

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                        
                                    </a>

                                </td>

                                <td>

                                    <button 
                                        type="button"
                                        class="delete"
                                        id="<?php echo $list->sl_no; ?>"
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Delete"
                                        
                                    >

                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>

                                    </button>
                                    
                                </td>

                            </tr>

                    <?php   

                                }
                             
                            }    
                            
                        }

                    }

                    else {

                        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                    }
                ?>
                
                </tbody>

                <tfoot>

                    <tr>
                    
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Registration<br>No.</th>
                        <th>Phone No.</th>
                        <th>Distrist</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id');
                
            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('paddy/society/delete?sl_no="+id+"');?>";

            }
            
        });

    });

</script>

<script>
   
    $(document).ready(function() {

    $('.confirm-div').hide();

        <?php if($this->session->flashdata('msg')){ ?>

            $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

        <?php } ?>

    });

    
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });
</script>