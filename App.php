	<?php
	require(Helpers::getRelativeRootPath() . "/components/Layout.php");

	ob_start();
	require(Helpers::getRelativeRootPath() . "/views/Main.view.php");
	$main_view = ob_get_contents();
	ob_end_clean();

	layout($main_view);
