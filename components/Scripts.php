<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
<?php
require Helpers::getRelativeRootPath() . '/lib/php-hot-reloader/src/HotReloader.php';
new HotReloader\HotReloader('//localhost/' . getenv('APP_NAME') . '/phrwatcher.php');
