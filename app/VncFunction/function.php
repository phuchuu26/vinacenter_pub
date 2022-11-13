<?php
	function menuMulti($data,$parent_id = 0,$str = "---|",$select=0){
		foreach($data as $val){
			$id = $val["id"];
			$name = $val["name"];
			if($val["parent_id"] == $parent_id){
				if($select !=0 && $id == $select){
					echo '<option value="'.$id .'" selected>'.$str." ".$name.'</option>';
				}else{
					echo '<option value="'.$id .'">'.$str." ".$name.'</option>';
				}			
				menuMulti($data,$id,$str." ---|",$select);
			}			
		}
	}
	function listCate($data,$parent = 0,$str=""){
		foreach($data as $val){
			$id = $val["id"];
			$name = $val["name"];
			if($val['parent_id'] == $parent ){
				echo '
					<tr class="list_data">';	        		
	        		if($str == ""){
	        			echo '<td class="list_td alignleft"><b>'.$str." ".$name.'</b></td>';
	        		}else{
	        			echo '<td class="list_td alignleft">'.$str." ".$name.'</td>';
	        		} 
	        	
					if(Auth::user()->role==1){
	            	echo '<td style="text-align: center;"><a href="edit/'.$id.'"><img src="../../public/vnc_admin/images/edit.png "/></a></td>
	            	<td style="text-align: center;"><a href="delete/'.$id.'" onclick="return xacnhanxoa(\'Bạn thật sự muốn xóa danh mục này?\')"><img src="../../public/vnc_admin/images/delete.png" /></a>';
	        		}
	        		echo '</td>
	    			</tr>
				' ;
				listCate($data,$id,$str." ---|");
			}
			
		}
	}
	function  countOption($data,$product_id){
		$flag = ""; 
		foreach ($data as $val) {
			$id = $val["product_id"];
			if($id == $product_id){
				$flag = 1;break;
			}else{
				$flag = 0;
			}
		}
		return $flag;
	}

	function subMenu0($data,$id){
		if(!empty($data)){
			echo '<ul class="level0" style="display: none;">';
			foreach($data as $item){
				if($item["parent_id"] == $id){				
					echo '<li class="level0">				
						<a href="'.route('getProductType',['alias' => $item["alias"]]).'">'
						.$item["name"].
						'</a>';
					//subMenu($data,$item["id"]);
					echo "</li>";
				}			
			}
			echo "</ul>";
		}
	}
	function subMenu1($data,$id){
		if(!empty($data)){
			echo '<ul class="level1" style="display: none;">';
			foreach($data as $item){
				if($item["parent_id"] == $id){				
					echo '<li class="level1">				
						<a href="'.route('getProductType',['alias' => $item["alias"]]).'">'
						.$item["name"].
						'</a>';
					//subMenu($data,$item["id"]);
					echo "</li>";
				}			
			}
			echo "</ul>";
		}
	}
?>