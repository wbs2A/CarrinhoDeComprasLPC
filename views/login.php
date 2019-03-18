<?php
include 'header.php';
include 'navbar.php'
?>
<div class="container main_slider p-1">
				<div class="row justify-content-center ">
				    <div class="card col-10 col-lg-9 p-2">
				    	<div class="card-header ">
						   Por favor, acesse sua conta.
						</div>
						<div class="p-2 m-3">
							<form  action="controller.php?login" method="post">
								<div class="form-group">
							  		<label for="cpf">CPF:</label>
							    	<input type="text" pattern="([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})" required  name="cpf" id="cpf" class="form-control" placeholder="CPF">
							  	</div>
							  	<div class="form-group">
							  		<label for="senha">Senha:</label>
							    	<input type="password" required name="senha" id="senha" class="form-control" placeholder="Senha">
							  	</div>
							  	<div class="row justify-content-center">
							  		<button type="submit" class="btn btn-primary col-2 btn-md mr-2 ">Entrar</button>
							  		<a id="saque" href="criar.php" class="btn col-2 btn-info ml-2">Criar</a>
							  	</div>
							</form>
						</div>
				    </div>
				</div>
				
			</div>

<?php
include 'footer.php';
?>
