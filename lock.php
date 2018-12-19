<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(dirname(__FILE__) . '/../../../config.php');

$PAGE->set_url('/admin/tool/sessionbreaker/lock.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('admin');
$strheading = 'Session blocking';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add($strheading, $PAGE->url);

require_login();
require_capability('moodle/site:config', context_system::instance());

echo $OUTPUT->header();

?>

<p>This demonstrates a 'bad' script which locks the session and doesn't release it,
and several victim scripts which are delayed because of it.

<iframe src='good.php' style='height: 70px; width: 100%'></iframe>
<?php usleep(200000); ?>
<iframe src='bad.php' style='height: 70px; width: 100%'></iframe>
<?php usleep(200000); ?>
<iframe src='good.php?id=1' style='height: 70px; width: 100%'></iframe>
<?php usleep(200000); ?>
<iframe src='good.php?id=2' style='height: 70px; width: 100%'></iframe>
<?php usleep(200000); ?>
<iframe src='good.php?id=3' style='height: 70px; width: 100%'></iframe>
<?php usleep(200000); ?>
<iframe src='good.php?id=4' style='height: 70px; width: 100%'></iframe>

<?php

echo $OUTPUT->footer();

