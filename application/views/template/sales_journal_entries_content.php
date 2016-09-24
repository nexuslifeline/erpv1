
<div>
    <center>
        <table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
                <td width="45%" valign="top">
                    <span>Customer :</span><br /><br />
                    <address>
                        <strong><?php echo $journal_info->customer_name; ?></strong><br>
                        <?php echo $journal_info->address; ?><br>
                        <?php echo $journal_info->email_address; ?><br>
                        <abbr title="Phone">P:</abbr> <?php echo $journal_info->landline; ?>
                    </address>


                </td>

                <td width="50%" align="right">
                    <h4>Txn No.</h4>
                    <h4 class="text-navy"><?php echo $journal_info->txn_no; ?></h4>


                    <p>
                        <span><strong>Txn Date : </strong> <?php echo  date_format(new DateTime($journal_info->date_txn),"m/d/Y"); ?></span><br />

                    </p>
                </td>
            </tr>
        </table></center>

    <br /><br />

    <center>
        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11" border="0">
            <thead>
            <tr>
                <th width="35%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Account</th>
                <th width="35%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Memo</th>
                <th width="15%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Dr</th>
                <th width="15%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Cr</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $dr_amount=0.00; $cr_amount=0.00;

            foreach($journal_accounts as $account){

                ?>
                <tr>
                    <td width="35%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $account->account_title; ?></td>
                    <td width="35%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo $account->memo; ?></td>
                    <td width="15%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->dr_amount,2); ?></td>
                    <td width="15%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->cr_amount,2); ?></td>
                </tr>
                <?php

                $dr_amount+=$account->dr_amount;
                $cr_amount+=$account->cr_amount;

            }

            ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" align="right"><strong>Total : </strong></td>
                <td align="right"><strong><?php echo number_format($dr_amount,2); ?></strong></td>
                <td align="right"><strong><?php echo number_format($cr_amount,2); ?></strong></td>
            </tr>
            </tfoot>
        </table><br /><br />

        <br />


        <table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
                <td width="95%" valign="top">
                    <span><b>Remarks :</b></span><br />
                    <?php echo $journal_info->remarks; ?>
                    <br /><br />
                    <br /><br />
                </td>


            </tr>
        </table></center>


    </center>



</div>





















