<?php require ROOT.'/views/layouts/header.php'; ?>
<body>
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    				 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Оформление заказа</h2>
							Выбрано товаров: <?php if( (isset($_SESSION['sum_order'])) && ($_SESSION['sum_order']>0)){ 
								if(array_sum($products) > 0) echo array_sum($products); 
							}
							else echo 0; ?>
							<br/>
							Итоговая сумма заказа: <?php if( (isset($_SESSION['sum_order'])) && ($_SESSION['sum_order']>0) ) echo $_SESSION['sum_order']; else echo 0; ?>
							<br/><br/>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="from_name" class="form-control" required="required" placeholder="Ваше имя" 
				                value="<?php if (isset($_SESSION['user'])) echo $data['name']; else echo $from_name; ?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="from_telephone" class="form-control" required="required" placeholder="Ваш номер телефона" value="<?=$from_telephone?>">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Комментарий к заказу"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="send" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

<?php require ROOT.'/views/layouts/footer.php'; ?>