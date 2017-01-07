<?php
/**
 * @package		Homepage Module
 * @copyright	Copyright (C) 2015 Fido-X IT (John Simon). All rights reserved. (fido-x.net)
 * @license		GNU General Public License version 3; see http://www.gnu.org/licenses/gpl-3.0.en.html
 */

class ModelFidoHomepage extends Model {
	public function getHomepages($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "homepage h LEFT JOIN " . DB_PREFIX . "homepage_description hd ON (h.homepage_id = hd.homepage_id) WHERE h.status = '1' AND hd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND h.module_id = '" . (int)$module_id . "' ORDER BY h.sort_order ASC");

		return $query->rows;
	}
}