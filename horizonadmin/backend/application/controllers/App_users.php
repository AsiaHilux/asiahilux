<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_users extends CI_Controller
{
    private $this_page_id = "users_pg_id";
    private $read_permission = false;
    private $write_permission = false;
    private $delete_permission = false;

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_dal');
        $this->load->model('mdl_dal3');

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index()
    {

        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');

            


        } else {

             $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
 

            $user_data['arr_current_school'] = $this->get_corrent_school($this->
            session->userdata('horizon_id')); 

            $rights = $this->session->userdata('user_rights'); foreach ($rights as $right_row) {

                if($right_row['page_id'] == $this->this_page_id)
                {
                    if($right_row['rec_read'] == 1)
                    {
                        $this->read_permission = true;
                    }
                    if($right_row['rec_write'] == 1)
                    {
                        $this->write_permission = true;
                    }
                    if($right_row['rec_del'] == 1)
                    {
                        $this->delete_permission = true;
                    }
                }

            }

            $permissions['read_permission'] = $this->read_permission;
            $permissions['write_permission'] = $this->write_permission;
            $permissions['delete_permission'] = $this->delete_permission;

            $user_data['permissions'] = $permissions;

            if($this->read_permission)
            {
                $this->load->view('app_users', $user_data);
            } else {

                $this->load->view('nopermission',  $user_data); //nopermission
            }
        }
    }
    public function create()
    {
        if ($this->session->userdata('user_id') == "")
            redirect(base_url() . 'index.php/login/', 'refresh');

        $data1 = array(); // this array for 'application_users' table
        $data2 = array(); // this array for 'application_users_access_detail' table
        $res = null;

        $arr = $this->get_corrent_school($this->session->userdata('horizon_id'));

        $group_id = str_replace('"', "", $this->input->post('group_id'));
        $admin_id = $arr[0]['admin_id'];
        $first_name = str_replace('"', "", $this->input->post('first_name'));
        $last_name = str_replace('"', "", $this->input->post('last_name'));
        $email = str_replace('"', "", $this->input->post('email'));
        $password = str_replace('"', "", $this->input->post('password'));
        $active = str_replace('"', "", $this->input->post('active'));

        $data1['group_id'] = $group_id;
        $data1['admin_id'] = $admin_id;
        $data1['first_name'] = $first_name;
        $data1['last_name'] = $last_name;
        $data1['email'] = $email;
        $data1['password'] = $password;
        $data1['active'] = $active;


        $new_user_id = $this->mdl_dal->insert_data_return_id("si_application_users", $data1);
       

        if($new_user_id)
        {
            $user_id = $new_user_id;
            $horizon_id = $this->session->userdata('horizon_id');
            $is_default = 1;

            $data2['user_id'] = $user_id;
            $data2['horizon_id'] = $horizon_id;
            $data2['is_default'] = $is_default;

            $res = $this->mdl_dal->insert_data("si_application_users_access_detail", $data2);
        }

        echo json_encode($res);
    }
    public function update()
    {
        if ($this->session->userdata('user_id') == "")
            redirect(base_url() . 'index.php/login/', 'refresh');

        $setdata = array();
        $wheredata = array();

        $arr = $this->get_corrent_school($this->session->userdata('horizon_id'));

        $group_id = str_replace('"', "", $this->input->post('group_id'));
        $user_id = str_replace('"', "", $this->input->post('user_id'));
        $admin_id = $arr[0]['admin_id'];
        $first_name = str_replace('"', "", $this->input->post('first_name'));
        $last_name = str_replace('"', "", $this->input->post('last_name'));
        $email = str_replace('"', "", $this->input->post('email'));
        $password = str_replace('"', "", $this->input->post('password'));
        $active = str_replace('"', "", $this->input->post('active'));

        $setdata['group_id'] = $group_id;
        $setdata['admin_id'] = $admin_id;
        $setdata['first_name'] = $first_name;
        $setdata['last_name'] = $last_name;
        $setdata['email'] = $email;
        $setdata['password'] = $password;
        $setdata['active'] = $active;

        $wheredata['user_id'] = $user_id;

        $res = $this->mdl_dal->update_data('si_application_users', $setdata, $wheredata);

        //sleep(1);

        echo json_encode($res);
    }
    public function delete()
    {
        if ($this->session->userdata('user_id') == "")
            redirect(base_url() . 'index.php/login/', 'refresh');

        $where_values = array();
        $table_data = array();

        $user_id = str_replace('"', "", $this->input->post('user_id'));

        $where_values['user_id'] = $user_id;

        $table_data['query_type'] = 'delete';
        $table_data['table_name'] = 'si_application_users_access_detail';
        $table_data['where_clause'] = $where_values;

        $this->mdl_dal3->send_query($table_data);

        $table_data['query_type'] = 'delete';
        $table_data['table_name'] = 'si_application_users';
        $table_data['where_clause'] = $where_values;

        $this->mdl_dal3->send_query($table_data);

        $res = $this->mdl_dal3->execute_queries();

       

        echo json_encode($res);

    }
    public function select()
    {
        ///
        $sql = "SELECT * FROM si_application_users LEFT OUTER JOIN si_application_users_access_detail
                ON si_application_users.user_id = si_application_users_access_detail.user_id
                WHERE si_application_users_access_detail.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);
    }
    public function select_active()
    {
        ///
        $sql = "SELECT * FROM si_application_users LEFT OUTER JOIN si_application_users_access_detail
                ON si_application_users.user_id = si_application_users_access_detail.user_id
                WHERE WHERE active = 1 AND si_application_users_access_detail.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }
    public function select_by_id($id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM si_application_users LEFT OUTER JOIN si_application_users_access_detail
                ON si_application_users.user_id = si_application_users_access_detail.user_id
                WHERE si_application_users_access_detail.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

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

?>