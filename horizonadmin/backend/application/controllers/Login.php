<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');

        $this->load->model('mdl_dal');
    }


    public function index()
    {
        $this->load->view('login');
    }

    public function verify_user_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $output = array();

        //echo "Login Detail recieved. " . $email;

        $sql = "SELECT * 
        FROM si_application_users
        WHERE official_id = ? AND password = ? AND active = 1";
        
        $parmas = array($email, $password);
        
        $res = $this->mdl_dal->select_data2($sql, $parmas);

        $num = count($res);

        if($num < 1)
        {
            $output['msg'] = "Login information incorrect,Please try again.";
            $output['style'] = "block";
            $output['email'] = $email;
            $this->load->view('login', $output);
        }
        else
        {
            $group_id = "";
            $user_rights = array();
           
            $this->session->set_userdata('user_id', $res[0]['user_id']);

            $user_id = $this->session->userdata('user_id');

            $sql = "SELECT * FROM si_application_users_access_detail WHERE user_id = " . $user_id . " AND is_default = 1 AND active = 1";

            $arr = $this->mdl_dal->select_data($sql);
            
            if(count($arr) > 0 )
            {

            $this->session->set_userdata('horizon_id', $arr[0]['horizon_id']);
            
            $group_id = $arr[0]['group_id'];

            $sql = "SELECT * FROM si_user_rights 
            WHERE group_id IN
            (
                SELECT group_id FROM si_application_users_access_detail
                WHERE user_id = " . $user_id . "
                AND active = 1
            )";

            $user_rights = $this->mdl_dal->select_data($sql);

            $this->session->set_userdata('user_rights', $user_rights);

            redirect(base_url() . 'index.php/dashboard/', 'refresh');

         }
         else
         {
            echo "The branch you are related to it is no longer available.
                <br>
                Please contact your administrator for further detail.";
         }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('some_name');

        $this->session->sess_destroy();

        //$this->session->set_flashdata('logout_notification', 'logged_out');

        //$this->load->view('login');

        redirect(base_url() . 'index.php/login/', 'refresh');

    }


}
