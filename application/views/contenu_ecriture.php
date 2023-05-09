<!-- CONTAINS debut -->
<div class="col-12" style="margin-top:20vh;">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit" id="ajoutLigne" onclick="verifCompte()">Ajouter une
                    ligne</button>
            </div>
            <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/insEcritureCsv'); ?>"
                enctype="multipart/form-data" method="post">
                <input type="file" name="csv" id="csv">
                <span><button class="btn btn-warning" type="submit">Importer csv</button></span>
            </form>
            <!-- contenu de C6 formulaire -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form id="c6form" class="needs-validation" novalidate="" method="post">
                                <div class="card-header">
                                    <strong class="card-title">
                                        <h3 id="titreC6"></h3>
                                        <input type="hidden" name="numeroC6" id="numeroC6" value="0">
                                    </strong>
                                </div>
                                <div style="width:50vw">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3 text-center">
                                            <input type="radio" name="isINC" id="INC" value="1" checked>
                                            <label for="validationCustom3">Incorporable</label>
                                            <div class="valid-feedback"> ok! </div>
                                        </div>
                                        <div class="col-md-6 mb-3 text-center">
                                            <input type="radio" name="isINC" id="NINC" value="0">
                                            <label for="validationCustom3">Non incorporable</label>
                                            <div class="valid-feedback"> ok! </div>
                                        </div>
                                    </div> <!-- /.form-row -->
                                    <!-- PRODUITS -->
                                    <div id="pourcent_champs">
                                        <?php foreach ($allProductions as $key => $production) { ?>
                                            <div id="production_allPourcent<?php echo $production->id ?>">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="produits" class="px-2">
                                                            <?php echo $production->description ?>
                                                        </label>
                                                        <input style="width:10vw" type="number" name="produit<?php echo $production->id ?>" id="produit"
                                                            value="0">
                                                        <label for="produits" class="px-1"> %</label>
                                                        <div class="valid-feedback"> ok! </div>
                                                    </div>
                                                </div>
                                                <!-- NATURE -->
                                                <div class="form-row">
                                                    <!-- VARIABLE -->
                                                    <div class="col-md-6 mb-3">
                                                        <p>
                                                            <label for="produits" class="px-2">variable</label>
                                                            <input style="width:8vw" type="number" name="variable<?php echo $production->id ?>"
                                                                id="variable" value="0">
                                                            <label for="produits" class="px-1"> %</label>
                                                        <div class="valid-feedback"> ok! </div>
                                                        </p>
                                                        <!-- CENTRES VARIABLE -->
                                                        <?php foreach ($allCentres as $key_centre => $centre) { ?>
                                                            <p>
                                                                <label for="produits" class="px-2">
                                                                    <?php echo $centre->description ?>
                                                                </label>
                                                                <input style="width:5vw" type="number" name="C<?php echo $production->id ?>1<?php echo $centre->id ?>"
                                                                    id="produit" value="0">
                                                                <label for="produits" class="px-1"> %</label>
                                                            <div class="valid-feedback"> ok! </div>
                                                            </p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <!-- FIXE -->
                                                        <p>
                                                            <label for="produits" class="px-4">fixe</label>
                                                            <input style="width:8vw" type="number" name="fixe<?php echo $production->id ?>"
                                                                id="fixe" value="0">
                                                            <label for="produits" class="px-1"> %</label>
                                                        <div class="valid-feedback"> ok! </div>
                                                        </p>
                                                        <!-- CENTRES FIXE -->
                                                        <?php foreach ($allCentres as $key_centre => $centre) { ?>
                                                            <p>
                                                                <label for="produits" class="px-2">
                                                                    <?php echo $centre->description ?>
                                                                </label>
                                                                <input style="width:5vw" type="number" name="C<?php echo $production->id ?>0<?php echo $centre->id ?>"
                                                                    id="produit" value="0">
                                                                <label for="produits" class="px-1"> %</label>
                                                            <div class="valid-feedback"> ok! </div>
                                                            </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="text-center col-md-12"><button class="btn btn-primary"
                                        type="button" onclick="saveC6Analytique()">Valider</button></div>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div>
            <!-- FIN formulaire -->
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?php echo site_url('harena/getEntreeEcriture') ?>"
                    enctype="multipart/form-data" method="post">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="col-md-12">
                                <label for="validationCustom3">Journal</label>
                            </div>
                            <select name="journal" required>
                                <?php foreach ($allJournal as $journal) { ?>
                                    <option value="<?php echo $journal->id ?>"><?php echo $journal->intitule ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <table id="ecriture" cellspacing="10">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Pointage</th>
                                    <th>RefPiece</th>
                                    <th>Scan</th>
                                    <th>Num compte</th>
                                    <th>Libellé</th>
                                    <th>
                                        <div id="devise">
                                            <select name="devise[]" class="select-reset" required>
                                                <?php foreach ($allDevises as $devise) { ?>
                                                    <option value="<?php echo $devise->id ?>"><?php echo $devise->description ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                    </th>
                    </div>
                    <th>Taux</th>
                    <th>Quantité</th>
                    <th>Débit</th>
                    <th>Crédit</th>
                    </tr>
                    </thead>
                    <tbody id="corpsTable">
                        <tr>
                            <td><input type="date" name="date[]" required></td>
                            <td><select name="pointage[]" required>
                                    <?php foreach ($allPointages as $pointage) { ?>
                                        <option value="<?php echo $pointage->id ?>"><?php echo $pointage->reference ?>
                                        </option>
                                    <?php } ?>
                                </select></td>
                            <td><input type="text" name="refPiece[]" required></td>
                            <td><input type="file" name="scan[]" required></td>
                            <td><input type="text" name="numCompte[]" required></td>
                            <td><input type="text" name="libelle[]" required></td>
                            <td><input type="number" name="montant[]" min="0" step="0.01"></td>
                            <td><input type="text" name="taux[]" value="1" readonly></td>
                            <td><input type="number" name="quantite[]" value="1" min="1" step="0.1" required></td>
                            <td><input type="number" name="debit[]" id="debit" min="0" step="0.01" required>
                            </td>
                            <td><input type="number" name="credit[]" min="0" step="0.01" required></td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Total débit</label>
                            <input type="number" class="form-control" id="validationCustom3" name="total_debit"
                                step="0.01" readonly>
                            <div class="valid-feedback"> ok! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Total crédit</label>
                            <input type="number" class="form-control" id="validationCustom3" name="total_credit"
                                step="0.01" readonly>
                            <div class="valid-feedback"> ok! </div>
                        </div>
                    </div> <!-- /.form-row -->
                    <button id="valider" class="btn btn-primary" type="submit">Valider</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
<script>
    localStorage.setItem('allPointages', <?php echo $allPointages ?>);
</script>
<!-- CONTAINS Fin -->
