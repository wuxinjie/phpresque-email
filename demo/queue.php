<?php
if(empty($argv[1])||empty($argv[2])||empty($argv[3])||empty($argv[3])) {
	die('Please input parameters. eg, php queue.php email "wuxinjie123@gmail.com" "hello" "how are you?"'. PHP_EOL);
}

if(!preg_match("/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i",$argv[2])){
	die('Wrong email format'. PHP_EOL);
}
require __DIR__ . '/init.php';
require __DIR__ . '/config.php';
date_default_timezone_set($_config["timezone"]);
Resque::setBackend($_config["backend"]);

$args = array(
	'time' => time(),
	'to' => $argv[2],
	'subject'=>$argv[3],
	'message'=>$argv[4]
);
$jobId = Resque::enqueue($argv[1],'SendEmail_Job', $args, true);
echo "Email ID:".$jobId. PHP_EOL;

