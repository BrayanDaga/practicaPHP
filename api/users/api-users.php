<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include_once 'users.php';

if(isset($_GET['accion'])){
    $accion = $_GET['accion'];

    if($accion == ''){
        echo json_encode(['statuscode'=>400, 'response' => 'No existe accion']);
    }else{
/************************************************************************************************************************/
    	 $users = new Users();
		
		switch ($accion) {
		    
		    case 'listar':
				$items=$users->getUsersAll();
				echo json_encode(['statuscode'    =>200,'items'=>$items]);
    		 break;

			case 'borrar':
				$respuesta=$users->delete($_GET['id']);
				echo json_encode($respuesta);
			break;

			case 'agregar':
				$respuesta = $users->insert(
					[
					'name'                           => $_POST["name"],
					'email'                          => $_POST["email"],
					'password'                       => $_POST["password"],
					]
				);
				echo json_encode($respuesta);
			break;

			case 'consultar':
				$resultado = $users->getById($_GET['id']);
				echo json_encode([$resultado]);
			break;
		
			case 'loguear':
				$resultado = $users->getByNameAndPass(
					[
						'email'                          => $_GET["email"],
						'password'                       => $_GET["password"],
					]
					);

					if($resultado>0){
						$_SESSION['user'] = $resultado;
					}
				echo json_encode([$resultado]);
			break;
		
			case 'modificar':
				$respuesta = $users->update(
				[
					'id'                             => $_GET["id"],
					'name'                           => $_POST["name"],
					'email'                          => $_POST["email"],
					'password'                       => $_POST["password"],
					]
				);
				echo json_encode($respuesta);
			break;
			 
			
  		
  		}
/*********************************************************************************************************************/
    }
}else{
    echo json_encode(['statuscode'    =>400, 'response' => 'No existe accion']);
}


?>