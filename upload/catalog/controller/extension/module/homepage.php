<?php
/**
 * @package		Homepage Module
 * @copyright	Copyright (C) 2015 Fido-X IT (John Simon). All rights reserved. (fido-x.net)
 * @license		GNU General Public License version 3; see http://www.gnu.org/licenses/gpl-3.0.en.html
 */

class ControllerExtensionModuleHomepage extends Controller {
	public function index($setting) {
		$this->load->model('fido/homepage');
		$this->load->model('tool/image');

		if (file_exists('catalog/view/theme/' . $this->config->get($this->config->get('config_theme') . '_directory') . '/stylesheet/homepage.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get($this->config->get('config_theme') . '_directory') . '/stylesheet/homepage.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/homepage.css');
		}

		$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');

		if ($setting['option'] == 'tabbed') {
			$data['tabbed'] = true;
		} else {
			$data['tabbed'] = false;
		}

		if ($setting['text_align']) {
			$data['text_align'] = 'text-align: ' . $setting['text_align'] . ';';
		} else {
			$data['text_align'] = 'text-align: left;';
		}

		$data['homepages'] = array();

		foreach ($this->model_fido_homepage->getHomepages($setting['module_id']) as $result) {
			if ($result['image']) {
				$imagesize = getimagesize(DIR_IMAGE . $result['image']);

				if ($imagesize[0] > $imagesize[1]) {
					$min_height = 'min-height: ' . ($setting['thumb_width'] + 20) . 'px;';

					$thumb = $this->model_tool_image->resize($result['image'], $setting['thumb_width'], $setting['thumb_height']);

					$popup = $this->model_tool_image->resize($result['image'], $setting['popup_width'], $setting['popup_height']);
				} else {
					$min_height = 'min-height: ' . ($setting['thumb_height'] + 20) . 'px;';

					$thumb = $this->model_tool_image->resize($result['image'], $setting['thumb_height'], $setting['thumb_width']);

					$popup = $this->model_tool_image->resize($result['image'], $setting['popup_height'], $setting['popup_width']);
				}
			} else {
				$min_height = 'min-height: 20px;';

				$thumb = false;

				$popup = false;
			}

			if ($result['image_align']) {
				$image_align = $result['image_align'];
			} else {
				$image_align = 'left';
			}

			if ($image_align == 'left') {
				$margin = 'margin-right: 10px;';
			} else {
				$margin = 'margin-left: 10px;';
			}

			$data['homepages'][] = array(
				'homepage_id'  => $result['homepage_id'],
				'title'        => html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
				'description'  => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
				'caption'      => html_entity_decode($result['caption'], ENT_QUOTES, 'UTF-8'),
				'sort_order'   => $result['sort_order'],
				'thumb'        => $thumb,
				'popup'        => $popup,
				'popup_status' => $result['popup_status'],
				'image_align'  => $image_align,
				'min_height'   => $min_height,
				'margin'       => $margin
			);
		}

		return $this->load->view('extension/module/homepage', $data);
	}
}