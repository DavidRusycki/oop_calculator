<?php
require_once(__DIR__.'/vendor/autoload.php');

use \Enum\EnumCalculator;

$oReceiver = new \App\Receiver();
$oReceiver->executeAction();
