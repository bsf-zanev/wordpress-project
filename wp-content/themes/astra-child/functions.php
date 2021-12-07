<?php
/*
* Custom Functions Here.
 */

add_action( 'pre_current_active_plugins', 'logPluginsPre' );




function logPluginsPre($pluginsAll){
	$countBsf = 0;
	$pluginLog = get_template_directory() . '/pluginLog.txt';
	if (file_exists($pluginLog)){
		$file = fopen($pluginLog, 'a');
		$countBsf = writePluginLog($file, $pluginsAll);
	}
	else{
		$file = fopen($pluginLog, 'w');
		$countBsf = writePluginLog($file, $pluginsAll);
	}
	fclose($file);
	echo '<em>(<b style="color: red;">' .  $countBsf . '</b> BSF Plugins)</em>';
}




function writePluginLog($file, $pluginsAll){
	$countBsf = 0;
	foreach($pluginsAll as $curPlugin){
		//if (str_contains($curPlugin['AuthorName'], "Brainstorm Force")){
		if(strpos($curPlugin['AuthorName'], 'Brainstorm Force') !== false){
			fwrite($file, $curPlugin['AuthorName'] . "\n");
			$countBsf++;
		}
		// foreach($curPlugin as $detail){
		// 	fwrite($file, $detail . "\n");
		// }
		fwrite($file, "\nNEW-LINE-NEW-PLUGIN-NEW-LINE-NEW-PLUGIN-NEW-LINE-NEW-PLUGIN-NEW-LINE\n");
	}
	fwrite($file, "\n---x---x---x---x---x---x---x---\n");
	return $countBsf;
}

//add_filter( ' option_siteurl', 'updateActivePlugins');

// function updateActivePlugins($vaule1){
// 	$pluginLog = get_template_directory() . '/logOptions.txt';
// 	$file = fopen($pluginLog, 'a');
// 	fwrite($file, $vaule1 . " and asdasdasd");
// 	fclose($file);
// }
?>