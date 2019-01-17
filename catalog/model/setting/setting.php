<<<<<<< HEAD
<?php
class ModelSettingSetting extends Model {
	public function getSetting($code, $store_id = 0) {
		$data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `code` = '" . $this->db->escape($code) . "'");

=======
<?php 
class ModelSettingSetting extends Model {
	public function getSetting($group, $store_id = 0) {
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
<<<<<<< HEAD
				$data[$result['key']] = json_decode($result['value'], true);
=======
				$data[$result['key']] = unserialize($result['value']);
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			}
		}

		return $data;
	}
<<<<<<< HEAD
}
=======
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
