<?php

include ROOT.'/models/User.php';
include ROOT.'/models/Cabinet.php';

class CabinetController{

	public function actionIndex(){
		$user = new User();
		$id = $user->CheckLogged();
		$cabinet = new Cabinet();
		$data = $cabinet->GetDataById($id);

		require ROOT.'/views/cabinet/index.php';
		return true;
	}
	public function actionEdit(){
		$user = new User();
		$id = $user->CheckLogged();
		$cabinet = new Cabinet();
		$data = $cabinet->GetDataById($id);

		if (isset ($_POST["edit"])){
			$data = $_POST;
			$error = false;
			if(trim($data["name"]) == ''){?>  	
				<script type="text/javascript"> alert("Введите имя");</script>
	<?php
				$error = true;
			}
			if($data["password"] == ''){?>
				<script type="text/javascript"> alert("Введите пароль");</script>
	<?php
				$error = true;
			}
			if($data["password"]!=$data["password_2"]){?>
				<script type="text/javascript"> alert("Повторный пароль введен не верно");</script>
	<?php	
				$error = true;
			}
			if ($user->CheckName($data["name"]) == true){?>
				<script type="text/javascript"> alert("Пользователя с таким именем не существует");</script>
	<?php	
				$error = true;
			}	
			if($error == false)
			{
				$user->Edit($data["name"],$data["password"] );?>
				<script type="text/javascript"> alert("Ваши данные были отредактированы");</script>
	<?php
			}
	} 
		require ROOT.'/views/cabinet/edit.php';
		return true;
	}
}

?>