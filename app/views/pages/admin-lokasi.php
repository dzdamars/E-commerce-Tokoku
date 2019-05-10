<div class="container">
<div class="wrapper pull-left m listing">
    
    	<div class="page-title auto">
        	<a href="<?= SITE ?>/admin/add_lokasi" class="pull-right btn">Add Lokasi</a>
        	<div class="pull-left">
                <h1>Lokasi</h1>
                <p><?= $total ?> Lokasi</p>
            </div>
        </div>
        
        <?php
		if($total != 0){
		?>
        
        <form action="<?= SITE ?>/admin/bulk_delete_lokasi" method="post">
        <table class="list m" border="0" cellspacing="1">
        	<thead class="blue">
            	<th width="30"></th>
                <th>No</th>
                <th>Nama lokasi</th>
                <th>Action</th>
            </thead>
            <?php
			$no = $offset + 1;
			foreach($data as $d){
			?>
            <tr>
            	<td><input type="checkbox" name="box[<?= $d['id_lokasi'] ?>]" value="<?= $d['id_lokasi'] ?>" /></td>
                <td><?= $no ?></td>
                <td><?= ucwords($d['lokasi']) ?></td>
                <td>
                	<a href="<?= SITE ?>/admin/edit_lokasi/<?= $d['id_lokasi'] ?>">Edit</a> / 
                	<a href="<?= SITE ?>/admin/delete_lokasi/<?= $d['id_lokasi'] ?>">Delete</a>
                </td>
            </tr>
            <?php
				$no++;
			}
			?>
        </table>
        
        <button type="submit" name="submit" class="btn pull-left">Delete Selected</button>
        
        </form>
        <?php
		
		echo $pagination;
		
		} else {
		?>
        
        <a href="<?= SITE ?>/admin" class="btn pull-left">Back to Home</a>
        
        <?php	
		}
		?>
		<div style="width:100%; height:65px;" class="pull-left"></div>
        
    </div>
    </div>