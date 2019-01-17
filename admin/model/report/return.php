<?php
class ModelReportReturn extends Model {
	public function getReturns($data = array()) {
<<<<<<< HEAD
		$sql = "SELECT MIN(r.date_added) AS date_start, MAX(r.date_added) AS date_end, COUNT(r.return_id) AS `returns` FROM `" . DB_PREFIX . "return` r";
=======
		$sql = "SELECT MIN(r.date_added) AS date_start, MAX(r.date_added) AS date_end, COUNT(r.return_id) AS `returns` FROM `" . DB_PREFIX . "return` r"; 
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if (!empty($data['filter_return_status_id'])) {
			$sql .= " WHERE r.return_status_id = '" . (int)$data['filter_return_status_id'] . "'";
		} else {
			$sql .= " WHERE r.return_status_id > '0'";
		}
<<<<<<< HEAD

=======
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!empty($data['filter_date_start'])) {
			$sql .= " AND DATE(r.date_added) >= '" . $this->db->escape($data['filter_date_start']) . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND DATE(r.date_added) <= '" . $this->db->escape($data['filter_date_end']) . "'";
		}
<<<<<<< HEAD

=======
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($data['filter_group'])) {
			$group = $data['filter_group'];
		} else {
			$group = 'week';
		}
<<<<<<< HEAD

		switch($group) {
			case 'day';
				$sql .= " GROUP BY YEAR(r.date_added), MONTH(r.date_added), DAY(r.date_added)";
				break;
			default:
			case 'week':
				$sql .= " GROUP BY YEAR(r.date_added), WEEK(r.date_added)";
				break;
			case 'month':
				$sql .= " GROUP BY YEAR(r.date_added), MONTH(r.date_added)";
				break;
			case 'year':
				$sql .= " GROUP BY YEAR(r.date_added)";
				break;
		}

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

=======
		
		switch($group) {
			case 'day';
				$sql .= " GROUP BY DAY(r.date_added)";
				break;
			default:
			case 'week':
				$sql .= " GROUP BY WEEK(r.date_added)";
				break;	
			case 'month':
				$sql .= " GROUP BY MONTH(r.date_added)";
				break;
			case 'year':
				$sql .= " GROUP BY YEAR(r.date_added)";
				break;									
		}
		
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
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function getTotalReturns($data = array()) {
		if (!empty($data['filter_group'])) {
			$group = $data['filter_group'];
		} else {
			$group = 'week';
		}
<<<<<<< HEAD

		switch($group) {
			case 'day';
				$sql = "SELECT COUNT(DISTINCT YEAR(date_added), MONTH(date_added), DAY(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
			default:
			case 'week':
				$sql = "SELECT COUNT(DISTINCT YEAR(date_added), WEEK(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
			case 'month':
				$sql = "SELECT COUNT(DISTINCT YEAR(date_added), MONTH(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
			case 'year':
				$sql = "SELECT COUNT(DISTINCT YEAR(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
		}

=======
		
		switch($group) {
			case 'day';
				$sql = "SELECT COUNT(DISTINCT DAY(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
			default:
			case 'week':
				$sql = "SELECT COUNT(DISTINCT WEEK(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;	
			case 'month':
				$sql = "SELECT COUNT(DISTINCT MONTH(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;
			case 'year':
				$sql = "SELECT COUNT(DISTINCT YEAR(date_added)) AS total FROM `" . DB_PREFIX . "return`";
				break;									
		}
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!empty($data['filter_return_status_id'])) {
			$sql .= " WHERE return_status_id = '" . (int)$data['filter_return_status_id'] . "'";
		} else {
			$sql .= " WHERE return_status_id > '0'";
		}
<<<<<<< HEAD

=======
				
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!empty($data['filter_date_start'])) {
			$sql .= " AND DATE(date_added) >= '" . $this->db->escape($data['filter_date_start']) . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND DATE(date_added) <= '" . $this->db->escape($data['filter_date_end']) . "'";
		}

		$query = $this->db->query($sql);

<<<<<<< HEAD
		return $query->row['total'];
	}
}
=======
		return $query->row['total'];	
	}	
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
