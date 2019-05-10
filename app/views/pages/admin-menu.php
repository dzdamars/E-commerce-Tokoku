<div class="container">
<div class="wrapper pull-left m listing">
    
    	<div class="page-title auto">
        	<a href="<?= SITE ?>/admin/add_menu" class="pull-right btn">Add Menu</a>
        	<div class="pull-left">
                <h1>Menu</h1>
                <p><?= $total ?> Menu</p>
            </div>
        </div>
        
        <?php
		if($total != 0){
		?>
        
        <form action="<?= SITE ?>/admin/bulk_delete_menu" method="post">
        <table class="list m" border="0" cellspacing="1">
        	<thead class="blue">
            	<th width="30"></th>
                <th>No</th>
                <th>Judul Menu</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <?php
			$no = $offset + 1;
			foreach($data as $d){
				if($d['status'] == 1){
					$status = 'Main Menu';	
				} 
				elseif($d['status'] == 2) {
					$status = 'Sub Menu';	
				}
			?>
            <tr>
            	<td><input type="checkbox" name="box[<?= $d['id_menu'] ?>]" value="<?= $d['id_menu'] ?>" /></td>
                <td><?= $no ?></td>
                <td><?= ucwords($d['judul_menu']) ?></td>
                <td><?= ucwords($status) ?></td>
                <td>
                	<a href="<?= SITE ?>/admin/edit_menu/<?= $d['id_menu'] ?>">Edit</a> / 
                	<a href="<?= SITE ?>/admin/delete_menu/<?= $d['id_menu'] ?>">Delete</a>
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
		<div style="width:100%; height:180px;" class="pull-left"></div>
        
    </div>
    </div>