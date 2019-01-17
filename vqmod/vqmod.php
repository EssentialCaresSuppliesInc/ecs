<?php
/**
 * VQMod
 * @description Main Object used
 */
<<<<<<< HEAD
final class VQMod {
	private $_vqversion = '2.3.0';
	private $_modFileList = array();
	private $_mods = array();
	private $_filesModded = array();
	private $_cwd = '';
	private $_doNotMod = array();
	private $_folderChecks = false;
	private $_cachePathFull = '';
	private $_lastModifiedTime = 0;
	private $_devMode = false;

	public $logFolder = 'vqmod/logs/';
	public $vqCachePath = 'vqmod/vqcache/';
	public $modCache = 'vqmod/mods.cache';
	public $protectedFilelist = 'vqmod/vqprotect.txt';
	public $logging = true;
	public $log;
	public $fileModding = false;
	public $directorySeparator = '';

	/**
	 * VQMod::__construct()
=======
abstract class VQMod {
	public static $_vqversion = '2.4.1';
	
	private static $_modFileList = array();
	private static $_mods = array();
	private static $_filesModded = array();
	private static $_cwd = '';
	private static $_doNotMod = array();
	private static $_folderChecks = false;
	private static $_cachePathFull = '';
	private static $_lastModifiedTime = 0;
	private static $_devMode = false;

	public static $logFolder = 'vqmod/logs/';
	public static $vqCachePath = 'vqmod/vqcache/';
	public static $modCache = 'vqmod/mods.cache';
	public static $protectedFilelist = 'vqmod/vqprotect.txt';
	public static $pathReplaces = 'vqmod/pathReplaces.php';
	public static $logging = true;
	public static $log;
	public static $fileModding = false;
	public static $directorySeparator = '';
	public static $_replaces = array();
	public static $windows = false;

	/**
	 * VQMod::bootup()
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	 *
	 * @param bool $path File path to use
	 * @param bool $logging Enable/disabled logging
	 * @return null
	 * @description Startup of VQMod
	 */
<<<<<<< HEAD
	public function __construct($path = false, $logging = true) {
		if(!class_exists('DOMDocument')) {
			die('ERROR - YOU NEED DOMDocument INSTALLED TO USE VQMod');
		}
		
		$this->directorySeparator = defined('DIRECTORY_SEPARATOR') ? DIRECTORY_SEPARATOR : '/';
=======
	public static function bootup($path = false, $logging = true) {
		if(!class_exists('DOMDocument')) {
			die('VQMod::bootup - ERROR - YOU NEED THE PHP "DOMDocument" EXTENSION INSTALLED TO USE VQMod');
		}
		
		if(strtoupper(substr(PHP_OS,0,3)) == 'WIN') {			
			self::$windows = true;
		}
		
		self::$directorySeparator = defined('DIRECTORY_SEPARATOR') ? DIRECTORY_SEPARATOR : '/';
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if(!$path){
			$path = dirname(dirname(__FILE__));
		}
<<<<<<< HEAD
		$this->_setCwd($path);

		$this->logging = (bool) $logging;
		$this->log = new VQModLog($this);

		$this->_getMods();
		$this->_loadProtected();
=======
		self::_setCwd($path);

		self::$logging = (bool) $logging;
		self::$log = new VQModLog();
		
		$replacesPath = self::path(self::$pathReplaces);
		$replaces = array();
		if($replacesPath) {
			include_once($replacesPath);
			self::$_lastModifiedTime = filemtime($replacesPath);
		}
		
		self::$_replaces = !is_array($replaces) ? array() : $replaces;
		self::_getMods();
		self::_loadProtected();
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	/**
	 * VQMod::modCheck()
	 *
	 * @param string $sourceFile path for file
	 * @return string
	 * @description Checks if a file has modifications and applies them, returning cache files or the file name
	 */
<<<<<<< HEAD
	public function modCheck($sourceFile) {

		if(!$this->_folderChecks) {

			if($this->logging) {
				// Create log folder if it doesn't exist
				$log_folder = $this->path($this->logFolder, true);
				$this->dirCheck($log_folder);
			}

			// Create cache folder if it doesn't exist
			$cache_folder = $this->path($this->vqCachePath, true);
			$this->dirCheck($cache_folder);

			// Store cache folder path to save on repeat checks for path validity
			$this->_cachePathFull = $this->path($this->vqCachePath);

			$this->_folderChecks = true;
		}

		if(!preg_match('%^([a-z]:)?[\\\\/]%i', $sourceFile)) {
			$sourcePath = $this->path($sourceFile);
		} else {
			$sourcePath = $this->_realpath($sourceFile);
		}

		if(!$sourcePath || !file_exists($sourcePath) || is_dir($sourcePath) || in_array($sourcePath, $this->_doNotMod)) {
			return $sourceFile;
		}

		$stripped_filename = preg_replace('~^' . preg_quote($this->getCwd(), '~') . '~', '', $sourcePath);
		$cacheFile = $this->_cacheName($stripped_filename);
		$file_last_modified = filemtime($sourcePath);

		if(file_exists($cacheFile) && filemtime($cacheFile) >= $this->_lastModifiedTime && filemtime($cacheFile) >= $file_last_modified) {
			return $cacheFile;
		}

		if(isset($this->_filesModded[$sourcePath])) {
			return $this->_filesModded[$sourcePath]['cached'] ? $cacheFile : $sourceFile;
=======
	public static function modCheck($sourceFile) {

		if(!self::$_folderChecks) {

			if(self::$logging) {
				// Create log folder if it doesn't exist
				$log_folder = self::path(self::$logFolder, true);
				self::dirCheck($log_folder);
			}

			// Create cache folder if it doesn't exist
			$cache_folder = self::path(self::$vqCachePath, true);
			self::dirCheck($cache_folder);

			// Store cache folder path to save on repeat checks for path validity
			self::$_cachePathFull = self::path(self::$vqCachePath);

			self::$_folderChecks = true;
		}

		if(!preg_match('%^([a-z]:)?[\\\\/]%i', $sourceFile)) {
			$sourcePath = self::path($sourceFile);
		} else {
			$sourcePath = self::_realpath($sourceFile);
		}

		if(!$sourcePath || is_dir($sourcePath) || in_array($sourcePath, self::$_doNotMod)) {
			return $sourceFile;
		}

		$stripped_filename = preg_replace('~^' . preg_quote(self::getCwd(), '~i') . '~', '', $sourcePath);
		$cacheFile = self::_cacheName($stripped_filename);
		$file_last_modified = filemtime($sourcePath);

		if(file_exists($cacheFile) && filemtime($cacheFile) >= self::$_lastModifiedTime && filemtime($cacheFile) >= $file_last_modified) {
			return $cacheFile;
		}

		if(isset(self::$_filesModded[$sourcePath])) {
			return self::$_filesModded[$sourcePath]['cached'] ? $cacheFile : $sourceFile;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$changed = false;
		$fileHash = sha1_file($sourcePath);
		$fileData = file_get_contents($sourcePath);

<<<<<<< HEAD
		foreach($this->_mods as $modObject) {
			foreach($modObject->mods as $path => $mods) {
				if($this->_checkMatch($path, $sourcePath)) {
=======
		foreach(self::$_mods as $modObject) {
			foreach($modObject->mods as $path => $mods) {
				if(self::_checkMatch($path, $sourcePath)) {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
					$modObject->applyMod($mods, $fileData);
				}
			}
		}

		if (sha1($fileData) != $fileHash) {
			$writePath = $cacheFile;
			if(!file_exists($writePath) || is_writable($writePath)) {
				file_put_contents($writePath, $fileData);
				$changed = true;
			}
		}

<<<<<<< HEAD
		$this->_filesModded[$sourcePath] = array('cached' => $changed);
		$this->fileModding = false;
=======
		self::$_filesModded[$sourcePath] = array('cached' => $changed);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		return $changed ? $writePath : $sourcePath;
	}

	/**
	 * VQMod::path()
	 *
	 * @param string $path File path
	 * @param bool $skip_real If true path is full not relative
	 * @return bool, string
	 * @description Returns the full true path of a file if it exists, otherwise false
	 */
<<<<<<< HEAD
	public function path($path, $skip_real = false) {
		$tmp = $this->_cwd . $path;
		$realpath = $skip_real ? $tmp : $this->_realpath($tmp);
=======
	public static function path($path, $skip_real = false) {
		$tmp = self::$_cwd . $path;
		$realpath = $skip_real ? $tmp : self::_realpath($tmp);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if(!$realpath) {
			return false;
		}
		return $realpath;
	}

	/**
	 * VQMod::getCwd()
	 *
	 * @return string
	 * @description Returns current working directory
	 */
<<<<<<< HEAD
	public function getCwd() {
		return $this->_cwd;
=======
	public static function getCwd() {
		return self::$_cwd;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	/**
	 * VQMod::dirCheck()
	 * 
	 * @param string $path
	 * @return null
	 * @description Creates $path folder if it doesn't exist 
	 */
<<<<<<< HEAD
	public function dirCheck($path) {
		if(!is_dir($path)) {
			if(!mkdir($path)) {
				die('ERROR! FOLDER CANNOT BE CREATED: ' . $path);
=======
	public static function dirCheck($path) {
		if(!is_dir($path)) {
			if(!mkdir($path)) {
				die('VQMod::dirCheck - CANNOT CREATE "' . $path . '" DIRECTORY');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			}
		}
	}

	/**
	 * VQMod::_getMods()
	 *
	 * @return null
	 * @description Gets list of XML files in vqmod xml folder for processing
	 */
<<<<<<< HEAD
	private function _getMods() {

		$this->_modFileList = glob($this->path('vqmod/xml/') . '*.xml');

		foreach($this->_modFileList as $file) {
			if(file_exists($file)) {
				$lastMod = filemtime($file);
				if($lastMod > $this->_lastModifiedTime){
					$this->_lastModifiedTime = $lastMod;
=======
	private static function _getMods() {

		self::$_modFileList = glob(self::path('vqmod/xml/', true) . '*.xml');

		foreach(self::$_modFileList as $file) {
			if(file_exists($file)) {
				$lastMod = filemtime($file);
				if($lastMod > self::$_lastModifiedTime){
					self::$_lastModifiedTime = $lastMod;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
				}
			}
		}

<<<<<<< HEAD
		$xml_folder_time = filemtime($this->path('vqmod/xml'));
		if($xml_folder_time > $this->_lastModifiedTime){
			$this->_lastModifiedTime = $xml_folder_time;
		}

		$modCache = $this->path($this->modCache);
		if($this->_devMode || !file_exists($modCache)) {
			$this->_lastModifiedTime = time();
		} elseif(file_exists($modCache) && filemtime($modCache) >= $this->_lastModifiedTime) {
			$mods = file_get_contents($modCache);
			$this->_mods = unserialize($mods);
			return;
		}

		if($this->_modFileList) {
			$this->_parseMods();
		} else {
			$this->log->write('NO MODS IN USE');
=======
		$xml_folder_time = filemtime(self::path('vqmod/xml'));
		if($xml_folder_time > self::$_lastModifiedTime){
			self::$_lastModifiedTime = $xml_folder_time;
		}

		$modCache = self::path(self::$modCache);
		if(self::$_devMode || !file_exists($modCache)) {
			self::$_lastModifiedTime = time();
		} elseif(file_exists($modCache) && filemtime($modCache) >= self::$_lastModifiedTime) {
			$mods = file_get_contents($modCache);
			if(!empty($mods))
			self::$_mods = unserialize($mods);
			if(self::$_mods !== false) {
				return;
			}
		}

		if(self::$_modFileList) {
			self::_parseMods();
		} else {
			self::$log->write('VQMod::_getMods - NO XML FILES READABLE IN XML FOLDER');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}
	}

	/**
	 * VQMod::_parseMods()
	 *
	 * @return null
	 * @description Loops through xml files and attempts to load them as VQModObject's
	 */
<<<<<<< HEAD
	private function _parseMods() {

		$dom = new DOMDocument('1.0', 'UTF-8');
		foreach($this->_modFileList as $modFileKey => $modFile) {
			if(file_exists($modFile)) {
				if(@$dom->load($modFile)) {
					$mod = $dom->getElementsByTagName('modification')->item(0);
					$this->_mods[] = new VQModObject($mod, $modFile, $this);
				} else {
					$this->log->write('DOM UNABLE TO LOAD: ' . $modFile);
				}
			} else {
				$this->log->write('FILE NOT FOUND: ' . $modFile);
			}
		}

		$modCache = $this->path($this->modCache);
		$result = file_put_contents($modCache, serialize($this->_mods));
		if(!$result) {
			die('MODS CACHE PATH NOT WRITEABLE');
=======
	private static function _parseMods() {

		$dom = new DOMDocument('1.0', 'UTF-8');
		foreach(self::$_modFileList as $modFileKey => $modFile) {
			if(file_exists($modFile)) {
				if(@$dom->load($modFile)) {
					$mod = $dom->getElementsByTagName('modification')->item(0);
					
					$vqmver = $mod->getElementsByTagName('vqmver')->item(0);
					if($vqmver) {
						$version_check = $vqmver->getAttribute('required');
						if(strtolower($version_check) == 'true') {
							if(version_compare(self::$_vqversion, $vqmver->nodeValue, '<')) {
								self::$log->write('VQMod::_parseMods - FILE "' . $modFile . '" REQUIRES VQMOD "' . $vqmver->nodeValue . '" OR ABOVE AND HAS BEEN SKIPPED');
								continue;
							}
						}
					}
					
					self::$_mods[] = new VQModObject($mod, $modFile);
				} else {
					self::$log->write('VQMod::_parseMods - DOM UNABLE TO LOAD: ' . $modFile);
				}
			} else {
				self::$log->write('VQMod::_parseMods - FILE NOT FOUND: ' . $modFile);
			}
		}

		$modCache = self::path(self::$modCache, true);
		$result = file_put_contents($modCache, serialize(self::$_mods));
		if(!$result) {
			die('VQMod::_parseMods - "/vqmod/mods.cache" FILE NOT WRITEABLE');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}
	}

	/**
	 * VQMod::_loadProtected()
	 *
	 * @return null
	 * @description Loads protected list and adds them to _doNotMod array
	 */
<<<<<<< HEAD
	private function _loadProtected() {
		$file = $this->path($this->protectedFilelist);
=======
	private static function _loadProtected() {
		$file = self::path(self::$protectedFilelist);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if($file && is_file($file)) {
			$protected = file_get_contents($file);
			if(!empty($protected)) {
				$protected = preg_replace('~\r?\n~', "\n", $protected);
				$paths = explode("\n", $protected);
				foreach($paths as $path) {
<<<<<<< HEAD
					$fullPath = $this->path($path);
					if($fullPath && !in_array($fullPath, $this->_doNotMod)) {
						$this->_doNotMod[] = $fullPath;
=======
					$fullPath = self::path($path);
					if($fullPath && !in_array($fullPath, self::$_doNotMod)) {
						self::$_doNotMod[] = $fullPath;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
					}
				}
			}
		}
	}

	/**
	 * VQMod::_cacheName()
	 *
	 * @param string $file Filename to be converted to cache filename
	 * @return string
	 * @description Returns cache file name for a path
	 */
<<<<<<< HEAD
	private function _cacheName($file) {
		return $this->_cachePathFull . 'vq2-' . preg_replace('~[/\\\\]+~', '_', $file);
=======
	private static function _cacheName($file) {
		return self::$_cachePathFull . 'vq2-' . preg_replace('~[/\\\\]+~', '_', $file);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	/**
	 * VQMod::_setCwd()
	 *
	 * @param string $path Path to be used as current working directory
	 * @return null
	 * @description Sets the current working directory variable
	 */
<<<<<<< HEAD
	private function _setCwd($path) {
		$this->_cwd = $this->_realpath($path);
=======
	private static function _setCwd($path) {
		self::$_cwd = self::_realpath($path);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	/**
	 * VQMod::_realpath()
	 * 
	 * @param string $file
	 * @return string
	 * @description Returns real path of any path, adding directory slashes if necessary
	 */
<<<<<<< HEAD
	private function _realpath($file) {
		$path = realpath($file);
		if(!file_exists($path)) {
			return $file;
		}

		if(is_dir($path)) {
			$path = rtrim($path, $this->directorySeparator) . $this->directorySeparator;
=======
	private static function _realpath($file) {
		$path = realpath($file);
		if(!file_exists($path)) {
			return false;
		}

		if(is_dir($path)) {
			$path = rtrim($path, self::$directorySeparator) . self::$directorySeparator;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		return $path;
	}

	/**
	 * VQMod::_checkMatch()
	 *
	 * @param string $modFilePath Modification path from a <file> node
	 * @param string $checkFilePath File path
	 * @return bool
	 * @description Checks a modification path against a file path
	 */
<<<<<<< HEAD
	private function _checkMatch($modFilePath, $checkFilePath) {
		$modFilePath = str_replace('\\', '/', $modFilePath);
		$checkFilePath = str_replace('\\', '/', $checkFilePath);
		
		if(strpos($modFilePath, '*') !== false) {
			$modFilePath = preg_replace('/([^*]+)/e', 'preg_quote("$1", "~")', $modFilePath);
=======
	private static function _checkMatch($modFilePath, $checkFilePath) {
		$modFilePath = str_replace('\\', '/', $modFilePath);
		$checkFilePath = str_replace('\\', '/', $checkFilePath);
		
		if(self::$windows) {
			$modFilePath = strtolower($modFilePath);
			$checkFilePath = strtolower($checkFilePath);
		}
		
		if(strpos($modFilePath, '*') !== false) {
			$modFilePath = preg_replace_callback('~([^*]+)~', array('self', '_quotePath'), $modFilePath);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			$modFilePath = str_replace('*', '[^/]*', $modFilePath);
			$return = (bool) preg_match('~^' . $modFilePath . '$~', $checkFilePath);
		} else {
			$return = $modFilePath == $checkFilePath;
		}
		
		return $return;

	}
<<<<<<< HEAD
=======

	/**
	 * VQMod::_quotePath()
	 *
	 * @param string $matches callback matches
	 * @return string
	 * @description apply's preg_quote to string from callback
	 */
	private static function _quotePath($matches) {
		return preg_quote($matches[1], '~');
	}
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
}

/**
 * VQModLog
 * @description Object to log information to a file
 */
class VQModLog {
	private $_sep;
<<<<<<< HEAD
	private $_vqmod;
=======
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	private $_defhash = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
	private $_logs = array();

	/**
	 * VQModLog::__construct()
	 *
<<<<<<< HEAD
	 * @param VQMod $vqmod VQMod main class as reference
	 * @return null
	 * @description Object instantiation method
	 */
	public function __construct(VQMod $vqmod) {
		$this->_vqmod = $vqmod;
=======
	 * @return null
	 * @description Object instantiation method
	 */
	public function __construct() {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->_sep = str_repeat('-', 70);
	}

	/**
	 * VQModLog::__destruct()
	 *
	 * @return null
	 * @description Logs any messages to the log file just before object is destroyed
	 */
	public function __destruct() {
<<<<<<< HEAD
		if(empty($this->_logs) || $this->_vqmod->logging == false) {
			return;
		}

		$logPath = $this->_vqmod->path($this->_vqmod->logFolder . date('D') . '.log', true);
=======
		if(empty($this->_logs) || VQMod::$logging == false) {
			return;
		}

		$logPath = VQMod::path(VQMod::$logFolder . date('w_D') . '.log', true);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		$txt = array();

		$txt[] = str_repeat('-', 10) . ' Date: ' . date('Y-m-d H:i:s') . ' ~ IP : ' . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'N/A') . ' ' . str_repeat('-', 10);
		$txt[] = 'REQUEST URI : ' . $_SERVER['REQUEST_URI'];

		foreach($this->_logs as $count => $log) {
			if($log['obj']) {
				$vars = get_object_vars($log['obj']);
				$txt[] = 'MOD DETAILS:';
				foreach($vars as $k => $v) {
					if(is_string($v)) {
						$txt[] = '   ' . str_pad($k, 10, ' ', STR_PAD_RIGHT) . ': ' . $v;
					}
				}

			}

			foreach($log['log'] as $msg) {
				$txt[] = $msg;
			}

			if ($count > count($this->_logs)-1) {
				$txt[] = '';
			}
		}

		$txt[] = $this->_sep;
		$txt[] = str_repeat(PHP_EOL, 2);
		$append = true;

		if(!file_exists($logPath)) {
			$append = false;
		} else {
			$content = file_get_contents($logPath);
			if(!empty($content) && strpos($content, ' Date: ' . date('Y-m-d ')) === false) {
				$append = false;
			}
		}

		$result = file_put_contents($logPath, implode(PHP_EOL, $txt), ($append ? FILE_APPEND : 0));
		if(!$result) {
<<<<<<< HEAD
			die('LOG FILE COULD NOT BE WRITTEN');
=======
			die('VQModLog::__destruct - LOG FILE "' . $logPath . '" COULD NOT BE WRITTEN');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}
	}

	/**
	 * VQModLog::write()
	 *
	 * @param string $data Text to be added to log file
	 * @param VQModObject $obj Modification the error belongs to
	 * @return null
	 * @description Adds error to log object ready to be output
	 */
	public function write($data, VQModObject $obj = NULL) {
		if($obj) {
			$hash = sha1($obj->id);
		} else {
			$hash = $this->_defhash;
		}

		if(empty($this->_logs[$hash])) {
			$this->_logs[$hash] = array(
				'obj' => $obj,
				'log' => array()
			);
		}

<<<<<<< HEAD
		if($this->_vqmod->fileModding) {
			$this->_logs[$hash]['log'][] = PHP_EOL . 'File Name    : ' . $this->_vqmod->fileModding;
=======
		if(VQMod::$fileModding) {
			$this->_logs[$hash]['log'][] = PHP_EOL . 'File Name    : ' . VQMod::$fileModding;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->_logs[$hash]['log'][] = $data;

	}
}

/**
 * VQModObject
 * @description Object for the <modification> that orchestrates each applied modification
 */
class VQModObject {
	public $modFile = '';
	public $id = '';
	public $version = '';
	public $vqmver = '';
	public $author = '';
	public $mods = array();

<<<<<<< HEAD
	private $_vqmod;
=======
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	private $_skip = false;

	/**
	 * VQModObject::__construct()
	 *
	 * @param DOMNode $node <modification> node
	 * @param string $modFile File modification is from
<<<<<<< HEAD
	 * @param VQMod $vqmod VQMod object as reference
	 * @return null
	 * @description Loads modification meta information
	 */
	public function __construct(DOMNode $node, $modFile, VQmod $vqmod) {
=======
	 * @return null
	 * @description Loads modification meta information
	 */
	public function __construct(DOMNode $node, $modFile) {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if($node->hasChildNodes()) {
			foreach($node->childNodes as $child) {
				$name = (string) $child->nodeName;
				if(isset($this->$name)) {
					$this->$name = (string) $child->nodeValue;
				}
			}
		}

		$this->modFile = $modFile;
<<<<<<< HEAD
		$this->_vqmod = $vqmod;
=======
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->_parseMods($node);
	}

	/**
	 * VQModObject::skip()
	 *
	 * @return bool
	 * @description Returns the skip status of a modification
	 */
	public function skip() {
		return $this->_skip;
	}

	/**
	 * VQModObject::applyMod()
	 *
	 * @param array $mods Array of search add nodes
	 * @param string $data File contents to be altered
	 * @return null
	 * @description Applies all modifications to the text data
	 */
	public function applyMod($mods, &$data) {
		if($this->_skip) return;
		$tmp = $data;

		foreach($mods as $mod) {
<<<<<<< HEAD
			if($mod['ignoreif']) {
=======
			VQMod::$fileModding = $mod['fileToMod'] . '(' . $mod['opIndex'] . ')';
			if(!empty($mod['ignoreif'])) {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
				if($mod['ignoreif']->regex == 'true') {
					if (preg_match($mod['ignoreif']->getContent(), $tmp)) {
						continue;
					}
				} else {
					if (strpos($tmp, $mod['ignoreif']->getContent()) !== false) {
						continue;
					}
				}
			}
			
			$indexCount = 0;
			
			$tmp = $this->_explodeData($tmp);
			$lineMax = count($tmp) - 1;

			switch($mod['search']->position) {
				case 'top':
				$tmp[$mod['search']->offset] =  $mod['add']->getContent() . $tmp[$mod['search']->offset];
				break;

				case 'bottom':
				$offset = $lineMax - $mod['search']->offset;
				if($offset < 0){
					$tmp[-1] = $mod['add']->getContent();
				} else {
					$tmp[$offset] .= $mod['add']->getContent();
				}
				break;

<<<<<<< HEAD
				case 'all':
				$tmp = array($mod['add']->getContent());
				break;

=======
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
				default:

				$changed = false;
				foreach($tmp as $lineNum => $line) {
					if(strlen($mod['search']->getContent()) == 0) {
						if($mod['error'] == 'log' || $mod['error'] == 'abort') {
<<<<<<< HEAD
							$this->_vqmod->log->write('EMPTY SEARCH CONTENT ERROR', $this);
=======
							VQMod::$log->write('VQModObject::applyMod - EMPTY SEARCH CONTENT ERROR', $this);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
						}
						break;
					}
					
					if($mod['search']->regex == 'true') {
						$pos = @preg_match($mod['search']->getContent(), $line);
						if($pos === false) {
							if($mod['error'] == 'log' || $mod['error'] == 'abort' ) {
<<<<<<< HEAD
								$this->_vqmod->log->write('INVALID REGEX ERROR - ' . $mod['search']->getContent(), $this);
=======
								VQMod::$log->write('VQModObject::applyMod - INVALID REGEX ERROR - ' . $mod['search']->getContent(), $this);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
							}
							continue 2;
						} elseif($pos == 0) {
							$pos = false;
						}
					} else {
						$pos = strpos($line, $mod['search']->getContent());
					}

					if($pos !== false) {
						$indexCount++;
						$changed = true;

						if(!$mod['search']->indexes() || ($mod['search']->indexes() && in_array($indexCount, $mod['search']->indexes()))) {

							switch($mod['search']->position) {
								case 'before':
								$offset = ($lineNum - $mod['search']->offset < 0) ? -1 : $lineNum - $mod['search']->offset;
								$tmp[$offset] = empty($tmp[$offset]) ? $mod['add']->getContent() : $mod['add']->getContent() . "\n" . $tmp[$offset];
								break;

								case 'after':
								$offset = ($lineNum + $mod['search']->offset > $lineMax) ? $lineMax : $lineNum + $mod['search']->offset;
								$tmp[$offset] = $tmp[$offset] . "\n" . $mod['add']->getContent();
								break;
<<<<<<< HEAD
=======
								
								case 'ibefore':
								$tmp[$lineNum] = str_replace($mod['search']->getContent(), $mod['add']->getContent() . $mod['search']->getContent(), $line);
								break;
								
								case 'iafter':
								$tmp[$lineNum] = str_replace($mod['search']->getContent(), $mod['search']->getContent() . $mod['add']->getContent(), $line);
								break;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

								default:
								if(!empty($mod['search']->offset)) {
									for($i = 1; $i <= $mod['search']->offset; $i++) {
										if(isset($tmp[$lineNum + $i])) {
											$tmp[$lineNum + $i] = '';
										}
									}
								}

								if($mod['search']->regex == 'true') {
									$tmp[$lineNum] = preg_replace($mod['search']->getContent(), $mod['add']->getContent(), $line);
								} else {
									$tmp[$lineNum] = str_replace($mod['search']->getContent(), $mod['add']->getContent(), $line);
								}
								break;
							}
						}
					}
				}

				if(!$changed) {
					$skip = ($mod['error'] == 'skip' || $mod['error'] == 'log') ? ' (SKIPPED)' : ' (ABORTING MOD)';

					if($mod['error'] == 'log' || $mod['error'] == 'abort') {
<<<<<<< HEAD
						$this->_vqmod->log->write('SEARCH NOT FOUND' . $skip . ': ' . $mod['search']->getContent(), $this);
=======
						VQMod::$log->write('VQModObject::applyMod - SEARCH NOT FOUND' . $skip . ': ' . $mod['search']->getContent(), $this);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
					}

					if($mod['error'] == 'abort') {
						$this->_skip = true;
						return;
					}

				}

				break;
			}
			ksort($tmp);
			$tmp = $this->_implodeData($tmp);
		}
<<<<<<< HEAD
=======
		
		VQMod::$fileModding = false;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		$data = $tmp;
	}

	/**
	 * VQModObject::_parseMods()
	 *
	 * @param DOMNode $node <modification> node to be parsed
	 * @return null
	 * @description Parses modifications in preparation for the applyMod method to work
	 */
	private function _parseMods(DOMNode $node){
		$files = $node->getElementsByTagName('file');
		
<<<<<<< HEAD
		$replaces = array();
		$replacesPath = $this->_vqmod->path('vqmod/pathReplaces.php');
		if($replacesPath) {
			include_once($replacesPath);
		}
=======
		$replaces = VQMod::$_replaces;
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		foreach($files as $file) {
			$path = $file->getAttribute('path') ? $file->getAttribute('path') : '';
			$filesToMod = explode(',', $file->getAttribute('name'));
			
			foreach($filesToMod as $filename) {
				
				$fileToMod = $path . $filename;
				if(!empty($replaces)) {
					foreach($replaces as $r) {
						if(count($r) == 2) {
							$fileToMod = preg_replace($r[0], $r[1], $fileToMod);
						}
					}
				}
				
				$error = ($file->hasAttribute('error')) ? $file->getAttribute('error') : 'log';
<<<<<<< HEAD
				$fullPath = $this->_vqmod->path($fileToMod);
	
				if(!$fullPath || !file_exists($fullPath)){
					if(strpos($fileToMod, '*') !== false) {
						$fullPath = $this->_vqmod->getCwd() . $fileToMod;
					} else {
						if ($error == 'log' || $error == 'abort') {
							$skip = ($error == 'log') ? ' (SKIPPED)' : ' (ABORTING MOD)';
							$this->_vqmod->log->write('Could not resolve path for [' . $fileToMod . ']' . $skip, $this);
=======
				$fullPath = VQMod::path($fileToMod);
	
				if(!$fullPath || !file_exists($fullPath)){
					if(strpos($fileToMod, '*') !== false) {
						$fullPath = VQMod::getCwd() . $fileToMod;
					} else {
						if ($error == 'log' || $error == 'abort') {
							$skip = ($error == 'log') ? ' (SKIPPED)' : ' (ABORTING MOD)';
							VQMod::$log->write('VQModObject::parseMods - Could not resolve path for [' . $fileToMod . ']' . $skip, $this);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
						}
	
						if ($error == 'log' || $error == 'skip') {
							continue;
						} elseif ($error == 'abort') {
							return false;
						}
					}
				}
	
				$operations = $file->getElementsByTagName('operation');
	
<<<<<<< HEAD
				foreach($operations as $operation) {
=======
				foreach($operations as $opIndex => $operation) {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
					$error = ($operation->hasAttribute('error')) ? $operation->getAttribute('error') : 'abort';
					$ignoreif = $operation->getElementsByTagName('ignoreif')->item(0);
					
					if($ignoreif) {
						$ignoreif = new VQSearchNode($ignoreif);
					} else {
						$ignoreif = false;
					}
					
					
					$this->mods[$fullPath][] = array(
						'search' 		=> new VQSearchNode($operation->getElementsByTagName('search')->item(0)),
						'add' 			=> new VQAddNode($operation->getElementsByTagName('add')->item(0)),
						'ignoreif'		=> $ignoreif,
<<<<<<< HEAD
						'error'		 	=> $error
=======
						'error'		 	=> $error,
						'fileToMod'		=> $fileToMod,
						'opIndex'		=> $opIndex,
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
					);
				}
			}
		}
	}

	/**
	 * VQModObject::_explodeData()
	 *
	 * @param string $data File contents
	 * @return string
	 * @description Splits a file into an array of individual lines
	 */
	private function _explodeData($data) {
		return explode("\n", $data);
	}

	/**
	 * VQModObject::_implodeData()
	 *
	 * @param array $data Array of lines
	 * @return string
	 * @description Joins an array of lines back into a text file
	 */
	private function _implodeData($data) {
		return implode("\n", $data);
	}
}

/**
 * VQNode
 * @description Basic node object blueprint
 */
class VQNode {
	public $trim = 'false';

	private $_content = '';

	/**
	 * VQNode::__construct()
	 *
	 * @param DOMNode $node Search/add node
	 * @return null
	 * @description Parses the node attributes and sets the node property
	 */
	public function  __construct(DOMNode $node) {
		$this->_content = $node->nodeValue;

		if($node->hasAttributes()) {
			foreach($node->attributes as $attr) {
				$name = $attr->nodeName;
				if(isset($this->$name)) {
					$this->$name = $attr->nodeValue;
				}
			}
		}
	}

	/**
	 * VQNode::getContent()
	 *
	 * @return string
	 * @description Returns the content, trimmed if applicable
	 */
	public function getContent() {
		$content = ($this->trim == 'true') ? trim($this->_content) : $this->_content;
		return $content;
	}
}

/**
 * VQSearchNode
 * @description Object for the <search> xml tags
 */
class VQSearchNode extends VQNode {
	public $position = 'replace';
	public $offset = 0;
	public $index = 'false';
	public $regex = 'false';
	public $trim = 'true';

	/**
	 * VQSearchNode::indexes()
	 *
	 * @return bool, array
	 * @description Returns the index values to use the search on, or false if none
	 */
	public function indexes() {
		if($this->index == 'false') {
			return false;
		}
		$tmp = explode(',', $this->index);
		foreach($tmp as $k => $v) {
			if(!is_int($v)) {
				unset($k);
			}
		}
		$tmp = array_unique($tmp);
		return empty($tmp) ? false : $tmp;
	}
}

/**
 * VQAddNode
 * @description Object for the <add> xml tags
 */
class VQAddNode extends VQNode {
}