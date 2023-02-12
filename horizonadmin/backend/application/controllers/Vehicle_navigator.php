<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_navigator extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dal');

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index()
    {
        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');

            //echo $this->session->userdata('user_id');

        } else {

             $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
  // in this array get user first nam, an institutes list // in this array get user first nam, an institutes list

            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id')); // in this array get currect institute id and name only.

           

            $this->load->view('vehicle_navigator', $user_data);

        }

    }

    public function load_dashboard($horizon_id)
    {
        $permission = false;

        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');

            //echo $this->session->userdata('user_id');

        } else {

             $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
  // in this array get user first nam, an institutes list

            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            foreach($user_data as $accessed_institute)
            {
                if($accessed_institute[0]['horizon_id'] == $horizon_id)
                {
                    $permission = true;
                }
            }
            if($permission)
            {
                $this->session->set_userdata('horizon_id', $horizon_id);

                redirect(base_url() . 'index.php/dashboard/', 'refresh');
            }
            else
            {
                redirect(base_url() . 'index.php/nopermission/', 'refresh');
            }

        }
    }

    private function get_user_data($user_id)
    {
        $arr = array();

        $sql = "SELECT si_application_users.*, si_company.horizon_id, si_company.company_name FROM si_application_users INNER JOIN si_application_users_access_detail ON si_application_users.user_id = si_application_users_access_detail.user_id INNER JOIN si_company ON si_company.horizon_id = si_application_users_access_detail.horizon_id WHERE si_company.active = 1 AND si_application_users.user_id = " . $user_id;

        $arr = $this->mdl_dal->select_data($sql);
        return $arr;
    }
 public function get_corrent_school($horizon_id)
    {
        $arr = array();

        $sql = "SELECT * FROM si_company WHERE horizon_id = " . $horizon_id;

        $arr = $this->mdl_dal->select_data($sql);

        return $arr;

    }

function empty_function(){
}

    
}