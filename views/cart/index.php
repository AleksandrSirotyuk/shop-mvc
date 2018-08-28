<?php require ROOT.'/views/layouts/header.php'; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<?php if(isset($_SESSION['products'])){
						if(array_sum($productsInCart) > 0){
							for ($i=0; $i<count($getProduct); $i++){ 
						$id = $getProduct[$i]["id"]; ?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="40%" height="30%" src="<?php echo $getProduct[$i]["image"]; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $getProduct[$i]["name"]; ?></a></h4>
								<p>Код: <?php echo $getProduct[$i]["code"]; ?></p>
							</td>
							<td class="cart_price">
								<p>Цена: $<?php echo $getProduct[$i]["price"]; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="/cart/add/<?php echo $getProduct[$i]["id"] ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_SESSION['products'][$id] ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="/cart/reduce/<?php echo $getProduct[$i]["id"] ?>"> - </a>
								</div>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/cart/delete/<?php echo $getProduct[$i]["id"] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
								$price = $price + $getProduct[$i]["price"]; 
						} } } ?>
					</tbody>
					<td class="cart_price">
					<p> <span style="margin-left: 20%;">Итоговая стоимость: <?php echo $price; 
					$_SESSION['sum_order'] = $price; ?> </span></p>
					<p><span style="margin-left: 35%;"><a href="/order">Оформить заказ</span></a></p>
				</td>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php require ROOT.'/views/layouts/footer.php'; ?>
