<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE - <?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">



    <style>
        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        .select2-container{
            min-width: 100%;
        }

        .dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
            background-color: dodgerblue;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }



        /*table{
            min-width: 700px;
        }

        .dataTables_filter{
            min-width: 700px;
        }

        .dataTables_info{
            min-width: 700px;
        }

        .dataTables_paginate{
            float: left;
            width: 100%;
        }*/

    </style>
</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
<div id="layout-static">


<?php echo $_side_bar_navigation;

?>


<div class="static-content-wrapper white-bg">


<div class="static-content"  >
<div class="page-content"><!-- #page-content -->

<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="Account_integration">Account Integration  <?php //print_r($user_groups); ?></a></li>
</ol>


<div class="container-fluid">
<div data-widget-group="group1">
<div class="row">
    <div class="col-md-12">



        <div class="tab-container tab-left tab-default">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#accounts_integration_setting" data-toggle="tab" style="font-family: tahoma;"><i class="fa fa-gear"></i> Accounts</a></li>
                <li class=""><a href="#account_year_setting" data-toggle="tab" style="font-family: tahoma;"><i class="fa fa-calendar"></i> Account Year</a></li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="accounts_integration_setting" style="min-height: 300px;">

                    <form id="frm_account_integration" role="form" class="form-horizontal row-border">

                        <br >
                        <h4><span style="margin-left: 1%"><strong><i class="fa fa-gear"></i> Supplier Integration Account</strong></span></h4>


                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Input Tax Account :</label>
                            <div class="col-md-7">
                                <select name="input_tax_account_id" class="cbo_accounts" data-error-msg="Input Tax Account is required." required>
                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->input_tax_account_id==$account->account_id?'selected':''); ?>  ><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>


                                <span class="help-block m-b-none">Input Tax is generally apply to the purchases of goods and services.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Payable to Supplier :</label>
                            <div class="col-md-7">
                                <select name="payable_account_id"  class="cbo_accounts" data-error-msg="Payable Account is required." required>
                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->payable_account_id==$account->account_id?'selected':''); ?> ><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>


                                <span class="help-block m-b-none">Account that is used to represent the amount owes by the company.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Discount from Supplier :</label>
                            <div class="col-md-7">
                                <select name="payable_discount_account_id"  class="cbo_accounts" data-error-msg="Discount Account is required." required>

                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->payable_discount_account_id==$account->account_id?'selected':''); ?>><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>

                                <span class="help-block m-b-none">Please select Discount Account.</span>
                            </div>
                        </div>


                        <br >
                        <h4><span style="margin-left: 1%"><strong><i class="fa fa-gear"></i> Customer Integration Account</strong></span></h4>


                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Output Tax Account :</label>
                            <div class="col-md-7">
                                <select name="output_tax_account_id"  class="cbo_accounts" data-error-msg="Output Tax account is required." required>

                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->output_tax_account_id==$account->account_id?'selected':''); ?>><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>

                                <span class="help-block m-b-none">Output tax is the amount charge on your own sales if you are registered as Vatted.</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Receivable from Customer :</label>
                            <div class="col-md-7">
                                <select name="receivable_account_id"  class="cbo_accounts" data-error-msg="Receivable account is required." required>

                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->receivable_account_id==$account->account_id?'selected':''); ?>><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>

                                <span class="help-block m-b-none">Account that represents the amount of goods and services credited by customer.</span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label"> * Discount to Customer :</label>
                            <div class="col-md-7">
                                <select name="receivable_discount_account_id"  class="cbo_accounts" data-error-msg="Receivable account is required." required>
                                    <?php foreach($accounts as $account){ ?>
                                        <option value="<?php echo $account->account_id; ?>" <?php echo ($current_accounts->receivable_discount_account_id==$account->account_id?'selected':''); ?>><?php echo $account->account_title; ?></option>
                                    <?php } ?>
                                </select>

                                <span class="help-block m-b-none">Please select Discount Account.</span>
                            </div>
                        </div>


                        <br /><hr />


                        <div class="col-lg-9 col-lg-offset-3">
                            <button id="btn_save_supplier_accounts" type="button" class="btn btn-primary" style="font-family: tahoma;text-transform: none;"><span class=""></span> Save Changes</button>
                        </div>

                    </form>

                </div>


                <div class="tab-pane" id="account_year_setting" style="min-height: 300px;">


                        <div id="div_account_year_list">

                            <br >
                            <h4><span style="margin-left: 1%"><strong><i class="fa fa-calendar"></i> Account Year</strong></span></h4>
                            <hr />


                            <table id="tbl_account_year" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>Description</td>
                                        <td>Period</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div id="div_account_year_fields" style="display: none;">
                            <div class="row">
                                <div class="col-lg-12">

                                    <br >
                                    <h4><span style="margin-left: 1%"><strong><i class="fa fa-calendar"></i> Accounting Period</strong></span></h4>
                                    <hr />


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> * Account Year (Code):</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" data-error-msg="Account year is required." required>

                                            <span class="help-block m-b-none">Please enter the code you want to represent the accounting period. Ex. AY2016</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> * Period Start :</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" data-error-msg="Account year is required." required>

                                            <span class="help-block m-b-none">Please enter the code you want to represent the accounting period. Ex. AY2016</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> * Period End :</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" data-error-msg="Account year is required." required>

                                            <span class="help-block m-b-none">Please enter the code you want to represent the accounting period. Ex. AY2016</span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> * Description :</label>
                                        <div class="col-md-7">
                                            <textarea class="form-control"></textarea>

                                            <span class="help-block m-b-none">Ex. 2016</span>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                </div>
            </div>


        </div>







    </div>
</div>
</div>
</div> <!-- .container-fluid -->

</div> <!-- #page-content -->
</div>



<footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
    </div>
</footer>




</div>
</div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>




<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>





<script>
$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _accounts;



    var initializeControls=function(){


        dt=$('#tbl_account_year').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Account_integration/transaction/get-account-year",
            "columns": [
                { targets:[0],data: "account_year" },
                { targets:[1],data: "description" },
                { targets:[2],data: "status" }
            ]
        });

        _accounts=$(".cbo_accounts").select2({
            placeholder: "Please select account.",
            allowClear: false
        });

        var createToolBarButton=function() {
            var _btnNew='<button class="btn btn-primary"  id="btn_new_account_year" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Setup New Account Year" >'+
                '<i class="fa fa-year"></i> Setup New Account Year</button>';
                $("div.toolbar").html(_btnNew);
        }();






    }();






    var bindEventHandlers=(function(){
            $('#btn_save_supplier_accounts').click(function(){
                saveSettings().done(function(response){
                    showNotification(response);
                }).always(function(){
                    showSpinningProgress($('#btn_save_supplier_accounts'));
                });
            });


            $('#btn_new_account_year').click(function(){

                showList(false);
            });

    })();


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
                if($(this).select2('val')==0||$(this).select2('val')==null){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }



        });

        return stat;
    };



    var saveSettings=function(){
        var _data=$('#frm_account_integration').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Account_integration/transaction/save",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save_supplier_accounts'))

        });
    };




    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };



    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
    };

    var showList=function(b){
        if(b){
            $('#div_account_year_list').show();
            $('#div_account_year_fields').hide();
        }else{
            $('#div_account_year_list').hide();
            $('#div_account_year_fields').show();
        }
    };











});




</script>


</body>


</html>