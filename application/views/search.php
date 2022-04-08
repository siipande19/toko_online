<div class="container-fluid">
       
<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand"></a>
  <form method="get" action="<?=base_url('dashboard/search')?>" class="form-inline">
    <string class="text-light">Rating : &nbsp</string>
    <div class="row">
          <div class="col-md-8">
            <input type="hidden" name="keyword" value="<?=$keyword?>">
            <input type="number" name="rating" class="rating ss text-warning mt-1" value="<?=empty($rat)?0:$rat?>"/>
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i></button>
          </div>
        </div>
  </form>
</nav>
    <div class="row text-center mt-3">
        <?php
          if (empty($barang)) {
            echo '<h5 class="ml-3">Barang Dengan Nama '.$keyword.' Tidak Ada</h5>';
          }
         
        ?>

        <?php foreach ($barang as $brg) : ?>

        <div class="card ml-3 mb-3" style="width: 14rem;">
          <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title mb-1"><?php echo $brg -> nama_barang; ?></h5>
            <small><?php echo $brg -> keterangan; ?></small><br>
            
            <span class="badge badge-pill badge-success">Rp. <?php echo number_format($brg -> harga , 0,',','.') ?></span>
            <div class="rating text-warning"><?=$brg->rating?></div>
            <?php echo anchor ('dashboard/tambah_ke_keranjang/' .$brg->id_barang,'<div class="btn btn-sm btn-primary btn-block"><i class="fa fa-cart-plus"></i> Tambah ke Keranjang </div>')  ?>

            <?php echo anchor ('dashboard/detail/' .$brg->id_barang,'<div class="btn btn-sm btn-success mt-1  btn-block"><i class="fa fa-eye"></i> Detail </div>')  ?>
          </div>
        </div>

    <?php  endforeach; ?>
    </div>
</div>