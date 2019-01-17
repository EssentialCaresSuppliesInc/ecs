<<<<<<< HEAD
<?php
class ModelLocalisationTaxClass extends Model {
	public function addTaxClass($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tax_class SET title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "', date_added = NOW()");

		$tax_class_id = $this->db->getLastId();

=======
<?php 
class ModelLocalisationTaxClass extends Model {
	public function addTaxClass($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tax_class SET title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "', date_added = NOW()");
		
		$tax_class_id = $this->db->getLastId();
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($data['tax_rule'])) {
			foreach ($data['tax_rule'] as $tax_rule) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rule SET tax_class_id = '" . (int)$tax_class_id . "', tax_rate_id = '" . (int)$tax_rule['tax_rate_id'] . "', based = '" . $this->db->escape($tax_rule['based']) . "', priority = '" . (int)$tax_rule['priority'] . "'");
			}
		}
<<<<<<< HEAD

		$this->cache->delete('tax_class');
		
		return $tax_class_id;
	}

	public function editTaxClass($tax_class_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tax_class SET title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "', date_modified = NOW() WHERE tax_class_id = '" . (int)$tax_class_id . "'");

=======
		
		$this->cache->delete('tax_class');
	}
	
	public function editTaxClass($tax_class_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tax_class SET title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "', date_modified = NOW() WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rule WHERE tax_class_id = '" . (int)$tax_class_id . "'");

		if (isset($data['tax_rule'])) {
			foreach ($data['tax_rule'] as $tax_rule) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rule SET tax_class_id = '" . (int)$tax_class_id . "', tax_rate_id = '" . (int)$tax_rule['tax_rate_id'] . "', based = '" . $this->db->escape($tax_rule['based']) . "', priority = '" . (int)$tax_rule['priority'] . "'");
			}
		}
<<<<<<< HEAD

		$this->cache->delete('tax_class');
	}

	public function deleteTaxClass($tax_class_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rule WHERE tax_class_id = '" . (int)$tax_class_id . "'");

		$this->cache->delete('tax_class');
	}

	public function getTaxClass($tax_class_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int)$tax_class_id . "'");

=======
		
		$this->cache->delete('tax_class');
	}
	
	public function deleteTaxClass($tax_class_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rule WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		
		$this->cache->delete('tax_class');
	}
	
	public function getTaxClass($tax_class_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		return $query->row;
	}

	public function getTaxClasses($data = array()) {
<<<<<<< HEAD
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tax_class";

			$sql .= " ORDER BY title";

=======
    	if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tax_class";

			$sql .= " ORDER BY title";	
			
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}
<<<<<<< HEAD

			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$query = $this->db->query($sql);

			return $query->rows;
=======
			
			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}					

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}	
			
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}
			
	  		$query = $this->db->query($sql);
		
			return $query->rows;		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		} else {
			$tax_class_data = $this->cache->get('tax_class');

			if (!$tax_class_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_class");
<<<<<<< HEAD

				$tax_class_data = $query->rows;

				$this->cache->set('tax_class', $tax_class_data);
			}

			return $tax_class_data;
		}
	}

	public function getTotalTaxClasses() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_class");

		return $query->row['total'];
	}

	public function getTaxRules($tax_class_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_rule WHERE tax_class_id = '" . (int)$tax_class_id . "'");

		return $query->rows;
	}

	public function getTotalTaxRulesByTaxRateId($tax_rate_id) {
		$query = $this->db->query("SELECT COUNT(DISTINCT tax_class_id) AS total FROM " . DB_PREFIX . "tax_rule WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");

		return $query->row['total'];
	}
}
=======
	
				$tax_class_data = $query->rows;
			
				$this->cache->set('tax_class', $tax_class_data);
			}
			
			return $tax_class_data;			
		}
	}
					
	public function getTotalTaxClasses() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_class");
		
		return $query->row['total'];
	}	
	
	public function getTaxRules($tax_class_id) {
      	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_rule WHERE tax_class_id = '" . (int)$tax_class_id . "'");
		
		return $query->rows;
	}
	
	public function getTotalTaxRulesByTaxRateId($tax_rate_id) {
      	$query = $this->db->query("SELECT COUNT(DISTINCT tax_class_id) AS total FROM " . DB_PREFIX . "tax_rule WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
		
		return $query->row['total'];
	}		
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
