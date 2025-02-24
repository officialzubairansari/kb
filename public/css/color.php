<?php
header("Content-Type: text/css");

$primary = json_decode(urldecode($_GET['primary']), true);
$primary_light = json_decode(urldecode($_GET['primary_light']), true);
$secondary = json_decode(urldecode($_GET['secondary']), true);
$secondary_light = json_decode(urldecode($_GET['secondary_light']), true);

?>

:root {
--primary-color: <?= htmlspecialchars($primary) ?>;
--primary-color-light: <?= htmlspecialchars($primary_light) ?>;
--secondary-color: <?= htmlspecialchars($secondary) ?>;
--secondary-color-light: <?= htmlspecialchars($secondary_light) ?>;
}
