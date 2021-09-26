<?php
$dir = './';
$directories = scandir($dir);
$doNotShow = [
	'index.php',
];

$projectsList = [];

foreach ($directories as $directory) {
	if (!in_array($directory, $doNotShow) && !preg_match('/^[\.].*$/', $directory)) {
		array_push($projectsList, $directory);
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>

	<link rel="stylesheet" href="./.__localDashboard__/assets/css/index.css">
</head>

<body>
	<div class="screen d-flex flex-column">
		<header class="nav space-between-centered">
			<h1 class="app-name">myProjects</h1>
			<div class="">
				<button class="">Favoris</button>
			</div>
		</header>
		<main class="body fill">
			<h1 class="body-title">My local projects (<?= count($projectsList) ?>)</h1>

			<section class="project-list fill">
				<?php foreach ($projectsList as $projectName) { ?>
					<div class="project-item space-between-centered">
						<div>
							<h2 class="project-name"><?= $projectName ?></h2>
							<a href="http://<?= $projectName ?>.dev" target="blank_">Open project</a>
						</div>
						<diV>
							<button>fav</button>
						</diV>
					</div>
				<?php } ?>

			</section>
			<?php if (!count($projectsList)) { ?>
				<div class="empty-list centered">
					List empty
				</div>
			<?php } ?>
		</main>
		<footer class="space-between-centered">
			<div class="copyright">myProjects@<span id="currentYear">2021</span> | Github</div>
			<div> Php v7.4.3</div>
		</footer>
	</div>
	<!--<?= print_r(get_defined_constants()) ?>-->
	<!--<?= phpinfo()  ?>-->
	<pre><?php
				$phpInfoShell = shell_exec('php -i');
				$arrayLinePhpInfo = array_filter(preg_split("/\n/", $phpInfoShell));
				$formattedArrayLines = array();

				foreach ($arrayLinePhpInfo as $lineValue) {
					$splittedLineValue = preg_split("/=>/", $lineValue);
					if (count($splittedLineValue) === 2)
						$formattedArrayLines[str_replace(" ", "", $splittedLineValue[0])] = $splittedLineValue[1];
				}
				echo $formattedArrayLines["LoadedConfigurationFile"];
				?></pre>

</body>

</html>