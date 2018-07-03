<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	hola mundo
	<form action="<?=base_url()?>index.php/contador/resultados" method='post'>
		<input type="text" name="nombre">
		<input type="submit">
		<hr>
	</form>
</body>
</html>