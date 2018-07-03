
	<?php 
echo $v1."<br>";
echo $v2."<br>";
echo $v3."<br>";
$msg = 'My secret message';

$encrypted_string = $this->encrypt->encode($v3);
$plaintext_string = $this->encrypt->decode($encrypted_string);

echo $encrypted_string."<br>";
echo $plaintext_string."<br>";
/*foreach ($v4 as $row) {
	echo $row->nombrePersonal."<br>";
	echo $row->apPaternoPersonal."<br>";
	echo $row->apMaternoPersonal."<br>";

}*/
	 ?>
	 <button type="submit" class="btn btn-success">Guardar</button>
