<?php
	require_once('load.php');

	if(isset($_POST['url_server'])){
		$url_server = $_POST['url_server'];
		$_SESSION['url_server'] = $_POST['url_server'];
	}
	header('Location: index.php');


	// $headers = array('Accept' => 'application/json');


	// $headers = array('Accept' => 'x-www-form-urlencoded');
	// $query = array('id' => '1', 'author' => 'world', 'title' => 'vicente', 'content' => 'teste');

	// $response = Unirest\Request::post('http://localhost:8080/ProgDist-Mini-Projeto-IV/webresources/news', $headers, $query);

	// $response->code;        // HTTP Status code
	// $response->headers;     // Headers
	// $response->body;        // Parsed body
	// $response->raw_body;    // Unparsed body
	// var_dump($response->body);
	

	// if(isset($_POST)){
	// 	session_unset();
	// 	$data = array('id' => $_POST['id'], 'author' => $_POST['author'], 'title' => $_POST['title'], 'content' => $_POST['content']);
	// 	$body = Unirest\Request\Body::form($data);
	// 	$response = Unirest\Request::post('http://localhost:8080/ProgDist-Mini-Projeto-IV/webresources/news', $headers, $body);
		

	// 	if($response->code == 200){
	// 		$_SESSION['success'] = 'Notícia cadastrada com sucesso!';
	// 		$_SESSION['content'] = json_encode($response->body);
	// 	}
	// 	if($response->code == 409){
	// 		$_SESSION['error'] = 'Erro, a notícia já existe!';			
	// 	}
	// 	if($response->code == 400){
	// 		$_SESSION['error'] = 'Erro inesperado, tente novamente!';			
	// 	}
		
	// 	header('Location: index.php');
	// }	

?>