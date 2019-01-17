<?php
class ModelLocalisationLanguage extends Model {
	public function getLanguage($language_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE language_id = '" . (int)$language_id . "'");
<<<<<<< HEAD

		return $query->row;
=======
		
		return $query->row;	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	}

	public function getLanguages() {
		$language_data = $this->cache->get('language');
<<<<<<< HEAD

		if (!$language_data) {
			$language_data = array();

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE status = '1' ORDER BY sort_order, name");

			foreach ($query->rows as $result) {
				$language_data[$result['code']] = array(
					'language_id' => $result['language_id'],
					'name'        => $result['name'],
					'code'        => $result['code'],
					'locale'      => $result['locale'],
					'image'       => $result['image'],
					'directory'   => $result['directory'],
					'sort_order'  => $result['sort_order'],
					'status'      => $result['status']
				);
			}

			$this->cache->set('language', $language_data);
		}

		return $language_data;
	}
}
=======
		
		if (!$language_data) {		
			$language_data = array();
			
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language ORDER BY sort_order, name");
		
    		foreach ($query->rows as $result) {
      			$language_data[$result['language_id']] = array(
        			'language_id' => $result['language_id'],
        			'name'        => $result['name'],
        			'code'        => $result['code'],
					'locale'      => $result['locale'],
					'image'       => $result['image'],
					'directory'   => $result['directory'],
					'filename'    => $result['filename'],
					'sort_order'  => $result['sort_order'],
					'status'      => $result['status']
      			);
    		}	
			
			$this->cache->set('language', $language_data);
		}
		
		return $language_data;	
	}
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
