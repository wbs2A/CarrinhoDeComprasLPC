<?php
include 'header.php';
include 'navbar.php';
?>

		<!-- Slider -->

		<div class="main_slider" style="background-image:url(../images/slider_1.jpg);">
			<div class="container fill_height">
				<div class="row align-items-center fill_height">
					<div class="col">
						<div class="main_slider_content">
							<h6>Coleção Outono 2019</h6>
							<h1>Ganhe 30% de desconto na nova coleção</h1>
							<div class="red_button shop_now_button"><a href="#">compre agora</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Banner -->

		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(../images/banner_1.jpg)">
							<div class="banner_category">
								<a>feminino</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(../images/banner_2.jpg)">
							<div class="banner_category">
								<a>acessórios</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(../images/banner_3.jpg)">
							<div class="banner_category">
								<a>masculino</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- New Arrivals -->

		<div class="new_arrivals">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title new_arrivals_title">
							<h2>Novidades</h2>
						</div>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col text-center">
						<div class="new_arrivals_sorting">
							<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">todos</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">feminino</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">acessórios</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">masculino</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div id="produto" class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
							<?php
								// create a new cURL resource
								$ch = curl_init("http://localhost/CarrinhoDeComprasLPC/views/controller.php?produto");
								$t=curl_exec($ch);
 								curl_close($ch);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Frete grátis</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Pague na entrega</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Retorno em 45 dias</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Aberto a semana toda</h6>
								<p>8:00 - 21:00</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	


<?php
include 'footer.php';
?>
