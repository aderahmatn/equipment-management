<?php


class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
    }

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();
        $this->template->load('layouts/index', 'user/index', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('dept_code', 'Dept Code', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required|is_unique[em_master_create_user.nik]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('division', 'Division', 'required');
        $this->form_validation->set_rules('first_work', 'First Work', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conf_password', 'Confirmation Password', 'required|matches[password]');

        if ($this->form_validation->run()) {
            $config['upload_path']          = './uploads/picture';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2500;
            $config['file_name']            = uniqid('pic-');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture')) {
                $this->session->set_flashdata('error', 'Please Choose a picture');
                $this->template->load('layouts/index', 'user/add');
            } else {
                $data = $this->upload->data();
                $file = $data['file_name'];
                $params = array(
                    'password' => md5($this->input->post('password')),
                    'dept_code' => $this->input->post('dept_code'),
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'email' => $this->input->post('email'),
                    'position' => $this->input->post('position'),
                    'division' => $this->input->post('division'),
                    'picture' => $file,
                    'first_work' => $this->input->post('first_work'),
                );
                $user_id = $this->User_model->add_user($params);
                $this->session->set_flashdata('success', 'Insert Data Successfully');

                redirect('user', 'refresh');
            }
        } else {
            $this->template->load('layouts/index', 'user/add');
        }
    }

    /*
     * Editing a user
     */
    function edit($id_master_create_user)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_master_create_user);

        if (isset($data['user']['id_master_create_user'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('dept_code', 'Dept Code', 'required');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('position', 'Position', 'required');
            $this->form_validation->set_rules('division', 'Division', 'required');
            $this->form_validation->set_rules('first_work', 'First Work', 'required');


            if ($this->form_validation->run()) {
                $params = array(
                    'dept_code' => $this->input->post('dept_code'),
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'email' => $this->input->post('email'),
                    'position' => $this->input->post('position'),
                    'division' => $this->input->post('division'),
                    'first_work' => $this->input->post('first_work'),
                );

                $this->User_model->update_user($id_master_create_user, $params);
                redirect('user', 'refresh');
            } else {
                $this->template->load('layouts/index', 'user/edit', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }
    function update_profile($id_master_create_user)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_master_create_user);

        if (isset($data['user']['id_master_create_user'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('dept_code', 'Dept Code', 'required');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('position', 'Position', 'required');
            $this->form_validation->set_rules('division', 'Division', 'required');
            $this->form_validation->set_rules('first_work', 'First Work', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'dept_code' => $this->input->post('dept_code'),
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'email' => $this->input->post('email'),
                    'position' => $this->input->post('position'),
                    'division' => $this->input->post('division'),
                    'first_work' => $this->input->post('first_work'),
                );

                $this->User_model->update_user($id_master_create_user, $params);
                redirect('user/profile', 'refresh');
            } else {
                $this->template->load('layouts/index', 'user/edit_profile', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($id_master_create_user)
    {
        $user = $this->User_model->get_user($id_master_create_user);

        // check if the user exists before trying to delete it
        if (isset($user['id_master_create_user'])) {
            $file = $user['picture'];
            $this->User_model->delete_user($id_master_create_user, $file);
            $this->session->set_flashdata('success', 'Delete User Successfully');
            redirect('user', 'refresh');
        } else
            $this->session->set_flashdata('error', 'Data User Not Found');
        redirect('user', 'refresh');
    }
    public function profile()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->get_user($id);
        $this->template->load('layouts/index', 'user/profile', $data);
    }
}
