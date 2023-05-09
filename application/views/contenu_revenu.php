<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <strong class="card-title">Cout de revient par produit / nature / centre</strong>
            </div>
            <div class="card shadow mb-4">

            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/searchCompte'); ?>">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom4">Produit</label>
                        <div><select name="reference">
                            <option value="0">Tous les produits</option>
                            <?php foreach($allProductions as $product) { ?>
                                <option value="<?php echo $product->id ?>"><?php echo $product->description ?></option>
                            <?php } ?>
                        </select></div>
                        <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom3">Nature</label>
                        <div><select name="reference">
                            <option value="0">Sans distinction</option>
                            <option value="1">Fixe</option>
                            <option value="2">Variable</option>
                        </select></div>
                        <div class="valid-feedback"> ok! </div>
                        </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom4">Centre</label>
                        <div><select name="reference">
                            <option value="0">Tous les centres</option>
                            <?php foreach($allCentres as $centre) { ?>
                                    <option value="<?php echo $centre->id ?>"><?php echo $centre->description ?></option>
                            <?php } ?>
                        </select></div>
                        <div class="valid-feedback"> ok! </div>
                    </div>
                </div> <!-- /.form-row -->
                <button class="btn btn-primary" type="submit">Valider</button>
                </form>
            </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mx-auto mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Cout en Ar</font></font></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">180 000</font></font></div>
                        </div>
                        <div class="col-auto">
                        Ariary
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINS Fin -->

</div>