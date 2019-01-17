<?php
class ControllerLocalisationTaxClass extends Controller {
	private $error = array();
<<<<<<< HEAD

=======
 
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function index() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));
<<<<<<< HEAD

		$this->load->model('localisation/tax_class');

		$this->getList();
	}

	public function add() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/tax_class');

=======
		
		$this->load->model('localisation/tax_class');
		
		$this->getList(); 
	}

	public function insert() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/tax_class');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_class->addTaxClass($this->request->post);

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

			$this->response->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

<<<<<<< HEAD
	public function edit() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/tax_class');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_class->editTaxClass($this->request->get['tax_class_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

=======
	public function update() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/tax_class');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_class->editTaxClass($this->request->get['tax_class_id'], $this->request->post);
			
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

			$this->response->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('localisation/tax_class');

		$this->document->setTitle($this->language->get('heading_title'));
<<<<<<< HEAD

		$this->load->model('localisation/tax_class');

=======
 		
		$this->load->model('localisation/tax_class');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $tax_class_id) {
				$this->model_localisation_tax_class->deleteTaxClass($tax_class_id);
			}
<<<<<<< HEAD

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

=======
			
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

			$this->response->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL'));
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
			$sort = 'title';
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
			'href' => $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true)
		);

		$data['add'] = $this->url->link('localisation/tax_class/add', 'token=' . $this->session->data['token'] . $url, true);
		$data['delete'] = $this->url->link('localisation/tax_class/delete', 'token=' . $this->session->data['token'] . $url, true);

		$data['tax_classes'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$tax_class_total = $this->model_localisation_tax_class->getTotalTaxClasses();

		$results = $this->model_localisation_tax_class->getTaxClasses($filter_data);

		foreach ($results as $result) {
			$data['tax_classes'][] = array(
				'tax_class_id' => $result['tax_class_id'],
				'title'        => $result['title'],
				'edit'         => $this->url->link('localisation/tax_class/edit', 'token=' . $this->session->data['token'] . '&tax_class_id=' . $result['tax_class_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_title'] = $this->language->get('column_title');
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
			'href'      => $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);		
		
		$this->data['insert'] = $this->url->link('localisation/tax_class/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('localisation/tax_class/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');		
		
		$this->data['tax_classes'] = array();
		
		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		$tax_class_total = $this->model_localisation_tax_class->getTotalTaxClasses();

		$results = $this->model_localisation_tax_class->getTaxClasses($data);

		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('localisation/tax_class/update', 'token=' . $this->session->data['token'] . '&tax_class_id=' . $result['tax_class_id'] . $url, 'SSL')
			);
					
			$this->data['tax_classes'][] = array(
				'tax_class_id' => $result['tax_class_id'],
				'title'        => $result['title'],
				'selected'     => isset($this->request->post['selected']) && in_array($result['tax_class_id'], $this->request->post['selected']),
				'action'       => $action				
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_no_results'] = $this->language->get('text_no_results');
	
		$this->data['column_title'] = $this->language->get('column_title');
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
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
<<<<<<< HEAD

		$data['sort_title'] = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . '&sort=title' . $url, true);

=======
		 
		$this->data['sort_title'] = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . '&sort=title' . $url, 'SSL');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
<<<<<<< HEAD

=======
												
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $tax_class_total;
		$pagination->page = $page;
<<<<<<< HEAD
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($tax_class_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($tax_class_total - $this->config->get('config_limit_admin'))) ? $tax_class_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $tax_class_total, ceil($tax_class_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/tax_class_list', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['tax_class_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_payment'] = $this->language->get('text_payment');
		$data['text_store'] = $this->language->get('text_store');

		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_rate'] = $this->language->get('entry_rate');
		$data['entry_based'] = $this->language->get('entry_based');
		$data['entry_priority'] = $this->language->get('entry_priority');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_rule_add'] = $this->language->get('button_rule_add');
		$data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = '';
		}

		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = '';
		}

		$url = '';

=======
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'localisation/tax_class_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_shipping'] = $this->language->get('text_shipping');	
		$this->data['text_payment'] = $this->language->get('text_payment');	
		$this->data['text_store'] = $this->language->get('text_store');	
						
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_rate'] = $this->language->get('entry_rate');
		$this->data['entry_based'] = $this->language->get('entry_based');
		$this->data['entry_priority'] = $this->language->get('entry_priority');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_rule'] = $this->language->get('button_add_rule');
		$this->data['button_remove'] = $this->language->get('button_remove');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['title'])) {
			$this->data['error_title'] = $this->error['title'];
		} else {
			$this->data['error_title'] = '';
		}
		
 		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = '';
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
			'href' => $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true)
		);

		if (!isset($this->request->get['tax_class_id'])) {
			$data['action'] = $this->url->link('localisation/tax_class/add', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('localisation/tax_class/edit', 'token=' . $this->session->data['token'] . '&tax_class_id=' . $this->request->get['tax_class_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, true);
=======
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (!isset($this->request->get['tax_class_id'])) {
			$this->data['action'] = $this->url->link('localisation/tax_class/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('localisation/tax_class/update', 'token=' . $this->session->data['token'] . '&tax_class_id=' . $this->request->get['tax_class_id'] . $url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('localisation/tax_class', 'token=' . $this->session->data['token'] . $url, 'SSL');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if (isset($this->request->get['tax_class_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$tax_class_info = $this->model_localisation_tax_class->getTaxClass($this->request->get['tax_class_id']);
		}

		if (isset($this->request->post['title'])) {
<<<<<<< HEAD
			$data['title'] = $this->request->post['title'];
		} elseif (!empty($tax_class_info)) {
			$data['title'] = $tax_class_info['title'];
		} else {
			$data['title'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (!empty($tax_class_info)) {
			$data['description'] = $tax_class_info['description'];
		} else {
			$data['description'] = '';
		}

		$this->load->model('localisation/tax_rate');

		$data['tax_rates'] = $this->model_localisation_tax_rate->getTaxRates();

		if (isset($this->request->post['tax_rule'])) {
			$data['tax_rules'] = $this->request->post['tax_rule'];
		} elseif (isset($this->request->get['tax_class_id'])) {
			$data['tax_rules'] = $this->model_localisation_tax_class->getTaxRules($this->request->get['tax_class_id']);
		} else {
			$data['tax_rules'] = array();
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/tax_class_form', $data));
	}

	protected function validateForm() {
=======
			$this->data['title'] = $this->request->post['title'];
		} elseif (!empty($tax_class_info)) {
			$this->data['title'] = $tax_class_info['title'];
		} else {
			$this->data['title'] = '';
		}

		if (isset($this->request->post['description'])) {
			$this->data['description'] = $this->request->post['description'];
		} elseif (!empty($tax_class_info)) {
			$this->data['description'] = $tax_class_info['description'];
		} else {
			$this->data['description'] = '';
		}

		$this->load->model('localisation/tax_rate');
		
		$this->data['tax_rates'] = $this->model_localisation_tax_rate->getTaxRates();
		
		if (isset($this->request->post['tax_rule'])) {
			$this->data['tax_rules'] = $this->request->post['tax_rule'];
		} elseif (isset($this->request->get['tax_class_id'])) {
			$this->data['tax_rules'] = $this->model_localisation_tax_class->getTaxRules($this->request->get['tax_class_id']);
		} else {
			$this->data['tax_rules'] = array();
		}

		$this->template = 'localisation/tax_class_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}

	private function validateForm() {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!$this->user->hasPermission('modify', 'localisation/tax_class')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['title']) < 3) || (utf8_strlen($this->request->post['title']) > 32)) {
			$this->error['title'] = $this->language->get('error_title');
		}

		if ((utf8_strlen($this->request->post['description']) < 3) || (utf8_strlen($this->request->post['description']) > 255)) {
			$this->error['description'] = $this->language->get('error_description');
		}
<<<<<<< HEAD

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/tax_class')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

=======
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/tax_class')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->load->model('catalog/product');

		foreach ($this->request->post['selected'] as $tax_class_id) {
			$product_total = $this->model_catalog_product->getTotalProductsByTaxClassId($tax_class_id);

			if ($product_total) {
				$this->error['warning'] = sprintf($this->language->get('error_product'), $product_total);
			}
		}
<<<<<<< HEAD

		return !$this->error;
	}
}
=======
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}	
}
?>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
