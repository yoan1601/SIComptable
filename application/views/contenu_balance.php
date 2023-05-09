<!-- CONTAINS debut -->
<div class="col-12" style="margin-top:20vh;">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title"><h2>Balance</h2></strong>
            </div>
            <div class="card-body">
                    <table id="ecriture" cellspacing="10">
                        <thead>
                            <tr>
                                <th style="font-size: larger;">Numero de compte</th>
                                <th style="font-size: larger;">Intitule de compte</th>
                                <th style="font-size: larger;text-align: right;">Debit</th>
                                <th style="font-size: larger;text-align: right;">Credit</th>
                                <th style="font-size: larger;text-align: right;">Solde debiteur</th>
                                <th style="font-size: larger;text-align: right;">Solde crediteur</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0; $i<count($balance); $i++){ ?>
                            <tr>
                                <td><?php echo $balance[$i]['numcompte']; ?></td>
                                <td><?php echo $balance[$i]['description']; ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($balance[$i]['debit_total']), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($balance[$i]['credit_total']), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($solde[$i]['debit']), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($solde[$i]['credit']), 0, ',', ' '); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right; color: green;">Total</td>
                            <td style="text-align: right; color: green;"><?php echo number_format(floatval($sDebitCredit[0]), 0, ',', ' '); ?></td>
                            <td style="text-align: right; color: green;"><?php echo number_format(floatval($sDebitCredit[1]), 0, ',', ' '); ?></td>
                        </tr>
                        </tbody>
                        </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
<!-- CONTAINS Fin -->
