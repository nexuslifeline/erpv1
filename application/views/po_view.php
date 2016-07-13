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
            padding: .5% .8% .5% 1%;
            border: 1px solid lightgray;
            margin: 1% 1% 1% 1%;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        @media screen and (max-width: 480px) {

            table{
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
            }
        }
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

<ol class="breadcrumb"  style="margin-bottom: 10px;>
    <li><a href="dashboard">Dashboard</a> > </li>
    <li><a href="users">Users  <?php //print_r($user_groups); ?></a></li>
</ol>


<div class="container-fluid"">
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-12">

                <div id="div_user_list">
                    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <table id="tbl_purchases" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>PO#</th>
                                    <th>Vendor</th>
                                    <th>Terms</th>
                                    <th>Contact Person</th>
                                    <th>Deliver to</th>
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


                <div id="div_user_fields" style="display: none;">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Purchase Order</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                            </div>

                            <div class="panel-body">

                                <div class="row custom_frame">
                                <form id="frm_users" role="form" class="form-horizontal">

                                        <br />
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label class="col-md-3  control-label">* PO # :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-code"></i>
                                                    </span>
                                                    <input type="text" name="po_no" class="form-control" placeholder="PO #" data-error-msg="PO # is required!" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  form-group">
                                            <label class="col-md-3 col-sm-12 col-xs-12 control-label">* Terms :</label>



                                            <div class="col-md-4 col-sm-6 col-xs-6">
                                                <div class="input-group bootstrap-touchspin">
                                                    <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                                                    <input id="touchspin4" class="form-control" value="872" style="display: block;">
                                                    <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                <span class="input-group-btn-vertical">
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-6 col-xs-6">
                                                <select name="" id="cbo_term_type" class="form-control">
                                                    <option>Day(s)</option>
                                                </select>

                                            </div>

                                        </div>




                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label class="col-md-3 control-label">Supplier :</label>

                                            <div class="col-md-9">
                                                <select name="" id="cbo_suppliers" data-error-msg="User group is required." required>
                                                    <option value="0">[ Create New Supplier ]</option>
                                                </select>

                                            </div>

                                        </div>


                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  form-group">
                                            <label class="col-md-3  control-label">Contact Person :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-users"></i>
                                                            </span>
                                                    <input type="text" name="user_name" class="form-control" placeholder="Contact Person">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  form-group">
                                            <label class="col-md-3  control-label">* Deliver to :</label>
                                            <div class="col-md-9">
                                                    <textarea name="deliver" class="form-control" placeholder="Deliver to Address" data-error-msg="Deliver address is required!" required></textarea>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  form-group">
                                            <label class="col-md-3  control-label">* Remarks :</label>
                                            <div class="col-md-9">
                                                <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>

                                            </div>
                                        </div>


                                </form>
                                </div>

                                <div class="row custom_frame">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label" style="font-family: Tahoma;"><strong>Enter PLU or Search Item :</strong></label>
                                        <div id="custom-templates">
                                            <input class="typeahead" type="text" placeholder="Enter PLU or Search Item">
                                        </div><br /><br />


                                        <table id="tbl_items" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>

                                                <th>Qty</th>
                                                <th>UM</th>
                                                <th>Item #</th>
                                                <th>Item</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
                                                <th>Tax</th>
                                                <th><center>Action</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <td>10</td>
                                                <td>pcs</td>
                                                <td>234567812</td>
                                                <td>Computer Case</td>
                                                <td>1,500.00</td>
                                                <td>0.00</td>
                                                <td>Vat(12%)</td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>

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


<div id="modal_user_group" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>New User Group</h4>

            </div>

            <div class="modal-body">
                <form id="frm_user_group">
                    <div class="form-group">
                        <label>* User Group :</label>
                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                            <input type="text" name="user_group" class="form-control" placeholder="User group" data-error-msg="Category name is required." required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Description :</label>
                        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea name="user_group_desc" class="form-control"></textarea>
                        </div>
                    </div>
                </form>


            </div>

            <div class="modal-footer">
                <button id="btn_create_user_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                <button id="btn_close_user_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
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


<script>
$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboUserGroup;



    var initializeControls=function(){

        dt=$('#tbl_purchases').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Purchases/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "po_no" },
                { targets:[2],data: "supplier_name" },
                { targets:[3],data: "terms" },
                { targets:[4],data: "contact_person" },
                { targets:[5],data: "user_group" },
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


        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Create Purcahase Order" >'+
                '<i class="fa fa-users"></i> Create Purchase Order</button>';
            $("div.toolbar").html(_btnNew);
        }();


        $('#txt_bdate').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });

        _cboUserGroup=$("#cbo_suppliers").select2({
            placeholder: "Please select user group",
            allowClear: true
        });


        var raw_data=[
            {
                "id": "12",
                "description": "Computer Case"
            },
            {
                "id": "123",
                "description": "Motherboard"
            },
            {
                "id": "1234",
                "description": "Keyboard"
            }];


            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id','description'),
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
                        '<table width="100%"><tr><td width="50%" style="padding-left: 1%"><b>PLU</b></td><td width="30%" align="left"><b>Product</b></td></tr></table>'
                    ].join('\n'),

                    suggestion: Handlebars.compile('<table width="100%"><tr><td width="50%" style="padding-left: 1%">{{id}}</td><td width="30%" align="left">{{description}}</td></tr></table>')

                }
            }).on('keyup', this, function (event) {
                if (event.keyCode == 13) {
                    $('.tt-suggestion:first').click();
                    _objTypeHead.typeahead('close');
                    _objTypeHead.typeahead('val','');
                }
            }).bind('typeahead:select', function(ev, suggestion) {
                if(_objTypeHead.typeahead('val')==''){ return false; }
                alert(suggestion.id);
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

        $('#tbl_purchases tbody').on( 'click', 'tr td.details-control', function () {
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
                row.child( format( row.data() ) ).show();
                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }



            }
        } );


        $('#btn_new').click(function(){
            _txnMode="new";
            $('.toggle-fullscreen').click();
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

        $('#btn_create_user_group').click(function(){

            var btn=$(this);

            if(validateRequiredFields($('#frm_user_group'))){
                var data=$('#frm_user_group').serializeArray();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"User_groups/transaction/create",
                    "data":data,
                    "beforeSend" : function(){
                        showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);
                    $('#modal_user_group').modal('hide');

                    var _group=response.row_added[0];
                    $('#cbo_user_groups').append('<option value="'+_group.user_group_id+'" selected>'+_group.user_group+'</option>');
                    $('#cbo_user_groups').select2('val',_group.user_group_id);

                }).always(function(){
                    showSpinningProgress(btn);
                });
            }





        });



        $('#tbl_purchases tbody').on('click','button[name="edit_info"]',function(){
            ///alert("ddd");
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.user_id;

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                        _elem.val(value);
                    }

                });


            });

            $('img[name="img_user"]').attr('src',data.photo_path);
            showList(false);

        });

        $('#tbl_purchases tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.user_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            removeCustomer().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });




        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_user').hide();
            $('#div_img_loader').show();


            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

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

            if(validateRequiredFields($('#frm_users'))){
                if(_txnMode=="new"){
                    createUserAccount().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_users'));
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updateUserAccount().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_users'));
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


    var createUserAccount=function(){
        var _data=$('#frm_users').serializeArray();
        _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
        _data.push({name : "user_group_id" ,value : $('#cbo_user_groups').select2('val')});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Users/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateUserAccount=function(){
        var _data=$('#frm_users').serializeArray();
        _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
        _data.push({name : "user_group_id" ,value : $('#cbo_user_groups').select2('val')});
        _data.push({name : "user_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Users/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeCustomer=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Users/transaction/delete",
            "data":{user_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_user_list').show();
            $('#div_user_fields').hide();
        }else{
            $('#div_user_list').hide();
            $('#div_user_fields').show();
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
        $('input[required],textarea',f).val('');
        $(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
    };


    function format ( d ) {
        // `d` is the original data object for the row
        //alert(d.photo_path);
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td width="20%">Name : </td><td width="50%"><b>'+ d.user_name+'</b></td>' +
        '<td rowspan="5" valign="top"><div class="avatar">'+
        '<img src="'+ d.photo_path+'" class="img-circle" style="margin-top:0px;height: 100px;width: 100px;">'+
        '</div></td>' +
        '</tr>' +
        '<tr>' +
        '<td>Address : </td><td><b>'+ d.user_address+'</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td>Email : </td><td>'+ d.user_email+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Mobile Nos. : </td><td>'+ d.user_mobile+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Landline. : </td><td>'+ d.user_telephone+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Active : </td><td><i class="fa fa-check"></i></td>' +
        '</tr>' +
        '</tbody></table><br />';






    };




    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };












});




</script>


</body>


</html>