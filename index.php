<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				
				<h2>Correio Veloz</h2>
				<p class="lead">Seu app de envio de e-mais na velocidade da luz!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="php/envio_email.php" method="post" >
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control" id="para" placeholder="joao@dominio.com.br"
								name="para">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail"
								name="assunto">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" id="mensagem"
								name="mensagem"></textarea>
							</div>
							<div>
								<fieldset>
									<legend> Dados do Email para teste</legend>
									<div class="form-group">
										<label for="email-teste"></label>
											<input type="text" class="form-control" id="email-teste" name="email-teste">										
									</div>
									<div class="form-group">
										<label for="senha-teste"></label>
											<input type="password" class="form-control" id="senha-teste" name="senha-teste">										
									</div>
								</fieldset>
							</div>
						

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>