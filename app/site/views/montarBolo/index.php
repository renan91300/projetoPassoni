<?php

if (!defined('URL')){
    header("location: /");
    exit();
}

?>

<div class="app">
	<iframe class="frame" name=Aplicacao src="<?=URL.'/app/appMontarBolo/app.html';?>" frameBorder=0 width=960 height=614 scrolling=no></iframe>
</div>