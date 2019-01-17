<<<<<<< HEAD
<?php
class ModelLocalisationTaxRate extends Model {
	public function addTaxRate($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rate SET name = '" . $this->db->escape($data['name']) . "', rate = '" . (float)$data['rate'] . "', `type` = '" . $this->db->escape($data['type']) . "', geo_zone_id = '" . (int)$data['geo_zone_id'] . "', date_added = NOW(), date_modified = NOW()");

		$tax_rate_id = $this->db->getLastId();

=======
<?php 
class ModelLocalisationTaxRate extends Model {
	public function addTaxRate($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rate SET name = '" . $this->db->escape($data['name']) . "', rate = '" . (float)$data['rate'] . "', `type` = '" . $this->db->escape($data['type']) . "', geo_zone_id = '" . (int)$data['geo_zone_id'] . "', date_added = NOW(), date_modified = NOW()");
		
		$tax_rate_id = $this->db->getLastId();
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($data['tax_rate_customer_group'])) {
			foreach ($data['tax_rate_customer_group'] as $customer_group_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rate_to_customer_group SET tax_rate_id = '" . (int)$tax_rate_id . "', customer_group_id = '" . (int)$customer_group_id . "'");
			}
		}
<<<<<<< HEAD
		
		return $tax_rate_id;
	}

	public function editTaxRate($tax_rate_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tax_rate SET name = '" . $this->db->escape($data['name']) . "', rate = '" . (float)$data['rate'] . "', `type` = '" . $this->db->escape($data['type']) . "', geo_zone_id = '" . (int)$data['geo_zone_id'] . "', date_modified = NOW() WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rate_to_customer_group WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");

=======
	}
	
	public function editTaxRate($tax_rate_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tax_rate SET name = '" . $this->db->escape($data['name']) . "', rate = '" . (float)$data['rate'] . "', `type` = '" . $this->db->escape($data['type']) . "', geo_zone_id = '" . (int)$data['geo_zone_id'] . "', date_modified = NOW() WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rate_to_customer_group WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($data['tax_rate_customer_group'])) {
			foreach ($data['tax_rate_customer_group'] as $customer_group_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tax_rate_to_customer_group SET tax_rate_id = '" . (int)$tax_rate_id . "', customer_group_id = '" . (int)$customer_group_id . "'");
			}
<<<<<<< HEAD
		}
	}

=======
		}		
	}
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function deleteTaxRate($tax_rate_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rate WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tax_rate_to_customer_group WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
	}
<<<<<<< HEAD

	public function getTaxRate($tax_rate_id) {
		$query = $this->db->query("SELECT tr.tax_rate_id, tr.name AS name, tr.rate, tr.type, tr.geo_zone_id, gz.name AS geo_zone, tr.date_added, tr.date_modified FROM " . DB_PREFIX . "tax_rate tr LEFT JOIN " . DB_PREFIX . "geo_zone gz ON (tr.geo_zone_id = gz.geo_zone_id) WHERE tr.tax_rate_id = '" . (int)$tax_rate_id . "'");

=======
	
	public function getTaxRate($tax_rate_id) {
		$query = $this->db->query("SELECT tr.tax_rate_id, tr.name AS name, tr.rate, tr.type, tr.geo_zone_id, gz.name AS geo_zone, tr.date_added, tr.date_modified FROM " . DB_PREFIX . "tax_rate tr LEFT JOIN " . DB_PREFIX . "geo_zone gz ON (tr.geo_zone_id = gz.geo_zone_id) WHERE tr.tax_rate_id = '" . (int)$tax_rate_id . "'");
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		return $query->row;
	}

	public function getTaxRates($data = array()) {
		$sql = "SELECT tr.tax_rate_id, tr.name AS name, tr.rate, tr.type, gz.name AS geo_zone, tr.date_added, tr.date_modified FROM " . DB_PREFIX . "tax_rate tr LEFT JOIN " . DB_PREFIX . "geo_zone gz ON (tr.geo_zone_id = gz.geo_zone_id)";

		$sort_data = array(
			'tr.name',
			'tr.rate',
			'tr.type',
			'gz.name',
			'tr.date_added',
			'tr.date_modified'
<<<<<<< HEAD
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY tr.name";
		}

=======
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY tr.name";	
		}
		
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
	}

	public function getTaxRateCustomerGroups($tax_rate_id) {
		$tax_customer_group_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_rate_to_customer_group WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");

		foreach ($query->rows as $result) {
			$tax_customer_group_data[] = $result['customer_group_id'];
		}

		return $tax_customer_group_data;
	}

	public function getTotalTaxRates() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_rate");

		return $query->row['total'];
	}

	public function getTotalTaxRatesByGeoZoneId($geo_zone_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_rate WHERE geo_zone_id = '" . (int)$geo_zone_id . "'");

		return $query->row['total'];
	}
}
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
	}
	
	public function getTaxRateCustomerGroups($tax_rate_id) {
		$tax_customer_group_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_rate_to_customer_group WHERE tax_rate_id = '" . (int)$tax_rate_id . "'");
		
		foreach ($query->rows as $result) {
			$tax_customer_group_data[] = $result['customer_group_id'];
		}
		
		return $tax_customer_group_data;			
	}
				
	public function getTotalTaxRates() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_rate");
		
		return $query->row['total'];
	}	
	
	public function getTotalTaxRatesByGeoZoneId($geo_zone_id) {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tax_rate WHERE geo_zone_id = '" . (int)$geo_zone_id . "'");
		
		return $query->row['total'];
	}
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
