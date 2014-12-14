<?php

require __DIR__ . '/config.php';
date_default_timezone_set($_config["timezone"]);
require 'job.php';

require '../bin/resque';


