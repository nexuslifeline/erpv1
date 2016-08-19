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

    <!--/twitter typehead-->
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">






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

        .custom_frame{

            border: 1px solid lightgray;
            margin: 1% 1% 1% 1%;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .numeric{
            text-align: right;
        }



        @media screen and (max-width: 480px) {

            table{
                min-width: 800px;
            }

            .dataTables_filter{
                min-width: 800px;
            }

            .dataTables_info{
                min-width: 800px;
            }

            .dataTables_paginate{
                float: left;
                width: 100%;
            }
        }




    </style>
</head>

<body class="animated-content"  style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
<div id="layout-static">


<?php echo $_side_bar_navigation;

?>


<div class="static-content-wrapper white-bg">


<div class="static-content"  >
<div class="page-content"><!-- #page-content -->

<ol class="breadcrumb"  style="margin-bottom: 10px;">
    <li><a href="Dashboard">Dashboard</a></li>
    <li><a href="Sales_invoice">Sales Invoice</a></li>
</ol>


<div class="container-fluid"">
<div data-widget-group="group1">
<div class="row">
<div class="col-md-12">

<div id="div_sales_invoice_list">




    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table id="tbl_sales_invoice" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Invoice #</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Customer</th>
                    <th>Department</th>
                    <th>Remarks</th>
                    <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>





        <div class="panel-footer"></div>
    </div>

</div>


<div id="div_sales_invoice_fields" style="display: none;">
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Sales Invoice</h2>

        <div class="pull-right"><strong>[ <a id="btn_receive_so" href="#" style="text-decoration: underline;">Create from Sales Order</a> ]</strong></div>
        <div class="panel-ctrls" data-actions-container=""></div>
    </div>

    <div class="panel-body">

        <div class="row custom_frame">
            <form id="frm_sales_invoice" role="form" class="form-horizontal">

                <br /><br />
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3  control-label">* Invoice # :</label>
                    <div class="col-md-9">
                        <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-code"></i>
                                                    </span>
                            <input type="text" name="slip_no" class="form-control" placeholder="INV-YYYYMMDD-XXX" readonly>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3  control-label"> SO # :</label>
                    <div class="col-md-9">
                        <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-code"></i>
                                                    </span>
                            <input type="text" name="so_no" class="form-control" placeholder="Click 'Create from Sales Order'">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3 control-label">* Customer :</label>

                    <div class="col-md-9">
                        <select name="customer" id="cbo_customers" data-error-msg="Customer is required." required>
                            <option value="0">[ Create New Customer ]</option>
                            <?php foreach($customers as $customer){ ?>
                                <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
                            <?php } ?>
                        </select>


                    </div>

                </div>


                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3 control-label">* Department :</label>

                    <div class="col-md-9">
                        <select name="department" id="cbo_departments" data-error-msg="Department is required." required>
                            <option value="0">[ Create New Department ]</option>
                            <?php foreach($departments as $department){ ?>
                                <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                            <?php } ?>
                        </select>


                    </div>

                </div>


                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3  control-label">Date due : </label>
                    <div class="col-md-9">
                        <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                            <input type="text" name="date_due" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Due" data-error-msg="Please set the date this items are issued!" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="col-md-3  control-label">Date invoice : </label>
                    <div class="col-md-9">
                        <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                            <input type="text" name="date_invoice" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Invoice" data-error-msg="Please set the date this items are issued!" required>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  form-group">
                    <label class="col-md-3  control-label">Remarks :</label>
                    <div class="col-md-9">
                        <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>

                    </div>
                </div>

            </form>
        </div>


        <div class="row custom_frame">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br />
                <label class="control-label" style="font-family: Tahoma;"><strong>Enter PLU or Search Item :</strong></label>
                <div id="custom-templates">
                    <input class="typeahead" type="text" placeholder="Enter PLU or Search Item">
                </div><br />

                <form id="frm_items">
                    <div class="table-responsive">
                        <table id="tbl_items" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-font:tahoma;">
                            <thead>
                            <tr>

                                <th width="10%">Qty</th>
                                <th width="5%">UM</th>
                                <th width="30%">Item</th>
                                <th width="12%" style="text-align: right">Unit Price</th>
                                <th width="12%" style="text-align: right">Discount</th>
                                <th style="display: none;">T.D</th> <!-- total discount -->
                                <th>Tax %</th>
                                <th width="12%" style="text-align: right">Total</th>
                                <th style="display: none;">V.I</th> <!-- vat input -->
                                <th style="display: none;">N.V</th> <!-- net of vat -->
                                <td style="display: none;">Item ID</td><!-- product id -->
                                <th><center>Action</center></th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr>

                                                <td width="10%"><input type="text" class="numeric form-control" align="right"></td>
                                                <td width="5%">pcs</td>
                                                <td width="30%">Computer Case</td>
                                                <td width="12%"><input type="text" class="numeric form-control"></td>
                                                <td width="12%"><input type="text" class="numeric form-control"></td>
                                                <td></td>
                                                <td width="15%">
                                                    <select class="form-control">
                                                        <?php foreach($tax_types as $tax_type){ ?>
                                                            <option value="<?php echo $tax_type->tax_type_id; ?>"><?php echo $tax_type->tax_type; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td width="12%" align="right"><input type="text" class="numeric form-control"></td>
                                                <td></td>
                                                <td></td>

                                                <td><button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></td>
                                            </tr>-->
                            </tbody>


                        </table>
                    </div>
                </form>

                <div class="row">
                    <div class="col-lg-3 col-lg-offset-9">
                        <div class="table-responsive">
                            <table id="tbl_sales_invoice_summary" class="table invoice-total" style="font-family: tahoma;">
                                <tbody>

                                <tr>
                                    <td>Discount :</td>
                                    <td align="right">0.00</td>
                                </tr>

                                <tr>
                                    <td>Total before Tax :</td>
                                    <td align="right">0.00</td>
                                </tr>
                                <tr>
                                    <td>Tax :</td>
                                    <td align="right">0.00</td>
                                </tr>
                                <tr>
                                    <td><strong>Total After Tax :</strong></td>
                                    <td align="right"><b>0.00</b></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>








    </div>


    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-12">
                <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span>  Save Changes</button>
                <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
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


<div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-sm">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>

            </div>

            <div class="modal-body">
                <p id="modal-body-message">Are you sure ?</p>
            </div>

            <div class="modal-footer">
                <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->




<div id="modal_so_list" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>Sales Order</h4>

            </div>

            <div class="modal-body">
                <table id="tbl_so_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>SO#</th>
                        <th>Customer</th>
                        <th>Remarks</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th><center>Action</center></th>
                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button id="btn_accept" type="button" class="btn btn-primary" data-dismiss="modal" style="text-transform: none;font-family: Tahoma, Georgia, Serif;">Receive this Order</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: none;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->






<div id="modal_new_customer" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>New Customer</h4>

            </div>

            <div class="modal-body">
                <form id="frm_customer_new">

                    <div class="form-group">
                        <label>* Customer :</label>
                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </span>
                            <input type="text" name="customer_name" class="form-control" placeholder="Customer" data-error-msg="Customer name is required." required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Address :</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Email :</label>
                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                            <input type="text" name="email_address" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mobile :</label>
                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-send"></i>
                                                </span>
                            <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No">
                        </div>
                    </div>


                </form>


            </div>

            <div class="modal-footer">
                <button id="btn_create_customer" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                <button id="btn_close_customer" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->







<div id="modal_new_department" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>New Department</h4>

            </div>

            <div class="modal-body">
                <form id="frm_department_new">

                    <div class="form-group">
                        <label>* Department :</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-users"></i>
                            </span>
                            <input type="text" name="department_name" class="form-control" placeholder="Department" data-error-msg="Department name is required." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description :</label>
                        <textarea name="department_desc" class="form-control"></textarea>
                    </div>

                </form>


            </div>

            <div class="modal-footer">
                <button id="btn_create_department" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                <button id="btn_close_close_department" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->








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



<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>




$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboDepartments; var _cboCustomers; var dt_so;

    var oTableItems={
        qty : 'td:eq(0)',
        unit_price : 'td:eq(3)',
        discount : 'td:eq(4)',
        total_line_discount : 'td:eq(5)',
        tax : 'td:eq(6)',
        total : 'td:eq(7)',
        vat_input : 'td:eq(8)',
        net_vat : 'td:eq(9)'

    };


    var oTableDetails={
        discount : 'tr:eq(0) > td:eq(1)',
        before_tax : 'tr:eq(1) > td:eq(1)',
        inv_tax_amount : 'tr:eq(2) > td:eq(1)',
        after_tax : 'tr:eq(3) > td:eq(1)'
    };


    var initializeControls=function(){

        dt=$('#tbl_sales_invoice').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Sales_invoice/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "sales_inv_no" },
                { targets:[2],data: "date_invoice" },
                { targets:[3],data: "date_due" },
                { targets:[4],data: "customer_name" },
                { targets:[5],data: "department_name" },
                { targets:[6],data: "remarks" },
                {
                    targets:[7],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ]

        });



        dt_so=$('#tbl_so_list').DataTable({
            "bLengthChange":false,
            "ajax" : "Sales_order/transaction/open",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "so_no" },
                { targets:[2],data: "customer_name" },
                { targets:[3],data: "remarks" },
                { targets:[4],data: "date_order" },
                { targets:[5],data: "order_status" },
                {
                    targets:[6],
                    render: function (data, type, full, meta){
                        var btn_accept='<button class="btn btn-default btn-sm" name="accept_so"  style="margin-left:-15px;text-transform: none;" data-toggle="tooltip" data-placement="top" title="Create Sales Invoice on SO"><i class="fa fa-check"></i> Accept SO</button>';
                        return '<center>'+btn_accept+'</center>';
                    }
                }

            ]
        });


        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Record Sales Invoice" >'+
                '<i class="fa fa-file"></i> Record Sales Invoice</button>';
            $("div.toolbar").html(_btnNew);
        }();



        _cboDepartments=$("#cbo_departments").select2({
            placeholder: "Please select department.",
            allowClear: true
        });

        _cboCustomers=$("#cbo_customers").select2({
            placeholder: "Please select customer.",
            allowClear: true
        });

        _cboDepartments.select2('val',null);
        _cboCustomers.select2('val',null);

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });


        var raw_data=<?php echo json_encode($products); ?>;


        var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('product_code','product_desc','product_desc1'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local : raw_data
        });

        var _objTypeHead=$('#custom-templates .typeahead');

        _objTypeHead.typeahead(null, {
            name: 'products',
            display: 'description',
            source: products,
            templates: {
                header: [
                    '<table width="100%"><tr><td width=20%" style="padding-left: 1%;"><b>PLU</b></td><td width="30%" align="left"><b>Description 1</b></td><td width="20%" align="left"><b>Description 2</b></td><td width="20%" align="right" style="padding-right: 2%;"><b>Cost</b></td></tr></table>'
                ].join('\n'),

                suggestion: Handlebars.compile('<table width="100%"><tr><td width="20%" style="padding-left: 1%">{{product_code}}</td><td width="30%" align="left">{{product_desc}}</td><td width="20%" align="left">{{produdct_desc1}}</td><td width="20%" align="right" style="padding-right: 2%;">{{sale_price}}</td></tr></table>')

            }
        }).on('keyup', this, function (event) {
            if (event.keyCode == 13) {

                $('.tt-suggestion:first').click();
                _objTypeHead.typeahead('close');
                _objTypeHead.typeahead('val','');
            }
        }).bind('typeahead:select', function(ev, suggestion) {

            //console.log(suggestion);


            var tax_rate=0;

            var total=getFloat(suggestion.sale_price);
            var net_vat=0;
            var vat_input=0;

            if(suggestion.is_tax_exempt=="0"){ //not tax excempt
                net_vat=total/(1+(getFloat(tax_rate)/100));
                vat_input=total-net_vat;
            }else{
                tax_rate=0;
                net_vat=total;
                vat_input=0;

            }


            $('#tbl_items > tbody').prepend(newRowItem({
                inv_qty : "1",
                product_code : suggestion.product_code,
                unit_id : suggestion.unit_id,
                unit_name : suggestion.unit_name,
                product_id: suggestion.product_id,
                product_desc : suggestion.product_desc,
                inv_line_total_discount : "0.00",
                tax_exempt : false,
                inv_tax_rate : tax_rate,
                inv_price : suggestion.sale_price,
                inv_discount : "0.00",
                tax_type_id : null,
                inv_line_total_price : total,
                inv_non_tax_amount: net_vat,
                inv_tax_amount:vat_input
            }));





            reInitializeNumeric();
            reComputeTotal();

            //alert("dd")
        });

        $('div.tt-menu').on('click','table.tt-suggestion',function(){
            _objTypeHead.typeahead('val','');
        });

        $("input#touchspin4").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'fa fa-fw fa-plus',
            verticaldownclass: 'fa fa-fw fa-minus'
        });


    }();






    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_sales_invoice tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/sales-invoice/"+ d.sales_invoice_id+"?type=fullview",
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                });




            }
        } );





        $('#tbl_so_list tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt_so.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                _selectRowObj=$(this).closest('tr');
                var d=dt_so.row(_selectRowObj).data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/sales-order/"+ d.sales_order_id+'/contentview',
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                });



            }
        } );



        //loads modal to create new department
        _cboDepartments.on("select2:select", function (e) {

            var i=$(this).select2('val');

            if(i==0){ //new departmet
                _cboDepartments.select2('val',null)
                $('#modal_new_department').modal('show');
                clearFields($('#modal_new_department').find('form'));
            }

        });

        _cboCustomers.on("select2:select", function (e) {

            var i=$(this).select2('val');
            if(i==0){ //new customer
                _cboDepartments.select2('val',null)
                $('#modal_new_customer').modal('show');
                clearFields($('#modal_new_customer').find('form'));
            }

        });

        //create new department
        $('#btn_create_department').click(function(){
            var btn=$(this);

            if(validateRequiredFields($('#frm_department_new'))){
                var data=$('#frm_department_new').serializeArray();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Departments/transaction/create",
                    "data":data,
                    "beforeSend" : function(){
                        showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);
                    $('#modal_new_department').modal('hide');

                    var _department=response.row_added[0];
                    $('#cbo_departments').append('<option value="'+_department.department_id+'" selected>'+_department.department_name+'</option>');
                    $('#cbo_departments').select2('val',_department.department_id);

                }).always(function(){
                    showSpinningProgress(btn);
                });
            }


        });


        $('#btn_receive_so').click(function(){
            $('#tbl_so_list tbody').html('<tr><td colspan="7"><center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center></td></tr>');
            dt_so.ajax.reload( null, false );
            $('#modal_so_list').modal('show');
        });


        //create new customer
        $('#btn_create_customer').click(function(){
            var btn=$(this);

            if(validateRequiredFields($('#frm_customer_new'))){
                var data=$('#frm_customer_new').serializeArray();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Customers/transaction/create",
                    "data":data,
                    "beforeSend" : function(){
                        showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);
                    $('#modal_new_customer').modal('hide');

                    var _customer=response.row_added[0];
                    $('#cbo_customers').append('<option value="'+_customer.customer_id+'" selected>'+_customer.customer_name+'</option>');
                    $('#cbo_customers').select2('val',_customer.customer_id);

                }).always(function(){
                    showSpinningProgress(btn);
                });
            }
        });




        $('#btn_new').click(function(){
            _txnMode="new";
            //$('.toggle-fullscreen').click();
            clearFields($('#frm_sales_invoice'));
            showList(false);
        });

        $('#btn_browse').click(function(event){
            event.preventDefault();
            $('input[name="file_upload[]"]').click();
        });


        $('#btn_remove_photo').click(function(event){
            event.preventDefault();
            $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
        });



        $('#tbl_so_list > tbody').on('click','button[name="accept_so"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt_so.row(_selectRowObj).data();

            //alert(d.sales_order_id);

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                        _elem.val(value);
                    }

                });

                $('#cbo_customers').select2('val',data.customer_id);
                $('#cbo_departments').select2('val',data.department_id);

            });


            $('#modal_so_list').modal('hide');
            resetSummary();

            $.ajax({
                url : 'Sales_order/transaction/item-balance/'+data.sales_order_id,
                type : "GET",
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                beforeSend : function(){
                    $('#tbl_items > tbody').html('<tr><td align="center" colspan="8"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                },
                success : function(response){
                    var rows=response.data;
                    $('#tbl_items > tbody').html('');



                    $.each(rows,function(i,value){



                        $('#tbl_items > tbody').prepend(newRowItem({
                            inv_qty : value.so_qty,
                            product_code : value.product_code,
                            unit_id : value.unit_id,
                            unit_name : value.unit_name,
                            product_id: value.product_id,
                            product_desc : value.product_desc,
                            inv_line_total_discount : value.so_line_total_discount,
                            tax_exempt : false,
                            inv_tax_rate : value.so_tax_rate,
                            inv_price : value.so_price,
                            inv_discount : value.so_discount,
                            tax_type_id : null,
                            inv_line_total_price : value.so_line_total,
                            inv_non_tax_amount: value.non_tax_amount,
                            inv_tax_amount:value.tax_amount
                        }));



                    });


                  reComputeTotal();

                }
            });



        });







        $('#tbl_sales_invoice tbody').on('click','button[name="edit_info"]',function(){
            ///alert("ddd");
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.sales_invoice_id;



            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                        _elem.val(value);
                    }

                });


            });

            $('#cbo_departments').select2('val',data.department_id);
            $('#cbo_customers').select2('val',data.customer_id);

            $.ajax({
                url : 'Sales_invoice/transaction/items/'+data.sales_invoice_id,
                type : "GET",
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                beforeSend : function(){
                    $('#tbl_items > tbody').html('<tr><td align="center" colspan="8"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                },
                success : function(response){
                    var rows=response.data;
                    $('#tbl_items > tbody').html('');

                    $.each(rows,function(i,value){

                        $('#tbl_items > tbody').prepend(newRowItem({
                            inv_qty : value.inv_qty,
                            product_code : value.product_code,
                            unit_id : value.unit_id,
                            unit_name : value.unit_name,
                            product_id: value.product_id,
                            product_desc : value.product_desc,
                            inv_line_total_discount : value.inv_line_total_discount,
                            tax_exempt : false,
                            inv_tax_rate : value.inv_tax_rate,
                            inv_price : value.inv_price,
                            inv_discount : value.inv_discount,
                            tax_type_id : null,
                            inv_line_total_price : value.inv_line_total_price,
                            inv_non_tax_amount: value.inv_non_tax_amount,
                            inv_tax_amount:value.inv_tax_amount
                        }));
                    });

                    reComputeTotal();
                }
            });




            showList(false);

        });

        $('#tbl_sales_invoice tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.sales_invoice_id;

            $('#modal_confirmation').modal('show');
        });



        //track every changes on numeric fields
        $('#tbl_items tbody').on('keyup','input.numeric',function(){
            var row=$(this).closest('tr');

            var price=parseFloat(accounting.unformat(row.find(oTableItems.unit_price).find('input.numeric').val()));
            var discount=parseFloat(accounting.unformat(row.find(oTableItems.discount).find('input.numeric').val()));
            var qty=parseFloat(accounting.unformat(row.find(oTableItems.qty).find('input.numeric').val()));
            var tax_rate=parseFloat(accounting.unformat(row.find(oTableItems.tax).find('input.numeric').val()))/100;

            if(discount>price){
                showNotification({title:"Invalid",stat:"error",msg:"Discount must not greater than unit price."});
                row.find(oTableItems.discount).find('input.numeric').val('0.00');
                //$(this).trigger('keyup');
                //return;
            }

            var discounted_price=price-discount;
            var line_total_discount=discount*qty;
            var line_total=discounted_price*qty;
            var net_vat=line_total/(1+tax_rate);
            var vat_input=line_total-net_vat;

            $(oTableItems.total,row).find('input.numeric').val(accounting.formatNumber(line_total,2)); // line total amount
            $(oTableItems.total_line_discount,row).find('input.numeric').val(line_total_discount); //line total discount
            $(oTableItems.net_vat,row).find('input.numeric').val(net_vat); //net of vat
            $(oTableItems.vat_input,row).find('input.numeric').val(vat_input); //vat input

            //console.log(net_vat);
            reComputeTotal();


        });







        $('#btn_yes').click(function(){
            //var d=dt.row(_selectRowObj).data();
            //if(getFloat(d.order_status_id)>1){
            //showNotification({title:"Error!",stat:"error",msg:"Sorry, you cannot delete purchase order that is already been recorded on purchase invoice."});
            //}else{
            removeIssuanceRecord().done(function(response){
                showNotification(response);
                if(response.stat=="success"){
                    dt.row(_selectRowObj).remove().draw();
                }

            });
            //}
        });





        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_user').hide();
            $('#div_img_loader').show();


            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            //console.log(_files);

            $.ajax({
                url : 'Users/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    //console.log(response);
                    //alert(response.path);
                    $('#div_img_loader').hide();
                    $('#div_img_user').show();
                    $('img[name="img_user"]').attr('src',response.path);

                }
            });

        });

        $('#btn_cancel').click(function(){
            showList(true);
        });



        $('#btn_save').click(function(){

            if(validateRequiredFields($('#frm_sales_invoice'))){
                if(_txnMode=="new"){
                    createSalesInvoice().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_sales_invoice'));
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updateSalesInvoice().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_sales_invoice'));
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }

            }

        });



        $('#tbl_items > tbody').on('click','button[name="remove_item"]',function(){
            $(this).closest('tr').remove();
            reComputeTotal();
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


    var createSalesInvoice=function(){
        var _data=$('#frm_sales_invoice,#frm_items').serializeArray();

        var tbl_summary=$('#tbl_sales_invoice_summary');


        _data.push({name : "summary_discount", value : tbl_summary.find(oTableDetails.discount).text()});
        _data.push({name : "summary_before_discount", value :tbl_summary.find(oTableDetails.before_tax).text()});
        _data.push({name : "summary_tax_amount", value : tbl_summary.find(oTableDetails.inv_tax_amount).text()});
        _data.push({name : "summary_after_tax", value : tbl_summary.find(oTableDetails.after_tax).text()});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Sales_invoice/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateSalesInvoice=function(){
        var _data=$('#frm_sales_invoice,#frm_items').serializeArray();

        var tbl_summary=$('#tbl_sales_invoice_summary');
        _data.push({name : "summary_discount", value : tbl_summary.find(oTableDetails.discount).text()});
        _data.push({name : "summary_before_discount", value :tbl_summary.find(oTableDetails.before_tax).text()});
        _data.push({name : "summary_tax_amount", value : tbl_summary.find(oTableDetails.inv_tax_amount).text()});
        _data.push({name : "summary_after_tax", value : tbl_summary.find(oTableDetails.after_tax).text()});
        _data.push({name : "sales_invoice_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Sales_invoice/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeIssuanceRecord=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Sales_invoice/transaction/delete",
            "data":{sales_invoice_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_sales_invoice_list').show();
            $('#div_sales_invoice_fields').hide();
        }else{
            $('#div_sales_invoice_list').hide();
            $('#div_sales_invoice_fields').show();
        }
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
        $('input:not(.date-picker),textarea',f).val('');
        $(f).find('input:first').focus();
        $('#tbl_items > tbody').html('');
    };


    function format ( d ) {

        //return


    };


    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };

    var newRowItem=function(d){


        return '<tr>'+
        '<td width="10%"><input name="inv_qty[]" type="text" class="numeric form-control" value="'+ d.inv_qty+'"></td>'+
        '<td width="5%">'+ d.unit_name+'</td>'+
        '<td width="30%">'+d.product_desc+'</td>'+
        '<td width="11%"><input name="inv_price[]" type="text" class="numeric form-control" value="'+accounting.formatNumber(d.inv_price,2)+'" style="text-align:right;"></td>'+
        '<td width="11%"><input name="inv_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.inv_discount,2)+'" style="text-align:right;"></td>'+
        '<td style="display: none;" width="11%"><input name="inv_line_total_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.inv_line_total_discount,2)+'" readonly></td>'+
        '<td width="11%"><input name="inv_tax_rate[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.inv_tax_rate,2)+'"></td>'+
        '<td width="11%" align="right"><input name="inv_line_total_price[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.inv_line_total_price,2)+'" readonly></td>'+
        '<td style="display: none;"><input name="inv_tax_amount[]" type="text" class="numeric form-control" value="'+ d.inv_tax_amount+'" readonly></td>'+
        '<td style="display: none;"><input name="inv_non_tax_amount[]" type="text" class="numeric form-control" value="'+ d.inv_non_tax_amount+'" readonly></td>'+
        '<td style="display: none;"><input name="product_id[]" type="text" class="numeric form-control" value="'+ d.product_id+'" readonly></td>'+
        '<td align="center"><button type="button" name="remove_item" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+
        '</tr>';
    };



    var reComputeTotal=function(){
        var rows=$('#tbl_items > tbody tr');


        var discounts=0; var before_tax=0; var after_tax=0; var inv_tax_amount=0;

        $.each(rows,function(){
            //console.log($(oTableItems.net_vat,$(this)));
            discounts+=parseFloat(accounting.unformat($(oTableItems.total_line_discount,$(this)).find('input.numeric').val()));
            before_tax+=parseFloat(accounting.unformat($(oTableItems.net_vat,$(this)).find('input.numeric').val()));
            inv_tax_amount+=parseFloat(accounting.unformat($(oTableItems.vat_input,$(this)).find('input.numeric').val()));
            after_tax+=parseFloat(accounting.unformat($(oTableItems.total,$(this)).find('input.numeric').val()));
        });

        var tbl_summary=$('#tbl_sales_invoice_summary');
        tbl_summary.find(oTableDetails.discount).html(accounting.formatNumber(discounts,2));
        tbl_summary.find(oTableDetails.before_tax).html(accounting.formatNumber(before_tax,2));
        tbl_summary.find(oTableDetails.inv_tax_amount).html(accounting.formatNumber(inv_tax_amount,2));
        tbl_summary.find(oTableDetails.after_tax).html('<b>'+accounting.formatNumber(after_tax,2)+'</b>');

    };


    var resetSummary=function(){
        var tbl_summary=$('#tbl_sales_invoice_summary');
        tbl_summary.find(oTableDetails.discount).html('0.00');
        tbl_summary.find(oTableDetails.before_tax).html('0.00');
        tbl_summary.find(oTableDetails.inv_tax_amount).html('0.00');
        tbl_summary.find(oTableDetails.after_tax).html('<b>0.00</b>');
    };




    var reInitializeNumeric=function(){
        $('.numeric').autoNumeric('init');
    };








});




</script>


</body>


</html>