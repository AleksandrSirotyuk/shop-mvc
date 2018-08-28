<?php require ROOT.'/views/layouts/header.php'; ?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Сменить пароль</h2>
						<form action="" method="POST">
							<input type="text" name="name" placeholder="Ваше имя" value="<?=$data["name"]?>"/>
							<input type="password" name="password" placeholder="Пароль"/>
							<input type="password" name="password_2" placeholder="Повторный пароль"/>
							<button type="submit" name="edit" class="btn btn-default">Сохранить</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<?php require ROOT.'/views/layouts/footer.php'; ?>