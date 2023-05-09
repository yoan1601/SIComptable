<!-- CONTAINS debut -->
<?php $identite=$this->session->identite; ?>
<div class="col-md-12" style="margin-top:20vh;">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <p><strong class="card-title">Date de cloture: <input id="date_clos" type="date" value="<?php echo $cloture; ?>"></strong><button id="choix_fin">Choisir</button></p>
                <p><strong class="card-title"><?php echo $identite['nom']; ?></strong></p>
                <p><strong class="card-title">Adresse: <?php echo $identite['adresse']; ?></strong></p>
                <p><strong class="card-title">Capital: <?php echo $capital; ?> Ar</strong></p>
                <p><strong class="card-title">CIF: <?php echo $docs['nif']; ?></strong></p>
                <p><strong class="card-title">STAT: <?php echo $docs['stat']; ?></strong></p>
            </div>
            <div id="actif_passif">
            <div class="card-header text-center">
                <p><strong class="card-title">Bilan</strong></p>
                <p><strong class="card-title">Exercice clos au: <?php echo $cloture; ?></strong></p>
                <p><strong class="card-title">Unite monetaire: ARIARY</strong></p>
            </div>
            <div class="card-body">
                    <table id="actifs" class="tableau" cellspacing="10">
                        <thead>
                            <tr>
                                <th>Actif</th>
                                <th style="text-align: right;">Compte</th>
                                <th style="text-align: right;">Brut</th>
                                <th style="text-align: right;">Amort./Prov.</th>
                                <th style="text-align: right;">Net</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><h5 style="font-family:sans-serif">Actifs non-courants</h5></th>
                            </tr>
                            <tr>
                                <td>Immobilisations incorporelles</td>
                                <td style="text-align: right;">20</td>
                                <?php if($g20->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g20->solde), 0, ',', ' ') ; ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Immobilisations corporelles</td>
                                <td style="text-align: right;">21</td>
                                <?php if($g21->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g21->solde), 0, ',', ' ') ; ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Immobilisations biologiques</td>
                                <td style="text-align: right;">22</td>
                                <?php if($g22->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g22->solde), 0, ',', ' ') ; ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Immobilisations en cours</td>
                                <td style="text-align: right;">23</td>
                                <?php if($g23->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g23->solde), 0, ',', ' ') ; ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Immobilisations financieres</td>
                                <td style="text-align: right;">25</td>
                                <?php if($g25->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g25->solde), 0, ',', ' ') ; ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total actifs non-courants:</h5></th>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_actif_non_courant), 0, ',', ' '); ?></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(7777), 0, ',', ' '); ?></td>
                            </tr>
                        <!--=================================== ACTIFS COURANTS ======================================-->
                        <tr>
                                <th><h5 style="font-family:sans-serif">Actifs courants</h5></th>
                            </tr>
                            <tr>
                                <td>Stock et en-cours</td>
                                <td style="text-align: right;">3</td>
                                <?php if($g3->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g3->solde), 0, ',', ' ');?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Clients et autres debiteurs</td>
                                <td style="text-align: right;">41</td>
                                <?php if($g41->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g41->solde), 0, ',', ' ');?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Impot et benefice</td>
                                <td style="text-align: right;">44</td>
                                <?php if($g44->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g44->solde), 0, ',', ' ');?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Autres creances et actifs assimiles</td>
                                <td style="text-align: right;">4</td>
                                <?php if($g4->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g4->solde), 0, ',', ' ');?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <td>Tresorerie et equivalents de tresorerie</td>
                                <td style="text-align: right;">5</td>
                                <?php if($g5->solde > 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval($g5->solde), 0, ',', ' ');?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td style="text-align: right;"><?php echo number_format(floatval(2000), 0, ',', ' '); ?></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total actifs courants:</h5></th>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_actif_courant), 0, ',', ' '); ?></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(7777), 0, ',', ' '); ?></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total actifs:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_actif_non_courant+$total_actif_courant), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                    <!--=============================== PASSIFS =========================================-->
                        <table id="passifs" class="tableau" cellspacing="10">
                        <thead>
                            <tr>
                                <th>Passif</th>
                                <th style="text-align: right;">Compte</th>
                                <th></th>
                                <th style="text-align: right;">Montant</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><h5 style="font-family:sans-serif">Capitaux propres</h5></th>
                            </tr>
                            <tr>
                                <td>Capital emis</td>
                                <td style="text-align: right;">101</td>
                                <td style="text-align: right;"></td>
                                <?php if($g101->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g101->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Reserves legales</td>
                                <td style="text-align: right;">105</td>
                                <td style="text-align: right;"></td>
                                <?php if($g105->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g105->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Resultat en instance d'affectation</td>
                                <td style="text-align: right;">128</td>
                                <td style="text-align: right;"></td>
                                <?php if($g128->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g128->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Resultat net</td>
                                <td style="text-align: right;">120</td>
                                <td style="text-align: right;"></td>
                                <?php if($g120->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g120->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Autres capitaux propres</td>
                                <td style="text-align: right;">11</td>
                                <td style="text-align: right;"></td>
                                <?php if($g11->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g11->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total des capitaux propres:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_capitaux_propres), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--=================================== PASSIFS NON-COURANTS ======================================-->
                        <hr>
                        <tr>
                                <th><h5 style="font-family:sans-serif">Passifs non-courants</h5></th>
                            </tr>
                            <tr>
                                <td>Emprunts/dettes a LMT part+1an</td>
                                <td style="text-align: right;">161</td>
                                <td style="text-align: right;"></td>
                                <?php if($g161->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g161->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total passifs non-courants:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_passifs_non_courant), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr></tr>
                        <!--=================================== PASSIFS COURANTS ======================================-->
                        <hr>
                        <tr>
                                <th><h5 style="font-family:sans-serif">Passifs courants</h5></th>
                            </tr>
                            <tr>
                                <td>Dettes court-terme</td>
                                <td style="text-align: right;">165</td>
                                <td style="text-align: right;"></td>
                                <?php if($g165->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g165->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Fournisseurs et comptes rattaches</td>
                                <td style="text-align: right;">40</td>
                                <td style="text-align: right;"></td>
                                <?php if($g40->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g40->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Avances recues de clients</td>
                                <td style="text-align: right;">41</td>
                                <td style="text-align: right;"></td>
                                <?php if($g41->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g41->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Autres dettes</td>
                                <td style="text-align: right;">4</td>
                                <td style="text-align: right;"></td>
                                <?php if($g4->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g4->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td>Comptes de tresorerie</td>
                                <td style="text-align: right;">5</td>
                                <td style="text-align: right;"></td>
                                <?php if($g5->solde < 0) { ?>
                                <td style="text-align: right;"><?php echo number_format(floatval(abs($g5->solde)), 0, ',', ' '); ?></td>
                                <?php } else { ?>
                                <td style="text-align: right;">0</td>
                                <?php } ?>    
                                <td style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Total passifs courants:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval($total_passifs_courant), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr></tr>
                        </tbody>
                        </table>
            </div> <!-- /.card-body -->
            </div>
            <div><button id="actif">Actifs</button><button id="passif">Passifs</button></div>
            <!--==================================== Compte des resultats =============================================-->
            <div id="resultat">
            <div class="card-header text-center">
                <p><strong class="card-title">Compte de resultat</strong></p>
                <p><strong class="card-title">Periode du: ...   au: ...</strong></p>
                <p><strong class="card-title">Unite monetaire: ARIARY</strong></p>
            </div>
            <div class="card-body">
                    <table id="resultats" class="tableau" cellspacing="10">
                        <thead>
                            <tr>
                                <th>Resultat</th>
                                <th style="text-align: right">Compte</th>
                                <th></th>
                                <th style="text-align: right">Montant</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Chiffre d'affaire</td>
                                <td style="text-align: right">70</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Production stockee</td>
                                <td style="text-align: right">71</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Production de l'exercice:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--=================================== Consommation de l'exercice ======================================-->
                            <tr>
                                <td>Achats consommes</td>
                                <td style="text-align: right">60</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Service exterieurs et autres consommations</td>
                                <td style="text-align: right">61/62</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Consommation de l'exercice:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--========================================== VALEUR AJOUTEE D'EXPLOITATION ======================-->
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Valeur ajoutee d'exploitation:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--=================================== EXCEDENT BRUT D'EXPLOITATION ======================================-->
                            <tr>
                                <td>Charges de personnel</td>
                                <td style="text-align: right">64</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Impots, taxes et versements assimiles</td>
                                <td style="text-align: right">63</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Excedent brut d'exploitation:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--=================================== Resultat operationnel ======================================-->
                            <tr>
                                <td>Autres produits operationnels</td>
                                <td style="text-align: right">75</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Autres charges operationnels</td>
                                <td style="text-align: right">65</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Dotations aux amortissements, aux provisions et pertes de valeur</td>
                                <td style="text-align: right">68</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reprise sur provisions et pertes de valeurs</td>
                                <td style="text-align: right">78</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat operationnel:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--=================================== Resultat financier ======================================-->
                            <tr>
                                <td>Produits financiers</td>
                                <td style="text-align: right">76</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Charges financières</td>
                                <td style="text-align: right">66</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat financier:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        <!--========================================== Resultat avant impots ======================-->
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat avant impots:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <!--=================================== Resultat net des activites ordinaires ======================================-->
                            <tr>
                                <td>Impôts exigibles sur résultats</td>
                                <td style="text-align: right">695</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h6 style="text-align:right;font-family:sans-serif">TOTAL DES PRODUITS DES ACTIVITES ORDINAIRES:</h6></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h6 style="text-align:right;font-family:sans-serif">TOTAL DES CHARGES DES ACTIVITES ORDINAIRES:</h6></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat net des activites ordinaires:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <!--=================================== Resultat extraordinaire ======================================-->
                            <tr>
                                <td>Eléments extraordinaires (produits) </td>
                                <td style="text-align: right">77</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Eléments extraordinaires (charges)</td>
                                <td style="text-align: right">67</td>
                                <td></td>
                                <td style="text-align: right"><?php echo number_format(floatval(10000), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat extraordinaire:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                            <!--========================================== Resultat net de l'exercice ======================-->
                            <tr>
                                <th><h5 style="text-align:right;font-family:sans-serif;text-decoration:underline">Resultat net de l'exercice:</h5></th>
                                <td></td>
                                <td></td>
                                <td style="font-weight:bold; text-align: right;"><?php echo number_format(floatval(6666), 0, ',', ' '); ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
            </div> <!-- /.card-body -->
            </div>
            <script>
                let actif=document.getElementById("actif");
                let passif=document.getElementById("passif");
                let tab_actif=document.getElementById("actifs");
                let tab_passif=document.getElementById("passifs");
                window.addEventListener("load", function(){
                    tab_passif.style.display="none";
                });
                actif.addEventListener("click", function(){
                    tab_actif.style.display="";
                    tab_passif.style.display="none";
                });
                passif.addEventListener("click", function(){
                    tab_actif.style.display="none";
                    tab_passif.style.display="";
                });

                let cloture=document.getElementById("date_clos");
                let debut="<?php echo $debut; ?>";
                let dateDebut=new Date(debut);
                let button_fin=document.getElementById("choix_fin");
                cloture.addEventListener("change", function(){
                    let dateClot=new Date(cloture.value);
                    if(dateClot>=dateDebut){
                        button_fin.addEventListener("click", function(){
                            window.location.href="<?php echo site_url("nyAvo/etatFinancier"); ?>"+"/"+cloture.value;
                        });
                    }
                });
            </script>
        </div> <!-- /.card -->
    </div>
</div>
<!-- CONTAINS Fin -->
