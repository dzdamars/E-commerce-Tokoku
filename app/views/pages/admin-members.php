<div class="container">
<div class="wrapper pull-left m listing">
    
    	<div class="page-title auto">
        	<a href="<?= SITE ?>/admin/add_member" class="pull-right btn">Add Member</a>
        	<div class="pull-left">
                <h1>Members</h1>
                <p><?= $total ?> Members terdaftar</p>
            </div>
        </div>
        
        <?php
		if($total != 0){
		?>
        
        <form action="<?= SITE ?>/admin/bulk_delete_member" method="post">
        <table class="list m" border="0" cellspacing="1">
        	<thead class="blue">
            	<th width="30"></th>
                <th>No</th>
                <th>Name Lengkap</th>
                <th>Action</th>
            </thead>
            <?php
			$no = $offset + 1;
			foreach($data as $d){
			?>
            <tr>
            	<td><input type="checkbox" name="box[<?= $d['id_member'] ?>]" value="<?= $d['id_member'] ?>" /></td>
                <td><?= $no ?></td>
                <td><?= ucwords($d['nama']) ?></td>
                <td>
                	<a href="<?= SITE ?>/admin/edit_member/<?= $d['id_member'] ?>">Edit</a> / 
                	<a href="<?= SITE ?>/admin/delete_member/<?= $d['id_member'] ?>">Delete</a>
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
		<div style="width:100%; height:140px;" class="pull-left"></div>
        
    </div>
    </div>