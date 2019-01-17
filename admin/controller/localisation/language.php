<<<<<<< HEAD
<?php
class ControllerLocalisationLanguage extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/language');

		$this->getList();
	}

	public function add() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/language');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_language->addLanguage($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

=======
<?php 
class ControllerLocalisationLanguage extends Controller {
	private $error = array();
  
	public function index() {
		$this->load->language('localisation/language');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/language');
		
		$this->getList();
	}

	public function insert() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/language');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_language->addLanguage($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
<<<<<<< HEAD

			$this->response->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

<<<<<<< HEAD
	public function edit() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/language');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_language->editLanguage($this->request->get['language_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

=======
	public function update() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/language');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_language->editLanguage($this->request->get['language_id'], $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
					
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
<<<<<<< HEAD

			$this->response->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true));
=======
					
			$this->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));
<<<<<<< HEAD

		$this->load->model('localisation/language');

=======
		
		$this->load->model('localisation/language');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $language_id) {
				$this->model_localisation_language->deleteLanguage($language_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
<<<<<<< HEAD

=======
			
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

<<<<<<< HEAD
			$this->response->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true));
=======
			$this->redirect($this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getList();
	}

<<<<<<< HEAD
	protected function getList() {
=======
	private function getList() {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
<<<<<<< HEAD

=======
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
<<<<<<< HEAD

=======
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
<<<<<<< HEAD

		$url = '';

=======
			
		$url = '';
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
<<<<<<< HEAD

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true)
		);

		$data['add'] = $this->url->link('localisation/language/add', 'token=' . $this->session->data['token'] . $url, true);
		$data['delete'] = $this->url->link('localisation/language/delete', 'token=' . $this->session->data['token'] . $url, true);

		$data['languages'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$language_total = $this->model_localisation_language->getTotalLanguages();

		$results = $this->model_localisation_language->getLanguages($filter_data);

		foreach ($results as $result) {
			$data['languages'][] = array(
=======
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
	
		$this->data['insert'] = $this->url->link('localisation/language/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('localisation/language/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$this->data['languages'] = array();

		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		$language_total = $this->model_localisation_language->getTotalLanguages();
		
		$results = $this->model_localisation_language->getLanguages($data);

		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('localisation/language/update', 'token=' . $this->session->data['token'] . '&language_id=' . $result['language_id'] . $url, 'SSL')
			);
					
			$this->data['languages'][] = array(
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
				'language_id' => $result['language_id'],
				'name'        => $result['name'] . (($result['code'] == $this->config->get('config_language')) ? $this->language->get('text_default') : null),
				'code'        => $result['code'],
				'sort_order'  => $result['sort_order'],
<<<<<<< HEAD
				'edit'        => $this->url->link('localisation/language/edit', 'token=' . $this->session->data['token'] . '&language_id=' . $result['language_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_code'] = $this->language->get('column_code');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

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

=======
				'selected'    => isset($this->request->post['selected']) && in_array($result['language_id'], $this->request->post['selected']),
				'action'      => $action	
			);		
		}
	
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_no_results'] = $this->language->get('text_no_results');

		$this->data['column_name'] = $this->language->get('column_name');
    	$this->data['column_code'] = $this->language->get('column_code');
		$this->data['column_sort_order'] = $this->language->get('column_sort_order');
		$this->data['column_action'] = $this->language->get('column_action');

		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
		$url = '';
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
<<<<<<< HEAD

		$data['sort_name'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=name' . $url, true);
		$data['sort_code'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=code' . $url, true);
		$data['sort_sort_order'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, true);
=======
					
		$this->data['sort_name'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$this->data['sort_code'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=code' . $url, 'SSL');
		$this->data['sort_sort_order'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
<<<<<<< HEAD

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $language_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($language_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($language_total - $this->config->get('config_limit_admin'))) ? $language_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $language_total, ceil($language_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/language_list', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['language_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_code'] = $this->language->get('entry_code');
		$data['entry_locale'] = $this->language->get('entry_locale');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['help_locale'] = $this->language->get('help_locale');
		$data['help_status'] = $this->language->get('help_status');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

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

		if (isset($this->error['code'])) {
			$data['error_code'] = $this->error['code'];
		} else {
			$data['error_code'] = '';
		}
		
		if (isset($this->error['locale'])) {
			$data['error_locale'] = $this->error['locale'];
		} else {
			$data['error_locale'] = '';
		}
		
		$url = '';

=======
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
				
		$pagination = new Pagination();
		$pagination->total = $language_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'localisation/language_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

    	$this->data['text_enabled'] = $this->language->get('text_enabled');
    	$this->data['text_disabled'] = $this->language->get('text_disabled');
		
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_code'] = $this->language->get('entry_code');
		$this->data['entry_locale'] = $this->language->get('entry_locale');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_directory'] = $this->language->get('entry_directory');
		$this->data['entry_filename'] = $this->language->get('entry_filename');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_status'] = $this->language->get('entry_status');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = '';
		}

 		if (isset($this->error['code'])) {
			$this->data['error_code'] = $this->error['code'];
		} else {
			$this->data['error_code'] = '';
		}
		
 		if (isset($this->error['locale'])) {
			$this->data['error_locale'] = $this->error['locale'];
		} else {
			$this->data['error_locale'] = '';
		}		
		
 		if (isset($this->error['image'])) {
			$this->data['error_image'] = $this->error['image'];
		} else {
			$this->data['error_image'] = '';
		}	
		
 		if (isset($this->error['directory'])) {
			$this->data['error_directory'] = $this->error['directory'];
		} else {
			$this->data['error_directory'] = '';
		}	
		
 		if (isset($this->error['filename'])) {
			$this->data['error_filename'] = $this->error['filename'];
		} else {
			$this->data['error_filename'] = '';
		}
		
		$url = '';
			
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
<<<<<<< HEAD

=======
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

<<<<<<< HEAD
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true)
		);

		if (!isset($this->request->get['language_id'])) {
			$data['action'] = $this->url->link('localisation/language/add', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('localisation/language/edit', 'token=' . $this->session->data['token'] . '&language_id=' . $this->request->get['language_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, true);
=======
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),      		
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL'),      		
      		'separator' => ' :: '
   		);
		
		if (!isset($this->request->get['language_id'])) {
			$this->data['action'] = $this->url->link('localisation/language/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('localisation/language/update', 'token=' . $this->session->data['token'] . '&language_id=' . $this->request->get['language_id'] . $url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('localisation/language', 'token=' . $this->session->data['token'] . $url, 'SSL');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if (isset($this->request->get['language_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$language_info = $this->model_localisation_language->getLanguage($this->request->get['language_id']);
		}

		if (isset($this->request->post['name'])) {
<<<<<<< HEAD
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($language_info)) {
			$data['name'] = $language_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['code'])) {
			$data['code'] = $this->request->post['code'];
		} elseif (!empty($language_info)) {
			$data['code'] = $language_info['code'];
		} else {
			$data['code'] = '';
		}
		
		$data['languages'] = array();
		
		$folders = glob(DIR_LANGUAGE . '*', GLOB_ONLYDIR);

		foreach ($folders as $folder) {
			$data['languages'][] = basename($folder);
		}

		if (isset($this->request->post['locale'])) {
			$data['locale'] = $this->request->post['locale'];
		} elseif (!empty($language_info)) {
			$data['locale'] = $language_info['locale'];
		} else {
			$data['locale'] = '';
		}
		
		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($language_info)) {
			$data['sort_order'] = $language_info['sort_order'];
		} else {
			$data['sort_order'] = 1;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($language_info)) {
			$data['status'] = $language_info['status'];
		} else {
			$data['status'] = true;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/language_form', $data));
	}

	protected function validateForm() {
=======
			$this->data['name'] = $this->request->post['name'];
		} elseif (!empty($language_info)) {
			$this->data['name'] = $language_info['name'];
		} else {
			$this->data['name'] = '';
		}

		if (isset($this->request->post['code'])) {
			$this->data['code'] = $this->request->post['code'];
		} elseif (!empty($language_info)) {
			$this->data['code'] = $language_info['code'];
		} else {
			$this->data['code'] = '';
		}

		if (isset($this->request->post['locale'])) {
			$this->data['locale'] = $this->request->post['locale'];
		} elseif (!empty($language_info)) {
			$this->data['locale'] = $language_info['locale'];
		} else {
			$this->data['locale'] = '';
		}
		
		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($language_info)) {
			$this->data['image'] = $language_info['image'];
		} else {
			$this->data['image'] = '';
		}

		if (isset($this->request->post['directory'])) {
			$this->data['directory'] = $this->request->post['directory'];
		} elseif (!empty($language_info)) {
			$this->data['directory'] = $language_info['directory'];
		} else {
			$this->data['directory'] = '';
		}

		if (isset($this->request->post['filename'])) {
			$this->data['filename'] = $this->request->post['filename'];
		} elseif (!empty($language_info)) {
			$this->data['filename'] = $language_info['filename'];
		} else {
			$this->data['filename'] = '';
		}

		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($language_info)) {
			$this->data['sort_order'] = $language_info['sort_order'];
		} else {
			$this->data['sort_order'] = '';
		}

    	if (isset($this->request->post['status'])) {
      		$this->data['status'] = $this->request->post['status'];
    	} elseif (!empty($language_info)) {
			$this->data['status'] = $language_info['status'];
		} else {
      		$this->data['status'] = 1;
    	}

		$this->template = 'localisation/language_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validateForm() {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!$this->user->hasPermission('modify', 'localisation/language')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 32)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (utf8_strlen($this->request->post['code']) < 2) {
			$this->error['code'] = $this->language->get('error_code');
		}
<<<<<<< HEAD
		
=======

>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!$this->request->post['locale']) {
			$this->error['locale'] = $this->language->get('error_locale');
		}
		
<<<<<<< HEAD
		$language_info = $this->model_localisation_language->getLanguageByCode($this->request->post['code']);

		if (!isset($this->request->get['language_id'])) {
			if ($language_info) {
				$this->error['warning'] = $this->language->get('error_exists');
			}
		} else {
			if ($language_info && ($this->request->get['language_id'] != $language_info['language_id'])) {
				$this->error['warning'] = $this->language->get('error_exists');
			}
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/language')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/store');
		$this->load->model('sale/order');

=======
		if (!$this->request->post['directory']) { 
			$this->error['directory'] = $this->language->get('error_directory'); 
		}

		if (!$this->request->post['filename']) {
			$this->error['filename'] = $this->language->get('error_filename');
		}
		
		if ((utf8_strlen($this->request->post['image']) < 3) || (utf8_strlen($this->request->post['image']) > 32)) {
			$this->error['image'] = $this->language->get('error_image');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/language')) {
			$this->error['warning'] = $this->language->get('error_permission');
		} 
		
		$this->load->model('setting/store');
		$this->load->model('sale/order');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		foreach ($this->request->post['selected'] as $language_id) {
			$language_info = $this->model_localisation_language->getLanguage($language_id);

			if ($language_info) {
				if ($this->config->get('config_language') == $language_info['code']) {
					$this->error['warning'] = $this->language->get('error_default');
				}
<<<<<<< HEAD

				if ($this->config->get('config_admin_language') == $language_info['code']) {
					$this->error['warning'] = $this->language->get('error_admin');
				}

				$store_total = $this->model_setting_store->getTotalStoresByLanguage($language_info['code']);

=======
				
				if ($this->config->get('config_admin_language') == $language_info['code']) {
					$this->error['warning'] = $this->language->get('error_admin');
				}	
			
				$store_total = $this->model_setting_store->getTotalStoresByLanguage($language_info['code']);
	
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
				if ($store_total) {
					$this->error['warning'] = sprintf($this->language->get('error_store'), $store_total);
				}
			}
<<<<<<< HEAD

=======
				
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
			$order_total = $this->model_sale_order->getTotalOrdersByLanguageId($language_id);

			if ($order_total) {
				$this->error['warning'] = sprintf($this->language->get('error_order'), $order_total);
<<<<<<< HEAD
			}
		}

		return !$this->error;
	}
}
=======
			}		
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}	
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
