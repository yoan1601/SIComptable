<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->
    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/searchProduction'); ?>">
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Par description</label>
                            <input type="text" class="form-control" id="validationCustom3" name="description">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Chercher</button>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Ajouter production</strong>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/createProduction'); ?>" method="post">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                <label for="validationCustom4">Description</label>
                <input type="text" class="form-control" id="validationCustom4" name="description">
                <div class="valid-feedback"> ok! </div>
                <label for="validationCustom4">Prix unitaire</label>
                <input type="number" class="form-control" id="validationCustom4" name="prixU" step="0.01">
                <div class="valid-feedback"> ok! </div>
                </div>
            </div> <!-- /.form-row -->
            <button class="btn btn-primary" type="submit">Ajouter</button>
            </form>
        </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
    </div>
    <div class="row">
    <?php foreach($allProduction as $production) { ?>
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title"><?php echo $production->description; ?></strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted"><?php echo $production->pu; ?></span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('admin/modifProduction/0/'.$production->id); ?>"><button type="button" class="btn mb-2 btn-success">modifier</button></span></a>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('admin/delProduction/'.$production->id); ?>"><button type="button" class="btn mb-2 btn-danger">supprimer</button></span></a>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div>
    <?php } ?>
    </div>
    <!-- CONTAINS Fin -->


</div>
