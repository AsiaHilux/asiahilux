<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application_users extends CI_Controller
{
    private $limit = 10;
    private $this_page_id = "application_users_pg_id";
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

    private function check_authentication()
    {
        if ($this->session->userdata('user_id') == "" || count($this->session->userdata('user_rights')) < 1 ) {
            return false;
        } else {
            return true;
        }
    }

    private function check_permission($action, $is_index)
    {
        if (!$this->check_authentication()) {
            if ($is_index) {
                redirect(base_url() . 'index.php/login/', 'refresh');
            } else {
                http_response_code(404);
                exit();
            }

        } else {
            ////
            $permission = false;

            $rights = $this->session->userdata('user_rights');

            foreach ($rights as $right_row) {
                if ($right_row['page_id'] == $this->this_page_id) {
                    if ($right_row['rec_read'] == 1) {
                        $this->read_permission = true;
                    }
                    if ($right_row['rec_write'] == 1) {
                        $this->write_permission = true;
                    }
                    if ($right_row['rec_del'] == 1) {
                        $this->delete_permission = true;
                    }
                    break;
                }
            }
            switch ($action) {
                case "read":
                    $permission = $this->read_permission;
                    break;

                case "write":
                    $permission = $this->write_permission;
                    break;

                case "delete":
                    $permission = $this->delete_permission;
                    break;

                default:
                    $permission = false;
            }
            return $permission;
            ////
        }
    }

    public function index()
    {    
        if ($this->check_permission("read", true)) {
            
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));
        
            $this->load->view('application_users', $user_data);
        } else {
            
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));
        
            $this->load->view('nopermission', $user_data); //nopermission
        }
    }

    public function load_new()
    {
        if ($this->check_permission("write", false)) {
            $this->load->view('application_users_form');
        } else {
            http_response_code(403);
        }
    }
    public function load_view()
    {
        if ($this->check_permission("read", false)) {
            $this->load->view('application_users_list');
        } else {
            http_response_code(403);
        }
    }
    public function load_edit()
    {
        if ($this->check_permission("write", false)) {

            $result = array();

            //get record by id for from to be edited.
            $bank_id = $this->input->get("bank_id");

            $result = $this->get_by_id($bank_id);

            if (count($result) > 0) {
                $data['formdata'] = $result;

                $this->load->view('application_users_form', $data);
            } else {
                http_response_code(204); //code for: request successful, but no content.
            }

        } else {
            http_response_code(403);
        }
    }
    public function create()
    {
        if ($this->check_permission("write", false)) {

            $employee = array();

            $horizon_id = $this->session->userdata('horizon_id');
            $group_id = (int)str_replace('"', "", $this->input->post('group_id'));
            $dep_id = (int)str_replace('"', "", $this->input->post('dep_id'));
            $emp_id = (int)str_replace('"', "", $this->input->post('emp_id'));

            //first, check wetehr this employee has login_role as administrator?
            //if yes, send user back with error message.
            $sql = "SELECT * FROM si_application_users
            WHERE system_id = " . $emp_id . "
            AND user_role = 'Administrator'";

            $employee = $this->mdl_dal->select_data($sql);

            if (count($employee) > 0) {
                //means, the employee is exist in application_users table.
                echo json_encode("This employee is already exist as admin user.");
                http_response_code(500);
                exit();
            } else {
                //means, the employee not exist as admin role in application_users table.
                //so, insert this employee as application user.
                $employee = array();
                $data = array();
                $query = array();
                $user_data_row = array();

                $sql = "SELECT * FROM si_employees
                WHERE emp_id = " . $emp_id . "
                AND dep_id = " . $dep_id . "
                AND horizon_id = " . $horizon_id;

                $employee = $this->mdl_dal->select_data($sql);

                $user_id = $this->generate_new_id();
                //get admin_id for this application user
                $user_data_row = $this->get_user_data($this->session->userdata('user_id'));
                $admin_id = $user_data_row[0]['admin_id'];

                $data['user_id'] = $user_id;
                $data['admin_id'] = $admin_id;
                $data['system_id'] = $employee[0]['emp_id'];
                $data['official_id'] = $employee[0]['official_id'];
                $data['first_name'] = $employee[0]['emp_first_name'];
                $data['last_name'] = $employee[0]['emp_last_name'];
                $data['gender'] = $employee[0]['emp_gender'];
                $data['user_pic'] = $employee[0]['emp_pic'];
                $data['password'] = md5("aldermin123");
                $data['active'] = 1;
                $data['belong_to'] = "user";
                $data['user_role'] = "Administrator";

                $query['query_type'] = 'insert';
                $query['table_name'] = 'si_application_users';
                $query['query_data'] = $data;
                $this->mdl_dal3->send_query($query);

                //insert data into si_application_users_access_detail table.
                $data = array();
                $query = array();

                $data['user_id'] = $user_id;
                $data['group_id'] = $group_id;
                $data['horizon_id'] = $horizon_id;
                $data['is_default'] = 1;
                $data['active'] = 1;

                $query['query_type'] = 'insert';
                $query['table_name'] = 'si_application_users_access_detail';
                $query['query_data'] = $data;
                $this->mdl_dal3->send_query($query);

                //update user_id in employee table.
                $setdata = array();
                $wheredata = array();
                $query = array();

                $setdata['user_id'] = $user_id;
                $wheredata['emp_id'] = $employee[0]['emp_id'];
                $wheredata['horizon_id'] = $horizon_id;

                $query['query_type'] = 'update';
                $query['table_name'] = 'si_employees';
                $query['set_data'] = $setdata;
                $query['where_clause'] = $wheredata;
                $this->mdl_dal3->send_query($query);
                
                //disable employee account for this employee in application_users table.
                $setdata = array();
                $wheredata = array();
                $query = array();

                $setdata['active'] = 0;
                $wheredata['system_id'] = $employee[0]['emp_id'];
                $wheredata['user_role'] = "Employee";

                $query['query_type'] = 'update';
                $query['table_name'] = 'si_application_users';
                $query['set_data'] = $setdata;
                $query['where_clause'] = $wheredata;
                $this->mdl_dal3->send_query($query);

                //now execute all quries.
                $res = $this->mdl_dal3->execute_queries();

                sleep(1);

                if ($res['result'] == true) {
                    echo json_encode($res['result']);
                } else {
                    http_response_code(500);
                    echo json_encode($res['msg']);
                }
            }

        } else {
            http_response_code(403);
        }
    }

    public function delete()
    {

        if ($this->check_permission("delete", false)) {

            $employee = array();
            $horizon_id = $this->session->userdata('horizon_id');

            $user_id = (int)str_replace('"', "", $this->input->post('user_id'));
            $system_id = (int)str_replace('"', "", $this->input->post('system_id'));

            //first we get user_id of this employee as Employee user_role.
            $sql = "SELECT * FROM si_application_users
                WHERE system_id = " . $system_id . "
                AND user_role = 'Employee'";
            $employee = $this->mdl_dal->select_data($sql);

            //if found this user as "Employee" user_role.
            if (count($employee) > 0) {
                //update user_id in employee table.
                $setdata = array();
                $wheredata = array();
                $query = array();

                $setdata['user_id'] = $employee[0]['user_id'];
                $wheredata['emp_id'] = $employee[0]['system_id'];
                $wheredata['horizon_id'] = $horizon_id;

                $query['query_type'] = 'update';
                $query['table_name'] = 'si_employees';
                $query['set_data'] = $setdata;
                $query['where_clause'] = $wheredata;
                $this->mdl_dal3->send_query($query);
            }
            //In any case, finaly, we delete this application user.
            //1. from si_application_users table.
            //2. from si_application_users_access_detail table.

            $wheredata = array();
            $query = array();

            $wheredata['user_id'] = $user_id;

            $query['query_type'] = 'delete';
            $query['table_name'] = 'si_application_users';
            $query['where_clause'] = $wheredata;
            $this->mdl_dal3->send_query($query);

            $wheredata = array();
            $query = array();

            $wheredata['user_id'] = $user_id;

            $query['query_type'] = 'delete';
            $query['table_name'] = 'si_application_users_access_detail';
            $query['where_clause'] = $wheredata;
            $this->mdl_dal3->send_query($query);
            
            //Enable employee account for this employee in application_users table.
            $setdata = array();
            $wheredata = array();
            $query = array();

            $setdata['active'] = 1;
            $wheredata['system_id'] = $employee[0]['system_id'];
            $wheredata['user_role'] = "Employee";

            $query['query_type'] = 'update';
            $query['table_name'] = 'si_application_users';
            $query['set_data'] = $setdata;
            $query['where_clause'] = $wheredata;
            $this->mdl_dal3->send_query($query);

            //now execute all quries.
            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

            if ($res['result']) {
                echo json_encode($res['result']);
            } else {
                echo json_encode("Database Error " . $res['msg']);
                http_response_code(500);
            }

        } else {
            http_response_code(403);
        }
    }

    public function select()
    {
        if ($this->check_permission("read", false)) {

            $app_users = array();

            //get data from database.
            $offset = $this->uri->segment(3, 0);
            $res['offset'] = $offset;
            
            $sql = "SELECT si_application_users.user_id, si_application_users.system_id, 
            si_application_users.official_id, si_application_users.first_name, 
            si_application_users.last_name, si_application_users.active,
            si_application_users_access_detail.group_id, si_user_groups.group_name
            FROM si_application_users 
            INNER JOIN si_application_users_access_detail ON si_application_users_access_detail.user_id = si_application_users.user_id
            INNER JOIN si_user_groups ON si_user_groups.group_id = si_application_users_access_detail.group_id
            WHERE user_role = 'Administrator'
            AND si_application_users.belong_to = 'user' 
            AND si_application_users_access_detail.horizon_id = " . $this->session->userdata('horizon_id');
            $app_users = $this->mdl_dal->select_data($sql);
            $total_rows = count($app_users);

            $app_users = array();
            $sql = "SELECT si_application_users.user_id, si_application_users.system_id, 
            si_application_users.official_id, si_application_users.first_name, 
            si_application_users.last_name, si_application_users.active,
            si_application_users_access_detail.group_id, si_user_groups.group_name
            FROM si_application_users 
            INNER JOIN si_application_users_access_detail ON si_application_users_access_detail.user_id = si_application_users.user_id
            INNER JOIN si_user_groups ON si_user_groups.group_id = si_application_users_access_detail.group_id
            WHERE user_role = 'Administrator'
            AND si_application_users.belong_to = 'user' 
            AND si_application_users_access_detail.horizon_id = " . $this->session->userdata('horizon_id') . " 
            LIMIT " . $offset . ", " . $this->limit;
            $app_users = $this->mdl_dal->select_data($sql);

            $res['app_users'] = $app_users;

            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'index.php/application_users/select';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $this->limit;
            $config['uri_segment'] = 3;

            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_link"] = "&laquo;";
            $config["first_tag_open"] = "<li>";
            $config["first_tag_close"] = "</li>";
            $config["last_link"] = "&raquo;";
            $config["last_tag_open"] = "<li>";
            $config["last_tag_close"] = "</li>";
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '<li>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '<li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $res['page_links'] = $this->pagination->create_links();

            echo json_encode($res);

        } else {

            //send error to user as forbiddon
            http_response_code(403);
        }
    }
    private function generate_new_id()
    {
        $new_user_id = 0;

        $sql = "SELECT IFNULL( MAX(user_id), 0 ) AS max_id FROM si_application_users";

        $user_id_row = $this->mdl_dal->select_data($sql);

        if ((int)$user_id_row[0]['max_id'] < 1) {
            $new_user_id = 1;
        } else {
            $new_user_id = ((int)$user_id_row[0]['max_id'] + 1);
        }
        return $new_user_id;
    }
    private function get_user_data($user_id)
    {
        $arr = array();

        $sql = "SELECT si_application_users.*, si_employees.emp_email AS email, si_company.horizon_id, si_company.company_name 
        FROM si_application_users 
        INNER JOIN si_employees ON si_employees.emp_id = si_application_users.system_id
        INNER JOIN si_application_users_access_detail ON si_application_users_access_detail.user_id = si_application_users.user_id  
        INNER JOIN si_company ON si_company.horizon_id = si_application_users_access_detail.horizon_id 
        WHERE si_company.active = 1 AND si_application_users.user_id = " . $user_id;

        $arr = $this->mdl_dal->select_data($sql);
        return $arr;
    }
    private function get_corrent_school($horizon_id)
    {
        $arr = array();

        $sql = "SELECT * FROM si_company WHERE horizon_id = " . $horizon_id;

        $arr = $this->mdl_dal->select_data($sql);

        return $arr;
    }
}

?>