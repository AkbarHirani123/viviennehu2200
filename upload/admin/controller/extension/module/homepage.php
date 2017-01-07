<?php
/**
 * @package		Homepage Module
 * @copyright	Copyright (C) 2015 Fido-X IT (John Simon). All rights reserved. (fido-x.net)
 * @license		GNU General Public License version 3; see http://www.gnu.org/licenses/gpl-3.0.en.html
 */

class ControllerExtensionModuleHomepage extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/homepage');
		$this->load->model('fido/homepage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$module_id = $this->model_fido_homepage->addModule('homepage', $this->request->post);

				$this->session->data['success'] = $this->language->get('text_success');

				$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $module_id, true));
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);

				$this->session->data['success'] = $this->language->get('text_success');

				$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
			}
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_save_module'] = $this->language->get('text_save_module');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_select'] = $this->language->get('text_select');

		if (!isset($this->request->get['module_id'])) {
			$data['text_view_list'] = sprintf($this->language->get('text_view_list'), $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'], true));
		} else {
			$data['text_view_list'] = sprintf($this->language->get('text_view_list'), $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true));
		}

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_option'] = $this->language->get('entry_option');
		$data['entry_text_align'] = $this->language->get('entry_text_align');
		$data['entry_thumb_size'] = $this->language->get('entry_thumb_size');
		$data['entry_popup_size'] = $this->language->get('entry_popup_size');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');

		$data['help_text_align'] = $this->language->get('help_text_align');
		$data['help_image_size'] = $this->language->get('help_image_size');

		$data['column_title'] = $this->language->get('column_title');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_add_entry'] = $this->language->get('button_add_entry');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->error['thumb_width'])) {
			$data['error_thumb_width'] = $this->error['thumb_width'];
		} else {
			$data['error_thumb_width'] = '';
		}

		if (isset($this->error['thumb_height'])) {
			$data['error_thumb_height'] = $this->error['thumb_height'];
		} else {
			$data['error_thumb_height'] = '';
		}

		if (isset($this->error['popup_width'])) {
			$data['error_popup_width'] = $this->error['popup_width'];
		} else {
			$data['error_popup_width'] = '';
		}

		if (isset($this->error['popup_height'])) {
			$data['error_popup_height'] = $this->error['popup_height'];
		} else {
			$data['error_popup_height'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

		if (!isset($this->request->get['module_id'])) {
			$data['add_entry'] = '';
		} elseif (!$this->request->get['module_id']) {
			$data['add_entry'] = '';
		} else {
			$data['add_entry'] = $this->url->link('extension/module/homepage/add', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['module_id'])) {
			$data['module_id'] = $this->request->post['module_id'];
		} elseif (isset($this->request->get['module_id'])) {
			$data['module_id'] = $this->request->get['module_id'];
		} elseif (!empty($module_info)) {
			$data['module_id'] = $module_info['module_id'];
		} else {
			$data['module_id'] = '';
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}

		if (isset($this->request->post['option'])) {
			$data['option'] = $this->request->post['option'];
		} elseif (!empty($module_info)) {
			$data['option'] = $module_info['option'];
		} else {
			$data['option'] = 'stacked';
		}

		if (isset($this->request->post['thumb_width'])) {
			$data['thumb_width'] = $this->request->post['thumb_width'];
		} elseif (!empty($module_info)) {
			$data['thumb_width'] = $module_info['thumb_width'];
		} else {
			$data['thumb_width'] = 80;
		}

		if (isset($this->request->post['thumb_height'])) {
			$data['thumb_height'] = $this->request->post['thumb_height'];
		} elseif (!empty($module_info)) {
			$data['thumb_height'] = $module_info['thumb_height'];
		} else {
			$data['thumb_height'] = 80;
		}

		if (isset($this->request->post['popup_width'])) {
			$data['popup_width'] = $this->request->post['popup_width'];
		} elseif (!empty($module_info)) {
			$data['popup_width'] = $module_info['popup_width'];
		} else {
			$data['popup_width'] = 500;
		}

		if (isset($this->request->post['popup_height'])) {
			$data['popup_height'] = $this->request->post['popup_height'];
		} elseif (!empty($module_info)) {
			$data['popup_height'] = $module_info['popup_height'];
		} else {
			$data['popup_height'] = 500;
		}

		$module_options = array();

		$module_options[] = array(
			'value'  => 'stacked',
			'title'  => $this->language->get('text_stacked')
		);

		$module_options[] = array(
			'value'  => 'tabbed',
			'title'  => $this->language->get('text_tabbed')
		);

		$data['module_options'] = $module_options;

		if (isset($this->request->post['text_align'])) {
			$data['text_align'] = $this->request->post['text_align'];
		} elseif (!empty($module_info)) {
			$data['text_align'] = $module_info['text_align'];
		} else {
			$data['text_align'] = '';
		}

		$alignments = array();

		$alignments[] = array(
			'value' => 'left',
			'title' => $this->language->get('text_left')
		);

		$alignments[] = array(
			'value' => 'right',
			'title' => $this->language->get('text_right')
		);

		$alignments[] = array(
			'value' => 'center',
			'title' => $this->language->get('text_center')
		);

		$alignments[] = array(
			'value' => 'justify',
			'title' => $this->language->get('text_justify')
		);

		$data['alignments'] = $alignments;

		$data['homepage_entries'] = array();

		if (!isset($this->request->get['module_id'])) {
			$results = array();
		} else {
			$results = $this->model_fido_homepage->getHomepagesByModule($this->request->get['module_id']);
		}

		if ($results) {
			foreach ($results as $result) {
				$data['homepage_entries'][] = array(
					'homepage_id'  => $result['homepage_id'],
					'title'        => $result['title'],
					'module_id'    => $result['module_id'],
					'status'       => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
					'sort_order'   => $result['sort_order'],
					'edit'         => $this->url->link('extension/module/homepage/edit', 'token=' . $this->session->data['token'] . '&homepage_id=' . $result['homepage_id'] . '&module_id=' . $this->request->get['module_id'], true),
					'delete'       => $this->url->link('extension/module/homepage/delete', 'token=' . $this->session->data['token'] . '&homepage_id=' . $result['homepage_id'] . '&delete=1' . '&module_id=' . $this->request->get['module_id'], true)
				);
			}
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/homepage', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/homepage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (!$this->request->post['thumb_width']) {
			$this->error['thumb_width'] = $this->language->get('error_width');
		}

		if (!$this->request->post['thumb_height']) {
			$this->error['thumb_height'] = $this->language->get('error_height');
		}

		if (!$this->request->post['popup_width']) {
			$this->error['popup_width'] = $this->language->get('error_width');
		}

		if (!$this->request->post['popup_height']) {
			$this->error['popup_height'] = $this->language->get('error_height');
		}

		return !$this->error;
	}

	public function install() {
		$this->load->model('fido/homepage');

		$this->model_fido_homepage->createHomepages();
	}

	public function uninstall() {
		$this->load->model('fido/homepage');

		$this->model_fido_homepage->dropHomepages();
	}

	public function add() {
		$this->load->language('extension/module/homepage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('fido/homepage');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_fido_homepage->addHomepage($this->request->post, $this->request->post['module_id']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->post['module_id'], true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('extension/module/homepage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('fido/homepage');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_fido_homepage->editHomepage($this->request->get['homepage_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->post['module_id'], true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('extension/module/homepage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('fido/homepage');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $homepage_id) {
				$this->model_fido_homepage->deleteHomepage($homepage_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . $url, true));
		} elseif ((isset($this->request->get['homepage_id']) && isset($this->request->get['delete'])) && $this->validateDelete()) {
			$this->model_fido_homepage->deleteHomepage($this->request->get['homepage_id']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true));
		}

		if (!isset($this->request->get['module_id'])) {
			$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'], true));
		} else {
			$this->response->redirect($this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true));
		}
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = !isset($this->request->get['homepage_id']) ? $this->language->get('text_add') : $this->language->get('text_form');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_portrait'] = $this->language->get('text_portrait');
		$data['text_landscape'] = $this->language->get('text_landscape');
		$data['text_unallocated'] = $this->language->get('text_unallocated');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_preview'] = $this->language->get('text_preview');

		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_caption'] = $this->language->get('entry_caption');
		$data['entry_image_align'] = $this->language->get('entry_image_align');
		$data['entry_allow_popup'] = $this->language->get('entry_allow_popup');
		$data['entry_module'] = $this->language->get('entry_module');

		$data['help_caption'] = $this->language->get('help_caption');
		$data['help_allow_popup'] = $this->language->get('help_allow_popup');
		$data['help_image_align'] = $this->language->get('help_image_align');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_preview'] = $this->language->get('button_preview');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_image'] = $this->language->get('tab_image');
		$data['tab_preview'] = $this->language->get('tab_preview');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = array();
		}

		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = array();
		}

		if (isset($this->error['module'])) {
			$data['error_module'] = $this->error['module'];
		} else {
			$data['error_module'] = '';
		}

		if (isset($this->error['thumb'])) {
			$data['error_thumb'] = $this->error['thumb'];
		} else {
			$data['error_thumb'] = '';
		}

		if (isset($this->error['popup'])) {
			$data['error_popup'] = $this->error['popup'];
		} else {
			$data['error_popup'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}
		
		if (!isset($this->request->get['homepage_id'])) {
			$data['action'] = $this->url->link('extension/module/homepage/add', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/homepage/edit', 'token=' . $this->session->data['token'] . '&homepage_id=' . $this->request->get['homepage_id'], true);
		}

		if (isset($this->request->get['homepage_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$homepage_info = $this->model_fido_homepage->getHomepage($this->request->get['homepage_id']);
		}

		if (isset($this->request->post['module_id'])) {
			$data['cancel'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->post['module_id'], true);
		} elseif (isset($this->request->get['module_id'])) {
			$data['cancel'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		} elseif (!empty($homepage_info)) {
			$data['cancel'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $homepage_info['module_id'], true);
		} else {
			$data['cancel'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'], true);
		}

		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['homepage_description'])) {
			$data['homepage_description'] = $this->request->post['homepage_description'];
		} elseif (isset($this->request->get['homepage_id'])) {
			$data['homepage_description'] = $this->model_fido_homepage->getHomepageDescriptions($this->request->get['homepage_id']);
		} else {
			$data['homepage_description'] = array();
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($homepage_info)) {
			$data['status'] = $homepage_info['status'];
		} else {
			$data['status'] = 1;
		}

		if (isset($this->request->post['module_id'])) {
			$data['module_id'] = $this->request->post['module_id'];
		} elseif (isset($this->request->get['homepage_id']) && !empty($homepage_info)) {
			$data['module_id'] = $homepage_info['module_id'];
		} elseif (isset($this->request->get['module_id'])) {
			$data['module_id'] = $this->request->get['module_id'];
		} else {
			$data['module_id'] = '';
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($homepage_info)) {
			$data['sort_order'] = $homepage_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($homepage_info)) {
			$data['image'] = $homepage_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($homepage_info) && is_file(DIR_IMAGE . $homepage_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($homepage_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['image_align'])) {
			$data['image_align'] = $this->request->post['image_align'];
		} elseif (!empty($homepage_info)) {
			$data['image_align'] = $homepage_info['image_align'];
		} else {
			$data['image_align'] = '';
		}

		if (isset($this->request->post['popup_status'])) {
			$data['popup_status'] = $this->request->post['popup_status'];
		} elseif (!empty($homepage_info)) {
			$data['popup_status'] = $homepage_info['popup_status'];
		} else {
			$data['popup_status'] = '';
		}

		$alignments = array();

		$alignments[] = array(
			'value' => 'left',
			'title' => $this->language->get('text_left')
		);

		$alignments[] = array(
			'value' => 'right',
			'title' => $this->language->get('text_right')
		);

		$data['alignments'] = $alignments;

		$this->load->model('extension/module');

		$data['homepage_modules'] = array();

		$modules = $this->model_extension_module->getModulesByCode('homepage');

		foreach ($modules as $module) {
			if (!isset($data['homepage_modules'][$module['code']])) {
				$data['homepage_modules'][$module['code']]['name'] = $this->language->get('heading_title');
			}

			$data['homepage_modules'][$module['code']]['module'][] = array(
				'module_id' => $module['module_id'],
				'name'      => $module['name']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/homepage/form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/homepage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['homepage_description'] as $language_id => $value) {
			if ((utf8_strlen($value['title']) < 3) || (utf8_strlen($value['title']) > 64)) {
				$this->error['title'][$language_id] = $this->language->get('error_title');
			}

			if (utf8_strlen($value['description']) < 3) {
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}
		}

		if (!$this->request->post['module_id']) {
			$this->error['module'] = $this->language->get('error_module');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'extension/module/homepage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function view_list() {
		$this->load->language('extension/module/homepage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('fido/homepage');

		$this->getlist();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'h.module_id, h.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['return'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'], true);
			$data['add'] = $this->url->link('extension/module/homepage/add', 'token=' . $this->session->data['token'], true);
			$data['delete'] = $this->url->link('extension/module/homepage/delete', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['return'] = $this->url->link('extension/module/homepage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
			$data['add'] = $this->url->link('extension/module/homepage/add', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
			$data['delete'] = $this->url->link('extension/module/homepage/delete', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'] . $url, true);
		}

		$data['homepages'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$homepage_total = $this->model_fido_homepage->getTotalHomepages();

		$results = $this->model_fido_homepage->getHomepages($filter_data);

		foreach ($results as $result) {
			$module_info = $this->model_fido_homepage->getModule($result['module_id']);

			if ($module_info) {
				$module = $module_info['name'];
			} else {
				$module = $this->language->get('text_unallocated');
			}

			$data['homepages'][] = array(
				'homepage_id'    => $result['homepage_id'],
				'title'          => $result['title'],
				'module'         => $module,
				'status'         => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'sort_order'     => $result['sort_order'],
				'edit'           => $this->url->link('extension/module/homepage/edit', 'token=' . $this->session->data['token'] . '&homepage_id=' . $result['homepage_id'], true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_title'] = $this->language->get('column_title');
		$data['column_module'] = $this->language->get('column_module');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_return'] = $this->language->get('button_return');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (!isset($this->request->get['module_id'])) {
			$data['sort_title'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=hd.title' . $url, true);
			$data['sort_module'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=h.module_id' . $url, true);
			$data['sort_sort_order'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=h.sort_order' . $url, true);
		} else {
			$data['sort_title'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=hd.title' . '&module_id=' . $this->request->get['module_id'] . $url, true);
			$data['sort_module'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=h.module_id' . '&module_id=' . $this->request->get['module_id'] . $url, true);
			$data['sort_sort_order'] = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&sort=h.sort_order' . '&module_id=' . $this->request->get['module_id'] . $url, true);
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $homepage_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		if (!isset($this->request->get['module_id'])) {
			$pagination->url = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);
		} else {
			$pagination->url = $this->url->link('extension/module/homepage/view_list', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'] . $url . '&page={page}', true);
		}

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($homepage_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($homepage_total - $this->config->get('config_limit_admin'))) ? $homepage_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $homepage_total, ceil($homepage_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/homepage/list', $data));
	}
}