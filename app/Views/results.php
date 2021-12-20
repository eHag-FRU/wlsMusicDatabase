<!DOCTYPE html>

<html>

	<head>
		<title><?=$title?></title>
	</head>

	<body>
		<ul>

		<?php foreach($form_data as $key => $value): ?>
			<li><?= $key ?>: <?= $value ?></li>
		<?php endforeach; ?>

		</ul>
	</body>

</html>