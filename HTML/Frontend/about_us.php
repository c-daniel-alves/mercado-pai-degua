<?php
include('php/verificar_login.php');
include('php/func.php');
include("php/carrinho.php");
include('php/exibe_categoria_index.php');

?>
<!DOCTYPE html>
<html lang="pt_BR">
<?php
include('php/dados_cliente.php');
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=9">
	<meta name="description" content="Gambolthemes">
	<meta name="author" content="Gambolthemes">
	<title>Mercado Pai D'égua - Sobre Nós</title>

	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="images/logo-1.png">

	<!-- Stylesheets -->
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/night-mode.css" rel="stylesheet">
	<link href="css/step-wizard.css" rel="stylesheet">

	<!-- Vendor Stylesheets -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
	<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">

</head>

<body>
	<!-- modelo das categorias-->
	<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
		<div class="modal-dialog category-area" role="document">
			<div class="category-area-inner">
				<div class="modal-header">
					<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
					</button>
				</div>
				<div class="category-model-content modal-content">
					<div class="cate-header">
						<h4>Selecionar Categoria </h4>
					</div>
					<ul class="category-by-cat">
					<?php
						if(isset($r_categoria))
						{	
							foreach($r_categoria as $key => $r_cat)
							{	
					
					?>
						<li>
							<?php echo "<a href='shop_grid.php?c_id=".$r_cat['cat_id']."' class='single-cat-item'>" ?>
								<div class="icon">
									<?php echo "<img src=' ".limpa_link($r_cat['cat_img'])." ' alt='erro ao Carregar a imagem'>" ?>
								</div>
								<?php echo "<div class='text'>".$r_cat['cat_nome']."</div>" ?>
							</a>
						</li>
					
					<?php }}	?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Categoria fim-->

	<!-- pesquisar produtos inicio-->
	<div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
		<div class="modal-dialog search-ground-area" role="document">
			<div class="category-area-inner">
				<div class="modal-header">
					<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- pesquisar produtos fim-->
	<!-- Carrinho sidebar inicio-->

	<div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
	<?php
	
	if($resultsCarts) { ?>
		<div class="bs-canvas-header side-cart-header p-3 ">
			<?php if($cont_itens > 1) { ?>
			<div class="d-inline-block  main-cart-title">Meu Carrinho <span>(<?php echo $cont_itens ?> Itens)</span></div>
			<?php }else{ ?>
			<div class="d-inline-block  main-cart-title">Meu Carrinho <span>(<?php echo $cont_itens ?> Item)</span></div>
			<?php } ?>
			<button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
		</div>
		<div class="bs-canvas-body">
			<div class="cart-top-total">
				<div class="cart-total-dil">
					<h4>Mercado Pai D'égua</h4>
					<span>R$<?php echo number_format($totalCarts, 2, ',', '.')?></span>
				</div>
				<div class="cart-total-dil pt-2">
					<h4>Taxa de entrega</h4>
					<span>R$<?php echo $frete ?></span>
				</div>
			</div>
			<div class="side-cart-items">

<!-- INICIO EXIBIR ITENS NO CARRINHO -->  

			<?php foreach($resultsCarts as $result) : 
				
			

				?>

				<div class="cart-item">
					<div class="cart-product-img">
						<img src="<?php echo limpa_link($result['image'])?>" alt="Erro ao carregar imagem!">
						<?php if($result['porc'] > 0){ ?>
						<div class="offer-badge"><?php echo number_format($result['porc'], 0, ',', '.')?>% OFF</div>
						<?php } ?>
					</div>
					<div class="cart-text">
						<h4><?php echo $result['name']?></h4>
						<div class="qty-group">
							<div class="quantity buttons_added">								
								<input type="number" step="1" name="quantity" value="<?php echo $result['quantity']?>" class="input-text qty text">								
							</div>
							<div class="cart-item-price">R$<?php echo number_format($result['discount'], 2, ',', '.')?> <span>R$<?php echo number_format($result['price'], 2, ',', '.')?></span></div>
						</div>
						<a href="php/carrinho.php?acao=del&id=<?php echo $result['id']?>" type="button" class="cart-close-btn"><i class="uil uil-multiply"></i></a>
					</div>
				</div>
				
			<?php endforeach;?>

<!-- FIM EXIBIR ITENS NO CARRINHO -->

			</div>
		</div>
		<div class="bs-canvas-footer">
			<div class="cart-total-dil saving-total ">
				<h4>Total Economizado</h4> 
				<span>R$<?php echo number_format($totaldesc, 2, ',', '.')?></span>
			</div>
			<div class="main-total-cart">
				<h2>Total</h2>
				<span>R$<?php echo number_format($totalCfrete, 2, ',', '.')?></span>
			</div>
			<div class="checkout-cart">
				<a href="checkout.php" class="cart-checkout-btn hover-btn">Finalizar</a>
			</div>
		</div>
		<?php }else { ?>

			<div class="bs-canvas-header side-cart-header p-3 ">
			<div class="d-inline-block  main-cart-title">Meu Carrinho <span>(0 Itens)</span></div>
			<button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
		</div>
		<div class="bs-canvas-body">
			<div class="cart-top-total">
				<div class="cart-total-dil">
					<h4>Mercado Pai D'égua</h4>
					<span>R$<?php echo number_format($totalCarts, 2, ',', '.')?></span>
				</div>
				<div class="cart-total-dil pt-2">
					<h4>Taxas de entrega</h4>
					<span>R$<?php echo $frete ?></span>
				</div>
			</div>
		</div>
			<div class="bs-canvas-footer">
			<div class="cart-total-dil saving-total ">
				<h4>Total Economizado</h4>
				<span>R$<?php echo number_format($totaldesc, 2, ',', '.')?></span>
			</div>
			<div class="main-total-cart">
				<h2>Total</h2>
				<span>R$<?php echo number_format($totalCfrete, 2, ',', '.')?></span>
			</div>
			<div class="checkout-cart">
				<a href="checkout.php" class="cart-checkout-btn hover-btn">Finalizar</a>
			</div>
		</div>	

			<?php } ?>

	</div>



	<!-- Carrnho sidebar fim-->
	<!-- Header Start -->
	<header class="header clearfix">
		<div class="top-header-group">
			<div class="top-header">
				<div class="res_main_logo">
					<a href="index.php"><img src="images/logo-1.png" alt=""></a>
				</div>
				<div class="main_logo" id="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
					<a href="indexphp"><img class="logo-inverse" src="images/dark-logo.png" alt=""></a>
				</div>
				<div class="select_location">
					<div class="ui inline dropdown loc-title">
						<div class="text">
							<i class="uil uil-location-point"></i>
							Castanhal
						</div>
					</div>
				</div>
				<div class="search120">
				<form method="GET" action="shop_grid.php" enctype="multipart/form-data">
					<div class="ui search">
						<div class="ui left icon input swdh10">
							<input class="prompt srch10" type="search" name='pesquisar' placeholder="Pesquisar produtos ..">
							<i class='uil uil-search-alt icon icon1'></i>
							<input type="submit" class="pesquisar_prod" style="display:none">
						</div>
					</div>
					</form> 
				</div>
				<div class="header_right">
					<ul>
						<li>
							<a href="#" class="offer-link"><i class="uil uil-phone-alt"></i>(91) 9 8283-2055</a>
						</li>
						<li>
							<a href="faq.php" class="offer-link"><i class="uil uil-question-circle"></i>Ajuda</a>
						</li>
						<li class="ui dropdown">
							<a href="#" class="opts_account">
								<?php
								if (isset($resultado['foto'])) {
									echo "<img src=' " . $resultado['foto'] . " ' alt=''>";
								} else {
									echo "<img src='images/avatar/img-5.jpg' alt=''>";
								};
								?> <span class="user__name"><?php echo $resultado['nome'] ?></span>
								<i class="uil uil-angle-down"></i>
							</a>
							<div class="menu dropdown_account">
								<div class="night_mode_switch__btn">
									<a href="#" id="night-mode" class="btn-night-mode">
										<i class="uil uil-moon"></i> Modo noturno
										<span class="btn-night-mode-switch">
											<span class="uk-switch-button"></span>
										</span>
									</a>
								</div>
								<a href="dashboard_overview.php" class="item channel_item"><i class="uil uil-apps icon__1"></i>Perfil</a>
								<a href="dashboard_my_orders.php" class="item channel_item"><i class="uil uil-box icon__1"></i>Ordens de compra</a>
								<a href="dashboard_my_addresses.php" class="item channel_item"><i class="uil uil-location-point icon__1"></i>Endereço</a>
								<a href="faq.php" class="item channel_item"><i class="uil uil-info-circle icon__1"></i>Perguntas frequentes</a>
								<a href="/mercado-paid-egua/HTML/frontend/php/logout.php" class="item channel_item"><i class="uil uil-lock-alt icon__1"></i>Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="sub-header-group">
			<div class="sub-header">
				<div class="ui dropdown">
					<a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Selecionar Categoria</span></a>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light py-3">
					<div class="container-fluid">
						<button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
						<div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
							<ul class="navbar-nav main_nav align-self-stretch">
								<li class="nav-item"><a href="index.php" class="nav-link active" title="Home">Início</a></li>
								<li class="nav-item"><a href="shop_grid.php?new_id=1" class="nav-link new_item" title="New Products">Novos Produtos</a></li>
								<li class="nav-item"><a href="shop_grid.php?destaque=2" class="nav-link" title="Featured Products">Produtos em Destaque</a></li>
								<li class="nav-item">
									<div class="ui icon top left dropdown nav__menu">
										<a class="nav-link" title="Pages">Mais <i class="uil uil-angle-down"></i></a>
										<div class="menu dropdown_page">
											<a href="dashboard_overview.php" class="item channel_item page__links">Conta</a>
											<a href="about_us.php" class="item channel_item page__links">Sobre nós</a>
											<a href="checkout.php" class="item channel_item page__links">Finalizar Pedido</a>
										</div>
									</div>
								</li>
								<li class="nav-item"><a href="contact_us.php" class="nav-link" title="Contact">Fale conosco</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="catey__icon">
					<a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
				</div>
				<div class="header_cart order-1">
				<!-- MOSTRAR A QUANTIDADE NO CARRINHO -->
				<?php if($cont_itens >= 1) { ?>
						<a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Carrinho</span><ins><?php echo $cont_itens ?></ins><i class="uil uil-angle-down"></i></a>
					<?php }else{ ?>
						<a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Carrinho</span><ins>0</ins><i class="uil uil-angle-down"></i></a>
					<?php } ?>
				</div>
				<div class="search__icon order-1">
					<a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="default-dt">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="title129">
							<h2>Sobre Nós</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="life-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="default-title left-text">
							<h2>Sobre o Mercado Pai D'égua</h2>
							<p>Os clientes merecem o melhor</p>
							<img src="images/line.svg" alt="">
						</div>
						<div class="about-content">
							<p>Somos um projeto que surgiu durante a faculdade, uma ideia para facilitar o dia a dia das pessoas. Num mundo onde pessoas precisam ser cada vez mais ágeis, o Mercado Pai D'égua se torna a solução para isso.</p>
							<p>Escolhemos esse nome para valorizar a cultura da nossa terra, o maravilhoso Pará. Pretendemos expandir para mais cidades e quem sabe para o País, mas, no momento, atendemos apenas a cidade de Castanhal.</p>
							<p>Somos o lugar certo para você comprar barato, seja para o seu negócio ou sua casa.</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-img">
							<img src="images/about.svg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-steps-group white-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<!--
						<div class="about-step">
							<div class="about-step-img">
								<img src="images/about/icon-1.svg" alt="">
							</div>
							<h4>5+</h4>
							<p>Pessoas se juntaram à equipe Pai D'égua nos últimos seis meses</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="images/about/icon-2.svg" alt="">
							</div>
							<h4>2x</h4>
							<p>Taxa de crescimento em nossa base de usuários mensal</p> 
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="images/about/icon-3.svg" alt="">
							</div>
							<h4>10 dias</h4>
							<p>Tempo restante para lançamento de nossa nova unidade</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="images/about/icon-4.svg" alt="">
							</div>
							<h4>95k</h4>
							<p>Downloads de aplicativos no iOS e Android</p>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<div class="life-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="default-title">
							<h2>Nosso time</h2>
							<p>Trabalho em equipe faz o sonho funcionar</p>
							<img src="images/line.svg" alt="">
						</div>
						<div class="dd-content">
							<div class="owl-carousel team-slider owl-theme">
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/matheus.jpg" alt="">
										</div>
										<h4>Matheus Siqueira</h4>
										<span>Dev Frontend</span>
										<ul class="team-social">
											<li><a href="https://www.facebook.com/matheus.batista.7106670" target="_blank" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="https://www.linkedin.com/in/matheus-siqueira-72a789143/" target="_blank" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
											<li><a href="https://github.com/om4ths" class="scl-btn hover-btn" target="_blank" ><i class="fab fa-github"></i></a></li>

										</ul>
									</div>
								</div>
								
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/ton.jpg" alt="">
										</div>
										<h4>Wellington Sena</h4>
										<span>Gerente de Projetos</span>
										<ul class="team-social">
											<li><a href="https://www.facebook.com/wellex" target="_blank" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="https://www.linkedin.com/in/wellington-sena-95ab5451/" target="_blank" class="scl-btn hover-btn" target="_blank" ><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/c_daniel.jpg" alt="">
										</div>
										<h4>Carlos Daniel</h4>
										<span>Dev Backend</span>
										<ul class="team-social">
											<li><a href="https://www.facebook.com/profile.php?id=100014015853220" target="_blank" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="https://www.linkedin.com/in/carlos-daniel-4902171a2/" class="scl-btn hover-btn" target="_blank" ><i class="fab fa-linkedin-in"></i></a></li>
											<li><a href="https://github.com/c-daniel-alves" target="_blank" class="scl-btn hover-btn"><i class="fab fa-github"></i></a></li>

										</ul>
									</div>
								</div>
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/jonatas.jpg" alt="">
										</div>
										<h4>Jônatas Alves</h4>
										<span>Dev Backend</span>
										<ul class="team-social">
											<li><a href="https://www.facebook.com/jonatas.alves.984/photos_by" target="_blank" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="https://www.linkedin.com/in/jonatasasr/" target="_blank" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
											<li><a href="https://github.com/Jonatasasr" target="_blank" class="scl-btn hover-btn"><i class="fab fa-github"></i></a></li>

										</ul>
									</div>
								</div>
								
									<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/charles.jpg" alt="">
										</div>
										<h4>Charles Correa</h4>
										<span>Dev Frontend</span>
										<ul class="team-social">
											<li><a href="https://www.facebook.com/charles.correa.393" target="_blank" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="https://github.com/charles-correa-11" target="_blank" class="scl-btn hover-btn"><i class="fab fa-github"></i></a></li>

										</ul>
										</div>
									</div>
									<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="images/team/iago.jpg" alt="">
										</div>
										<h4>Iago Davi</h4>
										<span>Dev Frontend</span>
										<ul class="team-social">
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
										</div>
									</div>

									<!--COLOCAR AQUI O PRÓXIMO -->

								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="how-order-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="default-title">
							<h2>Como faço para fazer um pedido?</h2>
							<img src="images/line.svg" alt="">
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-search"></i>
							</div>
							<h4>Procure produtos em nosso site ou use o recurso de pesquisa.</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-cart-plus"></i>
							</div>
							<h4>Adicione o item ao seu carrinho de compras.</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-clock"></i>
							</div>
							<h4>Escolha um horário de entrega.</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-hand-holding-usd"></i>
							</div>
							<h4>Selecione a forma de pagamento (Dinheiro ou Cartão de Crédito/Débito na hora).</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-truck"></i>
							</div>
							<h4>Seus produtos serão entregues em casa de acordo com seu pedido.</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="fas fa-smile-wink"></i>
							</div>
							<h4>Clientes Felizes</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End -->
	<!-- Footer Start -->
		<footer class="footer">
		<div class="footer-first-row">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<ul class="call-email-alt">
							<li><a href="#" class="callemail"><i class="uil uil-dialpad-alt"></i>(91)982832-2055</a></li>
							<li><a href="#" class="callemail"><i class="uil uil-envelope-alt"></i>mercadopaidegua@gmail.com</a></li>
						</ul>
					</div>
						
				</div>
			</div>
		</div>
		<div class="footer-second-row">
			<div class="container">
				<div class="row-index">
				
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item" style="margin-top:47px;">
							<h4>Onde Atendemos</h4>
							<ul>
								<li><a href="#">Castanhal</a></li>

							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item-app">
						</div>
						<div class="second-row-item-payment">
							<h4>Métodos de Pagamento</h4>
							<div class="footer-payments">
								<ul id="paypal-gateway" class="financial-institutes">
									
									<li class="financial-institutes__logo">
										<img alt="Visa" title="Visa" src="images/footer-icons/pyicon-1.svg">
									</li>
									<li class="financial-institutes__logo">
										<img alt="MasterCard" title="MasterCard" src="images/footer-icons/pyicon-2.svg">
									</li>
									
								</ul>
							</div>
						</div>
						
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item">
							
						<div class="main_logo-footer" id="logo">
					<img src="images/logo.png" alt="">
					<img class="logo-inverse" src="images/dark-logo.png" alt="">
				</div>


					</div>
					

							</div>
					</div>

				</div>

			</div>
		</div>
		<div class="footer-last-row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer-bottom-links" style="text-align-last:center;">
							<ul>
								<li><a href="about_us.php">Sobre Nós</a></li>
								<li><a href="contact_us.php">Contato</a></li>
								<li><a href="faq.php">Perguntas Frequentes</a></li>

							</ul>
						</div>
						<div class="copyright-text">
							<i class="uil uil-copyright"></i>Copyright 2021 <b>Mercado Pai D'égua</b> . All rights reserved
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Footer End -->

	<!-- Javascripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/semantic/semantic.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/product.thumbnail.slider.js"></script>
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>

</body>

</html>