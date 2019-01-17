<?php
class Response {
<<<<<<< HEAD
	private $headers = array();
	private $level = 0;
	private $output;

=======
	private $headers = array(); 
	private $level = 0;
	private $output;
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function addHeader($header) {
		$this->headers[] = $header;
	}

<<<<<<< HEAD
	public function redirect($url, $status = 302) {
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
		exit();
	}

	public function setCompression($level) {
		$this->level = $level;
	}

	public function getOutput() {
		return $this->output;
	}
	
=======
	public function redirect($url) {
		header('Location: ' . $url);
		exit;
	}
	
	public function setCompression($level) {
		$this->level = $level;
	}
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function setOutput($output) {
		$this->output = $output;
	}

	private function compress($data, $level = 0) {
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)) {
			$encoding = 'gzip';
<<<<<<< HEAD
		}
=======
		} 
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)) {
			$encoding = 'x-gzip';
		}

<<<<<<< HEAD
		if (!isset($encoding) || ($level < -1 || $level > 9)) {
=======
		if (!isset($encoding)) {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			return $data;
		}

		if (!extension_loaded('zlib') || ini_get('zlib.output_compression')) {
			return $data;
		}

		if (headers_sent()) {
			return $data;
		}

<<<<<<< HEAD
		if (connection_status()) {
			return $data;
		}

=======
		if (connection_status()) { 
			return $data;
		}
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->addHeader('Content-Encoding: ' . $encoding);

		return gzencode($data, (int)$level);
	}

	public function output() {
		if ($this->output) {
<<<<<<< HEAD
			$output = $this->level ? $this->compress($this->output, $this->level) : $this->output;
=======
			if ($this->level) {
				$ouput = $this->compress($this->output, $this->level);
			} else {
				$ouput = $this->output;
			}	
				
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			if (!headers_sent()) {
				foreach ($this->headers as $header) {
					header($header, true);
				}
			}
<<<<<<< HEAD
			echo $output;
		}
	}
}
=======
			
			echo $ouput;
		}
	}
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
