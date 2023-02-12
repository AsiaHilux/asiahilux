<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dynamic_pages extends CI_Controller
{
    private $limit = 10;
    private $this_page_id = "dynamic_pages_pg_id";
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
        if ($this->session->userdata('user_id') == "" || count($this->session->userdata('user_rights')) < 1) {
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

            $this->load->view('dynamic_pages', $user_data);
        } else {
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            $this->load->view('nopermission', $user_data); //nopermission
        }
    }

    public function load_new()
    {
        if ($this->check_permission("write", false)) {
            $this->load->view('dynamic_pages_form');
        } else {
            http_response_code(403);
        }
    }

    public function load_view()
    {
        if ($this->check_permission("read", false)) {
            $this->load->view('dynamic_pages_list');
        } else {
            http_response_code(403);
        }
    }

    public function load_edit()
    {
        if ($this->check_permission("write", false)) {

            $result = array();

            //get record by id for from to be edited.
            $id = $this->input->get("id");

            $result = $this->get_by_id($id);

            if (count($result) > 0) {
                $data['formdata'] = $result;

                $this->load->view('dynamic_pages_form', $data);
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

            $horizon_id = $this->session->userdata('horizon_id');
            $dp_content_about_us = str_replace('"', "", $this->input->post('dp_content_about_us'));
            $dp_content_privacy_policy = str_replace('"', "", $this->input->post('dp_content_privacy_policy'));
            $dp_content_terms_conditions = str_replace('"', "", $this->input->post('dp_content_terms_conditions'));

            $data['horizon_id'] = $horizon_id;
            $data['dp_content_about_us'] = $dp_content_about_us;
            $data['dp_content_privacy_policy'] = $dp_content_privacy_policy;
            $data['dp_content_terms_conditions'] = $dp_content_terms_conditions;
            

            $res = $this->mdl_dal->insert_data("hv_car_dynamicpages", $data);

            sleep(1);

            if ($res['result']) {
                echo json_encode("true");
            } else {
                echo $res['msg'];
                http_response_code(500);
            }

        } else {
            http_response_code(403);
        }

    }


    public function update()
    {
        if ($this->check_permission("write", false)) {

            $setdata['dp_content_about_us'] = str_replace('"', "", $this->input->post('dp_content_about_us'));
            $setdata['dp_content_privacy_policy'] = str_replace('"', "", $this->input->post('dp_content_privacy_policy'));
            $setdata['dp_content_terms_conditions'] = str_replace('"', "", $this->input->post('dp_content_terms_conditions'));  

            
            $wheredata['dp_id'] = str_replace('"', "", $this->input->post('dp_id'));

            $res = $this->mdl_dal->update_data('hv_car_dynamicpages', $setdata, $wheredata);

            sleep(1);

            if ($res['result']) {
                echo json_encode("true");
            } else {
                echo $res['msg'];
                http_response_code(500);
            }
        } else {
            http_response_code(403);
        }

    }

    public function delete()
    {
        if ($this->check_permission("delete", false)) {

            $horizon_id = $this->session->userdata('horizon_id');
            $dp_id= str_replace('"', "", $this->input->post('dp_id'));

            
                $wheredata['dp_id'] = $dp_id;
                $wheredata['horizon_id'] = $horizon_id;

                $res = $this->mdl_dal->delete_data('hv_car_dynamicpages', $wheredata);

                sleep(1);

                if ($res['result']) {
                    echo json_encode("true");
                } else {
                    echo $res['msg'];
                    http_response_code(500);
                }
            

        } else {
            http_response_code(403);
        }


    }

    public
    function select()
    {
        if ($this->check_permission("read", false)) {

            $search_term = trim($this->input->get("search_term"));

            $offset = $this->uri->segment(3, 0);
            $dynamicpages = array();
            $params = array();
            $total_rows = 0;

            ///
            if($search_term == null || $search_term == "" || $search_term == "undefined")
            {
                $sql = "SELECT * FROM hv_car_dynamicpages WHERE horizon_id = " . $this->session->userdata('horizon_id');
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $dynamicpages = array();
                $sql = "SELECT * FROM hv_car_dynamicpages WHERE horizon_id = " . $this->session->userdata('horizon_id') . " LIMIT " . $offset . ", " . $this->limit;
                $dynamicpages = $this->mdl_dal->select_data($sql);

            } else {
                $sql = "SELECT * FROM hv_car_dynamicpages 
                WHERE (dp_content_about_us LIKE CONCAT('%', ?, '%'))
                AND horizon_id = " . $this->session->userdata('horizon_id');
                $params = array("dp_content_about_us" => $search_term);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $dynamicpages = array();
                $sql = "SELECT * FROM hv_car_dynamicpages 
                WHERE (dp_content_about_us LIKE CONCAT('%', ?, '%'))
                AND horizon_id = " . $this->session->userdata('horizon_id') . " 
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("dp_content_about_us" => $search_term);
                $dynamicpages = $this->mdl_dal->select_data2($sql, $params);

            }

            $res['offset'] = $offset;
            $res['dynamicpages'] = $dynamicpages;

            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'index.php/dynamic_pages/select';
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

    public
    function select_active()
    {
        if (!$this->check_authentication()) {

            http_response_code(404);
            exit();

        } else {
            ///
            $sql = "SELECT * FROM hv_car_dynamicpages WHERE hv_car_dynamicpages.horizon_id = " . $this->session->userdata('horizon_id');

            $res['arr'] = $this->mdl_dal->select_data($sql);

            echo json_encode($res);
        }
    }

    public
    function select_by_id($id)
    {
        ///
          if (!$this->check_authentication()) {

        http_response_code(404);
        exit();

    } else {
              $res = array();

              $sql = "SELECT * FROM hv_car_dynamicpages WHERE dp_id = " . $id .
                  " AND horizon_id = " . $this->session->userdata('horizon_id'); 

              $res['arr'] = $this->mdl_dal->select_data($sql);

              echo json_encode($res);
          }
    }

    private
    function get_by_id($id)
    {
        ///
        $res = array();

        $sql = "SELECT * FROM hv_car_dynamicpages WHERE dp_id = " . $id .
            " AND horizon_id = " . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        return $res;

    }

    private
    function get_user_data($user_id)
    {
        $arr = array();

        $sql = "SELECT si_application_users.*, si_company.horizon_id, si_company.company_name FROM si_application_users INNER JOIN si_application_users_access_detail ON si_application_users.user_id = si_application_users_access_detail.user_id INNER JOIN si_company ON si_company.horizon_id = si_application_users_access_detail.horizon_id WHERE si_company.active = 1 AND si_application_users.user_id = " . $user_id;

        $arr = $this->mdl_dal->select_data($sql);
        return $arr;
    }

    public
    function get_corrent_school($horizon_id)
    {
        $arr = array();

        $sql = "SELECT * FROM si_company WHERE horizon_id = " . $horizon_id;

        $arr = $this->mdl_dal->select_data($sql);

        return $arr;

    }

    function empty_function()
    {
    }


}

?>