<footer>
	<h3><span class="text-semi-bold"><?= getenv('APP_NAME') ?></span>@2021 V<?= getenv('APP_VERSION') ?> | <a href="https://github.com/Neosoulink/__TheDash" target="blank_" title="See github repo" class="text-accent">Github</a></h3>
	<h3><?= (!empty(Helpers::get_parsed_phpinfo()["apache2handler"]) &&
				!empty(Helpers::get_parsed_phpinfo()["apache2handler"]["Apache Version"])) ?
				Helpers::get_parsed_phpinfo()["apache2handler"]["Apache Version"] :
				"Php version : " .  Helpers::get_parsed_phpinfo()["Core"]["PHP Version"]; ?>
	</h3>
</footer>
