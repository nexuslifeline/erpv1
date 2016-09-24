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

<?php
/**
 * Created by PhpStorm.
 * User: PAGE1418
 * Date: 09/23/2016
 * Time: 7:53 PM
 */ 