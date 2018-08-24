<?php
$current_view = $config['VIEW_PATH'] . 'projetos' . DS;
$action = getURL(2);

if(isset($action)){
	switch ($action) {
		default:
		$view = $current_view . 'detalhes.phtml';
		break;
	}
}