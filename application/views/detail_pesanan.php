<div class="container-fluid">
	<h4>Detail Pesanan #<?=$kode_invoice?></h4>

	<!-- <?php print_r($pesanan);?> -->
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Rating</th>
			<th>Sub-Total</th>
		</tr>
		
		<?php 
		$no=1;
		$total = 0;
		foreach ($pesanan as $items) { 
		$subtotal = $items['jumlah']*$items['harga'];
		$total += $subtotal;
		$id_barang = $items['id_barang'];

		?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $items['nama_barang'] ?></td>
			<td><?php echo $items['jumlah'] ?>pcs</td>
			<td align="right">Rp. <?php echo number_format($items['harga'], 0,',','.') ?></td>
			<td>
				<?php
				if ($items['rating'] == 0 & $items['status'] == 3) {
				?>
				<input type="number" name="name" class="rating rrr text-warning" data-id_invoice="<?=$items['id_invoice']?>" data-kode_invoice="<?=$kode_invoice?>" data-id_barang="<?=$id_barang?>" value="0"/>
				<?php
				}else{
				?>
				<div class="rating text-warning"><?=$items['rating']?></div>
				<?php
				}
				?>
				
			</td>
			<td align="right">Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
		</tr>
		<?php } ?>

		<tr>
			<td colspan="5">JUMLAH TAGIHAN</td>
			<td align="right"><strong>Rp. <?php echo number_format($total, 0,',','.') ?></strong></td>
		</tr>
	</table>
	

	<!-- <div align="right">
		<a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
		<a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjut Belanja</div></a>
		<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
	</div> -->
</div>

