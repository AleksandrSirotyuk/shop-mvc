<?php 
include ROOT.'/models/Cart.php';
include ROOT.'/models/Order.php';
include ROOT.'/models/Product.php';

class OrderController{

	public function actionIndex(){
		$data = array();
		$data['id'] = 0;

		$flag = false;
	  $cart = new Cart();
	  $products = $cart->GetProducts();
	  $product = new Product();
	  if ( (isset($_SESSION['sum_order'])) && ($_SESSION['sum_order']>0)){
		  $product_keys = array_keys($products);
		  if(array_sum($product_keys) > 0){
				for($i=0; $i<count($products); $i++)
					$getProduct[$i] = $product->GetProductById($product_keys[$i]);
		  }
		}
	  $from_name = "";
	  $from_telephone = "";

		if ( (!isset($_SESSION['sum_order'])) || ($_SESSION['sum_order']<=0) )
	  		$flag = true;	

	  $order = new Order();

	   if (isset($_SESSION['user']))
			$data = $order->GetDataById($_SESSION['user']);

  	if(isset($_POST["send"])){
			if ($flag == true){ ?>
				<script type="text/javascript">
					alert("Выберите товары для оформления заказа");
					location.replace("http://online-store"); 
				</script>
<?php return false;
			}
			$error = false;
			$from_name = $_POST["from_name"];
			$from_telephone = $_POST["from_telephone"];
			$message = $_POST["message"];
			if($from_name == ""){
				?>
				<script type="text/javascript"> alert("Введите имя");</script>	
				<?php
				$error = true;
			}
			?>
			<?php
			if($from_telephone == ""){
				?>
				<script type="text/javascript"> alert("Введите корректный телефон");</script>
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
				unset($_SESSION['products']);
				$letter = "Письмо: \r\n";
				$letter .="Имя отправителя:" .$from_name."\r\n";
				$letter .="Телефон отправителя:".$from_telephone."\r\n";
				$letter .="Текст сообщения:" .$message."\r\n";
				mail("aleksandrharada@yandex.ru", "Новый заказ на online_store, перейдите по следующей ссылке для оформления: ", $letter);
				$order->SaveOrder($from_name, $from_telephone, $message, $data['id'], $products);
				unset($_SESSION['sum_order']);
				?>
				<script type="text/javascript"> 
					alert("Ваш заказ успешно оформлен");
					location.replace("http://online-store"); 
				</script>
				<?php
				return true;
			}
		}
		include ROOT.'/views/order/index.php';
	}
}

?>