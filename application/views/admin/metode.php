<div class="container">
    <h2 class="mb-5">Metode</h2>
    <h4>Data Rating</h4>
    <div class="row" style="overflow-x:auto;">
        <div class="col-12 col-md-12">
            <table class="table table-bordered">
                <tr style="background-color: #2f5d62;" class="text-white">
                    <th>User | Barang</th>
                    <?php foreach ($barang as $row) {?>
                        <th><?=$row->id_barang ?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($user as $key) {?>
                <tr>
                    <td><?=$key->nama ?></td>
                    <?php foreach ($barang as $row) {?>
                        <td><?php if(! empty($detail_pesanan[$key->id][$row->id_barang])){ echo $detail_pesanan[$key->id][$row->id_barang];} ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br>
    <h4>Adjusted Cosine</h4>
    <div class="row" style="overflow-x:auto;">
        <div class="col-12 col-md-12">
            <table class="table table-bordered">
                <tr style="background-color: #2f5d62;" class="text-white">
                    <th>User | Barang</th>
                    <?php foreach ($barang as $row) {?>
                        <th><?=$row->id_barang ?></th>
                    <?php } ?>
                    <th>Rata - Rata</th>
                </tr>
                <?php foreach ($user as $key) {?>
                <tr>
                    <td><?=$key->nama ?></td>
                    <?php foreach ($barang as $row) {?>
                        <td><?php if(! empty($detail_pesanan[$key->id][$row->id_barang])){ echo $detail_pesanan[$key->id][$row->id_barang];} ?></td>
                    <?php } ?>
                    <td><?=$total_pesanan_user[$key->id] ?> / <?=$jumlah_pesanan_user[$key->id] ?> = <?=round($rata_rating[$key->id],2) ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-12 col-md-12">
            <table class="table table-bordered">
                <tr style="background-color: #2f5d62;" class="text-white">
                    <th>Barang</th>
                    <?php foreach ($barang as $row) {?>
                        <th><?=$row->id_barang ?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($barang as $row) {?>
                <tr>
                    <td><?=$row->id_barang ?></td>
                    <?php foreach ($barang as $value) {?>
                        <td><?=round($total_adjusted[$row->id_barang][$value->id_barang],6) ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br>
    <h4>Simple Weighted Average</h4>
     <div class="row" style="overflow-x:auto;">
        <div class="col-12 col-md-12">
            <table class="table table-bordered">
                <tr style="background-color: #2f5d62;" class="text-white">
                    <th>User | Barang</th>
                    <?php foreach ($barang as $row) {?>
                        <th><?=$row->id_barang ?></th>
                    <?php } ?>
                </tr>
                <?php foreach ($user as $key) {?>
                <tr>
                    <td><?=$key->nama ?></td>
                    <?php foreach ($barang as $row) {?>
                        <td><?=$w_average[$key->id][$row->id_barang] ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br>
    <h4>Kesimpulan</h4>
    <div class="row">
        <div class="col-12 col-md-12">
            <table class="table table-bordered">
                <tr style="background-color: #2f5d62;" class="text-white">
                    <th>User</th>
                    <th>Rekomendasi Barang</th>
                </tr>
                <?php foreach ($user as $key) {?>
                <tr>
                    <td><?=$key->nama ?></td>
                    <td><?php 
                    if (! empty($result_id[$key->id])) {
                        for ($i=0; $i < count($result_id[$key->id]); $i++) { 
                            echo $result_id[$key->id][$i];
                            echo "<br>";
                        }
                    }
                    
                     ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>