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
                <a href="#"><img src="<?php echo(site_url('files/photos/'.$identite['logo'])); ?>" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/modifSociete/0'); ?>">modifier info</a></li>
                </ul>
                 <!-- MODIFICATIONS 14/05/2023 -->
                 <ul>
                    <li class="active"><a href="<?php echo site_url('admin/createDocuments'); ?>">modifier documents</a></li>
                </ul>
                <!-- MODIFICATIONS 14/05/2023 -->
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/compta'); ?>">modifier compta</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeComptes'); ?>">liste comptes</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeTiers'); ?>">liste tiers</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeDevises'); ?>">liste devises</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeJournals'); ?>">liste journaux</a></li>
                </ul>
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
            </nav>
            <!-- Button Group -->

            <!-- Cart Menu -->

            <!-- Social Button -->

        </header>
        <!-- Header Area End -->
