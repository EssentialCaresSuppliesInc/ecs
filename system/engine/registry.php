<?php
final class Registry {
	private $data = array();

	public function get($key) {
<<<<<<< HEAD
		return (isset($this->data[$key]) ? $this->data[$key] : null);
=======
		return (isset($this->data[$key]) ? $this->data[$key] : NULL);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	public function set($key, $value) {
		$this->data[$key] = $value;
	}

	public function has($key) {
<<<<<<< HEAD
		return isset($this->data[$key]);
	}
}
=======
    	return isset($this->data[$key]);
  	}
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
