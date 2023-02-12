<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Car_manufacturer extends CI_Controller
{
    private $limit = 10;
    private $this_page_id = "car_manufacturer_pg_id";
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

            $this->load->view('car_manufacturer', $user_data);
        } else {
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            $this->load->view('nopermission', $user_data); //nopermission
        }
    }

    public function load_new()
    {
        if ($this->check_permission("write", false)) {
            $this->load->view('car_manufacturer_form');
        } else {
            http_response_code(403);
        }
    }

    public function load_view()
    {
        if ($this->check_permission("read", false)) {
            $this->load->view('car_manufacturer_list');
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

                $this->load->view('car_manufacturer_form', $data);
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
            $vm_name = str_replace('"', "", $this->input->post('vm_name'));
            $active = str_replace('"', "", $this->input->post('active'));
            $Title = str_replace('"', "", $this->input->post('Title'));
            $Keywords = str_replace('"', "", $this->input->post('Keywords'));
            $Description = str_replace('"', "", $this->input->post('Description'));
            $car_manufacturer_content = str_replace('"', "", $this->input->post('car_manufacturer_content'));

            $data['horizon_id'] = $horizon_id;
            $data['vm_name'] = $vm_name;
            $data['active'] = $active;
            $data['Title'] = $Title;
            $data['Keywords'] = $Keywords;
            $data['Description'] = $Description;
            $data['car_manufacturer_content'] = $car_manufacturer_content;
            

            $res = $this->mdl_dal->insert_data("hv_car_manufacturer", $data);

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


    public function update()
    {
        if ($this->check_permission("write", false)) {

            $setdata['vm_name'] = str_replace('"', "", $this->input->post('vm_name'));
            $setdata['Title'] = str_replace('"', "", $this->input->post('Title'));
            $setdata['Keywords'] = str_replace('"', "", $this->input->post('Keywords'));
            $setdata['Description'] = str_replace('"', "", $this->input->post('Description'));
            $setdata['car_manufacturer_content'] = str_replace('"', "", $this->input->post('car_manufacturer_content'));
            $setdata['active'] = str_replace('"', "", $this->input->post('active'));

            //$wheredata['horizon_id'] = $this->session->userdata('horizon_id');
            $wheredata['vm_id'] = str_replace('"', "", $this->input->post('vm_id'));

            $res = $this->mdl_dal->update_data('hv_car_manufacturer', $setdata, $wheredata);

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

    public function delete()
    {
        if ($this->check_permission("delete", false)) {

            $horizon_id = $this->session->userdata('horizon_id');
            $vm_id= str_replace('"', "", $this->input->post('vm_id'));

            //check if this deptype is used in si_departments table.
            $sql = "SELECT * FROM hv_car_models
            WHERE vm_id= ? 
            AND horizon_id = ?";
            $params = array('vm_id' => $vm_id, 'horizon_id' => $horizon_id);

            $records = $this->mdl_dal->select_data2($sql, $params);

            if (count($records) < 1) {
                $wheredata['vm_id'] = $vm_id;
                $wheredata['horizon_id'] = $horizon_id;

                $res = $this->mdl_dal->delete_data('hv_car_manufacturer', $wheredata);

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
                sleep(1);
                echo "This record can't be deleted, its related with other entry in Car Models.";
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
            $deptype = array();
            $params = array();
            $total_rows = 0;

            ///
            if($search_term == null || $search_term == "" || $search_term == "undefined")
            {
                $sql = "SELECT * FROM hv_car_manufacturer WHERE horizon_id = " . $this->session->userdata('horizon_id'). "  
                ORDER BY vm_id DESC ";
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $deptype = array();
                $sql = "SELECT * FROM hv_car_manufacturer WHERE horizon_id = " . $this->session->userdata('horizon_id') . " 
                 ORDER BY vm_id DESC 
                LIMIT " . $offset . ", " . $this->limit;
                $deptype = $this->mdl_dal->select_data($sql);

            } else {
                $sql = "SELECT * FROM hv_car_manufacturer 
                WHERE (vm_name LIKE CONCAT('%', ?, '%'))
                AND horizon_id = " . $this->session->userdata('horizon_id');
                $params = array("vm_name" => $search_term);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $deptype = array();
                $sql = "SELECT * FROM hv_car_manufacturer 
                WHERE (vm_name LIKE CONCAT('%', ?, '%'))
                AND horizon_id = " . $this->session->userdata('horizon_id') . " 
                LIMIT " . $offset . ", " . $this->limit;
                $params = array("vm_name" => $search_term);
                $deptype = $this->mdl_dal->select_data2($sql, $params);

            }

            $res['offset'] = $offset;
            $res['deptype'] = $deptype;

            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'index.php/car_manufacturer/select';
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
            $sql = "SELECT * FROM hv_car_manufacturer WHERE active = 1 AND hv_car_manufacturer.horizon_id = " . $this->session->userdata('horizon_id');

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

              $sql = "SELECT * FROM hv_car_manufacturer WHERE vm_id= " . $id .
                  " AND horizon_id = " . $this->session->userdata('horizon_id'); //institute_name

              $res['arr'] = $this->mdl_dal->select_data($sql);

              echo json_encode($res);
          }
    }




    //upload images start here

    public function validate_upload_attanchment()
    {
        $file_name = $this->input->get('file_name');
        $file_size = $this->input->get('file_size');
        
        $arr_result = [];        
        
        if($file_name)
        {
            $fsplit = explode(".", $file_name);
            //get last part of file name to get file type (extension)
            $file_type = strtolower($fsplit[count($fsplit)-1]);
            
            $arr_file_types = [
                'png', 'gif', 'jpg', 'jpeg'   
            ];
            
            if( (int)$file_size <= ((1024*1024)*5) && in_array($file_type, $arr_file_types) )
            {
                $arr_result['res'] = true;
                $arr_result['msg'] = "file ready to upload";
            } else {
                $arr_result['res'] = false;
                $arr_result['msg'] = "Selected file size or type is not permitted.";
            }
        } else {
            $arr_result['res'] = false;
            $arr_result['msg'] = "Invalid file selection try agian.";
        }
        $result['result'] = $arr_result;
        echo json_encode($result);
    }
    

    public function upload_attachment_for_featured_Image()
    {
        $horizon_id = $this->session->userdata('horizon_id');
            
        $file = 'file';    
        $config['max_size'] = '5120';
        //$config['upload_path'] = './uploads/books';
        $config['upload_path'] = realpath("../../uploads/make_logos/");
        $config['allowed_types'] = '*';//'jpg|png|gif|jpeg';
        //$config['encrypt_name'] = true;
        //$config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];

        $file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

        $file_ext_change = $file_name_wo_ext . ".png";

        $config['file_name'] = $file_ext_change;
        
         echo 'change file ext after';
            
            var_dump($config);

        $file_type = end((explode(".", $_FILES['file']['name'])));

        $allowed_types = ['JPG','jpg', 'jpeg', 'png', 'gif'];

        if(!in_array($file_type, $allowed_types))
        {
            echo "Invalid file type.";
            http_response_code(500);
            exit();
        }

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload($file)) 
        {
            $arr_upload_info = $this->upload->data();
            
            $vm_id = str_replace('"', "", $this->input->post('car_featured_id_for_upload'));

           var_dump($vm_id);
           var_dump($arr_upload_info['file_name']);

            //--------------------

            $filename = $arr_upload_info['file_name'];

                //$file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                $file_name_wo_ext = pathinfo($filename, PATHINFO_FILENAME);

                //var_dump($file_name_wo_ext);
                //echo 'check';
                //var_dump($file_type);

                $file_ext_change = $file_name_wo_ext . ".png";
                
                //echo 'change file ext after';
                
                var_dump($file_ext_change);
            
            var_dump($filename);

              $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/make_logos/' . $file_ext_change;
              var_dump($source_path);

              //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/dv/uploads/thumbnail/';
              $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/make_logos/';

              var_dump($target_path);

              $config_manip = array(
                  'image_library' => 'gd2',
                  'source_image' => $source_path,
                  'new_image' => $target_path,
                  'maintain_ratio' => FALSE,
                  'create_thumb' => TRUE,
                  'thumb_marker' => '',
                  'quality' => '100%',
                  'width' => 30,
                  'height' => 30
              );

            var_dump($config_manip);

              $this->load->library('image_lib', $config_manip);
              if (!$this->image_lib->resize()) {
                  echo $this->image_lib->display_errors();
              }

              $this->image_lib->clear();
              //exit();

            //---------------------


            //prepare to update data
            $query = array();
            $setdata = array();
            $whereclause = array();


            //$setdata['book_pic'] = $arr_upload_info['file_name'];

            $setdata['user_file_name'] = $arr_upload_info['orig_name'];
            $setdata['stored_file_name'] = $file_ext_change;
            $setdata['file_path'] = $arr_upload_info['full_path'];
            $setdata['upload_date'] = date("Y-m-d");

            $whereclause['vm_id'] = $vm_id;
            $whereclause['horizon_id'] = $horizon_id;

            //prepare data in table
            $query['query_type'] = 'update';
            $query['table_name'] = 'hv_car_manufacturer';
            $query['set_data'] = $setdata;
            $query['where_clause'] = $whereclause;
            
            

            //send update query in transaction
            $this->mdl_dal3->send_query($query);
        
            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

           
    
            if ($res['result']) {
                echo json_encode("true");
            } else {
                unlink($arr_upload_info['full_path']);
                echo $res['msg'];
                http_response_code(500);
            }
        } else {
            $upload_errors['errors'] = $this->upload->display_errors();
            var_dump($upload_errors);
            echo "Error in uploading file. " . $this->upload->display_errors();
            http_response_code(500);
        }
    }

    //upload images end here

    private
    function get_by_id($id)
    {
        ///
        $res = array();

        $sql = "SELECT * FROM hv_car_manufacturer WHERE vm_id= " . $id .
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

     public function test()
    {
        echo realpath("../../uploads");

    }


}

?>