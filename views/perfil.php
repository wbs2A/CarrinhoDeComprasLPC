<?php
include 'header.php';
include 'navbar.php';
?>
<?php
	$ch = curl_init();
	$optArray = array(
			CURLOPT_URL => "http://localhost/CarrinhoDeComprasLPC/views/controller.php?allUser",
			CURLOPT_RETURNTRANSFER => true
	);
	// apply those options
	curl_setopt_array($ch, $optArray);
	$t=curl_exec($ch);
	$j=json_decode($t);
	var_dump($j);
	curl_close($ch);

echo '<script type="text/javascript" src="../js/registro.js"></script>
<div class="main_slider criar p-1">
				<div class="container-fluid m-2 justify-content-center ">
				    <div class="card col p-2">
				    	<div class="card-header ">
                <h3>As informações da sua conta. <i id="edit1" style="padding-left: 100px;position: relative" class="fas fa-edit"></i></h3>
						  </div>

							<div class="row p-2 m-3 ">
								<fieldset class="col-6">
										<legend>Pessoal</legend>
										<div class="row">
							          <div class="col-md-8 mb-3">
							            <label for="nome">Nome Completo</label>
							            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo">
							        </div>
							        <div class="col-md-4 mb-3">
							        <label for="email">Email</label>
							        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
							      </div>
							      </div>
							      <div class="row">
							    <div class="col-md-4 mb-3">
							      <label for="nascimento">Data de nascimento</label>
							      <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
							    </div>
							        <div class="col-md-4 mb-3">
							      <label for="telefone">Telefone</label>
							      <input type="tel" class="form-control" id="telefone" aria-describedby="telefoneHelp" name="telefone" placeholder="">
							      <small id="emailHelp" class="form-text text-muted">Por favor, insira apenas numeros.</small>
							    </div>
							    <div class="col-md-4 mb-3">
							      <label for="tipo">Tipo</label>
							       <select id="tipo" name="tipo" class="form-control">
							        <option>fixo</option>
							        <option>celular</option>
							      </select>
							    </div>
							      </div>
							  <div class="row">
							        <div class="col-md-6 mb-3">
							          <label for="cpf">CPF</label>
							          <input type="number" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="CPF" value="" required>
							        </div>
							        <div class="col-md-6 mb-3">
							          <label for="rg">RG</label>
							          <input type="text" class="form-control" name="rg" id="rg" placeholder="" value="" required="">
							        </div>
							      </div>
								 </fieldset>
								 <div class="col-6 ">
									 <fieldset class="col">
										 <legend>Endereço</legend>
										 <div class="row">
							     <div class="col-md-6 mb-3">
							       <label for="pais">Pais</label>
							       <select class="form-control" id="pais" name="pais">

							       </select>
							     </div>
							     <div class="col-md-6 mb-3">
							       <label for="cep">CEP</label>
							       <input type="text" class="form-control" id="cep" name="cep" placeholder="">
							     </div>
							       </div>
							       <div class="row">
							     <div class="col-md-4 mb-3">
							       <label for="numero">Numero</label>
							       <input type="number" class="form-control" id="numero" name="numero" placeholder="">
							     </div>
							     <div class="col-md-4 mb-3">
							       <label for="bairro">Bairro</label>
							       <input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
							     </div>
							     <div class="col-md-4 mb-3">
							       <label for="rua">Rua</label>
							       <input type="text" class="form-control" id="rua" name="rua" placeholder="">
							     </div>
							       </div>
							       <div class="row">
							     <div class="col-md-6 mb-3">
							       <label for="estado">Estado</label>
							       <input type="text" class="form-control" id="estado" name="estado" placeholder="">
							     </div>
							     <div class="col-md-6 mb-3">
							       <label for="cidade">Cidade</label>
							       <input type="text" class="form-control" id="cidade" name="cidade" placeholder="">
							     </div>
							       </div>
   								 </fieldset>
  									<fieldset class="col">
  							        <legend>Cartão de crédito</legend>
  							        <div class="row">
  							          <div class="col-md-4 mb-3">
  							               <label for="numero-cartao">Número</label>
  							               <input type="number" class="form-control" id="numero-cartao" name="numero-cartao">
  							           </div>
  							          <div class="col-md-3 mb-3">
  							            <label for="vcc">VCC</label>
  							            <input type="number" class="form-control" id="vcc" name="vcc" placeholder="">
  							          </div>
  							           <div class="col-md-5 mb-3">
  							               <label for="validade-cartao">Validade</label>
  							               <input type="month" class="form-control" id="validade-cartao" name="validade-cartao">
  							           </div>
  							       </div>
  							     </fieldset>
								 	</div>
								 </div>
							</div>
				    </div>
				</div>';
?>
<?php
include 'footer.php';
?>
