<!DOCTYPE html>
<!-- View used for Menu ---->
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url("/confed.jpg"); ?>">
        <title>CONFED</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url("/assets/css/sb-admin.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("/assets/css/select2.css");?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("/assets/js/validation.js")?>"></script>
        <script type="text/javascript" src="<?php echo base_url("/assets/js/select2.js")?>"></script>

    </head>  
    <style>
        .hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }

        .transparent_tag {

            background: transparent; 
            border: none;

        }

        .no-border {
            border: 0;
            box-shadow: none;
            width: 75px;
        }
    </style>

    <body id="page-top" style="background-color: #eff3f6;">
    
        <header style="background-color: #353746; border:none; padding: 6px; border-radius: 0; color: #fff; width: 100%;">

            <div style="margin-left: 35px; display: inline; margin-right: 35px; padding: 3px; font-family: 'Courier New', Courier, monospace;">

                <span styele="display: inline; width: 200px;"><strong>Date:</strong> <?php echo date("d-m-Y");?></span>
                <strong>KMS Year: </strong><?php { echo $this->session->userdata('kms_yr');}?>
            </div>
            
            <div style="display: inline; margin-right: 35px; padding: 3px; font-family: 'Courier New', Courier, monospace; float: right;">

                <span styele="display: inline;"><strong>User: </strong> <?php echo $this->session->userdata('loggedin')->user_name;?></span>
                &nbsp;&nbsp; <a href="<?php echo site_url("profile") ?>" style="color: white; text-decoration: none;"><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i></a>
            </div>

        </header>
        
        <header style="background-color: #fff;">

            <div style="margin-left: 35px; padding: 3px; font-family: 'Courier New', Courier, monospace;">

                <img src="<?php echo base_url("/confed.jpg");?>" style="display: inline; height: 65px;" />
                
            </div>
            
        </header>

        <nav class="navbar navbar-inverse bg-primary" style="background-color: #424854; border:none; border-radius: 0; color: #9194a0;">

            <div style="margin-left: 20px;">

                <div class="col-lg-9 col-xs-8">

                    <div class="navbar-header">

                        <a class="navbar-brand" href="<?php echo site_url("User_Login/main");?>"><i class="fa fa-home"></i> Home</a>

                    </div>
                    
                    <div class="dropdown">                                                  <!--- Master Menu ----->
                        <div class="dropbtn">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                Add New
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                            <!--<a href="<?php //echo site_url('paddy/district');?>">District</a>
                            <a href="<?php //echo site_url('paddy/block');?>">Block</a>-->
                            <a href="<?php echo site_url('paddy/mill');?>">Mill</a>
                            <a href="<?php echo site_url('paddy/society');?>">Society</a>
                            <a href="<?php echo site_url('paddy/societymill');?>">Society Mill Connection</a>   
                        </div>
                    </div>                                                            

                    <div class="dropdown">                                              <!--- Transaction Menu ----->
                        <div class="dropbtn">
                            <i class="fa fa-group" aria-hidden="true"></i>
                                Transactions
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                            <a href="<?php echo site_url('paddy/workorder'); ?>">Work Order</a>
                            <a href="<?php echo site_url('paddy/farmerreg'); ?>">No of Farmer Registered</a>
                            <a href="<?php echo site_url('paddy/paddycollection'); ?>">Paddy Procurement</a>
                            <a href="<?php echo site_url('paddy/received'); ?>">Paddy Delivered to Rice Mill</a>
                            <a href="<?php echo site_url('paddy/offered');?>">CMR offered</a>
                            <a href="<?php echo site_url('paddy/doisseued');?>">DO Issue</a>
                            <a href="<?php echo site_url('paddy/delivery');?>">CMR Delivery</a>
                            <a href="<?php echo site_url('paddy/wqsc'); ?>">WQSC</a>
                        </div>
                    </div>

                    <div class="dropdown">                                              <!--- Bill Menu ----->
                        <div class="dropbtn">
                            <i class="fa fa-medkit " aria-hidden="true"></i>
                                Bill
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                            <a href="<?php echo site_url('paddy/bill/master'); ?>">Bill Master</a>
                            <a href="<?php echo site_url('paddy/bill/documents'); ?>">Supporting Documents</a>
                            <a href="<?php echo site_url('paddy/bill'); ?>">Bill Entry</a>
                            <a href="<?php echo site_url('paddy/bill/submit'); ?>">Bill Submit</a>
                        </div>    
                    </div>

                    <div class="dropdown">                                              <!--- Payment Menu ----->
                        <div class="dropbtn">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                Payment
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                            <a href="<?php echo site_url('paddy/payment'); ?>">Millers Bill Payment</a>
                            <a href="<?php echo site_url('paddy/commission'); ?>">Societies Commission</a>
                            <a href="<?php echo site_url('paddy/paid'); ?>">Paid</a>
                            <a href="<?php echo site_url('paddy/payment/received'); ?>">Payment Received</a>
                        </div>
                    </div>
                    
                    <div class="dropdown">                                              <!--- Report Menu ----->
                        <div class="dropbtn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                Reports
                            <i class="fa fa-angle-down"></i>
                        </div>

                        <div class="dropdown-content">
                            <a href="<?php echo site_url('report/procurementRep'); ?>">Society Wise Total Procurement</a>
                            <a href="<?php echo site_url('report/proctodelivery'); ?>">Procurement to Delivery</a>
                            <a href="<?php echo site_url('report/wqscdetailsReport'); ?>">WQSC Details</a>
                            <a href="<?php echo site_url('report/billreport'); ?>">Bill</a>
                            <a href="<?php echo site_url('report/labourCharge'); ?>">Mandi Labour Charge</a>
                            <a href="<?php echo site_url('report/societyComm'); ?>">Society Comission</a>
                            <a href="<?php echo site_url('report/claimTransport'); ?>">Transport Charge</a>
                            <a href="<?php echo site_url('report/millComm'); ?>">Milling Charge</a>
                            <a href="<?php echo site_url('report/gunnyRep'); ?>">Claim For Gunny Bag</a>
                            <a href="<?php echo site_url('report/billdetailsReport'); ?>">Bill Details</a>
                            <a href="<?php echo site_url('report/millPayment'); ?>">Miller's Payment</a>
                            <a href="<?php echo site_url('report/paymentVoucher'); ?>">Payment Voucher</a>
                            <a href="<?php echo site_url('report/paymentsociety'); ?>">Society's Payment</a>
                            <a href="<?php echo site_url('report/paddydeclr'); ?>">Declaration</a>
                        </div>
                    </div>
                   
                </div>
                
                <div class="col-lg-3 col-xs-4" >
                    
                    <div class="dropdown">

                        <div class="dropbtn">
                        <?php if($this->session->userdata('loggedin')->user_type == 'A'){?>   <!--if user type is admin then show Admin Menu-->

                            <a href="<?php echo site_url("admin/user") ?>" style="color: white; text-decoration: none;"><i class="fa fa-user" aria-hidden="true"></i> Admin</a>

                        <?php } ?>

                        </div>

                    </div>

                    <div class="dropdown">                  <!--Logout-->

                        <div class="dropbtn">

                            <a href="<?php echo site_url("User_Login/logout") ?>" style="color: white; text-decoration: none;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

                        </div>    

                    </div>    

                </div>

            </div>

        </nav>

        <section>
