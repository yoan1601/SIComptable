<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Mettre à jour comptabilité</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/majCompta') ?>">
                        <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="validationCustom3">date debut exercice</label>
                            <input type="date" class="form-control" id="validationCustom3" required="" name="dateDebutExercice" value="<?php echo $comptabilite["debutexercice"] ?>" required>
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="devise">Devise de tenue de compte</label>
                            <!--<select name="devise">
                              <?php //foreach($allDevises as $devise) { ?>
                                <option value="<?php //echo $devise->id ?>"><?php //echo $devise->description ?></option>
                              <?php //} ?>
                              </select>-->
                              <input type="hidden" name="deviseTenue" value="<?php echo $deviseTenue->id ?>">
                            <p><?php echo $deviseTenue->description ?></p>
                            <div class="valid-feedback"> ok! </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom3">Capital</label>
                            <input type="number" class="form-control" id="validationCustom3" required="" min="0" name="capital" value="<?php echo round($comptabilite["capital"]) ?>" required>
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <!-- CONTAINS Fin -->


</div>
