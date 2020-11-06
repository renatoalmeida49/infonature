<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="imagem/png" href="<?php echo BASE_URL; ?>assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
	<title>InfoNature</title>
</head>
<body>
	<header>
		<div class="container">
			<a href="<?php echo BASE_URL; ?>"><div class="simbol">
				<img src="<?php echo BASE_URL; ?>/assets/images/leaf.png" width="150px" height="150px">
			</div></a>
			<div class="name">
				<a href="<?php echo BASE_URL; ?>">InfoNature</a>
			</div>
		</div>
	</header>
	<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</body>
</html>