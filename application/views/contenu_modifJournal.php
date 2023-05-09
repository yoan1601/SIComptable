<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

  <!-- CONTAINS debut -->

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Mettre à jour journal</strong>
        </div>
        <div class="card-body">
          <form class="needs-validation" novalidate=""
            action="<?php echo site_url('admin/modifJournal/1/' . $journal->id); ?>">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom3">intitulé</label>
                <input type="text" class="form-control" id="validationCustom3" required=""
                  value="<?php echo $journal->intitule ?>" name="intitule">
                <div class="valid-feedback"> ok! </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom4">Code journal</label>
                <input type="text" class="form-control" id="validationCustom4" required=""
                  value="<?php echo $journal->code ?>" name="code">
                <div class="valid-feedback"> ok! </div>
              </div>
            </div> <!-- /.form-row -->
            <button class="btn btn-primary" type="submit">Modifier</button>
          </form>
          <a href="<?php echo site_url('admin/listeJournals') ?>"><button type="button"
              class="btn mb-2 btn-warning">retour</button></a>
        </div> <!-- /.card-body -->
      </div> <!-- /.card -->
    </div>
  </div>
  <!-- CONTAINS Fin -->


</div>
