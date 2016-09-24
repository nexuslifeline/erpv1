<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-arp-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


    <!--<link href="assets/dropdown-enhance/dist/css/bootstrar-select.min.css" rel="stylesheet" type="text/css">-->

    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">


    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->

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



    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
<div id="layout-static">

<?php echo $_side_bar_navigation;?>

<div class="static-content-wrapper white-bg">
<div class="static-content"  >

<div class="page-content"><!-- #page-content -->

<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="products">Products</a></li>
</ol>

<div class="container-fluid">
<div data-widget-group="group1">
<div class="row">
<div class="col-md-12">

<div id="div_receivable_list">

    <div class="panel-group panel-default" id="accordionA">

        <div class="panel panel-default">
            <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading"><h2>Review Pending Sales Journal</h2></div></a>
            <div id="collapseTwo" class="collapse">
                <div class="panel-body">
                    <table id="tbl_sales_review" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Invoice #</th>
                            <th>Customer</th>
                            <th>Delivered</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <a data-toggle="collapse" data-parent="#accordionA" href="#collapseOne"><div class="panel-heading"><h2 style="font-family:tahoma;">Sales Journal</h2></div></a>
            <div id="collapseOne" class="collapse in">
                <div class="panel-body" style="min-height: 400px;">

                    <table id="tbl_accounts_receivable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Txn #</th>
                            <th>Particular</th>
                            <th>Remarks</th>
                            <th>Txn Date</th>
                            <th>Posted</th>
                            <th>Status</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>


</div>




<div id="div_receivable_fields" style="display: none;">


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Sales Journal</h2>
                    <div class="panel-ctrls" data-actions-container=""></div>
                </div>


                <div class="panel-body">


                    <div class="tab-container tab-left tab-default">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#supplier_info" data-toggle="tab"><i class="fa fa-bars"></i> Transaction</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="supplier_info" style="min-height: 300px;">


                                <form id="frm_journal" role="form" class="form-horizontal">

                                    <span><strong><i class="fa fa-bars"></i>  Info</strong></span>
                                    <hr />

                                    <label class="col-lg-2"> * Txn # :</label>
                                    <div class="col-lg-4">

                                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-code"></i>
                                    </span>
                                            <input type="text" name="txn_no" class="form-control" placeholder="TXN-YYYYMMDD-XXX" readonly>

                                        </div>


                                    </div>

                                    <label class="col-lg-2"> * Date :</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                            <input type="text" name="date_txn" class="date-picker form-control" data-error-msg="Date is required." required>
                                        </div>

                                    </div>





                                    <br /><br />

                                    <label class="col-lg-2"> * Customer :</label>
                                    <div class="col-lg-10">
                                        <select id="cbo_customers" name="customer_id" class="selectpicker show-tick form-control" data-live-search="true" data-error-msg="Customer is required." required>
                                            <option value="0">[ Create New Customer ]</option>
                                            <?php foreach($customers as $customer){ ?>
                                                <option value='<?php echo $customer->customer_id; ?>'><?php echo $customer->customer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <br /><br />
                                    <span><strong><i class="fa fa-bars"></i> Journal Entries</strong></span>
                                    <hr />

                                    <div style="width: 100%;">
                                        <table id="tbl_entries" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="width: 30%;">Account</th>
                                                <th style="width: 30%;">Memo</th>
                                                <th style="width: 15%;text-align: right;">Dr</th>
                                                <th style="width: 15%;text-align: right;">Cr</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Account.">
                                                            <?php foreach($accounts as $account){ ?>
                                                                <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="memo[]" class="form-control"></td>
                                                    <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                                                    <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                                                        <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Account.">
                                                            <?php foreach($accounts as $account){ ?>
                                                                <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="memo[]" class="form-control"></td>
                                                    <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                                                    <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                                                        <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                                                    </td>
                                                </tr>

                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <td colspan="2" align="right"><strong>Total</strong></td>
                                                <td align="right"><strong>0.00</strong></td>
                                                <td align="right"><strong>0.00</strong></td>
                                                <td></td>
                                            </tr>
                                            </tfoot>


                                        </table>

                                    </div>


                                    <hr />
                                    <label>Remarks :</label><br />
                                    <textarea name="remarks" class="col-lg-12"></textarea>

                                </form>

                                <br /><br /><hr />

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


                <table id="table_hidden" class="hidden">
                    <tr>
                        <td>
                            <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Account.">
                                <?php foreach($accounts as $account){ ?>
                                    <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text" name="memo[]" class="form-control"></td>
                        <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                        <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                        <td>
                            <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                            <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                        </td>
                    </tr>
                </table>



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






<div id="modal_new_customer" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>New Customer</h4>

            </div>

            <div class="modal-body">
                <form id="frm_customers_new">

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












<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- Select2-->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!---<script src="assets/plugins/dropdown-enhance/dist/js/bootstrar-select.min.js"></script>-->





<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>




<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>
$(document).ready(function(){
    var _txnMode; var _cboCustomers; var _cboMethods; var _selectRowObj; var _selectedID; var _txnMode;
    var dtReview;


    var oTBJournal={
        "dr" : "td:eq(2)",
        "cr" : "td:eq(3)"
    };

    var oTFSummary={
        "dr" : "td:eq(1)",
        "cr" : "td:eq(2)"
    };






    var initializeControls=function(){


        dt=$('#tbl_accounts_receivable').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Accounts_receivable/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "txn_no" },
                { targets:[2],data: "particular" },
                { targets:[3],data: "remarks" },
                { targets:[4],data: "date_txn" },
                { targets:[5],data: "posted_by" },
                {
                    targets:[6],data: null,
                    render: function (data, type, full, meta){
                        var _attribute='';
                        //console.log(data.is_email_sent);
                        if(data.is_active=="1"){
                            _attribute=' class="fa fa-check-circle" style="color:green;" ';
                        }else{
                            _attribute=' class="fa fa-times-circle" style="color:red;" ';
                        }

                        return '<center><i '+_attribute+'></i></center>';
                    }


                },
                {
                    targets:[6],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ]
        });


        dtReview=$('#tbl_sales_review').DataTable({
            "bLengthChange":false,
            "ajax" : "Sales_invoice/transaction/sales-for-review",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "sales_inv_no" },
                { targets:[2],data: "customer_name" },
                { targets:[3],data: "date_invoice" },
                { targets:[4],data: "remarks" }
            ]
        });



        $('#cbo_particular').select2();

        reInitializeNumeric();
        reInitializeDropDownAccounts($('#tbl_entries'));


        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });


        var createToolBarButton=function() {
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Create New Journal" >'+
                '<i class="fa fa-file-text-o"></i> Create New Journal</button>';
            $("div.toolbar").html(_btnNew);
        }();



        _cboCustomers=$('#cbo_customers').select2({
            placeholder: "Please select customer.",
            allowClear: true
        });
        _cboCustomers.select2('val',null);



        // _cboMethods=$('#cbo_methods').select2({
        //placeholder: "Please select method of payment.",
        //allowClear: true
        //});

        //_cboMethods.select2('val',null);






    }();



    var bindEventHandlers=function(){
        var detailRows = [];

        $('#tbl_accounts_receivable tbody').on( 'click', 'tr td.details-control', function () {
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
                    "url":"Templates/layout/journal-ar?id="+ d.journal_id,
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



        $('#tbl_sales_review tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dtReview.row( tr );
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
                    "url":"Templates/layout/ar-journal-for-review?id="+ d.sales_invoice_id,
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();

                    reInitializeSpecificDropDown($('.cbo_customer_list'));
                    reInitializeNumeric();

                    var tbl=$('#tbl_entries_for_review_'+ d.sales_invoice_id);
                    var parent_tab_pane=$('#journal_review_'+ d.sales_invoice_id);

                    reInitializeDropDownAccounts(tbl);
                    reInitializeChildEntriesTable(tbl);
                    reInitializeChildElements(parent_tab_pane);

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }


                });




            }
        } );



        $('#btn_new').click(function(){
            _txnMode="new";
            //clearFields($('#frm_'))
            showList(false);
            //$('#modal_journal_entry').modal('show');
        });



        //add account button on table
        $('#tbl_entries').on('click','button.add_account',function(){

            var row=$('#table_hidden').find('tr');
            row.clone().insertAfter('#tbl_entries > tbody > tr:last');

            reInitializeNumeric();
            reInitializeDropDownAccounts($('#tbl_entries'));

        });

        var _oTblEntries=$('#tbl_entries > tbody');
        _oTblEntries.on('keyup','input.numeric',function(){
            var _oRow=$(this).closest('tr');

            if(_oTblEntries.find(oTBJournal.dr).index()===$(this).closest('td').index()){ //if true, this is Debit amount
                if(getFloat(_oRow.find(oTBJournal.dr).find('input.numeric').val())>0){
                    _oRow.find(oTBJournal.cr).find('input.numeric').val('0.00');
                }
            }else{

                if(getFloat(_oRow.find(oTBJournal.cr).find('input.numeric').val())>0) {
                    _oRow.find(oTBJournal.dr).find('input.numeric').val('0.00');
                }
            }


            reComputeTotals($('#tbl_entries'));
        });



        $('#tbl_accounts_receivable').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";

            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.journal_id;


            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });

            $('#cbo_customers').select2('val',data.customer_id);

            $.ajax({
                url: 'Accounts_receivable/transaction/get-entries?id=' + data.journal_id,
                type: "GET",
                cache: false,
                dataType: 'html',
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#tbl_entries > tbody').html('<tr><td align="center" colspan="4"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                }
            }).done(function(response){
                $('#tbl_entries > tbody').html(response);
                reInitializeNumeric();
                reInitializeDropDownAccounts($('#tbl_entries'));
                reComputeTotals($('#tbl_entries'));
            });




            showList(false);

        });


        _cboCustomers.on("select2:select", function (e) {
            var i=$(this).select2('val');
            if(i==0){ //new customer
                _cboCustomers.select2('val',null)
                $('#modal_new_customer').modal('show');
                clearFields($('#modal_new_customer').find('form'));
            }

        });



        $('#tbl_entries').on('click','button.remove_account',function(){
            var oRow=$('#tbl_entries > tbody tr');

            if(oRow.length>1){
                $(this).closest('tr').remove();
            }else{
                showNotification({"title":"Error!","stat":"error","msg":"Sorry, you cannot remove all rows."});
            }

            reComputeTotals($('#tbl_entries'));

        });


        $('#btn_save').click(function(){
            var btn=$(this);
            var f=$('#frm_journal');

            if(validateRequiredFields(f)){
                if(_txnMode=="new"){
                    createJournal().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields(f);
                        showList(true);
                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }else{
                    updateJournal().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields(f);
                        showList(true);
                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }

            }

        });


        $('#btn_cancel').click(function(){
            showList(true);
        });


        $('#btn_create_customer').click(function(){

            var btn=$(this);

            if(validateRequiredFields($('#frm_customers_new'))){
                var data=$('#frm_customers_new').serializeArray();

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

                    var _customers=response.row_added[0];
                    $('#cbo_customers').append('<option value="'+_customers.customer_id+'" selected>'+_customers.customer_name+'</option>');
                    $('#cbo_customers').select2('val',_customers.customer_id);


                }).always(function(){
                    showSpinningProgress(btn);
                });
            }





        });




    }();











    //*********************************************************************8
    //              user defines



    var createJournal=function(){
        var _data=$('#frm_journal').serializeArray();
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Accounts_receivable/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))

        });
    };


    var updateJournal=function(){
        var _data=$('#frm_journal').serializeArray();
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Accounts_receivable/transaction/update?id="+_selectedID,
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };


    var showList=function(b){
        if(b){
            $('#div_receivable_list').show();
            $('#div_receivable_fields').hide();
        }else{
            $('#div_receivable_list').hide();
            $('#div_receivable_fields').show();
        }
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
        $('#tbl_entries > tbody tr').slice(2).remove();

        $('#tbl_entries > tfoot tr').find(oTFSummary.dr).html('<b>0.00</b>');
        $('#tbl_entries > tfoot tr').find(oTFSummary.cr).html('<b>0.00</b>');
    };

    //initialize numeric text
    function reInitializeNumeric(){
        $('.numeric').autoNumeric('init');
    };

    function reInitializeDropDownAccounts(tbl){
        tbl.find('select.selectpicker').select2({
            placeholder: "Please select account.",
            allowClear: false
        });
    };


    function reInitializeSpecificDropDown(elem){
        elem.select2({
            placeholder: "Please select item.",
            allowClear: false
        });
    };

    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };


    var reComputeTotals=function(tbl){
        var oRows=tbl.find('tbody tr');
        var _DR_amount=0.00; var _CR_amount=0.00;

        $.each(oRows,function(i,value){
            _DR_amount+=getFloat($(this).find(oTBJournal.dr).find('input.numeric').val());
            _CR_amount+=getFloat($(this).find(oTBJournal.cr).find('input.numeric').val());


        });



        tbl.find('tfoot tr').find(oTFSummary.dr).html('<b>'+accounting.formatNumber(_DR_amount,2)+'</b>');
        tbl.find('tfoot tr').find(oTFSummary.cr).html('<b>'+accounting.formatNumber(_CR_amount,2)+'</b>');

    };

    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };


    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };


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


        if(!isBalance()){
            showNotification({title:"Error!",stat:"error",msg:'Please make sure Debit and Credit amount are equal.'});
            stat=false;
        }

        return stat;
    };


    var isBalance=function(){
        var oRow=$('#tbl_entries > tfoot tr');
        var dr=getFloat(oRow.find(oTFSummary.dr).text());
        var cr=getFloat(oRow.find(oTFSummary.cr).text());

        return (dr==cr);
    };


    var reInitializeChildEntriesTable=function(tbl){

        var _oTblEntries=tbl.find('tbody');
        _oTblEntries.on('keyup','input.numeric',function(){
            var _oRow=$(this).closest('tr');

            if(_oTblEntries.find(oTBJournal.dr).index()===$(this).closest('td').index()){ //if true, this is Debit amount
                if(getFloat(_oRow.find(oTBJournal.dr).find('input.numeric').val())>0){
                    _oRow.find(oTBJournal.cr).find('input.numeric').val('0.00');
                }
            }else{
                if(getFloat(_oRow.find(oTBJournal.cr).find('input.numeric').val())>0) {
                    _oRow.find(oTBJournal.dr).find('input.numeric').val('0.00');
                }
            }
            reComputeTotals(tbl);
        });



        //add account button on table
        tbl.on('click','button.add_account',function(){

            var row=$('#table_hidden').find('tr');
            row.clone().insertAfter(tbl.find('tbody > tr:last'));

            reInitializeNumeric();
            reInitializeDropDownAccounts(tbl);

        });


        tbl.on('click','button.remove_account',function(){
            var oRow=tbl.find('tbody tr');

            if(oRow.length>1){
                $(this).closest('tr').remove();
            }else{
                showNotification({"title":"Error!","stat":"error","msg":"Sorry, you cannot remove all rows."});
            }

            reComputeTotals(tbl);

        });




    };
    //***************************************************************************************************************88


    var reInitializeChildElements=function(parent){
        var btn=parent.find('button[name="btn_finalize_journal_review"]');

        //initialize datepicker
        parent.find('input.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });


        parent.on('click','button[name="btn_finalize_journal_review"]',function(){

            var _curBtn=$(this);

            finalizeJournalReview().done(function(response){
                showNotification(response);
                dt.row.add(response.row_added[0]).draw();

                var _parentRow=_curBtn.parents('table.table_journal_entries_review').parents('tr').prev();
                dtReview.row(_parentRow).remove().draw();

            }).always(function(){
                showSpinningProgress(_curBtn);
            });


        });

        var finalizeJournalReview=function(){
            var _data_review=parent.find('form').serializeArray();

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Accounts_receivable/transaction/create",
                "data":_data_review,
                "beforeSend": showSpinningProgress(btn)

            });
        };



    };


});


</script>

</body>

</html>