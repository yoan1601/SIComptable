<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">
<div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/searchJournal'); ?>">
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Par code</label>
                            <input type="text" class="form-control" id="validationCustom3" name="code">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom4">Par intitule</label>
                            <input type="text" class="form-control" id="validationCustom4" name="intitule">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Chercher</button>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <!-- CONTAINS debut -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Ajoutez un journal</strong>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate=""
                        action="<?php echo site_url('admin/ajoutJournal') ?>">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom3">intitulé</label>
                                <input type="text" class="form-control" id="validationCustom3" required=""
                                     name="intitule" required>
                                <div class="valid-feedback"> ok! </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom4">Code journal</label>
                                <input type="text" class="form-control" id="validationCustom4" required=""
                                     name="code" required>
                                <div class="valid-feedback"> ok! </div>
                            </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Ajouter ce journal</button>
                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <?php foreach ($allJournal as $journal) { ?>
            <div class="col-md-12 my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <strong class="card-title">
                                    <?php echo $journal->intitule ?>
                                </strong>
                                <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                        class="text-muted"><?php echo $journal->code ?></span></p>
                            </div>
                            <div class="col-4 text-right">
                                <span class="sparkline inlinebar"><a
                                        href="<?php echo site_url('admin/modifJournal/0/' . $journal->id); ?>"><button
                                            type="button" class="btn mb-2 btn-success">modifier</button></span></a>
                            </div>
                            <div class="col-4 text-right">
                                <span class="sparkline inlinebar"><a
                                        href="<?php echo site_url('admin/delJournal/' . $journal->id); ?>"><button
                                            type="button" class="btn mb-2 btn-danger">supprimer</button></span></a>
                            </div>
                        </div> <!-- /. row -->
                    </div> <!-- /. card-body -->
                </div> <!-- /. card -->
            </div>
        <?php } ?>
    </div>
    <!-- CONTAINS Fin -->


</div>
