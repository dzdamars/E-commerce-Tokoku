<div class="container">
<div class="wrapper pull-left m listing">
    
    	<div class="page-title auto">
        	<a href="<?= SITE ?>/admin/add_kategori" class="pull-right btn">Add Kategori</a>
        	<div class="pull-left">
                <h1>Kategori</h1>
                <p><?= $total ?> Kategori</p>
            </div>
        </div>
        
        <?php
		if($total != 0){
		?>
        
        <form action="<?= SITE ?>/admin/bulk_delete_kategori" method="post">
        <table class="list m" border="0" cellspacing="1">
        	<thead class="blue">
            	<th width="30"></th>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </thead>
            <?php
			$no = $offset + 1;
			foreach($data as $d){
			?>
            <tr>
            	<td><input type="checkbox" name="box[<?= $d['id_kategori'] ?>]" value="<?= $d['id_kategori'] ?>" /></td>
                <td><?= $no ?></td>
                <td><?= ucwords($d['kategori']) ?></td>
                <td>
                	<a href="<?= SITE ?>/admin/edit_kategori/<?= $d['id_kategori'] ?>">Edit</a> / 
                	<a href="<?= SITE ?>/admin/delete_kategori/<?= $d['id_kategori'] ?>">Delete</a>
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
		
        
    </div>
    </div>