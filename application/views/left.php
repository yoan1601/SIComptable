<!-- Header Area Start -->
<?php $identite = $this->session->identite; ?>
<header class="header-area clearfix" style="
  position: inherit;
  margin-top: 4%;
">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="#"><img src="<?php echo (site_url('files/photos/' . $identite['logo'])); ?>" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <div class="my-menu">
            <ul class="menu">
                <li class="active" id="main"><a href="#">Société ▼</a>
                    <ul class="sub-menu">
                        <li class="active"><a href="<?php echo site_url('admin/modifSociete/0'); ?>">modifier info</a>
                        </li>
                        <li class="active"><a href="<?php echo site_url('admin/createDocuments'); ?>">modifier
                                documents</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/compta'); ?>">modifier compta</a></li>
                    </ul>
                </li>
                <li class="active" id="main"><a href="#">Listes ▼</a>
                    <ul class="sub-menu">
                        <li class="active"><a href="<?php echo site_url('admin/listeComptes'); ?>" target="_blank">comptes</a>
                        </li>

                        <li class="active"><a href="<?php echo site_url('admin/listeTiers'); ?>">tiers</a></li>

                        <li class="active"><a href="<?php echo site_url('admin/listeDevises'); ?>">devises</a>
                        </li>

                        <li class="active"><a href="<?php echo site_url('admin/listeJournals'); ?>">journaux</a>
                        </li>
                        
                        <li class="active"><a href="<?php echo site_url('admin/listeCentre'); ?>">centres</a>
                        </li>

                        <li class="active"><a href="<?php echo site_url('admin/listeProduction'); ?>">productions</a>
                        </li>

                    </ul>
                </li>
                <li class="active" id="main"><a href="#">Statistiques ▼</a>
                    <ul class="sub-menu">
                        <li class="active"><a href="<?php echo site_url('stat/menu_init'); ?>">cout</a>
                        </li>
                        <li class="active"><a href="<?php echo site_url('stat/revenu'); ?>">cout de revient</a></li>
                        <li class="active"><a href="<?php echo site_url('stat/seuil'); ?>">seuilde rentabilite</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul>
            <li class="active"><a href="<?php echo site_url('admin/deviseEquiv'); ?>">devise equivalence</a></li>
        </ul>
        <ul>
            <li class="active"><a href="<?php echo site_url('admin/goEcriture'); ?>">écriture</a></li>
        </ul>
        <ul>
            <li class="active"><a href="<?php echo site_url('nyAvo/accueilGrandLivre'); ?>">grand livre</a></li>
        </ul>
        <ul>
            <li class="active"><a href="<?php echo site_url('nyAvo/balance'); ?>">balance</a></li>
        </ul>
        <ul>
            <li class="active"><a href="<?php echo site_url('test/form'); ?>">test</a></li>
        </ul>
        <ul>
            <li class="active"><a href="<?php echo site_url('test/suppletive'); ?>">suppletive</a></li>
        </ul>
    </nav>
    <!-- <div class="btn-group">
        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked />
        <label class="btn btn-secondary" for="option1">Checked</label>

        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
        <label class="btn btn-secondary" for="option2">Radio</label>

        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" />
        <label class="btn btn-secondary" for="option3">Radio</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled />
        <label class="form-check-label" for="flexCheckDisabled">Disabled checkbox</label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled/>
        <label class="form-check-label" for="flexCheckCheckedDisabled">Disabled checked checkbox</label>
    </div> -->
    <!-- Button Group -->

    <!-- Cart Menu -->

    <!-- Social Button -->

</header>
<!-- Header Area End -->
