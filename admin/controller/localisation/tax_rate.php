<?php
class ControllerLocalisationTaxRate extends Controller {
	private $error = array();
<<<<<<< HEAD

=======
 
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
	public function index() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));
<<<<<<< HEAD

		$this->load->model('localisation/tax_rate');

		$this->getList();
	}

	public function add() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/tax_rate');

=======
		
		$this->load->model('localisation/tax_rate');
		
		$this->getList(); 
	}

	public function insert() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/tax_rate');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_rate->addTaxRate($this->request->post);

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

			$this->response->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

<<<<<<< HEAD
	public function edit() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/tax_rate');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_rate->editTaxRate($this->request->get['tax_rate_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

=======
	public function update() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('localisation/tax_rate');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_localisation_tax_rate->editTaxRate($this->request->get['tax_rate_id'], $this->request->post);
			
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

			$this->response->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL'));
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('localisation/tax_rate');

		$this->document->setTitle($this->language->get('heading_title'));
<<<<<<< HEAD

		$this->load->model('localisation/tax_rate');

=======
 		
		$this->load->model('localisation/tax_rate');
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $tax_rate_id) {
				$this->model_localisation_tax_rate->deleteTaxRate($tax_rate_id);
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

			$this->response->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true));
=======
			
			$this->redirect($this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL'));
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
			$sort = 'tr.name';
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
			'href' => $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true)
		);

		$data['add'] = $this->url->link('localisation/tax_rate/add', 'token=' . $this->session->data['token'] . $url, true);
		$data['delete'] = $this->url->link('localisation/tax_rate/delete', 'token=' . $this->session->data['token'] . $url, true);

		$data['tax_rates'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$tax_rate_total = $this->model_localisation_tax_rate->getTotalTaxRates();

		$results = $this->model_localisation_tax_rate->getTaxRates($filter_data);

		foreach ($results as $result) {
			$data['tax_rates'][] = array(
				'tax_rate_id'   => $result['tax_rate_id'],
				'name'          => $result['name'],
				'rate'          => $result['rate'],
				'type'          => ($result['type'] == 'F' ? $this->language->get('text_amount') : $this->language->get('text_percent')),
				'geo_zone'      => $result['geo_zone'],
				'date_added'    => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'edit'          => $this->url->link('localisation/tax_rate/edit', 'token=' . $this->session->data['token'] . '&tax_rate_id=' . $result['tax_rate_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_rate'] = $this->language->get('column_rate');
		$data['column_type'] = $this->language->get('column_type');
		$data['column_geo_zone'] = $this->language->get('column_geo_zone');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
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
			'href'      => $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);		
		
		$this->data['insert'] = $this->url->link('localisation/tax_rate/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('localisation/tax_rate/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');		
		
		$this->data['tax_rates'] = array();
		
		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		$tax_rate_total = $this->model_localisation_tax_rate->getTotalTaxRates();

		$results = $this->model_localisation_tax_rate->getTaxRates($data);

		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('localisation/tax_rate/update', 'token=' . $this->session->data['token'] . '&tax_rate_id=' . $result['tax_rate_id'] . $url, 'SSL')
			);
											
			$this->data['tax_rates'][] = array(
				'tax_rate_id'   => $result['tax_rate_id'],
				'name'          => $result['name'],
				'rate'          => $result['rate'],
				'type'          => ($result['type'] == 'F' ? $this->language->get('text_amount') : $this->language->get('text_percent')),				
				'geo_zone'      => $result['geo_zone'],
				'date_added'    => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'selected'      => isset($this->request->post['selected']) && in_array($result['tax_rate_id'], $this->request->post['selected']),
				'action'        => $action				
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_no_results'] = $this->language->get('text_no_results');
	
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_rate'] = $this->language->get('column_rate');
		$this->data['column_type'] = $this->language->get('column_type');
		$this->data['column_geo_zone'] = $this->language->get('column_geo_zone');
		$this->data['column_date_added'] = $this->language->get('column_date_added');
		$this->data['column_date_modified'] = $this->language->get('column_date_modified');
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

		$data['sort_name'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.name' . $url, true);
		$data['sort_rate'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.rate' . $url, true);
		$data['sort_type'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.type' . $url, true);
		$data['sort_geo_zone'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=gz.name' . $url, true);
		$data['sort_date_added'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.date_added' . $url, true);
		$data['sort_date_modified'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.date_modified' . $url, true);

=======
		 
		$this->data['sort_name'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.name' . $url, 'SSL');
		$this->data['sort_rate'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.rate' . $url, 'SSL');
		$this->data['sort_type'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.type' . $url, 'SSL');
		$this->data['sort_geo_zone'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=gz.name' . $url, 'SSL');
		$this->data['sort_date_added'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.date_added' . $url, 'SSL');
		$this->data['sort_date_modified'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . '&sort=tr.date_modified' . $url, 'SSL');
		
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
		$pagination->total = $tax_rate_total;
		$pagination->page = $page;
<<<<<<< HEAD
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($tax_rate_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($tax_rate_total - $this->config->get('config_limit_admin'))) ? $tax_rate_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $tax_rate_total, ceil($tax_rate_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/tax_rate_list', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['tax_rate_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_percent'] = $this->language->get('text_percent');
		$data['text_amount'] = $this->language->get('text_amount');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_rate'] = $this->language->get('entry_rate');
		$data['entry_type'] = $this->language->get('entry_type');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');

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

		if (isset($this->error['rate'])) {
			$data['error_rate'] = $this->error['rate'];
		} else {
			$data['error_rate'] = '';
		}

		$url = '';

=======
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'localisation/tax_rate_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_percent'] = $this->language->get('text_percent');	
		$this->data['text_amount'] = $this->language->get('text_amount');	
				
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_rate'] = $this->language->get('entry_rate');
		$this->data['entry_type'] = $this->language->get('entry_type');		
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		
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

 		if (isset($this->error['rate'])) {
			$this->data['error_rate'] = $this->error['rate'];
		} else {
			$this->data['error_rate'] = '';
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
			'href' => $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true)
		);

		if (!isset($this->request->get['tax_rate_id'])) {
			$data['action'] = $this->url->link('localisation/tax_rate/add', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('localisation/tax_rate/edit', 'token=' . $this->session->data['token'] . '&tax_rate_id=' . $this->request->get['tax_rate_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, true);
=======
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (!isset($this->request->get['tax_rate_id'])) {
			$this->data['action'] = $this->url->link('localisation/tax_rate/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('localisation/tax_rate/update', 'token=' . $this->session->data['token'] . '&tax_rate_id=' . $this->request->get['tax_rate_id'] . $url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('localisation/tax_rate', 'token=' . $this->session->data['token'] . $url, 'SSL');
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19

		if (isset($this->request->get['tax_rate_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$tax_rate_info = $this->model_localisation_tax_rate->getTaxRate($this->request->get['tax_rate_id']);
		}

		if (isset($this->request->post['name'])) {
<<<<<<< HEAD
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($tax_rate_info)) {
			$data['name'] = $tax_rate_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['rate'])) {
			$data['rate'] = $this->request->post['rate'];
		} elseif (!empty($tax_rate_info)) {
			$data['rate'] = $tax_rate_info['rate'];
		} else {
			$data['rate'] = '';
		}

		if (isset($this->request->post['type'])) {
			$data['type'] = $this->request->post['type'];
		} elseif (!empty($tax_rate_info)) {
			$data['type'] = $tax_rate_info['type'];
		} else {
			$data['type'] = '';
		}

		if (isset($this->request->post['tax_rate_customer_group'])) {
			$data['tax_rate_customer_group'] = $this->request->post['tax_rate_customer_group'];
		} elseif (isset($this->request->get['tax_rate_id'])) {
			$data['tax_rate_customer_group'] = $this->model_localisation_tax_rate->getTaxRateCustomerGroups($this->request->get['tax_rate_id']);
		} else {
			$data['tax_rate_customer_group'] = array($this->config->get('config_customer_group_id'));
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		if (isset($this->request->post['geo_zone_id'])) {
			$data['geo_zone_id'] = $this->request->post['geo_zone_id'];
		} elseif (!empty($tax_rate_info)) {
			$data['geo_zone_id'] = $tax_rate_info['geo_zone_id'];
		} else {
			$data['geo_zone_id'] = '';
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/tax_rate_form', $data));
	}

	protected function validateForm() {
=======
			$this->data['name'] = $this->request->post['name'];
		} elseif (!empty($tax_rate_info)) {
			$this->data['name'] = $tax_rate_info['name'];
		} else {
			$this->data['name'] = '';
		}
		
		if (isset($this->request->post['rate'])) {
			$this->data['rate'] = $this->request->post['rate'];
		} elseif (!empty($tax_rate_info)) {
			$this->data['rate'] = $tax_rate_info['rate'];
		} else {
			$this->data['rate'] = '';
		}
		
		if (isset($this->request->post['type'])) {
			$this->data['type'] = $this->request->post['type'];
		} elseif (!empty($tax_rate_info)) {
			$this->data['type'] = $tax_rate_info['type'];
		} else {
			$this->data['type'] = '';
		}
		
		if (isset($this->request->post['tax_rate_customer_group'])) {
			$this->data['tax_rate_customer_group'] = $this->request->post['tax_rate_customer_group'];
		} elseif (isset($this->request->get['tax_rate_id'])) {
			$this->data['tax_rate_customer_group'] = $this->model_localisation_tax_rate->getTaxRateCustomerGroups($this->request->get['tax_rate_id']);
		} else {
			$this->data['tax_rate_customer_group'] = array();
		}	
		
		$this->load->model('sale/customer_group');
		
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
						
		if (isset($this->request->post['geo_zone_id'])) {
			$this->data['geo_zone_id'] = $this->request->post['geo_zone_id'];
		} elseif (!empty($tax_rate_info)) {
			$this->data['geo_zone_id'] = $tax_rate_info['geo_zone_id'];
		} else {
			$this->data['geo_zone_id'] = '';
		}
				
		$this->load->model('localisation/geo_zone');
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
				
		$this->template = 'localisation/tax_rate_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	private function validateForm() {
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		if (!$this->user->hasPermission('modify', 'localisation/tax_rate')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 32)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (!$this->request->post['rate']) {
			$this->error['rate'] = $this->language->get('error_rate');
		}
<<<<<<< HEAD

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/tax_rate')) {
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
		if (!$this->user->hasPermission('modify', 'localisation/tax_rate')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
		$this->load->model('localisation/tax_class');

		foreach ($this->request->post['selected'] as $tax_rate_id) {
			$tax_rule_total = $this->model_localisation_tax_class->getTotalTaxRulesByTaxRateId($tax_rate_id);

			if ($tax_rule_total) {
				$this->error['warning'] = sprintf($this->language->get('error_tax_rule'), $tax_rule_total);
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
