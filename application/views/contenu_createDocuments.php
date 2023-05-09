<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->

    <div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Advanced Validation</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?php echo site_url('admin/modifDocuments'); ?>" enctype="multipart/form-data" method="post">
                <div class="form-row">
                    <div class="col-md-8 mb-3 col-md-offset-2">
                    <label for="validationCustom3">NIF</label>
                    <input type="text" class="form-control" id="validationCustom3" required="" name="nif">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-8 mb-3 col-md-offset-2">
                    <label for="validationCustom3">Scan NIF</label>
                    <input type="file" class="form-control" id="validationCustom3" name="scannif">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-8 mb-3  col-md-offset-2">
                    <label for="validationCustom4">STAT</label>
                    <input type="text" class="form-control" id="validationCustom4" required="" name="ns">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-8 mb-3 col-md-offset-2">
                    <label for="validationCustom3">Scan STAT</label>
                    <input type="file" class="form-control" id="validationCustom3" name="scanns">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-8 mb-3  col-md-offset-2">
                    <label for="validationCustom4">NRCS</label>
                    <input type="text" class="form-control" id="validationCustom4" required="" name="nrcs">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                    <div class="col-md-8 mb-3 col-md-offset-2">
                    <label for="validationCustom3">Scan NRCS</label>
                    <input type="file" class="form-control" id="validationCustom3" name="scannrcs">
                    <div class="valid-feedback"> ok! </div>
                    </div>
                </div> <!-- /.form-row -->
                <button class="btn btn-primary" type="submit">Modifier</button>
                </form>
            </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
    <!-- CONTAINS Fin -->


</div>
