<?php
class ModelSettingStore extends Model {
	public function getStores($data = array()) {
		$store_data = $this->cache->get('store');
<<<<<<< HEAD

=======
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!$store_data) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "store ORDER BY url");

			$store_data = $query->rows;
<<<<<<< HEAD

			$this->cache->set('store', $store_data);
		}

		return $store_data;
	}
}
=======
		
			$this->cache->set('store', $store_data);
		}
	 
		return $store_data;
	}	
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
