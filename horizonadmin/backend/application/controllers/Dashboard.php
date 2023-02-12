<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        } else {

            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            

            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id')); // in this array 

            $myarr = $this->session->userdata('user_rights');

             $user_data['totalCarMakes'] = $this->TotalNumbersOFCarMake();
             $user_data['totalCarModels'] = $this->TotalNumbersOFCarModel(); 
             $user_data['totalCarDetails'] = $this->TotalNumbersOFCarDetails();

            $app_user = array();
            $app_user = $user_data['arr_user'];
            
        
            if( $app_user[0]['user_role'] == "Administrator" && $app_user[0]['belong_to'] == "system")
            {
                $this->load->view('dashboard_sys_admin', $user_data);
            }
            
        }

    }

    public function load_dashboard($horizon_id)
    {
        $permission = false;

        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');

        } else {

            $user_data = $this->get_user_data($this->session->userdata('user_id'));

            foreach ($user_data as $accessed_institute) {
                if ($accessed_institute['horizon_id'] == $horizon_id) {
                    $permission = true;
                    break;
                }
            }
            if ($permission) {
                $this->session->set_userdata('horizon_id', $horizon_id);

                redirect(base_url() . 'index.php/dashboard/', 'refresh');
            } else {
                redirect(base_url() . 'index.php/nopermission/', 'refresh');
            }

        }
    }

      public function TotalNumbersOFCarMake()
    {
        ///
        $sql = "SELECT count(vm_id) as totalCarMakes from hv_car_manufacturer WHERE active = 1 AND horizon_id = " . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        return $res;

    }

    public function TotalNumbersOFCarModel()
    {
        ///
        $sql = "SELECT count(m_id) as totalCarModels from hv_car_models WHERE active = 1 AND horizon_id = " . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        return $res;

    }

    public function TotalNumbersOFCarDetails()
    {
        ///
        $sql = "SELECT count(car_d_id) as totalCarDetails from hv_car_details WHERE horizon_id = " . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        return $res;

    }

    

    private function get_user_data($user_id)
    {
        $arr = array();

        $sql = "SELECT si_application_users.*, si_application_users_access_detail.group_id, 
        si_company.horizon_id, si_company.company_name 
        FROM si_application_users 
        INNER JOIN si_application_users_access_detail 
        ON si_application_users.user_id = si_application_users_access_detail.user_id 
        INNER JOIN si_company ON si_company.horizon_id = si_application_users_access_detail.horizon_id 
        WHERE si_company.active = 1 AND si_application_users.user_id = " . $user_id;
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

    public function myfunc()
    {
        $myarr = $this->session->userdata('user_rights');

    }
    

}


?>