<!-- CONTAINS debut -->
<div class="col-12" style="margin-top:20vh;">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Grand livre: Compte <?php echo $grandlivre['compte']; ?></strong>
                <form action="<?php echo site_url("nyAvo/grandLivre"); ?>" method="get">
                    <p><select name="compte">
                    <?php foreach($comptes as $compte){ ?>
                        <option value="<?php echo $compte->numero; ?>"><?php echo $compte->numero." (".$compte->description.")"; ?></option>
                    <?php } ?>
                    </select><span><button class="btn btn-primary" type="submit">voir</button></span></p>
                </form>
            </div>
            <?php 
                $debit = 0;
                $credit = 0;
                foreach($grandlivre['result'] as $livre){
                    $debit = $debit + $livre['debit'];
                    $credit = $credit + $livre['credit'];
                }
                $solde = $debit - $credit;
                $type = "debiteur";
                if($solde < 0){
                    $type = "crediteur";
                    $solde = $solde * (-1);
                }
            ?>
    <div class="row" style="margin-right: -900px;">
        <div class="col-xl-2 col-md-4 mx-auto mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Solde <?php echo $type; ?> </font></font></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($solde, 0, ',', ' '); ?></font></font></div>
                        </div>
                        <div class="col-auto">
                        Ar
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="card-body">
                    <table id="ecriture" cellspacing="10">
                        <thead>
                            <tr>
                                <th>Code journal</th>
                                <th>Date</th>
                                <th>RefPiece</th>
                                <th>Numero de compte</th>
                                <th>Libellé</th>
                                <td style="text-align: right;">Débit</th>
                                <td style="text-align: right;">Crédit</th>
                            </tr>
                        </thead>
                        <?php if(count($grandlivre['result'])>0){ ?>
                        <tbody>
                            <?php foreach($grandlivre['result'] as $livre){ ?>
                            <tr>
                                <td><?php echo $livre['code']; ?></td>
                                <td><?php echo $livre['dateentree']; ?></td>
                                <td><?php echo $livre['refpiece']; ?></td>
                                <td><?php echo $livre['numcompte']; ?></td>
                                <td><?php echo $livre['libelle']; ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($livre['debit']), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval($livre['credit']), 0, ',', ' '); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <?php }else{ ?>
                            </table>
                            <h4>Il n'y a encore eu aucune ecriture</h4>
                        <?php } ?>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
<!-- CONTAINS Fin -->