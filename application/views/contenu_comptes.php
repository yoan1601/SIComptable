<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->
    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/searchCompte'); ?>">
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Par description de compte</label>
                            <input type="text" class="form-control" id="validationCustom3" name="description">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom4">Par numero de compte</label>
                            <input type="text" class="form-control" id="validationCustom4" name="numero">
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
                      <strong class="card-title">Inserer une compte</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/insCompte'); ?>">
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Libelle du compte</label>
                            <input type="text" class="form-control" id="validationCustom3" required="" name="description">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom4">Numero du compte</label>
                            <input type="text" class="form-control" id="validationCustom4" required="" name="numero">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <span><button class="btn btn-primary" type="submit">Ajouter</button></span>
                      </form>
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/insCompteCsv'); ?>" enctype="multipart/form-data" method="post">
                        <input type="file" name="csv" id="csv">
                        <span><button class="btn btn-warning" type="submit">Importer csv</button></span>
                      </form>
                      <!-- <a href="<?php echo site_url('admin/listeComptes') ?>"><button type="button" class="btn mb-2 btn-warning">retour</button></a> -->
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>

    <div class="row">
    <h3><?php
    if(isset($this->pagination)) {
      echo $this->pagination->create_links(); 
    } 
    ?></h3>
    <?php foreach($allComptes as $compte) { ?>
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title"><?php echo $compte->description ?></strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted"><?php echo $compte->numero ?></span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('admin/modifCompte/0/'.$compte->id.'/'.$compte->numero[0]); ?>"><button type="button" class="btn mb-2 btn-success">modifier</button></span></a>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('admin/delCompte/'.$compte->numero.'/'.$compte->numero[0]); ?>"><button type="button" class="btn mb-2 btn-danger">supprimer</button></span></a>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div>
    <?php } ?>
    </div>
    <!-- CONTAINS Fin -->


</div>
