<?php 
	require_once('load.php');

	if(isset($_POST['id'])){
		// $headers = array('Accept' => 'application/json');
		$headers = '';
		$url_server = 'http://localhost:8080/ProgDist-Mini-Projeto-IV-master/webresources/news';

		$response = Unirest\Request::put($url_server . '/'.$_POST["id"].'/'.$_POST["title"], $headers);
		// $response = Unirest\Request::put($url_server, $headers, array('id' => $_POST['id'], 'title' => $_POST['title']));
		// var_dump($url_server . '/'.$_POST["id"].'/'.$_POST["title"]);
		// var_dump($response);
		if($response->code == 200){
			$msg['success'] = 'Notícia';
			$content = json_encode($response->body);
		}

		if($response->code == 404){
			$msg['error'] = 'Erro 404 - NOT_FOUND<br />(Notícia não encontrada)';			
		}
		
		if($response->code == 405){
			$msg['error'] = 'Erro 405 - METHOD_NOT_ALLOWED<br />(Campos inválidos ou vazios)';			
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
	<title>News</title>
</head>
<body>
	<div >
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-book"></i> &nbsp News</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <ul class="nav navbar-nav">
        <li ><a href="index.php">Cadastrar</a></li>
        <li  class="active"><a href="edit.php">Editar</a></li>
        <li><a href="delete.php">Excluir</a></li>
        <li ><a href="get.php">Buscar notícia</a></li>
      </ul> 
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0" action="saveconfig.php" method="post">
	      <input class="form-control mr-sm-2" type="text" placeholder="URL do servidor" name="url_server" value="<?php echo $url_server; ?>">
	      <input type="submit" name="salvar_config" value="Salvar" class="btn btn-outline-success my-2 my-sm-0">
	    </form> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
	<div class="container">
		<div class="row text-center"><h3>Editar Notícia</h3></div>
		<hr>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<div class="well">
			<form action="edit.php" method="POST">
			  <div class="form-group">
			    <label for="id">Id</label>
			    <input type="text" name="id" class="form-control input-sm" value="<?php echo (isset($_POST['id']))? $_POST['id'] : '' ?>">
			  </div>
			  
			  <div class="form-group">
			    <label for="title">Título</label>
			    <input type="text" name="title" class="form-control input-sm" value="<?php echo (isset($_POST['title']))? $_POST['title'] : '' ?>">
			  </div>
			  
			  <div class="text-center">
			  <button type="submit" class="btn btn-success">Editar</button>
			  </div>
			  <?php if(isset($msg) && !empty($msg)){ ?>
			  <hr>

				<?php if(isset($msg['success'])){ ?>
			  		<p class="text-center text-success"><?php echo $msg['success'];  ?></p>
			  	<?php } ?>
			  	
			  	
			  	<?php if(isset($msg['error'])){ ?>
			  		<p class="text-danger text-center"><?php echo $msg['error']; ?></p>
			  	<?php } ?>
			 <?php } ?>
			  
			</form>
		</div>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row text-center">
			<?php if(isset($content)){ ?>
			  		<?php echo '<pre>' . $content . '</pre>'; ?>
			<?php } ?>
		</div>
	</div>
	

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>
</html>