<?php

include ROOT.'/models/User.php';

Class AdminController{
	public function actionIndex(){
		$user = new User();
		$id = $user->CheckLogged();
		$data = $user->CheckRole($id);
		
		require ROOT.'/views/admin/index.php';
		return true;

	}
}

?>