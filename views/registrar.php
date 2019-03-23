<?php
include 'header.php';
include 'navbar.php'
?>
<script type="text/javascript" src="../js/registro.js"></script>
<div class="container main_slider criar p-1">
				<div class="row justify-content-center ">
				    <div class="card col-10 col-lg-9 p-2">
				    	<div class="card-header ">
						    Por favor, preencha as informações da sua conta.
						</div>
						<div class="p-2 m-3">
							<form  action="controller.php?criar" method="post">
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
						        <label >Endereço</label>
						        <div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="pais">Pais</label>
								    <select class="form-control" id="pais" name="pais">
								    	<?php
											// create a new cURL resource
											$ch = curl_init("http://localhost/CarrinhoDeComprasLPC/views/controller.php?paises");
											$t=curl_exec($ch);
											echo $t;
			 								curl_close($ch);
										?>
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
							  	<div class="form-group">
							  		<label for="senha">Senha</label>
							    	<input type="password" required name="senha" id="senha" class="form-control" placeholder="Senha">
							  	</div>
									<fieldset>
											<legend>Cartão de crédito</legend>
											<div class="row">
										    <div class="col-md-4 mb-3">
										         <label for="numero-cartao">Número</label>
										         <input type="number" class="form-control" id="numero-cartao" name="numero-cartao">
										     </div>
			 								  <div class="col-md-4 mb-3">
			 								    <label for="vcc">VCC</label>
			 								    <input type="number" class="form-control" id="vcc" name="vcc" placeholder="">
			 								  </div>
										     <div class="col-md-4 mb-3">
										         <label for="validade-cartao">Validade</label>
										         <input type="date" class="form-control" id="validade-cartao" name="validade-cartao">
										     </div>
										 </div>
									 </fieldset>

							  	<div class="row justify-content-center">
							  		<button type="submit" class="btn btn-primary col-auto">Criar</button>
							  	</div>
							</form>
						</div>
				    </div>
				</div>

<?php
include 'footer.php';
?>
