<?php 

	function message($type,$title,$desc){
		echo '	<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
					<b>'.$title.'</b> '.$desc.'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>';
	}
	// dataCount=toplam veri sayısı, adet=bir sayfada kaçtane göstereceği, paramerter=diğer get parametreleri
	function pagination($dataCount,$adet,$paramerter){
		if($dataCount>$adet){
			$pageCount=($dataCount)/$adet+1;
			echo '<nav aria-label="Page navigation"><ul class="pagination ts-center__horizontal">';
			for($i=1;$i<$pageCount;$i++){
				
				$a="";
				if($_GET["p"]==$i || (!isset($_GET["p"]) && $i==1)) {
					$a="active";
				}
				$server=explode("?",$_SERVER["REQUEST_URI"]);
				echo '<li class="page-item '.$a.'">
						<a class="page-link" href="'.$server[0].'?'.($paramerter==""?"":$paramerter.'&').'p='.$i.'">'.$i.'</a>
					</li>';		
			}		
			echo '</ul></nav>';
		}
	}
?>