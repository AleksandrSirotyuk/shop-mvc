<?php require ROOT.'/views/layouts/header.php'; ?>
	Ваше имя: <?=$data["name"];?>
	<br/>
	Ваш Email адрес: <?=$data["email"];?>
	<br/>
	<br/>
	<a href="/cabinet/edit">Редактировать данные</a>
<?php require ROOT.'/views/layouts/footer.php'; ?>