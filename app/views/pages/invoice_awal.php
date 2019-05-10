<div class="container">
    	<div class="listing" >
    	<div class="page-title auto">
        	<div class="pull-left"  style="margin:30px 0;">
                <h1>Invoice</h1>
                <p><?= $total ?> Invoice pembelian</p>
            </div>
        </div>
        </div>
        
        <?php
		if($total != 0){
			$member = $this->db->fetch("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $data[0]['id_member']));
		?>
        
        <table class="list m" border="0" cellspacing="1">
        	<thead class="red">
                <th>No</th>
                <th>Invoice</th>
                <th>Tanggal Pemesanan</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <?php
			$no = $offset + 1;
			$subtotal = '';
			foreach($data as $d){			
				if($d['status'] == 0){
					$status = 'Belum Melakukan Pembayaran';	}
				elseif($d['status'] == 1){
					$status = 'Menunggu Konfirmasi';	}
				elseif($d['status'] == 2){
					$status = 'Lunas';	}
				elseif($d['status'] == 3){
					$status = 'Bukti Pembayaran Ditolak';	}
                elseif($d['status'] == 4){
                    $status = 'Barang Sedang Dikirim'; }
                elseif($data[0]['status'] == 5){
                $status = 'Barang Sudah Diterima';  }
			?>
            <tr>
                <td><?= $no ?></td>
                <td>#<?= $d['invoice_number'] ?></td>
                <td><?= $d['tgl'] ?></td>
                <td>Rp.<?= number_format($d['total_bayar'],"0",".",".") ?></td>
                <td><?= $status ?></td>
                <td>
                	<?php
					if($d['status'] != 0){
						echo "<a href='".SITE."/public/images/invoice/".$d['bp']."'>Lihat Bukti Pembayaran</a> / ";	
					}
					?>
                    <a href="<?= SITE ?>/invoice/invoice_detail/<?= $d['invoice_number'] ?>">Detail</a>
                </td>
            </tr>
            <?php
				$no++;
			}
			?>
        </table>
        
        <?php
		echo $pagination;
		} else {
			if(isset($_SESSION[SESS]['admin'])){
				$path = '/admin';
			} else {
				$parth = '';	
			}
		?>
        <a href="<?= SITE.$path ?>" class="btn btn-large pull-left" style="margin-bottom:55px;">Back to Home</a>
        <?php
		}
		?>
		<div class="pull-left" style="margin-bottom:325px; width:100%"></div>
</div>