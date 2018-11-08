<?php
	function id_create($conn,$table,$id_row,$ki_tu,$so_chu_so){
		$query=mysqli_query($conn,"SELECT MAX(RIGHT($id_row,$so_chu_so)) as maxnum FROM $table");
		$d1=mysqli_fetch_array($query);
			$a1=$d1['maxnum'];
			$id_create =$ki_tu;
			if($a1==null){
					
					for($i=1;$i<=($so_chu_so-1);$i++){
						$id_create=$id_create."0";
						}
					$id_create=$id_create."1";
					return $id_create;
			}else{
					$a2=$a1+1;
					$so_ki_tu_a2 = mb_strlen($a2) ;
					for($i=1;$i<=($so_chu_so-$so_ki_tu_a2);$i++){
						$id_create=$id_create."0";
					}
					$id_create=$id_create.$a2;
					return $id_create;
				
			};
		}
?>