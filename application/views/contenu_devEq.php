<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Mettre à jour devise equivalence</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/majDevEq') ?>">
                        <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="validationCustom3">Taux en <?php echo $deviseTenue->description ?></label>
                            <input type="number" class="form-control" id="validationCustom3" required="" name="taux" step="0.01" required>
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-12 mb-3">
                          <label for="devise">de la devise de reference</label>
                          </div>
                          <div class="col-md-12 mb-3">
                            <select name="reference">
                              <?php foreach($allDevises as $devise) { ?>
                                <option value="<?php echo $devise->id ?>"><?php echo $devise->description ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div> <!-- /.form-row -->
                        <input type="hidden" name="deviseTenue" value="<?php echo($deviseTenue->id) ?>">
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <!-- CONTAINS Fin -->


</div>
