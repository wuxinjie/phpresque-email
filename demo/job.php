<?php
class SendEmail_Job
{
	public function perform()
	{
		if($this->sendEmail($this->args['to'],$this->args['subject'],$this->args['message'])){
			$this->success($this->args['to']);
		}else{
			$this->fail($this->args['to']);
			throw new Exception('Unable to send this email!');
		}
	}
	
	private function sendEmail($to,$subject,$message){
		sleep(5);
		return 1;
	}
	private function success($to){
		 fwrite(STDOUT, $to." send successed". PHP_EOL);
	}
	
	private function fail($to){
		fwrite(STDOUT, $to." send failed". PHP_EOL);
	}
}