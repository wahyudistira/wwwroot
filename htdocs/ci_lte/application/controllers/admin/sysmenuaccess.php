<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sysmenuaccess extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
		$this->lang->load('admin/sysmenuaccess');
        $this->load->model('admin/sysmenuaccess_model');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_sysmenuaccess'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_sysmenuaccess'), 'admin/sysmenuaccess');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
			
			$this->load->library('pagination');
			$config['base_url'] = base_url().'/admin/sysmenuaccess/';
			$config['total_rows'] = $this->sysmenuaccess_model->tampildata()->num_rows();
			$config['per_page'] = 5; 
			$this->pagination->initialize($config); 
			$this->data['paging']     =$this->pagination->create_links();
			$halaman            =  $this->uri->segment(3);
			$halaman            =$halaman==''?0:$halaman;
			$this->data['record']     =    $this->sysmenuaccess_model->tampilkan_data_paging($halaman,$config['per_page']);
            
			$this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all users */
            // $this->data['record'] = $this->sysmenuaccess_model->tampildata();
			
			
			
            $this->template->admin_render('admin/sysmenuaccess/index', $this->data);
        }
	}


	public function create()
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_acces_create'), 'admin/sysmenuaccess/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
		$this->load->library('form_validation');
		/* Validate form input */
		$this->form_validation->set_rules('idsysgroup', 'lang:menu_access_group', 'required');
		$this->form_validation->set_rules('idsysmenu', 'lang:menu_access_menu_name', 'required');
		$this->form_validation->set_message('checkDuplicatedata', 'This data is already exist. Please write a new data.');

		if ($this->form_validation->run() == TRUE)
		{
			$this->data['idsysgroup'] = strtolower($this->input->post('idsysgroup'));
			$this->data['idsysmenu']  = strtolower($this->input->post('idsysmenu'));
		}
		
		if ($this->form_validation->run() == TRUE )			
		{		if($this->checkDuplicatedata($this->data)){
						$success =  'This data is already exist OR Check your data. Please write a new data.';
						$this->session->set_flashdata('message', $success);
						redirect('admin/sysmenuaccess/create', 'refresh');
				}else{
						$this->sysmenuaccess_model->post($this->data);
						$success = "Wao ! You are successfully added to our community.";
						$this->session->set_flashdata('message', $success);
						redirect('admin/sysmenuaccess', 'refresh');
				}
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				
			$this->data['idsysgroup'] = array(
				'name'  => 'idsysgroup',
				'id'    => 'idsysgroup',
				'list'  => 'groupid',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('idsysgroup'),
			);
			$this->data['idsysmenu'] = array(
				'name'  => 'idsysmenu',
				'id'    => 'idsysmenu',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('idsysmenu'),
			);

            /* Load Template */
			$this->data['group']=  $this->sysmenuaccess_model->getdatagroup();
            $this->data['menus']=  $this->sysmenuaccess_model->getdatamenu();
			$this->session->set_flashdata('message', 'data success ');
            $this->template->admin_render('admin/sysmenuaccess/create', $this->data);
            
        }
	}
	
	public function checkDuplicateData($data) {

		return $this->sysmenuaccess_model->checkDuplicatedata($data);

	}
	
	public function delete()
	{
        /* Load Template */
		$this->template->admin_render('admin/users/delete', $this->data);
	}


	public function edit($id)
	{
        $id = (int) $id;
		
		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() && ! ($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/users/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		
		$this->form_validation->set_rules('idsysgroup', 'lang:menu_access_group', 'required');
		$this->form_validation->set_rules('idsysmenu', 'lang:menu_access_menu_name', 'required');
		
		$this->data['menuaccess'] = $this->sysmenuaccess_model->getMenusaccess($id);
		// var_dump($this->sysmenuaccess_model->getMenusaccess($id));exit;
		
		
		$this->data['group']=  $this->sysmenuaccess_model->getdatagroup();
        $this->data['menus']=  $this->sysmenuaccess_model->getdatamenu();
		// $this->session->set_flashdata('message', 'data success ');
		$this->template->admin_render('admin/sysmenuaccess/edit', $this->data);
		
		/* Validate form input 
		if (isset($_POST) && ! empty($_POST))
		{
            if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

            if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone')
				);

                if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

                if ($this->ion_auth->is_admin())
				{
                    $groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
                    {
						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
                        {
							$this->ion_auth->add_to_group($grp, $id);
						}
					}
				}

                if($this->ion_auth->update($user->id, $data))
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

				    if ($this->ion_auth->is_admin())
					{
						redirect('admin/sysmenuaccess/edit', 'refresh');
					}
					else
					{
						redirect('admin', 'refresh');
					}
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());

				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user']          = $user;
		$this->data['groups']        = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('last_name', $user->last_name)
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('company', $user->company)
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
            'type'  => 'tel',
            'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('phone', $user->phone)
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
            'class' => 'form-control',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
            'class' => 'form-control',
			'type' => 'password'
		);


/
		$this->template->admin_render('admin/users/edit', $this->data);
		*/        /* Load Template */
	}


	function activate($id, $code = FALSE)
	{
        $id = (int) $id;

		if ($code !== FALSE)
		{
            $activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/users', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}


	public function deactivate($id = NULL)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_deactivate'), 'admin/users/deactivate');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('confirm', 'lang:deactivate_validation_confirm_label', 'required');
		$this->form_validation->set_rules('id', 'lang:deactivate_validation_user_id_label', 'required|alpha_numeric');

		$id = (int) $id;

		if ($this->form_validation->run() === FALSE)
		{
			$user = $this->ion_auth->user($id)->row();

            $this->data['csrf']       = $this->_get_csrf_nonce();
            $this->data['id']         = (int) $user->id;
            $this->data['firstname']  = ! empty($user->first_name) ? htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') : NULL;
            $this->data['lastname']   = ! empty($user->last_name) ? ' '.htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8') : NULL;

            /* Load Template */
            $this->template->admin_render('admin/users/deactivate', $this->data);
		}
		else
		{
            if ($this->input->post('confirm') == 'yes')
			{
                if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
				{
                    show_error($this->lang->line('error_csrf'));
				}

                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			redirect('admin/users', 'refresh');
		}
	}


	public function profile($id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $id = (int) $id;

        $this->data['user_info'] = $this->ion_auth->user($id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        /* Load Template */
		$this->template->admin_render('admin/users/profile', $this->data);
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}


	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
