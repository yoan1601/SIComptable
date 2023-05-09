<div class="clearfix col-md-12" style="
  margin-top: 10%;
  background-color: white;
">
  <button id="show-form">Afficher le formulaire</button>
  <!-- contenu de votre formulaire -->
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <form id="c6form" class="needs-validation" novalidate="" action="<?php echo site_url('admin/searchTier'); ?>">
            <div class="card-header">
              <strong class="card-title">
                <h3>Num - Descri du compte 6</h3>
              </strong>
            </div>
            <div style="width:50vw">
              <div class="form-row">
                <div class="col-md-6 mb-3 text-center">
                  <input type="radio" name="isINC" id="validationCustom3" value="1" checked>
                  <label for="validationCustom3">Incorporable</label>
                  <div class="valid-feedback"> ok! </div>
                </div>
                <div class="col-md-6 mb-3 text-center">
                  <input type="radio" name="isINC" id="validationCustom3" value="0">
                  <label for="validationCustom3">Non incorporable</label>
                  <div class="valid-feedback"> ok! </div>
                </div>
              </div> <!-- /.form-row -->
               <!-- PRODUITS -->
              <?php for ($i=0; $i < 2; $i++) { ?>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="produits" class="px-2">Produit A</label>
                  <input style="width:10vw" type="number" name="produit" id="produit" value="0">
                  <label for="produits" class="px-1"> %</label>
                  <div class="valid-feedback"> ok! </div>
                </div>
              </div>
              <!-- NATURE -->
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <p>
                    <label for="produits" class="px-2">variable</label>
                    <input style="width:8vw" type="number" name="produit" id="produit" value="0">
                    <label for="produits" class="px-1"> %</label>
                  <div class="valid-feedback"> ok! </div>
                  </p>
                  <?php for ($j=0; $j < 3; $j++) { ?>
                    <p>
                    <label for="produits" class="px-2">centre 1</label>
                    <input style="width:5vw" type="number" name="produit" id="produit" value="0">
                    <label for="produits" class="px-1"> %</label>
                    <div class="valid-feedback"> ok! </div>
                    </p>
                  <?php } ?>
                </div>
                <div class="col-md-6 mb-3">
                  <p>
                    <label for="produits" class="px-4">fixe</label>
                    <input style="width:8vw" type="number" name="produit" id="produit" value="0">
                    <label for="produits" class="px-1"> %</label>
                  <div class="valid-feedback"> ok! </div>
                  </p>
                  <?php for ($k=0; $k < 3; $k++) { ?>
                    <p>
                    <label for="produits" class="px-2">centre 1</label>
                    <input style="width:5vw" type="number" name="produit" id="produit" value="0">
                    <label for="produits" class="px-1"> %</label>
                    <div class="valid-feedback"> ok! </div>
                    </p>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="text-center col-md-12"><button class="btn btn-primary" type="submit">Valider</button></div>
          </form>
        </div> <!-- /.card-body -->
      </div> <!-- /.card -->
    </div>
  </div>
  <!-- FIN formulaire -->
</div>
