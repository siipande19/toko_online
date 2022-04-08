<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url ('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TOKO VEDHO JAYA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url ('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KATEGORI
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ('kategori/oli') ?>">
                    <i class="fas fa-fw fa-oil-can"></i>
                    <span>OLI</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ('kategori/sparepart_mesin') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Sparepart MESIN</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ('kategori/sparepart_kelistrikan') ?>">
                    <i class="fas fa-fw fa-lightbulb"></i>
                    <span>Sparepart Kelistrikan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ('kategori/sparepart_body') ?>">
                    <i class="fas fa-fw fa-motorcycle"></i>
                    <span>Sparepart BODY</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ('kategori/rekomendasi') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Rekomendasi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="spk-moora/site">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Jasa Service</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Fitur Search -->
            <form  method="get" action="<?=base_url("dashboard/search")?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="navbar-form navbar-left">
                        <?php echo form_open('dashboard/cari_barang') ?>
                        <?php
                            if (empty($keyword)) {
                                $v = "";
                            }else{
                                $v = $keyword;
                            }
                        ?>
                            <input type="text" name="keyword" value="<?=$v?>"  placeholder="Search" class="form-control">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        <?php echo form_close() ?>
                    </div>
            </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <?php 
                                $keranjang = $this->cart->total_items(); 

                                
                                ?>
                                <li class="nav-item dropdown no-arrow mx-1">
                                  <a class="nav-link dropdown-toggle" href="<?=base_url('dashboard/detail_keranjang')?>">
                                    <i class="fas fa-shopping-cart fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter"><?=$this->cart->total_items()?></span>
                                </a>
                                <li class="nav-item dropdown no-arrow mx-1">
                                  <a class="nav-link dropdown-toggle" href="<?=base_url('pesanan/data_pesanan')?>">
                                    <i class="fas fa-boxes fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                            </ul>
                            <div class="topbar-divider d-none d-sm-block"></div>

                        <ul class="na navbar-nav navbar-right">
                            <?php 
                                if($this->session->userdata('username')) { ?>
                                <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                                <li class="ml-2"><?php echo anchor('auth/logout','Logout') ?></li>
                                <?php }else{ ?>
                                <li><?php  echo anchor('auth/login','Login') ?></li>

                                <?php } ?>
                        </ul>
                        </div>

                        

                    </ul>

                </nav>
                <!-- End of Topbar -->