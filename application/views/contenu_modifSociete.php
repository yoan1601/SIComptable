<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
    <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Mettre à jour information société</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/modifSociete/1'); ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" value="<?php echo $identite['id']; ?>" name="id">
                        <div class="form-row">
                          <div class="col-md-8 mb-3 col-md-offset-2">
                            <label for="validationCustom3">Nom de la societe</label>
                            <input type="text" class="form-control" id="validationCustom3" required="" value="<?php echo $identite['nom']; ?>" name="nom">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3  col-md-offset-2">
                            <label for="validationCustom4">Adresse</label>
                            <input type="text" class="form-control" id="validationCustom4" required="" value="<?php echo $identite['adresse']; ?>" name="adresse">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3  col-md-offset-2">
                            <label for="validationCustom4">Mot de passe</label>
                            <input type="password" class="form-control" id="validationCustom4" required="" value="<?php echo $identite['mdp']; ?>" name="mdp">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3 col-md-offset-2">
                            <label for="validationCustom3">Telephone</label>
                            <input type="tel" pattern="[0-9]{3} [0-9]{2} [0-9]{3} [0-9]{2}" class="form-control" id="validationCustom3" required="" value="<?php echo $identite['tel']; ?>" name="tel">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3 col-md-offset-2">
                            <label for="validationCustom3">Telecopie</label>
                            <input type="tel" pattern="[0-9]{3} [0-9]{2} [0-9]{3} [0-9]{2}" class="form-control" id="validationCustom3" required="" value="<?php echo $identite['telecopie']; ?>" name="telecopie">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3 col-md-offset-2">
                            <label for="validationCustom3">Objet</label>
                            <input type="text" class="form-control" id="validationCustom3" required="" value="<?php echo $identite['objet']; ?>" name="objet">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                          <div class="col-md-8 mb-3 col-md-offset-2">
                            <label for="validationCustom3">Logo</label>
                            <input type="file" class="form-control" id="validationCustom3" required="" name="logo">
                            <div class="valid-feedback"> ok! </div>
                          </div>
                        </div> <!-- /.form-row -->
                        <button class="btn btn-primary" type="submit">Modifier</button>
                      </form>
                      <a href="<?php echo site_url('admin/listeDevises'); ?>"><button type="button" class="btn mb-2 btn-warning">retour</button></a>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
    </div>
    <!-- CONTAINS Fin -->


</div>
