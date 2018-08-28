<?php 

class Feedback{
	public function SendLetter(){
		if(isset($_POST["send"])){
			$error = false;
			$from_name = $_POST["from_name"];
			$from_email = $_POST["from_email"];
			$message = $_POST["message"];
			if($from_name == ""){
				?>
				<script type="text/javascript"> alert("Введите имя");</script>	
				<?php
				$error = true;
			}
			?>
			<?php
			if($from_email == "" || !preg_match("/@/", $from_email)){
				?>
				<script type="text/javascript"> alert("Введите корректный Email");</script>
				<?php
				$error = true;
			}
			?>
			<?php
			if(strlen($message) == 0){
				?>
				<script type="text/javascript"> alert("Введите корректное сообщение");</script>
				<?php
				$error = true;
			}
			if ($error == false){
				$letter = "Письмо: \r\n";
				$letter .="Имя отправителя:" .$from_name."\r\n";
				$letter .="Email отправителя:".$from_email."\r\n";
				$letter .="Текст сообщения:" .$message."\r\n";
				mail("aleksandrharada@yandex.ru", "online_store", $letter);
				?>
				<script type="text/javascript"> 
					alert("Ваше сообщение успешно отправлено");
					location.replace("http://online-store/feedback"); 
				</script>
				<?php
			}
		}
	}
}

?>