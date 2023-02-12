<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inquiry_list extends CI_Controller
{

    private $this_page_id = "inquiry_list_pg_id";
    private $read_permission = false;
    private $write_permission = false;
    private $delete_permission = false;

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

            if($this->read_permission)
            {
                $this->load->view('inquiry_list', $user_data);
            } else {

                $this->load->view('nopermission',  $user_data); 
            }

        }
    }

    public function select()
    {
        ///
        $sql = "SELECT hv_car_inquiry.*, DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS start_date, DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS end_date FROM hv_car_inquiry ";

        $res['arr'] = $this->mdl_dal->select_data($sql) ;

        echo json_encode( $res );
    }

    public function select_by_id($id)
    {
        ///
        $data = array();

       
        $sql = "SELECT *, DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS start_date, DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS end_date FROM hv_car_inquiry WHERE  ann_id = " . $id . " AND horizon_id = " . $this->session->userdata('horizon_id');
        $res['arr'] = $this->mdl_dal->select_data($sql) ;

        echo json_encode( $res );

    }
    private function get_by_range($start_date, $end_date)
    {

        $sql = "SELECT hv_car_inquiry.*,hv_car_details.carname,
        DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS start_date, DATE_FORMAT(inquiry_date, '%d-%m-%Y') AS end_date
        FROM hv_car_inquiry
        LEFT OUTER JOIN hv_car_details ON hv_car_details.car_d_id = hv_car_inquiry.car_d_id
        WHERE inquiry_date BETWEEN CAST('" . $start_date . "' AS DATE)
        AND CAST('" . $end_date . "' AS DATE)";

        $res = $this->mdl_dal->select_data($sql);

        return $res;
    }


    
    public function select_by_range()
    {
        
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        
        $d = strtotime($start_date);
        $start_date = date('Y-m-d', $d);

        $d = strtotime($end_date);
        $end_date = date('Y-m-d', $d);
        

        $res['arr'] = $this->get_by_range($start_date, $end_date) ;

        echo json_encode( $res );
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



    public function generate_report()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if($start_date)
        {
            $d = strtotime($start_date);
            $start_date = date('Y-m-d', $d);
        } else {
            $start_date = date('Y-m-d');
        }

        if($end_date)
        {
            $d = strtotime($end_date);
            $end_date = date('Y-m-d', $d);
        } else {
            $end_date = date('Y-m-d');
        }

        $period = "From: " . $this->input->get('start_date') . " To " . $this->input->get('end_date');
        $res['period_of'] = $period;
        $res['report_data'] = $this->get_by_range($start_date, $end_date);

        $this->load->view('Inquiry_list_report', $res);

    }


}

?>