<?php
session_destroy();
echo '<div class="yanyana">
	<h3 class="anabaslik">Merhaba hoşgeldiniz</h3>
	<div class="uyarilar">
	<span>Çıkış işlemi gerçekleşti.Yönlendiriliyorsunuz</span></div></div>';
git("index.php",5);
?>