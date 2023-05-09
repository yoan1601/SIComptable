<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">

    <!-- CONTAINS debut -->
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">NIF</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted"><?php echo $allDocs['nif']; ?></span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scannif']); ?>" target="_blank" rel="noreferrer noopener"><button type="button" class="btn mb-2 btn-success">afficher</button></span></a>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scannif']); ?>" download="scan_nif"><button type="button" class="btn mb-2 btn">telecharger</button></span></a>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div>
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">STAT</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted"><?php echo $allDocs['stat']; ?></span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scanstat']); ?>" target="_blank" rel="noreferrer noopener"><button type="button" class="btn mb-2 btn-success">afficher</button></span></a>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scanstat']); ?>" download="scan_stat"><button type="button" class="btn mb-2 btn">telecharger</button></span></a>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div>
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">NRCS</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted"><?php echo $allDocs['nrcs']; ?></span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scannrcs']); ?>" target="_blank" rel="noreferrer noopener"><button type="button" class="btn mb-2 btn-success">afficher</button></span></a>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><a href="<?php echo site_url('files/docs/'.$allDocs['scannrcs']); ?>" download="scan_nrcs"><button type="button" class="btn mb-2 btn">telecharger</button></span></a>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div>
    </div>
    <!-- CONTAINS Fin -->


</div>
