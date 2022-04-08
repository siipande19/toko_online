<div class="container-fluid">
	
	<h4>Invoice Pemesanan Produk</h4>

	<table class="table table-bordered table-hover table-striped" id="datatable">
		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesan</th>
			<th>Alamat Pengiriman</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th>Status</th>
			<th colspan="2">Aksi</th>
		</tr>

		<?php foreach ($invoice as $inv): ?>
			<tr>
				<td><?php echo $inv-> id ?></td>
				<td><?php echo $inv-> nama ?></td>
				<td><?php echo $inv-> alamat ?></td>
				<td><?php echo $inv-> tgl_pesan ?></td>
				<td><?php echo $inv-> batas_bayar ?></td>
				<td><?=$status_invoice_nama[$inv->id] ?></td>
				<td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
				<?php if($button_able[$inv->id] == ''){ ?>
				<td>
					<?php if($status_invoice_nama[$inv->id] == "Sudah Bayar"){?>
						<a href='' data-toggle='modal' data-target='#exampleModal<?=$inv->id?>'>Bukti Pembayaran</a>
					<?php } ?>
					<?php echo anchor('admin/invoice/status/'.$inv->id, '<div class="btn btn-sm '.$button_status[$inv->id].'" >'.$button_nama[$inv->id].'</div>') ?>
				</td>
				<?php }else{ ?>
					<td><i><?=$button_nama[$inv->id] ?></i></td>
				<?php } ?>
			</tr>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal<?=$inv->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$inv->id?>" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel<?=$inv->id?>">Bukti Pembayaran</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <img src="<?=base_url()?>uploads/bukti/<?=$inv->bukti ?>" style="width: 100%" alt="Image">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
		<?php endforeach; ?>
	</table>
</div>