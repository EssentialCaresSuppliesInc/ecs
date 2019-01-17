<?php
class Config {
	private $data = array();

<<<<<<< HEAD
	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : null);
	}

	public function set($key, $value) {
		$this->data[$key] = $value;
	}

	public function has($key) {
		return isset($this->data[$key]);
	}

	public function load($filename) {
		$file = DIR_CONFIG . $filename . '.php';

		if (file_exists($file)) {
			$_ = array();

			require($file);

			$this->data = array_merge($this->data, $_);
=======
  	public function get($key) {
    	return (isset($this->data[$key]) ? $this->data[$key] : null);
  	}	
	
	public function set($key, $value) {
    	$this->data[$key] = $value;
  	}

	public function has($key) {
    	return isset($this->data[$key]);
  	}

  	public function load($filename) {
		$file = DIR_CONFIG . $filename . '.php';
		
    	if (file_exists($file)) { 
	  		$_ = array();
	  
	  		require($file);
	  
	  		$this->data = array_merge($this->data, $_);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		} else {
			trigger_error('Error: Could not load config ' . $filename . '!');
			exit();
		}
<<<<<<< HEAD
	}
}
=======
  	}
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
