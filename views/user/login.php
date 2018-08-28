<?php require ROOT.'/views/layouts/header.php'; ?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Авторизация пользователя</h2>
						<form action="" method="POST">
							<input type="email" name="email" placeholder="Ваш Email адрес" value="<?=$data["email"]?>"/>
							<input type="password" name="password" placeholder="Пароль"/>
							<button type="submit" name="sign_in" class="btn btn-default">Войти</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<?php require ROOT.'/views/layouts/footer.php'; ?>