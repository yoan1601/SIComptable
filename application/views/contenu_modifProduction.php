<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Mettre à jour production</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/modifProduction/1/'.$identite['id']); ?>" method="post">
                        <input type="hidden" value="<?php echo $identite['id']; ?>" name="id">
                        <div class="form-row">
                          <div class="col-md-8 mb-3">
                            <label for="validationCustom4">Description</label>
                            <input type="text" class="form-control" id="validationCustom4" value="<?php echo $identite['description']; ?>" name="description">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Modifier</button>
                      </form>
                      <a href="<?php echo site_url('admin/listeProduction') ?>"><button type="button" class="btn mb-2 btn-warning">retour</button></a>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <!-- CONTAINS Fin -->


</div>