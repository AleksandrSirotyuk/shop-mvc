<?php

class Cabinet{

	public function GetDataById($id){
		$data = R::getRow('SELECT * FROM users WHERE id='.$id);
		return $data;
	}
}

?>