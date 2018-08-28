<?php
include ROOT.'/models/Feedback.php';

class FeedbackController{
	public function actionIndex(){
		$from_name = "";
		$from_email = "";
		
		$feedback = new Feedback();
		$feedback->SendLetter();

		require ROOT.'/views/feedback/index.php';
		return true;
	}
}

?>