<?php
if(empty($argv[1])) {
	die('Specify the ID of a email to monitor the status of.');
}

require __DIR__ . '/init.php';
require __DIR__ . '/config.php';

date_default_timezone_set($_config["timezone"]);
Resque::setBackend($_config["backend"]);

$status = new Resque_Job_Status($argv[1]);
if(!$status->isTracking()) {
	die("Resque is not tracking the status of this job.\n");
}

echo "Tracking status of ".$argv[1].". Press [break] to stop.\n\n";
$state="";
while(true) {
	switch($status->get()){
		 case 1:$state="WAITING";break;
		 case 2:$state="RUNNING";break;
		 case 3:$state="FAILED";break;
		 case 4:$state="SEND";break;
	}
	fwrite(STDOUT, "Status of ".$argv[1]." is: ".$state."\n");
	sleep(1);
}