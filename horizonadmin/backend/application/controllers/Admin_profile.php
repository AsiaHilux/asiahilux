<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_profile extends CI_Controller
{
    
    private $this_page_id = "admin_profile_pg_id";
    
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dal');
        $this->load->library('date_format');

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index()
    {

        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');

           


        } else {

             $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
             
            
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id')); 

            $user_data['countries'] = $this->get_countries(); 
            $user_data['user_info'] = $this->select_info_by_id($this->session->userdata('user_id'));
            
            if( $user_data['arr_user'][0]['user_role'] == "Administrator" &&  $user_data['arr_user'][0]['belong_to'] == "system")
            {
                $user_data['admin_info'] = $this->get_admin_data($user_data['arr_user'][0]['admin_id']);
                
                $this->load->view('admin_profile', $user_data);
                
            } elseif( $user_data['arr_user'][0]['user_role'] == "Administrator" &&  $user_data['arr_user'][0]['belong_to'] == "user" )
            {
               
                redirect(base_url() . 'index.php/admin_employee_profile/', 'refresh');
            } else {
                $this->load->view('nopermission', $user_data);
            }
        }
    }

    public function upload_admin_pic()
    {
        $user_id = $this->session->userdata('user_id');

        $file = 'file';

        $config['max_size'] = '5120';
        $config['upload_path'] = './uploads/app_users';
        $config['allowed_types'] = 'jpg|png|gif|bmp';
        
        $config['file_name'] = $user_id . "_" . $_FILES['file']['name'];


        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file)) {
           

            $arr_upload_info = $this->upload->data();

            $setdata['user_pic'] = $arr_upload_info['file_name'];

            $wheredata['user_id'] = $user_id;

            $res = $this->mdl_dal->update_data('si_application_users', $setdata, $wheredata);

        } else {

            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);

            
            http_response_code(500);
        }
    }
    public function update()
    {
        if ($this->input->post('action') && $this->input->post('action') == "edit") {

            $user_id = $this->session->userdata('user_id');

            $first_name = str_replace('"', "", $this->input->post('first_name'));
            $last_name = str_replace('"', "", $this->input->post('last_name'));
            $gender = str_replace('"', "", $this->input->post('gender'));
            if ($this->input->post('dob')) {
                $dob = str_replace('"', "", $this->input->post('dob'));
                $d = strtotime($dob);
                $dob = date('Y-m-d', $d);
            } else {
                $dob = null;
            }
            $cnic = str_replace('"', "", $this->input->post('cnic'));
            $nationality = str_replace('"', "", $this->input->post('nationality'));
            $country_id = str_replace('"', "", $this->input->post('country_id'));
            $city_name = str_replace('"', "", $this->input->post('city_name'));
            $address = str_replace('"', "", $this->input->post('address'));
            $phone = str_replace('"', "", $this->input->post('phone'));
            $mobile = str_replace('"', "", $this->input->post('mobile'));

            $data['first_name'] = $first_name;
            $data['last_name'] = $last_name;
            $data['gender'] = $gender;
            $data['dob'] = $dob;
            $data['cnic'] = $cnic;
            $data['nationality'] = $nationality;
            $data['country_id'] = $country_id;
            $data['city_name'] = $city_name;
            $data['address'] = $address;
            $data['phone'] = $phone;
            $data['mobile'] = $mobile;

            $wheredata['user_id'] = $user_id;

            $res = $this->mdl_dal->update_data('si_application_users', $data, $wheredata);

            sleep(1);

            echo json_encode($res);

        } else {

            redirect(base_url() . 'index.php/user_profile/');
        }
    }
    private function verify_password($current_password)
    {
        $verified = false;

        $user_id = $this->session->userdata('user_id');

        $sql = "SELECT * FROM si_application_users
        WHERE user_id = " . $user_id;
        $res = $this->mdl_dal->select_data($sql);

        if (count($res) > 0) {
            if ( md5($current_password) == $res[0]['password'] ) {
                $verified = true;
            }
        }
        return $verified;
    }
    public function change_password()
    {
        if ($this->input->post('current_password') && $this->input->post('new_password')) {
            
            $current_password = str_replace('"', "", $this->input->post('current_password'));

            $check = $this->verify_password($current_password);

            if ($check) {
                $new_password = str_replace('"', "", $this->input->post('new_password'));
                $user_id = $this->session->userdata('user_id');

                $data['password'] = md5($new_password);
                $wheredata['user_id'] = $user_id;

                $res = $this->mdl_dal->update_data('si_application_users', $data, $wheredata);
                
                sleep(1);
                echo json_encode($res);

            } else {
                
                sleep(1);
                http_response_code(500);
                echo '"Invalid current password."';
            }
        }
    }

    private function select_info_by_id($user_id)
    {
        
        $data = array();

        $sql = "SELECT *
        FROM si_application_users
        WHERE si_application_users.user_id = " . $user_id;

        $res = $this->mdl_dal->select_data($sql);

        return $res;
    }
    private function get_countries()
    {
        $arr = array();

        $sql = "SELECT * FROM si_countries";

        $arr = $this->mdl_dal->select_data($sql);

        return $arr;
    }

    private function get_user_data($user_id)
    {
        $arr = array();

        $sql = "SELECT si_application_users.*, si_company.horizon_id, si_company.company_name FROM si_application_users INNER JOIN si_application_users_access_detail ON si_application_users.user_id = si_application_users_access_detail.user_id INNER JOIN si_company ON si_company.horizon_id = si_application_users_access_detail.horizon_id WHERE si_company.active = 1 AND si_application_users.user_id = " . $user_id;

        $arr = $this->mdl_dal->select_data($sql);
        return $arr;
    }
    private function get_admin_data($admin_id)
    {
        $arr = array();

        $sql = "SELECT si_admin_accounts.*, country_name 
        FROM si_admin_accounts 
        INNER JOIN si_countries ON si_countries.country_id = si_admin_accounts.country_id
        WHERE admin_id = " . $admin_id;

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

?>