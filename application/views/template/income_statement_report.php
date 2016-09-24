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