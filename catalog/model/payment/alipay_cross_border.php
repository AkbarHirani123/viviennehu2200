<?php 
class ModelPaymentAlipayCrossBorder extends Model {
  	public function getMethod($address) {
        $method_data = array();
        
		$this->load->language('payment/alipay_cross_border');
        if (!$this->config->get('alipay_cross_border_status')) {
            return $method_data;
        }
        
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('alipay_cross_border_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

        // set geo zone id, but no match
	    if ($this->config->get('alipay_cross_border_geo_zone_id') && !$query->num_rows) {
            return $method_data;
        }
		
	    // conditon matched and display this gateway
        $method_data = array( 
            'code'         => 'alipay_cross_border',
            'title'      => $this->language->get('text_title'),
            'terms'      => '',
            'sort_order' => $this->config->get('alipay_cross_border_sort_order')
        );
	
    	return $method_data;
  	}
}
?>