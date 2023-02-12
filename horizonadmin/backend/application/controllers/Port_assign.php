<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Port_assign extends CI_Controller
{    
    private $limit = 10;
    private $this_page_id = "port_assign_pg_id";
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
        
            $this->load->view('port_assign', $user_data);
        } else {
            
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));
            
            $this->load->view('nopermission', $user_data); //nopermission
        }
    }

    public function load_new()
    {
        if ($this->check_permission("write", false)) {
            $this->load->view('port_assign_form');
        } else {
            http_response_code(403);
        }
    }
    public function load_view()
    {
        if ($this->check_permission("read", false)) {
                $this->load->view('port_assign_list');
        } else {
            http_response_code(403);
        }
    }
    public function load_edit()
    {
        if ($this->check_permission("write", false)) {

            $result = array();

            //get record by id for from to be edited.
            $hv_port_country_id = $this->input->get("hv_port_country_id");
            $result = $this->get_with_detail_by_hv_port_country_id($hv_port_country_id);

            if (count($result) > 0) {
                $data['formdata'] = $result;
                //sleep(1);

                $this->load->view('port_assign_form', $data);
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

            //get generate hv_port_country_id from  generate_new_id() function
            $hv_port_country_id = $this->generate_new_id();
            $country_id = str_replace('"', "", $this->input->post('country_id'));
            $ports_data = $this->input->post('ports_data');
            $horizon_id = $this->session->userdata('horizon_id');


            //validate ports data, is in currect json format
            $ports_data = json_decode($ports_data, true);
            //var_dump($ports_data); exit();
            if(!is_array($ports_data))
            {
                http_response_code(500);
                echo "You supplied an invalid data. Please check and send again.";
                exit();
            }

            //insert data in port assign
            $query = array();
            $data  = array();

            $data['hv_port_country_id'] = $hv_port_country_id;
            $data['country_id'] = $country_id;
            $data['horizon_id'] = $horizon_id;

            $query['query_type'] = "insert";
            $query['table_name'] = "hv_port_country";
            $query['query_data'] = $data;
            $this->mdl_dal3->send_query($query);

            //insert data in hv_port_country_details
            $hv_port_country_details_id = $this->generate_new_hv_port_country_details_id();
            //$chapter_sequence = 1;
            foreach($ports_data as $cd)
            {
                //insert those new ports that hv_port_country_details_id = 0
                $query = array();
                $data  = array();

                $data['hv_port_country_details_id'] = $hv_port_country_details_id;
                $data['hv_port_country_id'] = $hv_port_country_id;
                $data['arrival_port'] = $cd['arrival_port'];
                $data['total_price'] = $cd['total_price'];
               
                $data['horizon_id'] = $horizon_id;

                $query['query_type'] = "insert";
                $query['table_name'] = "hv_port_country_details";
                $query['query_data'] = $data;
                $this->mdl_dal3->send_query($query);

                $hv_port_country_details_id++;
               
            }

            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

            if ($res['result'] == true) {
                echo $res['result'];
            } else {
                http_response_code(500);
                echo $res['msg'];
            }

        } else {
            http_response_code(403);
        }
    }
    
    public function update()
    {

        if ($this->check_permission("write", false)) {

            $hv_port_country_id = str_replace('"', "", $this->input->post('hv_port_country_id'));
            $country_id = str_replace('"', "", $this->input->post('country_id'));
            $ports_data = $this->input->post('ports_data');
            $horizon_id = $this->session->userdata('horizon_id');

            //validate ports data, is in currect json format
            $ports_data = json_decode($ports_data, true);
            if(!is_array($ports_data))
            {
                http_response_code(500);
                echo "You supplied an invalid data. Please check and send again.";
                exit();
            }

            //prepare to update data in hv_port_country table
            $query = array();
            $setdata = array();
            $whereclause = array();

            //set values for update            
            $setdata['country_id'] = $country_id;

            $whereclause['hv_port_country_id'] = $hv_port_country_id;
            $whereclause['horizon_id'] = $horizon_id;

            //prepare data in hv_port_country table
            $query['query_type'] = 'update';
            $query['table_name'] = 'hv_port_country';
            $query['set_data'] = $setdata;
            $query['where_clause'] = $whereclause;

            //send update query in transaction
            $this->mdl_dal3->send_query($query);

            //manage data for hv_port_country_details
            //in case of user delete a chapter that did not used in plp
            //we compare it to db ports and delete it from db.
            $sql = "SELECT hv_port_country_details_id FROM hv_port_country_details
            WHERE hv_port_country_id = ?
            AND horizon_id = " . $horizon_id;
            $params = array($hv_port_country_id);
            $db_ports = $this->mdl_dal->select_data2($sql, $params);

            //fine db hv_port_country_details_id in user supplied chapter list
            foreach($db_ports as $dbch)
            {                
                $exist_in_user_list = false;
                foreach($ports_data as $cd1)
                {
                    if($dbch['hv_port_country_details_id'] == $cd1['hv_port_country_details_id'])
                    {
                        $exist_in_user_list = true;
                        break;
                    }
                }
                if(!$exist_in_user_list) //if db chapter id not found in user chapter list
                {
                    //delete chapter has no plp from hv_port_country table
                    $query = array();
                    $whereclause = array();

                    $whereclause['hv_port_country_details_id'] = $dbch['hv_port_country_details_id'];
                    $whereclause['hv_port_country_id'] = $hv_port_country_id;
                    //$whereclause['is_used_in_plp'] = 0;
                    $whereclause['horizon_id'] = $horizon_id;

                    //prepare data in transaction
                    $query['query_type'] = 'delete';
                    $query['table_name'] = 'hv_port_country_details';
                    $query['where_clause'] = $whereclause;

                    //send  delete query in transition
                    $this->mdl_dal3->send_query($query);
                }
            }
            //user deleted ids are also done in db.

            //insert data in hv_port_country_details
            $hv_port_country_details_id = $this->generate_new_hv_port_country_details_id();
            //$chapter_sequence = 1;
            foreach($ports_data as $cd2)
            {
                //insert those new ports that hv_port_country_details_id = 0
                if($cd2['hv_port_country_details_id'] == "0") //it means new chapter line added by user.
                {
                    $query = array();
                    $data  = array();

                    $data['hv_port_country_details_id'] = $hv_port_country_details_id;
                    $data['hv_port_country_id'] = $hv_port_country_id;
                    $data['arrival_port'] = $cd2['arrival_port'];
                    $data['total_price'] = $cd2['total_price'];
                    
                    //$data['chapter_sequence'] = $chapter_sequence;
                    //$data['is_used_in_plp'] = 0;
                    $data['horizon_id'] = $horizon_id;

                    $query['query_type'] = "insert";
                    $query['table_name'] = "hv_port_country_details";
                    $query['query_data'] = $data;
                    $this->mdl_dal3->send_query($query);

                    $hv_port_country_details_id++;
                } else {
                    $query = array();
                    $setdata = array();
                    $whereclause = array();

                    //set values for update
                    $setdata['arrival_port'] = $cd2['arrival_port'];
                    $setdata['total_price'] = $cd2['total_price'];
                    //$setdata['chapter_sequence'] = $chapter_sequence;
                    
                    $whereclause['hv_port_country_details_id'] = $cd2['hv_port_country_details_id'];
                    $whereclause['hv_port_country_id'] = $hv_port_country_id;
                    $whereclause['horizon_id'] = $horizon_id;

                    //prepare data in hv_port_country table
                    $query['query_type'] = 'update';
                    $query['table_name'] = 'hv_port_country_details';
                    $query['set_data'] = $setdata;
                    $query['where_clause'] = $whereclause;

                    //send update query in transaction
                    $this->mdl_dal3->send_query($query);
                    //
                }
                //$chapter_sequence++;
            }
        
            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

            if ($res['result'] == true) {
                echo $res['result'];
            } else {
                http_response_code(500);
                echo $res['msg'];
            }

        } else {
            http_response_code(403);
        }
    }
    public function delete()
    {
        if ($this->check_permission("delete", false)) {

            $horizon_id = $this->session->userdata('horizon_id');
            $hv_port_country_id = str_replace('"', "", $this->input->post('hv_port_country_id'));

            
                
                //delete from si_plp_plps_of_books
                $query = array();
                $whereclause = array();

                $whereclause['hv_port_country_id'] = $hv_port_country_id;
                $whereclause['horizon_id'] = $horizon_id;

                $query['query_type'] = 'delete';
                $query['table_name'] = 'hv_port_country';
                $query['where_clause'] = $whereclause;
                $this->mdl_dal3->send_query($query);

                //delete from hv_port_country_details
                $query = array();
                $whereclause = array();

                $whereclause['hv_port_country_id'] = $hv_port_country_id;
                $whereclause['horizon_id'] = $horizon_id;

                $query['query_type'] = 'delete';
                $query['table_name'] = 'hv_port_country_details';
                $query['where_clause'] = $whereclause;
                $this->mdl_dal3->send_query($query);

                
                
                $res = $this->mdl_dal3->execute_queries();

                sleep(1);

                if ($res['result'] == true) {
                    echo $res['result'];
                } else {
                    http_response_code(500);
                    echo $res['msg'];
                }
           

        } else {
            http_response_code(403);
        }
    }
    
    private function get_with_detail_by_hv_port_country_id($hv_port_country_id)
    {
        $res = array();

        $sql = "SELECT hv_port_country.*, hv_port_country_details.*
        FROM hv_port_country
        INNER JOIN hv_port_country_details ON hv_port_country_details.hv_port_country_id = hv_port_country.hv_port_country_id
        WHERE hv_port_country.hv_port_country_id = ?
        AND hv_port_country.horizon_id = " . $this->session->userdata('horizon_id')."
        ORDER BY arrival_port";

        $params = array($hv_port_country_id);
        $res = $this->mdl_dal->select_data2($sql, $params);

        return $res;
    }

    private function get_ports_of_books($hv_port_country_id)
    {
        $res = array();

        $sql = "SELECT *
        FROM hv_port_country_details
        WHERE hv_port_country_details.hv_port_country_id = ?
        AND hv_port_country_details.horizon_id = " . $this->session->userdata('horizon_id');

        $params = array($hv_port_country_id);
        $res = $this->mdl_dal->select_data2($sql, $params);

        return $res;
    }
    
    public function select()
    {
        if ($this->check_permission("read", false)) {
            
            //$horizon_id = $this->session->userdata('horizon_id');
            $search_term = trim($this->input->get("search_term"));        
            $offset = $this->uri->segment(3, 0);
            $port_assign = array();
            $params = array();
            $total_rows = 0;
        
            if ($search_term == null || $search_term == "" || $search_term == "undefined") {
                $sql = "SELECT hv_port_country.*, si_countries.country_name
                FROM hv_port_country
                INNER JOIN si_countries ON si_countries.country_id = hv_port_country.country_id
                WHERE hv_port_country.horizon_id = " . $this->session->userdata('horizon_id');
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);
        
                $port_assign = array();
                $sql = "SELECT hv_port_country.*, si_countries.country_name
                FROM hv_port_country
                INNER JOIN si_countries ON si_countries.country_id = hv_port_country.country_id
                WHERE hv_port_country.horizon_id = " . $this->session->userdata('horizon_id') . " 
                ORDER BY si_countries.country_name
                LIMIT " . $offset . ", " . $this->limit;
                $port_assign = $this->mdl_dal->select_data($sql);
            } else {
                $sql = "SELECT hv_port_country.*, si_countries.country_name
                FROM hv_port_country
                INNER JOIN si_countries ON si_countries.country_id = hv_port_country.country_id
                WHERE si_countries.country_name LIKE CONCAT('%', ?, '%')
                AND hv_port_country.horizon_id = " . $this->session->userdata('horizon_id');
                $params = array("country_name" => $search_term);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);
        
                $port_assign = array();
                $sql = "SELECT hv_port_country.*, si_countries.country_name
                FROM hv_port_country
                INNER JOIN si_countries ON si_countries.country_id = hv_port_country.country_id
                WHERE si_countries.country_name LIKE CONCAT('%', ?, '%')
                AND hv_port_country.horizon_id = " . $this->session->userdata('horizon_id') . " 
                ORDER BY si_countries.country_name
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("country_name" => $search_term);
                $port_assign = $this->mdl_dal->select_data2($sql, $params);
            }
            
            $res['offset'] = $offset;
            $res['port_assign'] = $port_assign;
            
            $this->load->library('pagination');
        
            $config['base_url'] = base_url() . 'index.php/port_assign/select';
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
            
            echo json_encode( $res );
        
        } else {        
            //send error to user as forbiddon
            http_response_code(403);
        }
    }

    public function select_active()
    {
        if (!$this->check_authentication()) {

            http_response_code(404);
            exit();

        } else {

            $sql = "SELECT hv_port_country.*
            FROM hv_port_country
            WHERE hv_port_country.active = 1 
            AND hv_port_country.horizon_id = " . $this->session->userdata('horizon_id');

            $res['arr'] = $this->mdl_dal->select_data($sql);

            //echo json_encode($res);
            $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($res));
        }
    }

    public function select_ports_of_book() // plp of chapter by hv_port_country_details_id
    {
        if ($this->check_permission("read", false)) {
            
            $hv_port_country_id = trim($this->input->get("hv_port_country_id"));
            $search_term = trim($this->input->get("search_term"));        
            $offset = $this->uri->segment(3, 0);
            $books_ports = array();
            $params = array();
            $total_rows = 0;
        
            if ($search_term == null || $search_term == "" || $search_term == "undefined") {
                $sql = "SELECT * FROM hv_port_country_details 
                WHERE hv_port_country_id = ?
                AND horizon_id = " . $this->session->userdata('horizon_id');
                $params = array("hv_port_country_id" => $hv_port_country_id);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);
        
                $books_ports = array();
                $sql = "SELECT * FROM hv_port_country_details 
                WHERE hv_port_country_id = ? 
                AND horizon_id = " . $this->session->userdata('horizon_id') . " 
                ORDER BY chapter_sequence
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("hv_port_country_id" => $hv_port_country_id);
                $books_ports = $this->mdl_dal->select_data2($sql, $params);
            } else {
                $sql = "SELECT * FROM hv_port_country_details 
                WHERE chapter_name LIKE CONCAT('%', ?, '%')
                AND hv_port_country_id = ?
                AND horizon_id = " . $this->session->userdata('horizon_id');
                $params = array("chapter_name" => $search_term, "hv_port_country_id" => $hv_port_country_id);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);
        
                $port_assign = array();
                $sql = "SELECT * FROM hv_port_country_details 
                WHERE chapter_name LIKE CONCAT('%', ?, '%')
                AND hv_port_country_id = ?
                AND horizon_id = " . $this->session->userdata('horizon_id') . " 
                ORDER BY chapter_sequence
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("chapter_name" => $search_term, "hv_port_country_id" => $hv_port_country_id);
                $books_ports = $this->mdl_dal->select_data2($sql, $params);
            }
            
            $res['offset'] = $offset;
            $res['books_ports'] = $books_ports;
            
            $this->load->library('pagination');
        
            $config['base_url'] = base_url() . 'index.php/port_assign/select_ports_of_book';
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
            
            echo json_encode( $res );
        
        } else {        
            //send error to user as forbiddon
            http_response_code(403);
        }
    }

    public function generate_new_id()
    {
        $new_id = 0;

        $sql = "SELECT MAX(hv_port_country_id) AS max_id 
                FROM hv_port_country";

        $res = $this->mdl_dal->select_data($sql);

        if( $res[0]['max_id'] == "" || $res[0]['max_id'] == null)
        {
            $new_id = 1;
        } else {
            $new_id = ((int)$res[0]['max_id'] + 1);
        }
        return $new_id;
    }

    public function generate_new_hv_port_country_details_id()
    {
        $new_id = 0;

        $sql = "SELECT MAX(hv_port_country_details_id) AS max_id 
        FROM hv_port_country_details";

        $res = $this->mdl_dal->select_data($sql);

        if( $res[0]['max_id'] == "" || $res[0]['max_id'] == null)
        {
            $new_id = 1;
        } else {
            $new_id = ((int)$res[0]['max_id'] + 1);
        }
        return $new_id;
    }

    public
    function select_country()
    {
        if (!$this->check_authentication()) {

            http_response_code(404);
            exit();

        } else {
            ///
            $sql = "SELECT * FROM si_countries";

            $res['arr'] = $this->mdl_dal->select_data($sql);

            echo json_encode($res);
        }
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
