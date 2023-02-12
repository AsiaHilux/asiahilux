<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Car_model extends CI_Controller
{
    private $limit = 10;
    private $this_page_id = "car_model_pg_id";
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

            $this->load->view('car_model', $user_data);
        } else {
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            $this->load->view('nopermission', $user_data); //nopermission
        }
    }


    public function load_new()
    {
        if ($this->check_permission("write", false)) {
            //$user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            //$user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            //$this->load->view('model_names_form', $user_data);
            $this->load->view('car_model_form');
        } else {
            http_response_code(403);
        }
    }

    public function load_view()
    {
        if ($this->check_permission("read", false)) {
            $this->load->view('car_model_list');
        } else {
            http_response_code(403);
        }
    }


    public function load_edit()
    {
        if ($this->check_permission("write", false)) {

            $result = array();

            //get record by id for from to be edited.
            $m_id = $this->input->get("id");

            $result = $this->get_by_id($m_id);

            if (count($result) > 0) {
                $data['formdata'] = $result;

                $this->load->view('car_model_form', $data);
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
            $vm_id = str_replace('"', "", $this->input->post('vm_id'));
            $model_name = str_replace('"', "", $this->input->post('model_name'));
            $active = str_replace('"', "", $this->input->post('active'));
            $Title = str_replace('"', "", $this->input->post('Title'));
            $Keywords = str_replace('"', "", $this->input->post('Keywords'));
            $Description = str_replace('"', "", $this->input->post('Description'));
            $car_models_content = str_replace('"', "", $this->input->post('car_models_content'));

            $data['horizon_id'] = $horizon_id;
            $data['vm_id'] = $vm_id;
            $data['model_name'] = $model_name;
            $data['active'] = $active;
            $data['Title'] = $Title;
            $data['Keywords'] = $Keywords;
            $data['Description'] = $Description;
            $data['car_models_content'] = $car_models_content;


            $res = $this->mdl_dal->insert_data("hv_car_models", $data);

            sleep(1);


            /*if ($res['result']) {
                echo json_encode("true");
            } else {
                echo $res['msg'];
                http_response_code(500);
            }*/

             if ($res == true) {
            echo $res;
} else {
    echo "Error occurred";
    http_response_code(500);
}

        } else {
            http_response_code(403);
        }
    }

    public function update()
    {
        if ($this->check_permission("write", false)) {

            $m_id = str_replace('"', "", $this->input->post('m_id'));
            $horizon_id = $this->session->userdata('horizon_id');

            $vm_id = str_replace('"', "", $this->input->post('vm_id'));
            $model_name = str_replace('"', "", $this->input->post('model_name'));
            $active = str_replace('"', "", $this->input->post('active'));
            $Title = str_replace('"', "", $this->input->post('Title'));
            $Keywords = str_replace('"', "", $this->input->post('Keywords'));
            $Description = str_replace('"', "", $this->input->post('Description'));
            $car_models_content = str_replace('"', "", $this->input->post('car_models_content'));
            

            $setdata['vm_id'] = $vm_id;
            $setdata['model_name'] = $model_name;
            $setdata['active'] = $active;
            $setdata['Title'] = $Title;
            $setdata['Keywords'] = $Keywords;
            $setdata['Description'] = $Description;
            $setdata['car_models_content'] = $car_models_content;

            $wheredata['m_id'] = $m_id;
            $wheredata['horizon_id'] = $horizon_id;


            sleep(1);

            $res = $this->mdl_dal->update_data('hv_car_models', $setdata, $wheredata);

            sleep(1);

           /* if ($res['result']) {
                echo json_encode("true");
            } else {
                echo $res['msg'];
                http_response_code(500);
            }*/
            
             if ($res == true) {
                echo $res;
                } else {
                    echo "Error occurred";
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
            $m_id = str_replace('"', "", $this->input->post('m_id'));

           
        $wheredata['m_id'] = $m_id;
        $wheredata['horizon_id'] = $horizon_id;

        $res = $this->mdl_dal->delete_data('hv_car_models', $wheredata);


        sleep(1);

       /* if ($res['result']) {
            echo json_encode("true");
        } else {
            echo $res['msg'];
            http_response_code(500);
        }
            */
            
            if ($res == true) {
                echo $res;
                } else {
                    echo "Error occurred";
                    http_response_code(500);
                }


        } else {
            http_response_code(403);
        }

    }

    public function select()
    {

        if ($this->check_permission("read", false)) {

            $search_term = trim($this->input->get("search_term"));

            $offset = $this->uri->segment(3, 0);
            $model_name = array();
            $params = array();
            $total_rows = 0;

            ///
            if ($search_term == null || $search_term == "" || $search_term == "undefined") {
                $sql = "SELECT hv_car_models.m_id, hv_car_models.horizon_id, hv_car_models.model_name,hv_car_manufacturer.vm_name,
                hv_car_models.active FROM hv_car_models 
                LEFT OUTER JOIN si_company ON si_company.horizon_id = hv_car_models.horizon_id 
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_models.vm_id 
                WHERE hv_car_models.horizon_id = " . $this->session->userdata('horizon_id') . "  
                ORDER BY hv_car_models.m_id DESC ";
                
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $model_name = array();
                $sql = "SELECT hv_car_models.m_id, hv_car_models.horizon_id, hv_car_models.model_name,hv_car_manufacturer.vm_name,
                hv_car_models.active FROM hv_car_models
                LEFT OUTER JOIN si_company ON si_company.horizon_id = hv_car_models.horizon_id
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_models.vm_id
                WHERE hv_car_models.horizon_id = " . $this->session->userdata('horizon_id') . "
                 ORDER BY hv_car_models.m_id DESC 
                LIMIT " . $offset . ", " . $this->limit;
                $model_name = $this->mdl_dal->select_data($sql);
            } else {
                $sql = "SELECT hv_car_models.m_id, hv_car_models.horizon_id, hv_car_models.model_name,hv_car_manufacturer.vm_name,
                hv_car_models.active FROM hv_car_models 
                LEFT OUTER JOIN si_company ON si_company.horizon_id = hv_car_models.horizon_id 
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_models.vm_id 
                WHERE (model_name LIKE CONCAT('%', ?, '%') OR vm_name LIKE CONCAT('%', ?, '%'))
                AND hv_car_models.horizon_id = " . $this->session->userdata('horizon_id');

                $params = array("model_name" => $search_term , "vm_name" => $search_term);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $model_name = array();
                $sql = "SELECT hv_car_models.m_id, hv_car_models.horizon_id, hv_car_models.model_name,hv_car_manufacturer.vm_name,
                hv_car_models.active FROM hv_car_models 
                LEFT OUTER JOIN si_company ON si_company.horizon_id = hv_car_models.horizon_id 
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_models.vm_id 
                WHERE (model_name LIKE CONCAT('%', ?, '%') OR vm_name LIKE CONCAT('%', ?, '%'))
                AND hv_car_models.horizon_id = " . $this->session->userdata('horizon_id'). " 
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("model_name" => $search_term , "vm_name" => $search_term);
                $model_name = $this->mdl_dal->select_data2($sql, $params);
            }

            $res['offset'] = $offset;
            $res['deptype'] = $model_name;


            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'index.php/car_model/select';
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


    public function select_active()
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_models WHERE hv_car_models.active = 1 AND hv_car_models.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    public function select_by_id($id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_models WHERE m_id = " . $id . "  AND hv_car_models.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    public function select_by_vm_id($vm_id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_models WHERE horizon_id = " . $this->session->userdata('horizon_id') . " AND vm_id = " . $vm_id;

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    private function get_by_id($id)
    {
        $res = array();

        $horizon_id = $this->session->userdata('horizon_id');

        $sql = "SELECT * FROM hv_car_models 
        WHERE m_id = ? 
        AND horizon_id = ?";
        $params = array('m_id' => $id, 'horizon_id' => $horizon_id);

        $res = $this->mdl_dal->select_data2($sql, $params);

        return $res;

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

    public function generate_report()
    {
        $sql = "SELECT hv_car_models.*, si_company.company_name, si_company.company_logo,
                hv_car_models.active FROM hv_car_models 
                LEFT OUTER JOIN si_company ON si_company.horizon_id = hv_car_models.horizon_id 
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_models.vm_id 
                WHERE hv_car_models.horizon_id = " . $this->session->userdata('horizon_id');

        $res['report_data'] = $this->mdl_dal->select_data($sql);

        $this->load->view('model_name_report', $res);
    }
    function empty_function()
    {
    }

}

?>