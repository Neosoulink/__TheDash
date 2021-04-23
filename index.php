<?php
$dir = './';
$directories = scandir($dir);
$doNotShow = [
	'.',
	'..',
	'.editorconfig',
	'index.php',
];

$projectsList = [];

foreach ($directories as $directory) {
	if (!in_array($directory, $doNotShow)) {
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

	<!-- Style -->
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: bottom;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			scroll-behavior: smooth;
		}

		body,
		html {
			background-color: whitesmoke;
			max-width: 100%;
		}

		.screen {
			max-width: 100%;
			min-height: 100%;
		}

		header.nav {
			box-shadow: 5px 0px 20px 0.5px rgba(0, 0, 0, 0.3);
			height: 75px;
			max-height: 75px;
		}

		header.nav>div,
		header.nav>h1 {
			display: flex;
			align-items: center;
			height: 100%;
			padding: 0px 10px;
		}

		header.nav>h1 {
			color: gray;
			font-weight: 300;
			font-size: 1.5rem;
		}

		main.body {
			min-height: 70vh;
			padding: 40px 10px 10px;
		}

		main.body>.body-title {
			font-weight: 600;
			font-size: 2rem;
			margin-bottom: 20px;
		}

		main.body>section.project-list {
			display: flex;
			flex-direction: column;
			width: 100%;
		}

		main.body>section.project-list>.project-item {
			padding: 10px 20px;
			background-color: rgba(0, 0, 0, 0.05);
			border-radius: 5px;
			margin-bottom: 20px;
		}

		main.body>section.project-list>.project-item .project-name {
			font-weight: 400;
			font-size: 1.5rem;
			margin-bottom: 10px;
		}

		footer {
			padding: 10px 10px 20px 10px;
		}

		.d-flex {
			display: flex;
		}

		.flex-column {
			flex-direction: column;
		}

		.fill {
			flex-grow: 1;
		}

		.centered {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.space-between-centered {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
	</style>
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
				<?php foreach ($projectsList as $project) { ?>
					<div class="project-item space-between-centered">
						<div>
							<h2 class="project-name"><?= $project ?></h2>
							<a href="/<?= $project ?>">Open project</a>
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

</body>

</html>
