<?php
class ControllerExtensionModuleOcmegamenu extends Controller
{
    private $error = array();

    public function install() {
        $this->load->model('extension/module/ocmegamenu');

        $this->model_extension_module_ocmegamenu->createMenuTable();
    }

    public function uninstall() {
        $this->load->model('extension/module/ocmegamenu');

        $this->model_extension_module_ocmegamenu->deleteMenuData();
    }

    public function index() {
        $this->load->language('extension/module/ocmegamenu');

        $this->document->setTitle($this->language->get('page_title'));

        $this->load->model('setting/module');
        $this->load->model('extension/module/ocmegamenu');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if (!isset($this->request->get['module_id'])) {
                $this->model_setting_module->addModule('ocmegamenu', $this->request->post);
            } else {
                $this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
            }

            $this->cache->delete('product');

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }

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

        $data['menus'] = array();
        $menuList = $this->model_extension_module_ocmegamenu->getMenuList();
        foreach ($menuList as $menu) {
            $data['menus'][] = array(
                'id'    => $menu['menu_id'],
                'name'  => $menu['name']
            );
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        if (!isset($this->request->get['module_id'])) {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'], true)
            );
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        if (!isset($this->request->get['module_id'])) {
            $data['action'] = $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'], true);
        } else {
            $data['action'] = $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
        }

        $data['menu_editor_link'] = $this->url->link('extension/module/ocmegamenu/menulist', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
        }

        // General Settings
        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($module_info)) {
            $data['status'] = $module_info['status'];
        } else {
            $data['status'] = '';
        }

        if (isset($this->request->post['menu'])) {
            $data['menu'] = $this->request->post['menu'];
        } elseif (!empty($module_info)) {
            $data['menu'] = $module_info['menu'];
        } else {
            $data['menu'] = '';
        }

        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($module_info)) {
            $data['name'] = $module_info['name'];
        } else {
            $data['name'] = '';
        }

        if (isset($this->request->post['effect'])) {
            $data['effect'] = $this->request->post['effect'];
        } elseif (!empty($module_info)) {
            $data['effect'] = $module_info['effect'];
        } else {
            $data['effect'] = 'none';
        }

        // Menu Bar
        if (isset($this->request->post['menu_height'])) {
            $data['menu_height'] = $this->request->post['menu_height'];
        } elseif (!empty($module_info)) {
            $data['menu_height'] = $module_info['menu_height'];
        } else {
            $data['menu_height'] = '40px';
        }

        if (isset($this->request->post['menu_bg'])) {
            $data['menu_bg'] = $this->request->post['menu_bg'];
        } elseif (!empty($module_info)) {
            $data['menu_bg'] = $module_info['menu_bg'];
        } else {
            $data['menu_bg'] = '';
        }

        if (isset($this->request->post['menu_text_color'])) {
            $data['menu_text_color'] = $this->request->post['menu_text_color'];
        } elseif (!empty($module_info)) {
            $data['menu_text_color'] = $module_info['menu_text_color'];
        } else {
            $data['menu_text_color'] = '';
        }

        if (isset($this->request->post['menu_pd_top'])) {
            $data['menu_pd_top'] = $this->request->post['menu_pd_top'];
        } elseif (!empty($module_info)) {
            $data['menu_pd_top'] = $module_info['menu_pd_top'];
        } else {
            $data['menu_pd_top'] = '0px';
        }

        if (isset($this->request->post['menu_pd_right'])) {
            $data['menu_pd_right'] = $this->request->post['menu_pd_right'];
        } elseif (!empty($module_info)) {
            $data['menu_pd_right'] = $module_info['menu_pd_right'];
        } else {
            $data['menu_pd_right'] = '0px';
        }

        if (isset($this->request->post['menu_pd_bottom'])) {
            $data['menu_pd_bottom'] = $this->request->post['menu_pd_bottom'];
        } elseif (!empty($module_info)) {
            $data['menu_pd_bottom'] = $module_info['menu_pd_bottom'];
        } else {
            $data['menu_pd_bottom'] = '0px';
        }

        if (isset($this->request->post['menu_pd_left'])) {
            $data['menu_pd_left'] = $this->request->post['menu_pd_left'];
        } elseif (!empty($module_info)) {
            $data['menu_pd_left'] = $module_info['menu_pd_left'];
        } else {
            $data['menu_pd_left'] = '0px';
        }

        // Top Level Items
        if (isset($this->request->post['item_bg'])) {
            $data['item_bg'] = $this->request->post['item_bg'];
        } elseif (!empty($module_info)) {
            $data['item_bg'] = $module_info['item_bg'];
        } else {
            $data['item_bg'] = '';
        }

        if (isset($this->request->post['item_bg_hover'])) {
            $data['item_bg_hover'] = $this->request->post['item_bg_hover'];
        } elseif (!empty($module_info)) {
            $data['item_bg_hover'] = $module_info['item_bg_hover'];
        } else {
            $data['item_bg_hover'] = '';
        }

        if (isset($this->request->post['item_font_color'])) {
            $data['item_font_color'] = $this->request->post['item_font_color'];
        } elseif (!empty($module_info)) {
            $data['item_font_color'] = $module_info['item_font_color'];
        } else {
            $data['item_font_color'] = '';
        }

        if (isset($this->request->post['item_font_size'])) {
            $data['item_font_size'] = $this->request->post['item_font_size'];
        } elseif (!empty($module_info)) {
            $data['item_font_size'] = $module_info['item_font_size'];
        } else {
            $data['item_font_size'] = '14px';
        }
		
		if (isset($this->request->post['item_line_height'])) {
            $data['item_line_height'] = $this->request->post['item_line_height'];
        } elseif (!empty($module_info)) {
            $data['item_line_height'] = $module_info['item_line_height'];
        } else {
            $data['item_line_height'] = '24px';
        }
		
        if (isset($this->request->post['item_font_transform'])) {
            $data['item_font_transform'] = $this->request->post['item_font_transform'];
        } elseif (!empty($module_info)) {
            $data['item_font_transform'] = $module_info['item_font_transform'];
        } else {
            $data['item_font_transform'] = 'none';
        }

        if (isset($this->request->post['item_font_weight'])) {
            $data['item_font_weight'] = $this->request->post['item_font_weight'];
        } elseif (!empty($module_info)) {
            $data['item_font_weight'] = $module_info['item_font_weight'];
        } else {
            $data['item_font_weight'] = '400';
        }

        if (isset($this->request->post['item_font_color_hover'])) {
            $data['item_font_color_hover'] = $this->request->post['item_font_color_hover'];
        } elseif (!empty($module_info)) {
            $data['item_font_color_hover'] = $module_info['item_font_color_hover'];
        } else {
            $data['item_font_color_hover'] = '';
        }

        if (isset($this->request->post['item_font_weight_hover'])) {
            $data['item_font_weight_hover'] = $this->request->post['item_font_weight_hover'];
        } elseif (!empty($module_info)) {
            $data['item_font_weight_hover'] = $module_info['item_font_weight_hover'];
        } else {
            $data['item_font_weight_hover'] = '400';
        }
		
		if (isset($this->request->post['item_pd_top'])) {
            $data['item_pd_top'] = $this->request->post['item_pd_top'];
        } elseif (!empty($module_info)) {
            $data['item_pd_top'] = $module_info['item_pd_top'];
        } else {
            $data['item_pd_top'] = '0px';
        }

        if (isset($this->request->post['item_pd_right'])) {
            $data['item_pd_right'] = $this->request->post['item_pd_right'];
        } elseif (!empty($module_info)) {
            $data['item_pd_right'] = $module_info['item_pd_right'];
        } else {
            $data['item_pd_right'] = '0px';
        }

        if (isset($this->request->post['item_pd_bottom'])) {
            $data['item_pd_bottom'] = $this->request->post['item_pd_bottom'];
        } elseif (!empty($module_info)) {
            $data['item_pd_bottom'] = $module_info['item_pd_bottom'];
        } else {
            $data['item_pd_bottom'] = '0px';
        }

        if (isset($this->request->post['item_pd_left'])) {
            $data['item_pd_left'] = $this->request->post['item_pd_left'];
        } elseif (!empty($module_info)) {
            $data['item_pd_left'] = $module_info['item_pd_left'];
        } else {
            $data['item_pd_left'] = '0px';
        }
		
        if (isset($this->request->post['item_show'])) {
            $data['item_show'] = $this->request->post['item_show'];
        } elseif (!empty($module_info)) {
            $data['item_show'] = $module_info['item_show'];
        } else {
            $data['item_show'] = 5;
        }

        // Mega Menu Settings
        if (isset($this->request->post['mega_menu_bg'])) {
            $data['mega_menu_bg'] = $this->request->post['mega_menu_bg'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_bg'] = $module_info['mega_menu_bg'];
        } else {
            $data['mega_menu_bg'] = '';
        }

        if (isset($this->request->post['mega_second_link_color'])) {
            $data['mega_second_link_color'] = $this->request->post['mega_second_link_color'];
        } elseif (!empty($module_info)) {
            $data['mega_second_link_color'] = $module_info['mega_second_link_color'];
        } else {
            $data['mega_second_link_color'] = '';
        }
		
		if (isset($this->request->post['mega_third_link_color'])) {
            $data['mega_third_link_color'] = $this->request->post['mega_third_link_color'];
        } elseif (!empty($module_info)) {
            $data['mega_third_link_color'] = $module_info['mega_third_link_color'];
        } else {
            $data['mega_third_link_color'] = '';
        }

        if (isset($this->request->post['mega_menu_width'])) {
            $data['mega_menu_width'] = $this->request->post['mega_menu_width'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_width'] = $module_info['mega_menu_width'];
        } else {
            $data['mega_menu_width'] = '100%';
        }

        if (isset($this->request->post['mega_menu_pd_top'])) {
            $data['mega_menu_pd_top'] = $this->request->post['mega_menu_pd_top'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_pd_top'] = $module_info['mega_menu_pd_top'];
        } else {
            $data['mega_menu_pd_top'] = '0px';
        }

        if (isset($this->request->post['mega_menu_pd_right'])) {
            $data['mega_menu_pd_right'] = $this->request->post['mega_menu_pd_right'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_pd_right'] = $module_info['mega_menu_pd_right'];
        } else {
            $data['mega_menu_pd_right'] = '0px';
        }

        if (isset($this->request->post['mega_menu_pd_bottom'])) {
            $data['mega_menu_pd_bottom'] = $this->request->post['mega_menu_pd_bottom'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_pd_bottom'] = $module_info['mega_menu_pd_bottom'];
        } else {
            $data['mega_menu_pd_bottom'] = '0px';
        }

        if (isset($this->request->post['mega_menu_pd_left'])) {
            $data['mega_menu_pd_left'] = $this->request->post['mega_menu_pd_left'];
        } elseif (!empty($module_info)) {
            $data['mega_menu_pd_left'] = $module_info['mega_menu_pd_left'];
        } else {
            $data['mega_menu_pd_left'] = '0px';
        }
		
        // Flyout Menu Settings
        // Second Level Items
        if (isset($this->request->post['second_item_bg'])) {
            $data['second_item_bg'] = $this->request->post['second_item_bg'];
        } elseif (!empty($module_info)) {
            $data['second_item_bg'] = $module_info['second_item_bg'];
        } else {
            $data['second_item_bg'] = '';
        }

        if (isset($this->request->post['second_item_bg_hover'])) {
            $data['second_item_bg_hover'] = $this->request->post['second_item_bg_hover'];
        } elseif (!empty($module_info)) {
            $data['second_item_bg_hover'] = $module_info['second_item_bg_hover'];
        } else {
            $data['second_item_bg_hover'] = '';
        }

        if (isset($this->request->post['second_item_font_color'])) {
            $data['second_item_font_color'] = $this->request->post['second_item_font_color'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_color'] = $module_info['second_item_font_color'];
        } else {
            $data['second_item_font_color'] = '';
        }

        if (isset($this->request->post['second_item_font_size'])) {
            $data['second_item_font_size'] = $this->request->post['second_item_font_size'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_size'] = $module_info['second_item_font_size'];
        } else {
            $data['second_item_font_size'] = '12px';
        }

        if (isset($this->request->post['second_item_font_transform'])) {
            $data['second_item_font_transform'] = $this->request->post['second_item_font_transform'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_transform'] = $module_info['second_item_font_transform'];
        } else {
            $data['second_item_font_transform'] = 'none';
        }

        if (isset($this->request->post['second_item_font_weight'])) {
            $data['second_item_font_weight'] = $this->request->post['second_item_font_weight'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_weight'] = $module_info['second_item_font_weight'];
        } else {
            $data['second_item_font_weight'] = '400';
        }

        if (isset($this->request->post['second_item_font_color_hover'])) {
            $data['second_item_font_color_hover'] = $this->request->post['second_item_font_color_hover'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_color_hover'] = $module_info['second_item_font_color_hover'];
        } else {
            $data['second_item_font_color_hover'] = '';
        }

        if (isset($this->request->post['second_item_font_weight_hover'])) {
            $data['second_item_font_weight_hover'] = $this->request->post['second_item_font_weight_hover'];
        } elseif (!empty($module_info)) {
            $data['second_item_font_weight_hover'] = $module_info['second_item_font_weight_hover'];
        } else {
            $data['second_item_font_weight_hover'] = '400';
        }

        // Third Level Items
        if (isset($this->request->post['third_item_bg'])) {
            $data['third_item_bg'] = $this->request->post['third_item_bg'];
        } elseif (!empty($module_info)) {
            $data['third_item_bg'] = $module_info['third_item_bg'];
        } else {
            $data['third_item_bg'] = '';
        }

        if (isset($this->request->post['third_item_bg_hover'])) {
            $data['third_item_bg_hover'] = $this->request->post['third_item_bg_hover'];
        } elseif (!empty($module_info)) {
            $data['third_item_bg_hover'] = $module_info['third_item_bg_hover'];
        } else {
            $data['third_item_bg_hover'] = '';
        }

        if (isset($this->request->post['third_item_font_color'])) {
            $data['third_item_font_color'] = $this->request->post['third_item_font_color'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_color'] = $module_info['third_item_font_color'];
        } else {
            $data['third_item_font_color'] = '';
        }

        if (isset($this->request->post['third_item_font_size'])) {
            $data['third_item_font_size'] = $this->request->post['third_item_font_size'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_size'] = $module_info['third_item_font_size'];
        } else {
            $data['third_item_font_size'] = '11px';
        }

        if (isset($this->request->post['third_item_font_transform'])) {
            $data['third_item_font_transform'] = $this->request->post['third_item_font_transform'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_transform'] = $module_info['third_item_font_transform'];
        } else {
            $data['third_item_font_transform'] = 'none';
        }

        if (isset($this->request->post['third_item_font_weight'])) {
            $data['third_item_font_weight'] = $this->request->post['third_item_font_weight'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_weight'] = $module_info['third_item_font_weight'];
        } else {
            $data['third_item_font_weight'] = '400';
        }

        if (isset($this->request->post['third_item_font_color_hover'])) {
            $data['third_item_font_color_hover'] = $this->request->post['third_item_font_color_hover'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_color_hover'] = $module_info['third_item_font_color_hover'];
        } else {
            $data['third_item_font_color_hover'] = '';
        }

        if (isset($this->request->post['third_item_font_weight_hover'])) {
            $data['third_item_font_weight_hover'] = $this->request->post['third_item_font_weight_hover'];
        } elseif (!empty($module_info)) {
            $data['third_item_font_weight_hover'] = $module_info['third_item_font_weight_hover'];
        } else {
            $data['third_item_font_weight_hover'] = '400';
        }

        $this->document->addScript('view/javascript/ocmegamenu/jscolor.js');
        $this->document->addStyle('view/stylesheet/ocmegamenu/menu.css');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/ocmegamenu', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        return !$this->error;
    }

    public function menuList() {
        $this->load->language('extension/module/ocmegamenu');

        $this->document->setTitle($this->language->get('page_title'));

        $this->load->model('extension/module/ocmegamenu');

        $this->getlist();
    }

    public function add() {
        $this->load->language('extension/module/ocmegamenu');

        $this->document->setTitle($this->language->get('page_title'));

        $this->load->model('extension/module/ocmegamenu');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_extension_module_ocmegamenu->addMenu($this->request->post);

            $post_data = $this->request->post;

            $top_position_data = $post_data['top_item_position'];

            foreach ($top_position_data as $menu_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editTopItemPosition($position, $menu_item_id);
            }

            $sub2_position_data = $post_data['sub_item_position2'];

            foreach ($sub2_position_data as $sub_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editSubItemPosition($position, $sub_item_id);
            }

            $sub3_position_data = $post_data['sub_item_position3'];

            foreach ($sub3_position_data as $sub_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editSubItemPosition($position, $sub_item_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getForm();
    }

    public function edit() {
        $this->load->language('extension/module/ocmegamenu');

        $this->document->setTitle($this->language->get('page_title'));

        $this->load->model('extension/module/ocmegamenu');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $post_data = $this->request->post;

            $this->model_extension_module_ocmegamenu->editMenu($this->request->get['menu_id'], $this->request->post);

            $top_position_data = $post_data['top_item_position'];

            foreach ($top_position_data as $menu_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editTopItemPosition($position, $menu_item_id);
            }

            $sub2_position_data = $post_data['sub_item_position2'];

            foreach ($sub2_position_data as $sub_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editSubItemPosition($position, $sub_item_id);
            }

            $sub3_position_data = $post_data['sub_item_position3'];

            foreach ($sub3_position_data as $sub_item_id => $position) {
                $this->model_extension_module_ocmegamenu->editSubItemPosition($position, $sub_item_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getForm();
    }

    public function delete() {
        $this->load->language('extension/module/ocmegamenu');

        $this->document->setTitle($this->language->get('page_title'));

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            foreach ($this->request->post['selected'] as $menu_id) {
                $this->model_extension_module_ocmegamenu->deleteMenu($menu_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getlist();
    }

    public function getlist() {
        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        if (!isset($this->request->get['module_id'])) {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'], true)
            );
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_menu_editor'),
            'href' => $this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true)
        );

        $data['add'] = $this->url->link('extension/module/ocmegamenu/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        $data['delete'] = $this->url->link('extension/module/ocmegamenu/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

        $filter_data = array(
            'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit'           => $this->config->get('config_limit_admin')
        );

        $data['menu_list'] = array();

        $menus_total = $this->model_extension_module_ocmegamenu->getMenuCount();

        $menus = $this->model_extension_module_ocmegamenu->getMenuList($filter_data);

        if($menus) {
            foreach ($menus as $menu) {
                $data['menu_list'][] = array(
                    'menu_id'   => $menu['menu_id'],
                    'name'      => $menu['name'],
                    'status'    => $menu['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                    'url'       => $this->url->link('extension/module/ocmegamenu/edit', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $menu['menu_id'] . $url, true)
                );
            }
        }

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

        $pagination = new Pagination();
        $pagination->total = $menus_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($menus_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($menus_total - $this->config->get('config_limit_admin'))) ? $menus_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $menus_total, ceil($menus_total / $this->config->get('config_limit_admin')));

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/ocmegamenu/list', $data));
    }

    public function getForm() {
        $data['text_form'] = !isset($this->request->get['menu_id']) ? $this->language->get('text_add') : $this->language->get('text_edit_menu');

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

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        if (!isset($this->request->get['module_id'])) {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'], true)
            );
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/ocmegamenu', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        if (!isset($this->request->get['menu_id'])) {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        } else {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/edit', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $this->request->get['menu_id'] . $url, true);
        }

        if (!isset($this->request->get['menu_id'])) {
            $this->model_extension_module_ocmegamenu->deleteTopItemByMenu('0');
            $data['cancel'] = $this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true);
        } else {
            $data['cancel'] = $this->url->link('extension/module/ocmegamenu/menuList', 'user_token=' . $this->session->data['user_token'] . $url, true);
        }

        if (isset($this->request->get['menu_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $menu_info = $this->model_extension_module_ocmegamenu->getMenu($this->request->get['menu_id']);
        }

        $data['user_token'] = $this->session->data['user_token'];

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($menu_info)) {
            $data['name'] = $menu_info['name'];
        } else {
            $data['name'] = '';
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($menu_info)) {
            $data['status'] = $menu_info['status'];
        } else {
            $data['status'] = 1;
        }

        if (isset($this->request->post['menu_type'])) {
            $data['menu_type'] = $this->request->post['menu_type'];
        } elseif (!empty($menu_info)) {
            $data['menu_type'] = $menu_info['menu_type'];
        } else {
            $data['menu_type'] = 'horizontal';
        }

        $data['top_items'] = array();
        if (isset($this->request->get['menu_id'])) {
            $results = $this->model_extension_module_ocmegamenu->getTopItems($this->request->get['menu_id']);

            foreach ($results as $result) {
                $sub_items_lv2 = $this->model_extension_module_ocmegamenu->getSubItems($result['menu_item_id'], 2);

                $sub_items2 = array();

                if($sub_items_lv2) {
                    foreach ($sub_items_lv2 as $item) {
                        $sub_items_lv3 = $this->model_extension_module_ocmegamenu->getSubItems($item['sub_menu_item_id'], 3);

                        $sub_items3 = array();

                        if($sub_items_lv3) {
                            foreach ($sub_items_lv3 as $s_item) {
                                $sub_items3[] = array(
                                    'item_id'   => $s_item['sub_menu_item_id'],
                                    'name'      => $s_item['name'],
                                    'position'  => $s_item['position'],
                                    'url'           => $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $s_item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true),
                                    'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $s_item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true)
                                );
                            }
                        }

                        $sub_items2[] = array(
                            'sub_items'     => $sub_items3,
                            'item_id'   => $item['sub_menu_item_id'],
                            'name'      => $item['name'],
                            'position'  => $item['position'],
                            'url'           => $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true),
                            'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true)
                        );
                    }
                }

                $data['top_items'][] = array(
                    'sub_items'     => $sub_items2,
                    'name'          => $result['name'],
                    'menu_item_id'  => $result['menu_item_id'],
                    'position'      => $result['position'],
                    'url'           => $this->url->link('extension/module/ocmegamenu/editTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_item_id=' . $result['menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true),
                    'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_item_id=' . $result['menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true)
                );
            }
        }

        if (isset($this->request->get['menu_id'])) {
            $data['top_items_form_url'] = $this->url->link('extension/module/ocmegamenu/addTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $this->request->get['menu_id'], true);
            $data['sub_item_add_form_url'] = $this->url->link('extension/module/ocmegamenu/addSubItem', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $this->request->get['menu_id'], true);
            $data['sub_item_edit_form_url'] = $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $this->request->get['menu_id'], true);
            $data['multiple_del_url'] = $this->url->link('extension/module/ocmegamenu/deleteMultipleItems', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $this->request->get['menu_id'], true);
        } else {
            $data['top_items_form_url'] = $this->url->link('extension/module/ocmegamenu/addTopItem', 'user_token=' . $this->session->data['user_token'], true);
            $data['sub_item_add_form_url'] = $this->url->link('extension/module/ocmegamenu/addSubItem', 'user_token=' . $this->session->data['user_token'], true);
            $data['sub_item_edit_form_url'] = $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'], true);
            $data['multiple_del_url'] = $this->url->link('extension/module/ocmegamenu/deleteMultipleItems', 'user_token=' . $this->session->data['user_token'], true);
        }

        $data['get_top_items_url'] = $this->url->link('extension/module/ocmegamenu/getTopItemsByAjax', 'user_token=' . $this->session->data['user_token'], true);

        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $data['loader_image'] = HTTPS_CATALOG . 'image/ocmegamenu/ajax_loader.gif';
        } else {
            $data['loader_image'] = HTTP_CATALOG . 'image/ocmegamenu/ajax_loader.gif';
        }

        $this->document->addScript('view/javascript/ocmegamenu/jscolor.js');
        $this->document->addScript('view/javascript/ocmegamenu/menu.js');
        $this->document->addScript('view/javascript/jquery/jquery-ui/jquery-ui.js');
        $this->document->addStyle('view/javascript/jquery/jquery-ui/jquery-ui.css');
        $this->document->addStyle('view/stylesheet/ocmegamenu/menu.css');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/ocmegamenu/form', $data));
    }

    public function getTopItemsByAjax() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        $json = array();

        $menu_id = $this->request->get['menu_id'];

        $results = $this->model_extension_module_ocmegamenu->getTopItems($menu_id);

        $json['top_items'] = false;

        if($results) {
            $json['top_items'] = array();

            foreach ($results as $result) {
                $sub_items_lv2 = $this->model_extension_module_ocmegamenu->getSubItems($result['menu_item_id'], 2);

                $sub_items2 = array();

                if($sub_items_lv2) {
                    foreach ($sub_items_lv2 as $item) {
                        $sub_items_lv3 = $this->model_extension_module_ocmegamenu->getSubItems($item['sub_menu_item_id'], 3);

                        $sub_items3 = array();

                        if($sub_items_lv3) {
                            foreach ($sub_items_lv3 as $s_item) {
                                $sub_items3[] = array(
                                    'item_id'   => $s_item['sub_menu_item_id'],
                                    'name'      => $s_item['name'],
                                    'position'  => $s_item['position'],
                                    'url'           => $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $s_item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true),
                                    'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $s_item['sub_menu_item_id'] . '&menu_id=' . $this->request->get['menu_id'], true)
                                );
                            }
                        }

                        $sub_items2[] = array(
                            'sub_items'     => $sub_items3,
                            'item_id'   => $item['sub_menu_item_id'],
                            'name'      => $item['name'],
                            'position'  => $item['position'],
                            'url'           => $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $item['sub_menu_item_id'] . '&menu_id=' . $menu_id, true),
                            'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_menu_item_id=' . $item['sub_menu_item_id'] . '&menu_id=' . $menu_id, true)
                        );
                    }
                }

                $json['top_items'][] = array(
                    'sub_items'     => $sub_items2,
                    'menu_item_id'  => $result['menu_item_id'],
                    'name'          => $result['name'],
                    'position'      => $result['position'],
                    'url'           => $this->url->link('extension/module/ocmegamenu/editTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_item_id=' . $result['menu_item_id'] . '&menu_id=' . $menu_id, true),
                    'del_url'       => $this->url->link('extension/module/ocmegamenu/deleteTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_item_id=' . $result['menu_item_id'] . '&menu_id=' . $menu_id, true)
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function addTopItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        $json = array();

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateTopItemForm()) {
            $post_data = $this->request->post;

            $post_data['menu_id'] = $menu_id;

            if(isset($this->request->post['disable_title'])) {
                $post_data['has_title'] = 0;
            } else {
                $post_data['has_title'] = 1;
            }

            if(isset($this->request->post['disable_link'])) {
                $post_data['has_link'] = 0;
            } else {
                $post_data['has_link'] = 1;
            }

            if(isset($this->request->post['icon'])) {
                $post_data['icon'] = $this->request->post['icon'];
            } else {
                $post_data['icon'] = "";
            }

            if(isset($this->request->post['widget'])) {
                $post_data['sub_menu_content'] = $this->request->post['widget'];
            } else {
                $post_data['sub_menu_content'] = array();
            }
            
            $menu_top_item_id = $this->model_extension_module_ocmegamenu->addTopItem($post_data);

            if(!$json) {
                $json['submit'] = true;
                $json['last_menu_top_item'] = $menu_top_item_id;
            }

            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        } else {
            $this->getTopItemForm($menu_id);
        }
    }

    public function editTopItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        $json = array();

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateTopItemForm()) {
            $post_data = $this->request->post;

            $post_data['menu_id'] = $menu_id;

            if(isset($this->request->post['disable_title'])) {
                $post_data['has_title'] = 0;
            } else {
                $post_data['has_title'] = 1;
            }

            if(isset($this->request->post['disable_link'])) {
                $post_data['has_link'] = 0;
            } else {
                $post_data['has_link'] = 1;
            }

            if(isset($this->request->post['icon'])) {
                $post_data['icon'] = $this->request->post['icon'];
            } else {
                $post_data['icon'] = "";
            }

            if(isset($this->request->post['widget'])) {
                $post_data['sub_menu_content'] = $this->request->post['widget'];
            } else {
                $post_data['sub_menu_content'] = array();
            }

            $this->model_extension_module_ocmegamenu->editTopItem($post_data, $this->request->get['menu_item_id']);

            if(!$json) {
                $json['submit'] = true;
            }

            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        } else {
            $this->getTopItemForm($menu_id);
        }
    }

    public function deleteTopItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        $json = array();

        $json['menu_id'] = $menu_id;

        if (isset($this->request->get['menu_item_id'])) {
            $this->model_extension_module_ocmegamenu->deleteTopItem($this->request->get['menu_item_id']);

            $json['result'] = true;
        } else {
            $json['result'] = false;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    
    public function deleteMultipleItems() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        $json = array();

        $json['menu_id'] = $menu_id;

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $post_data = $this->request->post;

            if(isset($post_data['top_items'])) {
                $top_items = $post_data['top_items'];

                foreach ($top_items as $top_item_id) {
                    $this->model_extension_module_ocmegamenu->deleteTopItem($top_item_id);
                }
            }

            if(isset($post_data['sub_items'])) {
                $sub_items = $post_data['sub_items'];

                foreach ($sub_items as $sub_item_id) {
                    $this->model_extension_module_ocmegamenu->deleteSubItem($sub_item_id);
                }
            }

            $json['result'] = true;
        } else {
            $json['result'] = false;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getTopItemForm($menu_id) {
        $json = array();

        $data = array();

        $data['menu_id'] = $menu_id;

        $data['user_token'] = $this->session->data['user_token'];

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

        if (isset($this->request->get['menu_item_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $menu_item_info = $this->model_extension_module_ocmegamenu->getTopItemById($this->request->get['menu_item_id']);
        }
        
        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($menu_item_info)) {
            $data['name'] = $menu_item_info['name'];
        } else {
            $data['name'] = '';
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($menu_item_info)) {
            $data['status'] = $menu_item_info['status'];
        } else {
            $data['status'] = 0;
        }

        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        foreach ($languages as $language){
            if ($language['status']) {
                $data['languages'][] = array(
                    'name'  => $language['name'],
                    'language_id' => $language['language_id'],
                    'image' => $language['image'],
                    'code' => $language['code']
                );
            }
        }

        $lang_code = $this->config->get('config_admin_language');

        $lang = $this->model_extension_module_ocmegamenu->getLanguageByCode($lang_code);

        $data['lang_id'] = $lang['language_id'];

        if(isset($this->request->get['menu_item_id'])) {
            $menu_item_description = $this->model_extension_module_ocmegamenu->getTopItemDescriptionById($this->request->get['menu_item_id']);
        } else {
            $menu_item_description = array();
        }

        if (isset($this->request->post['title'])) {
            $data['title'] = $this->request->post['title'];
        } elseif (!empty($menu_item_info) && $menu_item_description) {
            $data['title'] = $menu_item_description;
        } else {
            $data['title'] = array();
        }

        if (isset($this->request->post['disable_title'])) {
            $data['disable_title'] = true;
        } elseif (!empty($menu_item_info)) {
            $data['disable_title'] = !$menu_item_info['has_title'];
        } else {
            $data['disable_title'] = false;
        }

        if (isset($this->request->post['has_child'])) {
            $data['has_child'] = 1;
        } elseif (!empty($menu_item_info)) {
            $data['has_child'] = $menu_item_info['has_child'] ? 1 : 0;
        } else {
            $data['has_child'] = 0;
        }

        if (isset($this->request->post['link'])) {
            $data['link'] = $this->request->post['link'];
        } elseif (!empty($menu_item_info)) {
            $data['link'] = $menu_item_info['link'];
        } else {
            $data['link'] = '';
        }

        if (isset($this->request->post['disable_link'])) {
            $data['disable_link'] = true;
        } elseif (!empty($menu_item_info)) {
            $data['disable_link'] = !$menu_item_info['has_link'];
        } else {
            $data['disable_link'] = false;
        }

        if (isset($this->request->post['sub_menu_type'])) {
            $data['sub_menu_type'] = $this->request->post['sub_menu_type'];
        } elseif (!empty($menu_item_info)) {
            $data['sub_menu_type'] = $menu_item_info['sub_menu_type'];
        } else {
            $data['sub_menu_type'] = 'mega';
        }

        if (isset($this->request->post['position'])) {
            $data['position'] = $this->request->post['position'];
        } elseif (!empty($menu_item_info)) {
            $data['position'] = $menu_item_info['position'];
        } else {
            $data['position'] = 0;
        }

        if (isset($this->request->post['item_align'])) {
            $data['item_align'] = $this->request->post['item_align'];
        } elseif (!empty($menu_item_info)) {
            $data['item_align'] = $menu_item_info['item_align'];
        } else {
            $data['item_align'] = 'left';
        }

        if (isset($this->request->post['sub_menu_content_type'])) {
            $data['sub_menu_content_type'] = $this->request->post['sub_menu_content_type'];
        } elseif (!empty($menu_item_info)) {
            $data['sub_menu_content_type'] = $menu_item_info['sub_menu_content_type'];
        } else {
            $data['sub_menu_content_type'] = '';
        }

        if (isset($this->request->post['sub_menu_content_columns'])) {
            $data['sub_menu_content_columns'] = $this->request->post['sub_menu_content_columns'];
        } elseif (!empty($menu_item_info)) {
            $data['sub_menu_content_columns'] = $menu_item_info['sub_menu_content_columns'];
        } else {
            $data['sub_menu_content_columns'] = 0;
        }

        if (isset($this->request->post['category_id'])) {
            $data['category_id'] = $this->request->post['category_id'];
        } elseif (!empty($menu_item_info)) {
            $data['category_id'] = $menu_item_info['category_id'];
        } else {
            $data['category_id'] = 0;
        }

        if (isset($this->request->post['widget'])) {
            $data['widget'] = $this->request->post['widget'];
        } elseif (!empty($menu_item_info)) {
            $data['widget'] = json_decode($menu_item_info['sub_menu_content'], true);
        } else {
            $data['widget'] = array();
        }
        
        if (isset($this->request->post['icon'])) {
            $data['icon'] = $this->request->post['icon'];
        } elseif (!empty($menu_item_info)) {
            $data['icon'] = $menu_item_info['icon'];
        } else {
            $data['icon'] = '';
        }

        $this->load->model('tool/image');

        if (isset($this->request->post['icon']) && is_file(DIR_IMAGE . $this->request->post['icon'])) {
            $data['thumb'] = $this->model_tool_image->resize($this->request->post['icon'], 50, 50);
        } elseif (!empty($menu_item_info) && is_file(DIR_IMAGE . $menu_item_info['icon'])) {
            $data['thumb'] = $this->model_tool_image->resize($menu_item_info['icon'], 50, 50);
        } else {
            $data['thumb'] = $this->model_tool_image->resize('no_image.png', 50, 50);
        }
        
        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 50, 50);
        
        // Categories
        $this->load->model('catalog/category');

        $categories = $this->model_extension_module_ocmegamenu->getTopCategories();

        $data['categories'] = array();

        foreach ($categories as $category_id) {
            $category_info = $this->model_catalog_category->getCategory($category_id);

            if ($category_info) {
                $data['categories'][] = array(
                    'category_id' => $category_info['category_id'],
                    'name'        => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
                );
            }
        }

        $data['append_categories_link'] = $this->url->link('extension/module/ocmegamenu/appendChildCategories', 'user_token=' . $this->session->data['user_token'], true);

        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $data['loader_image'] = HTTPS_CATALOG . 'image/ocmegamenu/ajax_loader.gif';
        } else {
            $data['loader_image'] = HTTP_CATALOG . 'image/ocmegamenu/ajax_loader.gif';
        }

        if(!isset($this->request->get['menu_item_id'])) {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/addTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_id=' . $menu_id, true);
        } else {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/editTopItem', 'user_token=' . $this->session->data['user_token'] . '&menu_item_id=' . $this->request->get['menu_item_id'] . '&menu_id=' . $menu_id, true);
        }

        if(!$json) {
            $json['html'] = $this->load->view('extension/module/ocmegamenu/top_item_form', $data);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function addSubItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        $json = array();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateSubItemForm()) {
            $post_data = $this->request->post;

            $this->model_extension_module_ocmegamenu->addSubItem($post_data);

            if(!$json) {
                $json['submit'] = true;
            }

            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        } else {
            $this->getSubItemForm($menu_id);
        }
    }

    public function editSubItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        $json = array();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateSubItemForm()) {
            $post_data = $this->request->post;

            $this->model_extension_module_ocmegamenu->editSubItem($post_data, $this->request->get['sub_item_id']);

            if(!$json) {
                $json['submit'] = true;
            }

            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        } else {
            $this->getSubItemForm($menu_id);
        }
    }

    public function deleteSubItem() {
        $this->load->language('extension/module/ocmegamenu');

        $this->load->model('extension/module/ocmegamenu');

        if (isset($this->request->get['menu_id'])) {
            $menu_id = $this->request->get['menu_id'];
        } else {
            $menu_id = 0;
        }

        $json = array();

        $json['menu_id'] = $menu_id;

        if (isset($this->request->get['sub_menu_item_id'])) {
            $this->model_extension_module_ocmegamenu->deleteSubItem($this->request->get['sub_menu_item_id']);

            $json['result'] = true;
        } else {
            $json['result'] = false;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getSubItemForm($menu_id) {
        $json = array();

        $data = array();

        $data['menu_id'] = $menu_id;

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

        if (isset($this->request->get['sub_item_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $sub_menu_item_info = $this->model_extension_module_ocmegamenu->getSubItemById($this->request->get['sub_item_id']);
        }

        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['name'] = $sub_menu_item_info['name'];
        } else {
            $data['name'] = '';
        }

        if(isset($this->request->get['parent_id'])) {
            $data['parent_menu_item_id'] = $this->request->get['parent_id'];
        } elseif (isset($this->request->post['name'])) {
            $data['parent_menu_item_id'] = $this->request->post['parent_menu_item_id'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['parent_menu_item_id'] = $sub_menu_item_info['parent_menu_item_id'];
        } else {
            $data['parent_menu_item_id'] = 0;
        }

        if(isset($this->request->get['level'])) {
            $data['level'] = $this->request->get['level'];
        } elseif (isset($this->request->post['level'])) {
            $data['level'] = $this->request->post['level'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['level'] = $sub_menu_item_info['level'];
        } else {
            $data['level'] = 0;
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['status'] = $sub_menu_item_info['status'];
        } else {
            $data['status'] = 1;
        }

        if (isset($this->request->post['position'])) {
            $data['position'] = $this->request->post['position'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['position'] = $sub_menu_item_info['position'];
        } else {
            $data['position'] = 0;
        }

        if (isset($this->request->post['link'])) {
            $data['link'] = $this->request->post['link'];
        } elseif (!empty($sub_menu_item_info)) {
            $data['link'] = $sub_menu_item_info['link'];
        } else {
            $data['link'] = '';
        }

        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        foreach ($languages as $language){
            if ($language['status']) {
                $data['languages'][] = array(
                    'name'  => $language['name'],
                    'language_id' => $language['language_id'],
                    'image' => $language['image'],
                    'code' => $language['code']
                );
            }
        }

        if(isset($this->request->get['sub_item_id'])) {
            $menu_item_description = $this->model_extension_module_ocmegamenu->getSubItemDescriptionById($this->request->get['sub_item_id']);
        } else {
            $menu_item_description = array();
        }

        if (isset($this->request->post['title'])) {
            $data['title'] = $this->request->post['title'];
        } elseif (!empty($sub_menu_item_info) && $menu_item_description) {
            $data['title'] = $menu_item_description;
        } else {
            $data['title'] = array();
        }

        $data['user_token'] = $this->session->data['user_token'];

        if(!isset($this->request->get['sub_item_id'])) {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/addSubItem', 'user_token=' . $this->session->data['user_token'] . '&parent_id=' . $this->request->get['parent_id'] . '&level=' . $this->request->get['level'], true);
        } else {
            $data['action'] = $this->url->link('extension/module/ocmegamenu/editSubItem', 'user_token=' . $this->session->data['user_token'] . '&sub_item_id=' . $this->request->get['sub_item_id'], true);
        }

        if(!$json) {
            $json['html'] = $this->load->view('extension/module/ocmegamenu/sub_item_form', $data);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function appendChildCategories() {
        $this->load->model('extension/module/ocmegamenu');

        $json = array();

        $category_id = $this->request->get['category_id'];

        $json['category_link'] = 'index.php?route=product/category&path=' . $category_id;

        $childCategories = $this->model_extension_module_ocmegamenu->getCategories($category_id);

        if($childCategories) {
            foreach ($childCategories as $child_category) {
                $json['child_categories'][] = array(
                    'category_id' => $child_category['category_id'],
                    'name'        => $child_category['name']
                );
            }
        } else {
            $json['child_categories'] = false;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    protected function validateTopItemForm() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_item_name');
        }

        return !$this->error;
    }

    protected function validateSubItemForm() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_item_name');
        }

        return !$this->error;
    }

    protected function validateForm() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_menu_name');
        }

        return !$this->error;
    }

    protected function validateDelete() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    protected function validateCopy() {
        if (!$this->user->hasPermission('modify', 'extension/module/ocmegamenu')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    protected function array_delete($array, $element) {
        return (is_array($element)) ? array_values(array_diff($array, $element)) : array_values(array_diff($array, array($element)));
    }

    public function autoCompleteCategory() {
        $json = array();

        if (isset($this->request->get['filter_name'])) {
            $this->load->model('extension/module/ocmegamenu');

            $filter_data = array(
                'filter_name' => $this->request->get['filter_name'],
                'sort'        => 'name',
                'order'       => 'ASC',
                'start'       => 0,
                'limit'       => 5
            );

            $results = $this->model_extension_module_ocmegamenu->getAllCategories($filter_data);

            foreach ($results as $result) {
                $json[] = array(
                    'category_id' => $result['category_id'],
                    'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
                );
            }
        }

        $sort_order = array();

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getLanguageData() {
        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        $json = array();

        foreach ($languages as $language){
            if ($language['status']) {
                $json['languages'][] = array(
                    'name'  => $language['name'],
                    'language_id' => $language['language_id'],
                    'image' => $language['image'],
                    'code' => $language['code']
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}