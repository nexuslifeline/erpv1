<!DOCTYPE html>

<html lang="en">

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

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


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

        .numeric{
            text-align: right;
            width: 60%;
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

                    <ol class="breadcrumb" style="margin:0%;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="products">Products</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_product_list">
                                        <div class="panel panel-default">
                                            <div class="panel-body table-responsive">
                                                <table id="tbl_products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>PLU</th>
                                                        <th>Description</th>
                                                        <th>Category</th>
                                                        <th>Unit</th>
                                                        <th style="text-align:right;">On hand</th>
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

                                    <div id="div_product_fields" style="display: none;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>product Information</h2>
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div>

                                            <div class="panel-body">
                                                <br />
                                                <form id="frm_product" role="form" class="form-horizontal row-border">
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">PLU :</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                        <i class="fa fa-file-code-o"></i>
                                                                                    </span>
                                                                <input type="text" name="product_code" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Description 1 :</label>
                                                        <div class="col-md-7">
                                                            <textarea name="product_desc" class="form-control" data-error-msg="product Description is required!" placeholder="Description" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Description 2 :</label>
                                                        <div class="col-md-7">
                                                            <textarea name="product_desc1" class="form-control" placeholder="Description"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label"> * Category :</label>

                                                        <div class="col-md-7">
                                                            <select name="category_id" id="product_category" data-error-msg="Category is required." required>
                                                                <option value="0">[ Create Category ]</option>
                                                                <?php
                                                                foreach($categories as $row)
                                                                {
                                                                    echo '<option value="'.$row->category_id  .'">'.$row->category_name.'</option>';
                                                                }
                                                                ?>
                                                            </select>


                                                        </div>

                                                    </div>



                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Unit :</label>

                                                        <div class="col-md-7">
                                                            <select name="unit_id" id="product_unit" data-error-msg="Unit is required." required>
                                                                <option value="0">[ Create Unit ]</option>
                                                                <?php
                                                                foreach($units as $row)
                                                                {
                                                                    echo '<option value="'.$row->unit_id.'">'.$row->unit_name.'</option>';
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Type :</label>
                                                        <div class="col-md-7">
                                                            <select name="item_type_id" id="cbo_item_type" data-error-msg="Item type is required." required>
                                                                <?php foreach($item_types as $item_type){ ?>
                                                                    <option value="<?php echo $item_type->item_type_id ?>"><?php echo $item_type->item_type; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Link to Account (Income):</label>
                                                        <div class="col-md-7">
                                                            <select name="income_account_id" id="cbo_accounts">
                                                                <option value="0">none</option>
                                                                <?php foreach($accounts as $account){ ?>
                                                                    <option value="<?php echo $account->account_id; ?>"><?php echo $account->account_title; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <span class="help-block m-b-none">Please select none if this will not be recorded on Journal.</span>
                                                        </div>

                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Link to Account (Expense):</label>
                                                        <div class="col-md-7">
                                                            <select name="expense_account_id" id="cbo_accounts_expense">
                                                                <option value="0">none</option>
                                                                <?php foreach($accounts as $account){ ?>
                                                                    <option value="<?php echo $account->account_id; ?>"><?php echo $account->account_title; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <span class="help-block m-b-none">Please select none if this will not be recorded on Journal.</span>
                                                        </div>

                                                    </div>




                                                    <div class="form-group">
                                                        <div class="col-md-7 col-md-offset-3">

                                                            <label><input type="checkbox" name="is_tax_exempt" value="1"  checked> Tax Exempt</label>
                                                        </div>


                                                    </div>






                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Purchase Cost :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="purchase_cost" class="form-control numeric">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Markup Percent :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="markup_percent" class="form-control  numeric">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Sale Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="sale_price" class="form-control  numeric">
                                                        </div>
                                                    </div>




                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Warn Qty :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="product_warn" class="form-control numeric">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Ideal Qty :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="product_ideal" class="form-control numeric">
                                                        </div>
                                                    </div>







                                                    <br /><br />
                                                </form>
                                            </div>

                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;""><span class=""></span>  Save Changes</button>
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
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <div id="modal_category_group" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>New Category Group</h4>

                        </div>

                        <div class="modal-body">
                            <form id="frm_category_group">
                                <div class="form-group">
                                    <label>* Category Name :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" data-error-msg="Category name is required." required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="category_desc" placeholder="Category Description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="modal-footer">
                            <button id="btn_create_category_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                            <button id="btn_close_unit_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <div id="modal_unit_group" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>New Unit Group</h4>

                        </div>

                        <div class="modal-body">
                            <form id="frm_unit_group">
                                <div class="form-group">
                                    <label>* Unit Name :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="text" name="unit_name" class="form-control" placeholder="Unit Name" data-error-msg="Unit name is required." required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="unit_desc" placeholder="Unit Description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="modal-footer">
                            <button id="btn_create_unit_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                            <button id="btn_close_unit_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
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


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboItemTypes;

    var initializeControls=function(){


        dt=$('#tbl_products').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Products/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "product_code" },
                { targets:[2],data: "product_desc" },
                { targets:[3],data: "category_name" },
                { targets:[4],data: "unit_name" },
                {
                    targets:[5],data: "on_hand",
                    render: function (data, type, full, meta) {
                        if(data=="na"){

                            return data;
                        }else{
                            return accounting.formatNumber(data,2);
                        }

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
            ],
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });
            }
        });

        _product_category=$("#product_category").select2({
            placeholder: "Please select category",
            allowClear: true
        });

        _product_category.select2('val', null);

        _product_category.on("select2:select", function (e) {

            var i=$(this).select2('val');
            if(i==0){
                $(this).select2('val',null)
                $('#modal_category_group').modal('show');
                clearFields($('#modal_category_group').find('form'));
            }


        });

        _product_unit=$("#product_unit").select2({
            placeholder: "Please select Unit",
            allowClear: true
        });
        _product_unit.select2('val', null);

        _cboItemTypes=$("#cbo_item_type").select2({
            placeholder: "Please select item type.",
            allowClear: false
        });


        _cboAccounts=$("#cbo_accounts").select2({
            placeholder: "Please select link account.",
            allowClear: false
        });
        _cboAccounts.select2('val', 0);

        var _cboAccountExpenses=$("#cbo_accounts_expense").select2({
            placeholder: "Please select link account.",
            allowClear: false
        });
        _cboAccountExpenses.select2('val', 0);

        _product_unit.on("select2:select", function (e) {

            var i=$(this).select2('val');
            if(i==0){
                $(this).select2('val',null)
                $('#modal_unit_group').modal('show');
                clearFields($('#modal_unit_group').find('form'));
            }


        });

        $('.numeric').autoNumeric('init');

        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Create New product" >'+
                '<i class="fa fa-file"></i> Create New product</button>';
            $("div.toolbar").html(_btnNew);
        }();
    }();

    $('#btn_create_category_group').click(function(){

        var btn=$(this);

        if(validateRequiredFields($('#frm_category_group'))){
            var data=$('#frm_category_group').serializeArray();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Categories/transaction/create",
                "data":data,
                "beforeSend" : function(){
                    showSpinningProgress(btn);
                }
            }).done(function(response){
                showNotification(response);
                $('#modal_category_group').modal('hide');

                var _group=response.row_added[0];
                $('#product_category').append('<option value="'+_group.category_id+'" selected>'+_group.category_name+'</option>');
                $('#product_category').select2('val',_group.category_id);

            }).always(function(){
                showSpinningProgress(btn);
            });
        }


    });

    $('#btn_create_unit_group').click(function(){

        var btn=$(this);

        if(validateRequiredFields($('#frm_unit_group'))){
            var data=$('#frm_unit_group').serializeArray();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Units/transaction/create",
                "data":data,
                "beforeSend" : function(){
                    showSpinningProgress(btn);
                }
            }).done(function(response){
                showNotification(response);
                $('#modal_unit_group').modal('hide');

                var _group=response.row_added[0];
                $('#product_unit').append('<option value="'+_group.unit_id+'" selected>'+_group.unit_name+'</option>');
                $('#product_unit').select2('val',_group.unit_id);

            }).always(function(){
                showSpinningProgress(btn);
            });
        }


    });
    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_products tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );

        $('#btn_new').click(function(){
            clearFields($('#frm_product'))
            _txnMode="new";
            showList(false);
        });

        $('#tbl_products tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.product_id;


           // alert($('input[name="tax_exempt"]').length);
            //$('input[name="tax_exempt"]').val(0);
            //$('input[name="inventory"]').val(data.is_inventory);

            $('input,textarea,select').each(function(){

                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.is('select')){

                        if(_elem.attr('name')==name){
                            _elem.select2('val',value);
                        }
                    }else{
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    }

                });
            });

            showList(false);

        });


        $('input[name="purchase_cost"],input[name="markup_percent"],input[name="sale_price"]').keyup(function(){
            reComputeSRP();
        });

        $('#tbl_products tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.product_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            removeProduct().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_product').hide();
            $('#div_img_loader').show();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'Products/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    $('#div_img_loader').hide();
                    $('#div_img_product').show();
                }
            });
        });

        $('#btn_cancel').click(function(){
            showList(true);
        });

        $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_product'))){
                if(_txnMode=="new"){
                    createProduct().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_product'))
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updateProduct().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_product'))
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }
            }
        });
    })();

    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required]',f).each(function(){
            if($(this).val()==""){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('div.form-group').addClass('has-error');
                stat=false;
                return false;
            }
        });
        return stat;
    };

    var createProduct=function(){
        var _data=$('#frm_product').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Products/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateProduct=function(){
        var _data=$('#frm_product').serializeArray();

        console.log(_data);
        _data.push({name : "product_id" ,value : _selectedID});
        //_data.push({name:"is_inventory",value: $('input[name="is_inventory"]').val()});

        //alert($('input[name="is_inventory"]').val());
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Products/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeProduct=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Products/transaction/delete",
            "data":{product_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_product_list').show();
            $('#div_product_fields').hide();
        }else{
            $('#div_product_list').hide();
            $('#div_product_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll();
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

    function format ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td width="20%">Product Code : </td><td width="50%"><b>'+ d.product_code+'</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td>Product Description 1 : </td><td>'+ d.product_desc+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Product Description 2 : </td><td>'+ d.product_desc1+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Category : </td><td>'+ d.category_name+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Department : </td><td>na</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Unit : </td><td>'+ d.unit_name+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Vat Exempt : </td><td>'+ d.is_tax_exempt+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Equivalent Points : </td><td>'+ d.equivalent_points+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Warn Qty : </td><td>'+ d.product_warn+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Ideal : </td><td>'+ d.product_ideal+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Purchase Cost : </td><td>'+ accounting.formatNumber(d.purchase_cost,2)+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Markup Percent : </td><td>'+ d.markup_percent+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Sale Price : </td><td>'+ accounting.formatNumber(d.sale_price,2)+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Whole Sale Price : </td><td>'+ accounting.formatNumber(d.whole_sale,2)+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Retailer Price : </td><td>'+ accounting.formatNumber(d.retailer_price,2)+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Special Discount Price : </td><td>'+ accounting.formatNumber(d.special_disc,2)+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Valued Customer Price : </td><td>'+ accounting.formatNumber(d.valued_customer,2)+'</td>' +
        '</tr>' +
        '</tbody></table><br />';
    };


    var reComputeSRP=function(){
        var markupPercent=getFloat($('input[name="markup_percent"]').val());
        var purchaseAmount=getFloat($('input[name="purchase_cost"]').val());

        if(markupPercent>0){
            var markupDecimal=markupPercent/100;
            var newAmount=purchaseAmount*markupDecimal;
            var srpAmount=purchaseAmount+newAmount;
            $('input[name="sale_price"]').val(accounting.formatNumber(srpAmount,2));
        }

    };

    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };



   /* $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });*/


    // apply input changes, which were done outside the plugin
    //$('input:radio').iCheck('update');

});

</script>

</body>

</html>