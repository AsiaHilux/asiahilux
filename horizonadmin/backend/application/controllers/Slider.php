<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    private $this_page_id = "slider_pg_id";
    private $read_permission = false;
    private $write_permission = false;
    private $delete_permission = false;

    function __construct()
    {
        parent::__construct();
        
        $this->load->library('date_format');
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
            
            $user_data['arr_current_company'] = $this->get_corrent_company($this->
                session->userdata('horizon_id')); 
            //$user_data['countries'] = $this->get_countries();
            //$user_data['get_schools'] = $this->get_schools();

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
            
            if($this->read_permission)
            {
                $this->load->view('slider', $user_data);
            } else {
                
                $this->load->view('nopermission',  $user_data); 
            }

        }
    }
    
   
    public function upload_web_slider()
    {
        $horizon_id = $this->session->userdata('horizon_id');

        $file = 'file';

        $config['max_size']	= '5120';
        $config['upload_path'] = '../../uploads/slider';
        $config['allowed_types'] = '*';
        //$config['encrypt_name'] = true;
        $config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];


        $file_type = end((explode(".", $_FILES['file']['name'])));

        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if(!in_array($file_type, $allowed_types))
        {
            echo "Invalid file type.";
            http_response_code(500);
            exit();
        }


        $this->load->library('upload', $config);

        if( $this->upload->do_upload($file) )
        {
            //echo 'File Uploaded Successfuly';

            $arr_upload_info = $this->upload->data();

            $setdata['company_web_slider'] = $arr_upload_info['file_name'];


            $wheredata['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->update_data('si_company', $setdata, $wheredata);

        } else {

            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);

            //echo 'File cannot be uploaded77.';
            http_response_code(500);
        }

    }

    public function delete()
    {
        if ($this->session->userdata('user_id') == "")           
            redirect(base_url() . 'index.php/login/', 'refresh');

        $id = str_replace('"', "", $this->input->post('horizon_id'));

        $wheredata['horizon_id'] = $id;

        $res = $this->mdl_dal->delete_data('si_company', $wheredata);

        sleep(1);

        echo json_encode($res);

    }
    
    public function select_by_id($id)
    {
        ///
        $data = array();

        $sql = "SELECT horizon_id, address, phone1, phone2, si_company.country_id, si_countries.country_name, city_name,  company_web_slider, is_default, active FROM si_company LEFT OUTER JOIN si_countries ON si_company.country_id = si_countries.country_id WHERE horizon_id = " .
            $id;

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

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
    function get_corrent_company($horizon_id)
    {
        $arr = array();

        $sql = "SELECT * FROM si_company WHERE horizon_id = " . $horizon_id;

        $arr = $this->mdl_dal->select_data($sql);

        return $arr;

    }


}

?>