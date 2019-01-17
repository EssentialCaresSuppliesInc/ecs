<<<<<<< HEAD
<?php
class ControllerCommonLogout extends Controller {
	public function index() {
		$this->user->logout();

		unset($this->session->data['token']);

		$this->response->redirect($this->url->link('common/login', '', true));
	}
}
=======
<?php       
class ControllerCommonLogout extends Controller {   
	public function index() { 
    	$this->user->logout();
 
 		unset($this->session->data['token']);

		$this->redirect($this->url->link('common/login', '', 'SSL'));
  	}
}  
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
