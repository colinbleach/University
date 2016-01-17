#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use AppBundle\Console\GeneratePathCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GeneratePathCommand());
$application->run();