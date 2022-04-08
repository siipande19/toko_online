<div class="container-fluid">
	<h4>Detail Pesanan</h4>

	<!-- <?php print_r($pesanan);?> -->
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>No Invoice</th>
			<th>Total Barang</th>
			<th>Total Qty</th>
			<th>Alamat</th>
			<th>Status</th>
		</tr>
		
		<?php 
		$no=1;
		$total = 0;
		foreach ($pesanan as $items) { 
		switch ($items['status']) {
			case "1":
				$status = "Sudah Bayar";
				break;
			case "2":
				$status = "Sedang Dikirim";
				break;
			case "3":
				$status = "Barang sudah diterima (Selesai)";
				break;
			default:
				$status = "Belum Bayar";
				break;
		}
		?>

		<tr>
			<td><?=$no++?></td>
			<td><a href="<?=base_url('pesanan/detail_pesanan/'.$items['kode_invoice'])?>">#<?=$items['kode_invoice']?></a></td>
			<td align="right"><?=$items['countid']." Item"?></td>
			<td align="right"><?=$items['sumqty']." Pcs"?></td>
			<td><?=$items['alamat']." Item"?></td>
			<td>
				<?=$status?>
				<?php if($status == "Belum Bayar"){ ?>
					<br><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Bayar</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Input Bukti Pembayaran</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form action="<?=site_url('pesanan/upload_bukti/'.$items['id'])?>" method="POST" role="form" enctype="multipart/form-data">
					      <div class="modal-body">
					        <input type="file" name="input_bukti" id="input" class="form-control" required="required">
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Kirim</button>
					      </div>
					  	</form>
					    </div>
					  </div>
					</div>
				<?php }else if($status == "Sedang Dikirim"){ ?>
					<br>
					<a href="<?=site_url('pesanan/diterima/'.$items['id'])?>"><button type="button" class="btn btn-danger">Pesanan Diterima</button></a>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>

		<!-- <tr>
			<td colspan="4">JUMLAH TAGIHAN</td>
			<td align="right">Rp. <?php echo number_format($total, 0,',','.') ?></td>
		</tr> -->
	</table>
<!-- 
	<div align="right">
		<a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
		<a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjut Belanja</div></a>
		<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
	</div> -->
</div>