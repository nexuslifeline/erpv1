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

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

    </style>

</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb" style="margin:0%;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Balance_sheet">Balance Sheet</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Balance Sheet</h2>
                                    <div class="panel-ctrls" data-actions-container=""></div>
                                </div>

                                <div class="panel-body" style="font-family: tahoma;">


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br />

                                            <b>Total Assets</b>
                                            <hr />

                                            <?php $total_assets=0; ?>

                                            <?php foreach($asset_classes as $class){ ?>
                                                <span style="margin-left: 5%;">
                                                    <b><u><i><?php echo $class->account_class; ?></i></u></b>
                                                </span>


                                                <br />

                                                <?php $account_balance=0; ?>

                                                <div class="col-lg-11 col-lg-offset-1">
                                                    <table class="table" width="100%;">
                                                        <tbody>
                                                        <?php foreach($asset_accounts as $asset_account){ ?>
                                                            <?php if($asset_account->account_class_id==$class->account_class_id){ ?>
                                                                <tr>
                                                                    <td style="width: 10%;"><?php echo $asset_account->account_no; ?></td>
                                                                    <td style="width: 70%;"><?php echo $asset_account->account_title; ?></td>
                                                                    <td style="width: 10%;" align="right"><?php echo number_format($asset_account->account_balance,2); ?></td>
                                                                </tr>
                                                            <?php
                                                                $account_balance+=$asset_account->account_balance;
                                                                $total_assets+=$asset_account->account_balance;
                                                            }
                                                            ?>


                                                        <?php
                                                        }
                                                        ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2" align="right"><b>Sub-Total</b></td>
                                                                <td align="right"><b><?php echo number_format($account_balance,2); ?></b></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>


                                                </div>

                                            <?php
                                            }
                                            ?>





                                        </div>

                                        <div class="col-lg-11 col-lg-offset-1">
                                            <br />



                                            <table class="table" width="100%;">
                                                <tr>
                                                    <td colspan="2" align="right"><b>Total Assets :</b></td>
                                                    <td align="right"><b><?php echo number_format($total_assets,2); ?></b></td>
                                                </tr>
                                            </table>
                                        </div>




                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br />

                                            <b>Total Liabilities and Equities</b>
                                            <hr />

                                            <?php $total_liability_equity=0; ?>

                                            <?php foreach($liability_classes as $class){ ?>
                                                <span style="margin-left: 5%;">
                                                    <b><u><i><?php echo $class->account_class; ?></i></u></b>
                                                </span>


                                                <br />

                                                <?php $account_balance=0; ?>

                                                <div class="col-lg-11 col-lg-offset-1">
                                                    <table class="table" width="100%;">
                                                        <tbody>
                                                        <?php foreach($liability_accounts as $liability_account){ ?>
                                                            <?php if($liability_account->account_class_id==$class->account_class_id){ ?>
                                                                <tr>
                                                                    <td style="width: 10%;"><?php echo $liability_account->account_no; ?></td>
                                                                    <td style="width: 70%;"><?php echo $liability_account->account_title; ?></td>
                                                                    <td style="width: 10%;" align="right"><?php echo number_format($liability_account->account_balance,2); ?></td>
                                                                </tr>
                                                                <?php
                                                                $account_balance+=$liability_account->account_balance;
                                                                $total_liability_equity+=$liability_account->account_balance;
                                                            }
                                                            ?>


                                                        <?php
                                                        }
                                                        ?>


                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="2" align="right"><b>Sub-Total</b></td>
                                                            <td align="right"><b><?php echo number_format($account_balance,2); ?></b></td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>








                                                </div>

                                            <?php
                                            }
                                            ?>




                                            <?php foreach($capital_classes as $class){ ?>
                                                <span style="margin-left: 5%;">
                                                    <b><u><i><?php echo $class->account_class; ?></i></u></b>
                                                </span>


                                                <br />

                                                <?php $account_balance=0; ?>

                                                <div class="col-lg-11 col-lg-offset-1">
                                                    <table class="table" width="100%;">
                                                        <tbody>
                                                        <?php foreach($capital_accounts as $capital_account){ ?>
                                                            <?php if($capital_account->account_class_id==$class->account_class_id){ ?>
                                                                <tr>
                                                                    <td style="width: 10%;"><?php echo $capital_account->account_no; ?></td>
                                                                    <td style="width: 70%;"><?php echo $capital_account->account_title; ?></td>
                                                                    <td style="width: 10%;" align="right"><?php echo number_format($capital_account->account_balance,2); ?></td>
                                                                </tr>
                                                                <?php
                                                                $account_balance+=$capital_account->account_balance;
                                                                $total_liability_equity+=$capital_account->account_balance;
                                                            }
                                                            ?>


                                                        <?php
                                                        }
                                                        ?>


                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="2" align="right"><b>Sub-Total</b></td>
                                                            <td align="right"><b><?php echo number_format($account_balance,2); ?></b></td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>








                                                </div>

                                            <?php
                                            }
                                            ?>





                                        </div>

                                        <div class="col-lg-11 col-lg-offset-1">
                                            <br />



                                            <table class="table" width="100%;">
                                                <tr>
                                                    <td colspan="2" align="right">Current Year Earnings :</td>
                                                    <td align="right"><b><?php echo number_format($current_year_earnings,2) ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="right"><b>Total Liabilities and Equities :</b></td>
                                                    <td align="right"><b><?php echo number_format($current_year_earnings+$total_liability_equity,2); ?></b></td>
                                                </tr>
                                            </table>
                                        </div>




                                    </div>


                                    <br />

                                </div>

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <a href="Templates/layout/balance-sheet?type=&type=preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print </a>
                                            <a href="Templates/layout/balance-sheet?type=&type=pdf" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-file-pdf-o"></i> Download as PDF </a>


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


</body>

</html>