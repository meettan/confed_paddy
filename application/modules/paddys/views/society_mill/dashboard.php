 <!--  Dashboard for Connection of  Society Mill ------->

<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Society Mill Connection</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">
    
            <h3>
                <a href="<?php echo site_url("paddy/socmill/add");?>" class="btn btn-primary" style="width: 100px;">Add</a>
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
                        <th>District</th>
                        <th>Society</th>
                        <th>Edit</th>

                    </tr>

                </thead>

                <tbody> 

                    <?php 
                    
                    if($society_mill_dtls) {

                        $i = 0;

                        foreach($society_mill_dtls as $list) {

                    ?>

                            <tr>

                                <td><?php echo ++$i; ?></td>

                                <td><?php echo $list->district_name; ?></td>

                                <td><?php echo $list->soc_name; ?></td>

                                <td>
                                    <a href="socmill/edit?sl_no=<?php echo $list->soc_id; ?>" 
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a>
                                </td>

                            </tr>

                    <?php   

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
                        <th>District</th>
                        <th>Society</th>
                        <th>Edit</th>

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

                window.location = "<?php echo site_url('paddy/society_mill/delete?sl_no="+id+"');?>";

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
