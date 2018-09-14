<?php
	$sql ="SELECT *FROM carrinho WHERE email='$email' AND status='aberto'";
	$query = $con->query($sql);
		while($dados =$query->fetch_array()){
			$num = mysqli_num_rows($query);
		}
?>