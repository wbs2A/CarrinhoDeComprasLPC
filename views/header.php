<?php echo "<html>";
        echo "<head>";
          echo "<title>Carrinho de compras</title>";
          echo '<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="description" content="Colo Shop Template">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="../js/jquery-3.2.1.min.js"></script>';
				echo '<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.css">
				<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
				<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.3.4/src/scss/_animate.scss">
				<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
				<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
				<script src="../js/jquery-3.2.1.min.js"></script>
                <script src="../js/app.js"></script>
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
			    	$(t).prepend(`<span id="navUserTopo" class="p-0 m-0 row justify-content-center">'.$user->NomeComp.'</span>`);
			    	$(t2).prepend(`<span id="navUserTopo" class="p-0 m-0 row justify-content-center">'.$user->NomeComp.'</span>`);
			    	$(`a#navUserBase`).each(function( index ) {
					  $(this).attr(`href`,`perfil.php`);
					  $(this).addClass("row m-0 p-0 w-auto");
					  $(this).text(`Perfil`);
					});
			    	$(t).append(`<a href="controller.php?logout" class="text-center row m-0 p-0 w-auto"><span  class="col-4">Sair</span></a>`);
			    	$(t2).append(`<a href="controller.php?logout" class="text-center row m-0 p-0"><span  class="col-4">Sair</span></a>`);
			    });
			</script>';
		}

?>
