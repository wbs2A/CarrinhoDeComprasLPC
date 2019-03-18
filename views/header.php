<?php echo "<html>";
        echo "<head>";
          echo "<title>Carrinho de compras</title>";
          echo '<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="description" content="Colo Shop Template">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="../js/jquery-3.2.1.min.js"></script>
                <script src="../js/app.js"></script>
				<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
				<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/src/scss/_animate.scss">
				<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
				<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
                ';
        echo "</head>";
        echo '<body>';
        session_start();
		if (isset($_SESSION["user"])) {
			$user=$_SESSION["user"];
			echo'<script type="text/javascript">
			    $("document").ready(function(){
			    	t=$(`#navUserTopo`).parent();
			    	$(`#navUserTopo`).remove();
			    	t2=$(`#navUserTopo`).parent();
			    	$(`#navUserTopo`).remove();
			    	$(t).prepend(`<span id="navUserTopo">'.$user->NomeComp.'</span>`);
			    	$(t2).prepend(`<span id="navUserTopo">'.$user->NomeComp.'</span>`);
			    	$(`a#navUserBase`).each(function( index ) {
					  $(this).attr(`href`,`perfil.php`);
					  $(this).text(`Perfil`);
					});
			    	$(t).append(`<a href="controller.php?logout"><span  class="col-4">Sair</span></a>`);
			    	$(t2).append(`<a href="controller.php?logout"><span  class="col-4">Sair</span></a>`);
			    });
			</script>';
		}

?>
