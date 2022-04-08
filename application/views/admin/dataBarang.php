<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <table class="table table-bordered table-hover" id="dataTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA BARANG</th>
                <th>KETERANGAN</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>RATING</th>
                <th>STOK</th>
                <th>DETAIL</th>
                <th>EDIT</th>
                <th>DEL</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $no=1;
                foreach($barang as $brg) :?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $brg->nama_barang ?></td>
                    <td><?php echo $brg->keterangan ?></td>
                    <td><?php echo $brg->kategori ?></td>
                    <td><?php echo $brg->harga ?></td>
                    <td><?php echo $brg->rating ?></td>
                    <td><?php echo $brg->stok ?></td>
                    <td><?php echo anchor('admin/dataBarang/detail/' .$brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>

                    <td><?php echo anchor('admin/dataBarang/edit/' .$brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                    <td><?php echo anchor('admin/dataBarang/hapus/' .$brg->id_barang,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH BARANG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/dataBarang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>NAMA BARANG</label>
        		<input type="text" name="nama_barang" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>KETERANGAN</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>KATEGORI</label>
        		<select class="form-control" name="kategori">
                    <option>OLI</option>
                    <option>Sparepart Mesin</option>
                    <option>Sparepart Kelistrikan</option>
                    <option>Sparepart Body</option>  
                </select>
        	</div>
        	<div class="form-group">
        		<label>HARGA</label>
        		<input type="text" name="harga" class="form-control">
        	</div>
            <div class="form-group">
                <label>RATING</label>
                <input type="text" name="rating" class="form-control">
            </div>
        	<div class="form-group">
        		<label>STOK</label>
        		<input type="text" name="stok" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>GAMBAR</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
