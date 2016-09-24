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
    <li><a href="Income_statement">Income Statement</a></li>
</ol>

<div class="container-fluid">
<div data-widget-group="group1">



<div class="panel panel-default">
<div class="panel-heading">
    <h2>Income Statement</h2>
    <div class="panel-ctrls" data-actions-container=""></div>
</div>

<div class="panel-body" style="font-family: tahoma;">
    <div class="row">
        <div class="col-lg-12">
            <br />

            <b>Income</b>
            <hr />

            <div class="col-lg-11 col-lg-offset-1">
                <table width="100%" class="table">
                    <tbody>
                        <?php $total_income=0; foreach($income_accounts as $income){ ?>
                        <tr style="border-bottom: 1px solid lightgray;">
                            <td width="80%"><?php echo $income->account_title; ?></td>
                            <td width="20%" align="right"><?php echo number_format($income->account_balance,2); ?></td>
                        </tr>
                        <?php $total_income+=$income->account_balance; } ?>
                    </tbody>
                </table>

                <table width="100%">
                    <tr>
                        <td width="80%" align="right"><b>Total Income</b></td>
                        <td width="20%" align="right"><b><?php echo number_format($total_income,2); ?></b></td>
                    </tr>
                </table>
            </div>


            <br />
            <b>Expense</b>
            <hr />

            <div class="col-lg-11 col-lg-offset-1">
                <table width="100%">
                    <tbody>
                    <?php $total_expense=0; foreach($expense_accounts as $expense){ ?>
                        <tr>
                            <td width="80%"><?php echo $expense->account_title; ?></td>
                            <td width="20%" align="right"><?php echo number_format($expense->account_balance,2); ?></td>
                        </tr>
                    <?php $total_expense+=$expense->account_balance; } ?>
                    </tbody>
                </table>

                <table width="100%">
                    <tr>
                        <td width="80%" align="right"><b>Total Expense :</b></td>
                        <td width="20%" align="right"><b><?php echo number_format($total_expense,2); ?></b></td>
                    </tr>
                </table>
<br /><br />

                <table width="100%">
                    <tr>
                        <td width="80%" align="right"><b>NET INCOME :</b></td>
                        <td width="20%" align="right"><b><?php echo number_format($total_income-$total_expense,2); ?></b></td>
                    </tr>
                </table>

            </div>


        </div>
    </div>
<br />

</div>

<div class="panel-footer">
    <div class="row">
        <div class="col-sm-12">

            <a href="Templates/layout/income-statement?type=&type=preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print </a>
            <a href="Templates/layout/income-statement?type=&type=pdf" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-file-pdf-o"></i> Download as PDF </a>


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