<?php
/**
 * @package		Homepage Module
 * @copyright	Copyright (C) 2015 Fido-X IT (John Simon). All rights reserved. (fido-x.net)
 * @license		GNU General Public License version 3; see http://www.gnu.org/licenses/gpl-3.0.en.html
 */

class ModelFidoHomepage extends Model {
	public function createHomepages() {
		$create_homepage = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "homepage` (`homepage_id` int(11) NOT NULL auto_increment, `module_id` int(11) NOT NULL, `status` int(1) NOT NULL default '0', `sort_order` int(3) NOT NULL default '0', `image` varchar(255) default NULL, `popup_status` int(1) NOT NULL default '0', `image_align` varchar(8) default NULL, PRIMARY KEY (`homepage_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_homepage);

		$create_homepage_description = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "homepage_description` (`homepage_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` varchar(64) NOT NULL default '', `description` text NOT NULL, `caption` varchar(255) NOT NULL default '', PRIMARY KEY (`homepage_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_homepage_description);
	}

	public function dropHomepages() {
		$drop_homepage = "DROP TABLE IF EXISTS `" . DB_PREFIX . "homepage`;";
		$this->db->query($drop_homepage);

		$drop_homepage_description = "DROP TABLE IF EXISTS `" . DB_PREFIX . "homepage_description`;";
		$this->db->query($drop_homepage_description);
	}

	public function addModule($code, $data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "module` SET `name` = '" . $this->db->escape($data['name']) . "', `code` = '" . $this->db->escape($code) . "', `setting` = '" . $this->db->escape(json_encode($data)) . "'");

		$module_id = $this->db->getLastId();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");

		$settings = json_decode($query->row['setting'], true);

		$settings['module_id'] = $module_id;

		$this->db->query("UPDATE " . DB_PREFIX . "module SET setting = '" . $this->db->escape(json_encode($settings)) . "' WHERE module_id = '" . (int)$module_id . "'");

		return $module_id;
	}

	public function addHomepage($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "homepage SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', sort_order = '" . (int)$data['sort_order'] . "', popup_status = '" . (int)$data['popup_status']. "', image_align = '" . $this->db->escape($data['image_align']) . "'");

		$homepage_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "homepage SET image = '" . $this->db->escape($data['image']) . "' WHERE homepage_id = '" . (int)$homepage_id . "'");
		}

		foreach ($data['homepage_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "homepage_description SET homepage_id = '" . (int)$homepage_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', caption = '" . $this->db->escape($value['caption']) . "'");
		}

		return $homepage_id;
	}

	public function editHomepage($homepage_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "homepage SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', sort_order = '" . (int)$data['sort_order'] . "', popup_status = '" . (int)$data['popup_status']. "', image_align = '" . $this->db->escape($data['image_align']) . "' WHERE homepage_id = '" . (int)$homepage_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "homepage SET image = '" . $this->db->escape($data['image']) . "' WHERE homepage_id = '" . (int)$homepage_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "homepage_description WHERE homepage_id = '" . (int)$homepage_id . "'");

		foreach ($data['homepage_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "homepage_description SET homepage_id = '" . (int)$homepage_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', caption = '" . $this->db->escape($value['caption']) . "'");
		}
	}

	public function deleteHomepage($homepage_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "homepage WHERE homepage_id = '" . (int)$homepage_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "homepage_description WHERE homepage_id = '" . (int)$homepage_id . "'");
	}	

	public function getHomepage($homepage_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "homepage WHERE homepage_id = '" . (int)$homepage_id . "'");

		return $query->row;
	}

	public function getHomepageDescriptions($homepage_id) {
		$homepage_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "homepage_description WHERE homepage_id = '" . (int)$homepage_id . "'");

		foreach ($query->rows as $result) {
			$homepage_description_data[$result['language_id']] = array(
				'title'       => $result['title'],
				'description' => $result['description'],
				'caption'     => $result['caption']
			);
		}

		return $homepage_description_data;
	}

	public function getHomepagesByModule($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "homepage h LEFT JOIN " . DB_PREFIX . "homepage_description hd ON (h.homepage_id = hd.homepage_id) WHERE hd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND h.module_id = '" . (int)$module_id . "' ORDER BY h.sort_order");

		return $query->rows;
	}

	public function getHomepages($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "homepage h LEFT JOIN " . DB_PREFIX . "homepage_description hd ON (h.homepage_id = hd.homepage_id) WHERE hd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

			$sort_data = array(
				'hd.title',
				'h.module_id',
				'h.sort_order'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY h.module_id, h.sort_order";
			}

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
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
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "homepage h LEFT JOIN " . DB_PREFIX . "homepage_description hd ON (h.homepage_id = hd.homepage_id) WHERE hd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY h.sort_order ASC");

			return $query->rows;
		}
	}

	public function getTotalHomepages() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "homepage");

		return $query->row['total'];
	}

	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module` WHERE `module_id` = '" . (int)$module_id . "'");

		return $query->row;
	}
}