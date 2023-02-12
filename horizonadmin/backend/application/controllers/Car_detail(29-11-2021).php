<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Car_detail extends CI_Controller
{
    private $limit = 50;
    private $this_page_id = "car_detail_pg_id";
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

            $this->load->view('car_detail', $user_data);
        } else {
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->userdata('horizon_id'));

            $this->load->view('nopermission', $user_data); //nopermission
        }
    }


    public function load_new()
    {
        if ($this->check_permission("write", false)) {

            $result = array();
            $temp_form_data = array();

            $result = $this->create_temporary();
          
            if ($result['result'] == true) {
                $result['entry_name'] = "temporary_entry";

                $temp_form_data['temp_form_data'] = $result;

                $this->load->view('car_detail_form', $temp_form_data);
            } else {
                http_response_code(500);
                echo $result['msg'];
            }
        } else {
            http_response_code(403);
        }


    }

    public function load_view()
    {
        if ($this->check_permission("read", false)) {
            $this->load->view('car_detail_list');
        } else {
            http_response_code(403);
        }
    }


    public function load_edit()
    {
        if ($this->check_permission("write", false)) {

            $result = array();

            //get record by id for from to be edited.
          
            $car_d_id = $this->input->get("car_d_id");

            $result = $this->get_by_id($car_d_id);

            if (count($result) > 0) {
                $data['formdata'] = $result;

                $this->load->view('car_detail_form', $data);
            } else {
                http_response_code(204); //code for: request successful, but no content.
            }

        } else {
            http_response_code(403);
        }
    }

    private function create_temporary()
    {
        $horizon_id = $this->session->userdata('horizon_id');

        $data = array();
        $query = array();
        $res = array();

        $car_d_id = $this->generate_new_id();
        $acc_no = $this->generate_new_acc_no();

        //only nessesory columns values are inserted.
        $data['car_d_id'] = $car_d_id;
        $data['acc_no'] = $acc_no;

        $data['horizon_id'] = $horizon_id;
      
        $data['is_temporary_entry'] = 1;

        /////// qeury block 1 ///////////
        $query['query_type'] = "insert";
        $query['table_name'] = "hv_car_details";
        $query['query_data'] = $data;

        $this->mdl_dal3->send_query($query);

        $res = $this->mdl_dal3->execute_queries();

        $res['car_d_id'] = $car_d_id;
        $res['acc_no'] = $acc_no;

        return $res;
    }

    public function create()
    {
        if ($this->check_permission("write", false)) {


            $set_data = array();
            $where_clause = array();
            $query = array();

            $horizon_id = $this->session->userdata('horizon_id');
            $car_d_id = str_replace('"', "", $this->input->post('car_d_id'));


            $vm_id = str_replace('"', "", $this->input->post('vm_id'));
            $m_id = str_replace('"', "", $this->input->post('m_id'));
            $carname = str_replace('"', "", $this->input->post('carname'));
            $CDPlayer = str_replace('"', "", $this->input->post('CDPlayer'));
            $SunRoof = str_replace('"', "", $this->input->post('SunRoof'));
            $LeatherSeat = str_replace('"', "", $this->input->post('LeatherSeat'));
            $AlloyWheels = str_replace('"', "", $this->input->post('AlloyWheels'));
            $PowerSteering = str_replace('"', "", $this->input->post('PowerSteering'));
            $PowerWindow = str_replace('"', "", $this->input->post('PowerWindow'));
            $AC = str_replace('"', "", $this->input->post('AC'));
            $ABS = str_replace('"', "", $this->input->post('ABS'));
            $Airbag = str_replace('"', "", $this->input->post('Airbag'));
            $Radio = str_replace('"', "", $this->input->post('Radio'));
            $CDChanger = str_replace('"', "", $this->input->post('CDChanger'));
            $DVD = str_replace('"', "", $this->input->post('DVD'));
            $TV = str_replace('"', "", $this->input->post('TV'));
            $PoweSeat = str_replace('"', "", $this->input->post('PoweSeat'));
            $BackTire = str_replace('"', "", $this->input->post('BackTire'));
            $GrillGuard = str_replace('"', "", $this->input->post('GrillGuard'));
            $RearSpoiler = str_replace('"', "", $this->input->post('RearSpoiler'));
            $CentralLocking = str_replace('"', "", $this->input->post('CentralLocking'));
            $Jack = str_replace('"', "", $this->input->post('Jack'));
            $SpareTire = str_replace('"', "", $this->input->post('SpareTire'));
            $WheelSpanner = str_replace('"', "", $this->input->post('WheelSpanner'));
            $carprice = str_replace('"', "", $this->input->post('carprice'));
            //$Bodytype = str_replace('"', "", $this->input->post('Bodytype'));
            

            $Fuel = str_replace('"', "", $this->input->post('Fuel'));
            $Transmission = str_replace('"', "", $this->input->post('Transmission'));
            $Steering = str_replace('"', "", $this->input->post('Steering'));
            //$Drivetrain = str_replace('"', "", $this->input->post('Drivetrain'));
            $VehicleNo = str_replace('"', "", $this->input->post('VehicleNo'));
            $Chassis = str_replace('"', "", $this->input->post('Chassis'));
            $ModelCode = str_replace('"', "", $this->input->post('ModelCode'));
            $VersionClass = str_replace('"', "", $this->input->post('VersionClass'));
            $EngineCode = str_replace('"', "", $this->input->post('EngineCode'));
            $Mileage = str_replace('"', "", $this->input->post('Mileage'));
            $EngineSize = str_replace('"', "", $this->input->post('EngineSize'));
            $RegistrationYear = str_replace('"', "", $this->input->post('RegistrationYear'));
            $RegistrationMonth = str_replace('"', "", $this->input->post('RegistrationMonth'));
            $ManufactureYear = str_replace('"', "", $this->input->post('ManufactureYear'));
            $ManufactureMonth = str_replace('"', "", $this->input->post('ManufactureMonth'));
            $Ext_Color = str_replace('"', "", $this->input->post('Ext_Color'));
            $WheelDrive = str_replace('"', "", $this->input->post('WheelDrive'));
            $Location = str_replace('"', "", $this->input->post('Location'));
            $Dimension = str_replace('"', "", $this->input->post('Dimension'));
            $Doors = str_replace('"', "", $this->input->post('Doors'));
            $M3 = str_replace('"', "", $this->input->post('M3'));
            $Seats = str_replace('"', "", $this->input->post('Seats'));
            $Weight = str_replace('"', "", $this->input->post('Weight'));
            //$country_id = str_replace('"', "", $this->input->post('country_id'));
            $country = 0;
            $car_tag = str_replace('"', "", $this->input->post('car_tag'));
            $cardisprice = str_replace('"', "", $this->input->post('cardisprice'));
            $Title = str_replace('"', "", $this->input->post('Title'));
            $Keywords = str_replace('"', "", $this->input->post('Keywords'));
            $Description = str_replace('"', "", $this->input->post('Description'));
            


            $set_data['vm_id'] = $vm_id;
            $set_data['m_id'] = $m_id;
            $set_data['carname'] = $carname;
            $set_data['CDPlayer'] = $CDPlayer;
            $set_data['SunRoof'] = $SunRoof;
            $set_data['LeatherSeat'] = $LeatherSeat;
            $set_data['AlloyWheels'] = $AlloyWheels;
            $set_data['PowerSteering'] = $PowerSteering;
            $set_data['PowerWindow'] = $PowerWindow;
            $set_data['AC'] = $AC;
            $set_data['ABS'] = $ABS;
            $set_data['Airbag'] = $Airbag;
            $set_data['Radio'] = $Radio;
            $set_data['CDChanger'] = $CDChanger;
            $set_data['DVD'] = $DVD;
            $set_data['TV'] = $TV;
            $set_data['PoweSeat'] = $PoweSeat;
            $set_data['BackTire'] = $BackTire;
            $set_data['GrillGuard'] = $GrillGuard;
            $set_data['RearSpoiler'] = $RearSpoiler;
            $set_data['CentralLocking'] = $CentralLocking;
            $set_data['Jack'] = $Jack;
            $set_data['SpareTire'] = $SpareTire;
            $set_data['WheelSpanner'] = $WheelSpanner;
            $set_data['carprice'] = $carprice;
            //$set_data['Bodytype'] = $Bodytype;
            $set_data['Fuel'] = $Fuel;
            $set_data['Transmission'] = $Transmission;
            $set_data['Steering'] = $Steering;
            //$set_data['Drivetrain'] = $Drivetrain;
            $set_data['VehicleNo'] = $VehicleNo;
            $set_data['Chassis'] = $Chassis;
            $set_data['ModelCode'] = $ModelCode;
            $set_data['VersionClass'] = $VersionClass;
            $set_data['EngineCode'] = $EngineCode;
            $set_data['Mileage'] = $Mileage;
            $set_data['EngineSize'] = $EngineSize;
            $set_data['RegistrationYear'] = $RegistrationYear;
            $set_data['RegistrationMonth'] = $RegistrationMonth;
            $set_data['ManufactureYear'] = $ManufactureYear;
            $set_data['ManufactureMonth'] = $ManufactureMonth;
            $set_data['RearSpoiler'] = $RearSpoiler;
            $set_data['Ext_Color'] = $Ext_Color;
            $set_data['WheelDrive'] = $WheelDrive;
            $set_data['Location'] = $Location;
            $set_data['Dimension'] = $Dimension;
            $set_data['Doors'] = $Doors;
            $set_data['M3'] = $M3;
            $set_data['Seats'] = $Seats;
            $set_data['Weight'] = $Weight;
            $set_data['country_id'] = $country;
            $set_data['car_tag'] = $car_tag;
            $set_data['cardisprice'] = $cardisprice;
            $set_data['Title'] = $Title;
            $set_data['Keywords'] = $Keywords;
            $set_data['Description'] = $Description;



            $where_clause['car_d_id'] = $car_d_id;
            $where_clause['horizon_id'] = $horizon_id;

           

            $query['query_type'] = "update";
            $query['table_name'] = "hv_car_details";
            $query['set_data'] = $set_data;
            $query['where_clause'] = $where_clause;
            
            $this->mdl_dal3->send_query($query);
            
            $Bodytype = $this->input->post('Bodytype');
            $Bodytype_data = json_decode($Bodytype, true);
            
            if(is_array($Bodytype_data))
            {
                foreach ($Bodytype_data as $by_data) {
                    
                    $data1 = array();
                    $query = array();
              
                    $data1['car_d_id'] = $car_d_id;
                    $data1['bodytype_id'] = $by_data['bodytype'];
                    $data1['horizon_id'] = $horizon_id;
                    

                    //send query for body type detail table.
                    $query['query_type'] = "insert";
                    $query['table_name'] = "hv_car_bodytype_details";
                    $query['query_data'] = $data1;
                     
                    //send query in transiction
                    $this->mdl_dal3->send_query($query);

                }
            }

            $countryid = $this->input->post('country_id');
            
            //var_dump($countryid); //exit();
            
            $country_id_data = json_decode($countryid, true); 
            
             //var_dump($country_id_data); //exit();

            if(is_array($country_id_data))
            {
                foreach ($country_id_data as $c_data) {

                    $data2 = array();
                    $query = array();           


                    $data2['car_d_id'] = $car_d_id;
                    $data2['country_detail_id'] = $c_data['countryid'];
                    $data2['horizon_id'] = $horizon_id;
                    

                    //send query for body type detail table.
                    $query['query_type'] = "insert";
                    $query['table_name'] = "si_countries_details";
                    $query['query_data'] = $data2;

                    //send query in transiction
                    $this->mdl_dal3->send_query($query);

                }
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

            $set_data = array();
            $where_clause = array();
            $query = array();

            $horizon_id = $this->session->userdata('horizon_id');
            $car_d_id = str_replace('"', "", $this->input->post('car_d_id'));


          
            $vm_id = str_replace('"', "", $this->input->post('vm_id'));
            $m_id = str_replace('"', "", $this->input->post('m_id'));
            $carname = str_replace('"', "", $this->input->post('carname'));
            $CDPlayer = str_replace('"', "", $this->input->post('CDPlayer'));
            $SunRoof = str_replace('"', "", $this->input->post('SunRoof'));
            $LeatherSeat = str_replace('"', "", $this->input->post('LeatherSeat'));
            $AlloyWheels = str_replace('"', "", $this->input->post('AlloyWheels'));
            $PowerSteering = str_replace('"', "", $this->input->post('PowerSteering'));
            $PowerWindow = str_replace('"', "", $this->input->post('PowerWindow'));
            $AC = str_replace('"', "", $this->input->post('AC'));
            $ABS = str_replace('"', "", $this->input->post('ABS'));
            $Airbag = str_replace('"', "", $this->input->post('Airbag'));
            $Radio = str_replace('"', "", $this->input->post('Radio'));
            $CDChanger = str_replace('"', "", $this->input->post('CDChanger'));
            $DVD = str_replace('"', "", $this->input->post('DVD'));
            $TV = str_replace('"', "", $this->input->post('TV'));
            $PoweSeat = str_replace('"', "", $this->input->post('PoweSeat'));
            $BackTire = str_replace('"', "", $this->input->post('BackTire'));
            $GrillGuard = str_replace('"', "", $this->input->post('GrillGuard'));
            $RearSpoiler = str_replace('"', "", $this->input->post('RearSpoiler'));
            $CentralLocking = str_replace('"', "", $this->input->post('CentralLocking'));
            $Jack = str_replace('"', "", $this->input->post('Jack'));
            $SpareTire = str_replace('"', "", $this->input->post('SpareTire'));
            $WheelSpanner = str_replace('"', "", $this->input->post('WheelSpanner'));
            $carprice = str_replace('"', "", $this->input->post('carprice'));
            //$Bodytype = str_replace('"', "", $this->input->post('Bodytype'));
            $Fuel = str_replace('"', "", $this->input->post('Fuel'));
            $Transmission = str_replace('"', "", $this->input->post('Transmission'));
            $Steering = str_replace('"', "", $this->input->post('Steering'));
            //$Drivetrain = str_replace('"', "", $this->input->post('Drivetrain'));
            $VehicleNo = str_replace('"', "", $this->input->post('VehicleNo'));
            $Chassis = str_replace('"', "", $this->input->post('Chassis'));
            $ModelCode = str_replace('"', "", $this->input->post('ModelCode'));
            $VersionClass = str_replace('"', "", $this->input->post('VersionClass'));
            $EngineCode = str_replace('"', "", $this->input->post('EngineCode'));
            $Mileage = str_replace('"', "", $this->input->post('Mileage'));
            $EngineSize = str_replace('"', "", $this->input->post('EngineSize'));
            $RegistrationYear = str_replace('"', "", $this->input->post('RegistrationYear'));
            $RegistrationMonth = str_replace('"', "", $this->input->post('RegistrationMonth'));
            $ManufactureYear = str_replace('"', "", $this->input->post('ManufactureYear'));
            $ManufactureMonth = str_replace('"', "", $this->input->post('ManufactureMonth'));
            $Ext_Color = str_replace('"', "", $this->input->post('Ext_Color'));
            $WheelDrive = str_replace('"', "", $this->input->post('WheelDrive'));
            $Location = str_replace('"', "", $this->input->post('Location'));
            $Dimension = str_replace('"', "", $this->input->post('Dimension'));
            $Doors = str_replace('"', "", $this->input->post('Doors'));
            $M3 = str_replace('"', "", $this->input->post('M3'));
            $Seats = str_replace('"', "", $this->input->post('Seats'));
            $Weight = str_replace('"', "", $this->input->post('Weight'));
            $country = 0;
            $car_tag = str_replace('"', "", $this->input->post('car_tag'));
            $cardisprice = str_replace('"', "", $this->input->post('cardisprice'));
            $Title = str_replace('"', "", $this->input->post('Title'));
            $Keywords = str_replace('"', "", $this->input->post('Keywords'));
            $Description = str_replace('"', "", $this->input->post('Description'));

            

            $set_data['vm_id'] = $vm_id;
            $set_data['m_id'] = $m_id;
            $set_data['carname'] = $carname;
            $set_data['CDPlayer'] = $CDPlayer;
            $set_data['SunRoof'] = $SunRoof;
            $set_data['LeatherSeat'] = $LeatherSeat;
            $set_data['AlloyWheels'] = $AlloyWheels;
            $set_data['PowerSteering'] = $PowerSteering;
            $set_data['PowerWindow'] = $PowerWindow;
            $set_data['AC'] = $AC;
            $set_data['ABS'] = $ABS;
            $set_data['Airbag'] = $Airbag;
            $set_data['Radio'] = $Radio;
            $set_data['CDChanger'] = $CDChanger;
            $set_data['DVD'] = $DVD;
            $set_data['TV'] = $TV;
            $set_data['PoweSeat'] = $PoweSeat;
            $set_data['BackTire'] = $BackTire;
            $set_data['GrillGuard'] = $GrillGuard;
            $set_data['RearSpoiler'] = $RearSpoiler;
            $set_data['CentralLocking'] = $CentralLocking;
            $set_data['Jack'] = $Jack;
            $set_data['SpareTire'] = $SpareTire;
            $set_data['WheelSpanner'] = $WheelSpanner;
            $set_data['carprice'] = $carprice;
            //$set_data['Bodytype'] = $Bodytype;
            $set_data['Fuel'] = $Fuel;
            $set_data['Transmission'] = $Transmission;
            $set_data['Steering'] = $Steering;
            //$set_data['Drivetrain'] = $Drivetrain;
            $set_data['VehicleNo'] = $VehicleNo;
            $set_data['Chassis'] = $Chassis;
            $set_data['ModelCode'] = $ModelCode;
            $set_data['VersionClass'] = $VersionClass;
            $set_data['EngineCode'] = $EngineCode;
            $set_data['Mileage'] = $Mileage;
            $set_data['EngineSize'] = $EngineSize;
            $set_data['RegistrationYear'] = $RegistrationYear;
            $set_data['RegistrationMonth'] = $RegistrationMonth;
            $set_data['ManufactureYear'] = $ManufactureYear;
            $set_data['ManufactureMonth'] = $ManufactureMonth;
            $set_data['RearSpoiler'] = $RearSpoiler;
            $set_data['Ext_Color'] = $Ext_Color;
            $set_data['WheelDrive'] = $WheelDrive;
            $set_data['Location'] = $Location;
            $set_data['Dimension'] = $Dimension;
            $set_data['Doors'] = $Doors;
            $set_data['M3'] = $M3;
            $set_data['Seats'] = $Seats;
            $set_data['Weight'] = $Weight;
            $set_data['country_id'] = $country;
            $set_data['car_tag'] = $car_tag;
            $set_data['cardisprice'] = $cardisprice;
            $set_data['Title'] = $Title;
            $set_data['Keywords'] = $Keywords;
            $set_data['Description'] = $Description;

            


            $where_clause['car_d_id'] = $car_d_id;
            $where_clause['horizon_id'] = $horizon_id;

           

            $query['query_type'] = "update";
            $query['table_name'] = "hv_car_details";
            $query['set_data'] = $set_data;
            $query['where_clause'] = $where_clause;

            $this->mdl_dal3->send_query($query);


            $Bodytype = $this->input->post('Bodytype');
            $Bodytype_data = json_decode($Bodytype, true); 
            //var_dump($Bodytype_data); exit();

            $wheredata['car_d_id'] = $car_d_id;
            //$wheredata['is_temporary_entry'] = 1;
            $wheredata['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->delete_data('hv_car_bodytype_details', $wheredata);

        //      if ($res == true) {

        //   foreach ($Bodytype_data as $by_data) {

              

        //             $data['car_d_id'] = $car_d_id;
        //             $data['bodytype_id'] = $by_data['bodytype'];
        //             $data['horizon_id'] = $horizon_id;
                    

        //             //send query for body type detail table.
        //             $query['query_type'] = "insert";
        //             $query['table_name'] = "hv_car_bodytype_details";
        //             $query['query_data'] = $data;

        //             //send query in transiction
        //             $this->mdl_dal3->send_query($query);

        //         }
        //     }
        
        if(is_array($Bodytype_data))
            {
                foreach ($Bodytype_data as $by_data) {
                    
                    $data1 = array();
                    $query = array();
              
                    $data1['car_d_id'] = $car_d_id;
                    $data1['bodytype_id'] = $by_data['bodytype'];
                    $data1['horizon_id'] = $horizon_id;
                    

                    //send query for body type detail table.
                    $query['query_type'] = "insert";
                    $query['table_name'] = "hv_car_bodytype_details";
                    $query['query_data'] = $data1;
                     
                    //send query in transiction
                    $this->mdl_dal3->send_query($query);

                }
            }
        
        


            //$data2 = array();
           

            $countryid = $this->input->post('country_id');
            $countryid_data = json_decode($countryid, true); 
            //var_dump($Bodytype_data); exit();

            $wheredata1['car_d_id'] = $car_d_id;
            //$wheredata['is_temporary_entry'] = 1;
            $wheredata1['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->delete_data('si_countries_details', $wheredata1);

        //      if ($res == true) {

        //   foreach ($countryid_data as $c_data) {

              

        //             $data2['car_d_id'] = $car_d_id;
        //             $data2['country_detail_id'] = $c_data['countryid'];
        //             $data2['horizon_id'] = $horizon_id;
                    

        //             //send query for body type detail table.
        //             $query['query_type'] = "insert";
        //             $query['table_name'] = "si_countries_details";
        //             $query['query_data'] = $data2;

        //             //send query in transiction
        //             $this->mdl_dal3->send_query($query);

        //         }
        //     }
        
         if(is_array($countryid_data))
            {
                foreach ($countryid_data as $c_data) {

                    $data2 = array();
                    $query = array();           


                    $data2['car_d_id'] = $car_d_id;
                    $data2['country_detail_id'] = $c_data['countryid'];
                    $data2['horizon_id'] = $horizon_id;
                    

                    //send query for body type detail table.
                    $query['query_type'] = "insert";
                    $query['table_name'] = "si_countries_details";
                    $query['query_data'] = $data2;

                    //send query in transiction
                    $this->mdl_dal3->send_query($query);

                }
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

    public function delete_temporary()
    {
        if (!$this->check_authentication()) {

            http_response_code(404);
            exit();

        } else {

            $horizon_id = $this->session->userdata('horizon_id');
            $car_d_id = str_replace('"', "", $this->input->post('car_d_id'));

            $wheredata['car_d_id'] = $car_d_id;
            $wheredata['is_temporary_entry'] = 1;
            $wheredata['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->delete_data('hv_car_details', $wheredata);
            
            $sql = "SELECT * FROM hv_car_images
                    WHERE car_d_id = ?
                    AND horizon_id = " . $this->session->userdata('horizon_id');
                    $params = array($car_d_id);
                    $attached_file = $this->mdl_dal->select_data2($sql, $params);
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }    
            
            $wheredata_delete_image['car_d_id'] = $car_d_id;
            $res = $this->mdl_dal->delete_data('hv_car_images', $wheredata_delete_image);
            
            $sql = "SELECT * FROM hv_car_home_page_images
                    WHERE car_d_id = ?
                    AND horizon_id = " . $this->session->userdata('horizon_id');
                    $params = array($car_d_id);
                    $attached_file = $this->mdl_dal->select_data2($sql, $params);
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }    
            
            
            $res = $this->mdl_dal->delete_data('hv_car_home_page_images', $wheredata_delete_image);
            

             if ($res == true) {
                        echo $res;
            } else {
                echo "Error occurred";
                http_response_code(500);
            }
        }
    }

    public function delete()
    {
        if ($this->check_permission("delete", false)) {

            $horizon_id = $this->session->userdata('horizon_id');
            $car_d_id = str_replace('"', "", $this->input->post('car_d_id'));
            
            //delete data from body details table
            $wheredata['car_d_id'] = $car_d_id;
            $wheredata['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->delete_data('hv_car_bodytype_details', $wheredata);
            $res = $this->mdl_dal->delete_data('si_countries_details', $wheredata);
            
            // $wheredata_delete_image['car_d_id'] = $car_d_id;
            // $res = $this->mdl_dal->delete_data('hv_car_images', $wheredata_delete_image);
            
            // $res = $this->mdl_dal->delete_data('hv_car_home_page_images', $wheredata_delete_image);

            
            $sql = "SELECT * FROM hv_car_details
            WHERE car_d_id = ? 
            AND horizon_id = ?";
            $params = array('car_d_id' => $car_d_id, 'horizon_id' => $horizon_id);

            $records = $this->mdl_dal->select_data2($sql, $params);


           
                $where_clause['car_d_id'] = $car_d_id;
                $where_clause['horizon_id'] = $horizon_id;

                $query['query_type'] = "delete";
                $query['table_name'] = "hv_car_details";
                $query['where_clause'] = $where_clause;
                
                
                $sql = "SELECT * FROM hv_car_images
                    WHERE car_d_id = ?
                    AND horizon_id = " . $this->session->userdata('horizon_id');
                    $params = array($car_d_id);
                    $attached_file = $this->mdl_dal->select_data2($sql, $params);
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }    
            
            $wheredata_delete_image['car_d_id'] = $car_d_id;
            $res = $this->mdl_dal->delete_data('hv_car_images', $wheredata_delete_image);
            
            $sql = "SELECT * FROM hv_car_home_page_images
                    WHERE car_d_id = ?
                    AND horizon_id = " . $this->session->userdata('horizon_id');
                    $params = array($car_d_id);
                    $attached_file = $this->mdl_dal->select_data2($sql, $params);
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }    
            
            
            $res = $this->mdl_dal->delete_data('hv_car_home_page_images', $wheredata_delete_image);
                
                
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

    /*public function upload_book_pic()
    {

        $horizon_id = $this->session->userdata('horizon_id');
        $car_d_id = $this->input->post('bookid_forupload');

        $file = 'file';

        $config['max_size'] = '5120';
        $config['upload_path'] = './uploads/books';
        $config['allowed_types'] = 'jpg|png|gif|bmp';
        $config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];


        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file)) {

            $arr_upload_info = $this->upload->data();

            $setdata['book_pic'] = $arr_upload_info['file_name'];

            $wheredata['car_d_id'] = $car_d_id;
            $wheredata['horizon_id'] = $horizon_id;

            $res = $this->mdl_dal->update_data('hv_car_details', $setdata, $wheredata);

        } else {

            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);
            http_response_code(500);
        }

    }*/
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
    
    // public function upload_attachment()
    // {
    //     $horizon_id = $this->session->userdata('horizon_id');
            
    //     $file = 'file';    
    //     $config['max_size'] = '5120';
    //     $config['upload_path'] = './uploads/books';
    //     $config['allowed_types'] = 'jpg|png|gif|jpeg';
    //     //$config['encrypt_name'] = true;
    //     $config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];



    //     $this->load->library('upload', $config);
        
    //     if ($this->upload->do_upload($file)) 
    //     {
    //         $arr_upload_info = $this->upload->data();
            
    //         $car_d_id = str_replace('"', "", $this->input->post('accession_reg_id_for_upload'));

      
    //         //prepare to update data
    //         $query = array();
    //         $setdata = array();
    //         $whereclause = array();

    //         $setdata['book_pic'] = $arr_upload_info['file_name'];

    //         $whereclause['car_d_id'] = $car_d_id;
    //         $whereclause['horizon_id'] = $horizon_id;

    //         //prepare data in si_plp_plps_of_books table
    //         $query['query_type'] = 'update';
    //         $query['table_name'] = 'hv_car_details';
    //         $query['set_data'] = $setdata;
    //         $query['where_clause'] = $whereclause;

    //         //send update query in transaction
    //         $this->mdl_dal3->send_query($query);
        
    //         $res = $this->mdl_dal3->execute_queries();

    //         sleep(1);
    
    //         if ($res['result']) {
    //             echo json_encode("true");
    //         } else {
    //             //unlink($arr_upload_info['full_path']);
    //             echo $res['msg'];
    //             http_response_code(500);
    //         }
    //     } else {
    //         $upload_errors['errors'] = $this->upload->display_errors();
    //         //var_dump($upload_errors);
    //         echo "Error in uploading file. " . $this->upload->display_errors();
    //         http_response_code(500);
    //     }
    // }

  
       
   


    public function select()
    {

        if ($this->check_permission("read", false)) {

            $search_term = trim($this->input->get("search_term"));

            $offset = $this->uri->segment(3, 0);
            $car_detail = array();
            $params = array();
            $total_rows = 0;

            ///
            if ($search_term == null || $search_term == "" || $search_term == "undefined") {
                $sql = "SELECT  hv_car_details.*,  hv_car_images.stored_file_name, hv_car_manufacturer.vm_name, hv_car_models.model_name FROM hv_car_details
                LEFT OUTER JOIN
                (
                    SELECT car_d_id, COUNT(car_d_id), stored_file_name
                    FROM hv_car_images
                    WHERE hv_car_images.horizon_id = " . $this->session->userdata('horizon_id') . "
                    AND hv_car_images.s_no = 0
                    GROUP BY car_d_id
                ) AS hv_car_images
                ON
                hv_car_images.car_d_id = hv_car_details.car_d_id
                LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_details.vm_id
                LEFT OUTER JOIN hv_car_models ON hv_car_models.m_id = hv_car_details.m_id
                    WHERE hv_car_details.horizon_id = " . $this->session->userdata('horizon_id') . "  
                    ORDER BY hv_car_details.car_d_id DESC ";
                $car_detail = $this->mdl_dal->select_data($sql);

                $total_rows = count($car_detail);

                $car_detail = array();

                $sql = "SELECT  hv_car_details.*, hv_car_images.stored_file_name, hv_car_manufacturer.vm_name, hv_car_models.model_name FROM hv_car_details
                LEFT OUTER JOIN
                (
                    SELECT car_d_id, COUNT(car_d_id), stored_file_name
                    FROM hv_car_images
                    WHERE hv_car_images.horizon_id = " . $this->session->userdata('horizon_id') . "
                    AND hv_car_images.s_no = 0
                    GROUP BY car_d_id
                ) AS hv_car_images
                ON
                hv_car_images.car_d_id = hv_car_details.car_d_id
                     LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_details.vm_id
                LEFT OUTER JOIN hv_car_models ON hv_car_models.m_id = hv_car_details.m_id
                    WHERE hv_car_details.horizon_id = " . $this->session->userdata('horizon_id') . " 
                    ORDER BY hv_car_details.car_d_id DESC 
                    LIMIT " . $offset . ", " . $this->limit;

                $car_detail = $this->mdl_dal->select_data($sql);
            } else {

                $sql = "SELECT  hv_car_details.*, hv_car_images.stored_file_name, hv_car_manufacturer.vm_name, hv_car_models.model_name FROM hv_car_details
                LEFT OUTER JOIN
                (
                    SELECT car_d_id, COUNT(car_d_id), stored_file_name
                    FROM hv_car_images
                    WHERE hv_car_images.horizon_id = " . $this->session->userdata('horizon_id') . "
                    AND hv_car_images.s_no = 0
                    GROUP BY car_d_id
                ) AS hv_car_images
                ON
                hv_car_images.car_d_id = hv_car_details.car_d_id
                     LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_details.vm_id
                LEFT OUTER JOIN hv_car_models ON hv_car_models.m_id = hv_car_details.m_id 
                WHERE (acc_no LIKE CONCAT('%', ?, '%') OR vm_name LIKE CONCAT('%', ?, '%') OR model_name LIKE CONCAT('%', ?, '%') OR carname LIKE CONCAT('%', ?, '%') OR carprice LIKE CONCAT('%', ?, '%'))
                AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id');

                $params = array("acc_no" => $search_term, "vm_name" => $search_term, "model_name" => $search_term, "carname" => $search_term, "carprice" => $search_term);
                $total_rows = $this->mdl_dal->select_num_rows($sql, $params);

                $car_detail = array();

                $sql = "SELECT  hv_car_details.*, hv_car_images.stored_file_name, hv_car_manufacturer.vm_name, hv_car_models.model_name FROM hv_car_details
                LEFT OUTER JOIN
                (
                    SELECT car_d_id, COUNT(car_d_id), stored_file_name
                    FROM hv_car_images
                    WHERE hv_car_images.horizon_id = " . $this->session->userdata('horizon_id') . "
                    AND hv_car_images.s_no = 0
                    GROUP BY car_d_id
                ) AS hv_car_images
                ON
                hv_car_images.car_d_id = hv_car_details.car_d_id
                     LEFT OUTER JOIN hv_car_manufacturer ON hv_car_manufacturer.vm_id = hv_car_details.vm_id
                LEFT OUTER JOIN hv_car_models ON hv_car_models.m_id = hv_car_details.m_id 
                WHERE (acc_no LIKE CONCAT('%', ?, '%') OR vm_name LIKE CONCAT('%', ?, '%') OR model_name LIKE CONCAT('%', ?, '%') OR carname LIKE CONCAT('%', ?, '%') OR carprice LIKE CONCAT('%', ?, '%'))
                AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id') . " 
                LIMIT " . $offset . ", " . $this->limit;

                $params = array("acc_no" => $search_term, "vm_name" => $search_term, "model_name" => $search_term, "carname" => $search_term, "carprice" => $search_term);
                $car_detail = $this->mdl_dal->select_data2($sql, $params);
            }

            $res['offset'] = $offset;
            $res['library'] = $car_detail;


            $this->load->library('pagination');

            $config['base_url'] = base_url() . 'index.php/car_detail/select';
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
        $new_id = 0;

        $sql = "SELECT MAX(car_d_id) AS max_id 
        FROM hv_car_details";

        $res = $this->mdl_dal->select_data($sql);

        if ($res[0]['max_id'] == "" || $res[0]['max_id'] == null) {
            $new_id = 1;
        } else {
            $new_id = ((int)$res[0]['max_id'] + 1);
        }
        //echo $new_id;
        return $new_id;
    }

    private function generate_new_acc_no()
    {
        $num = "";
        $new_no = "";

        $sql = "SELECT MAX( CAST(acc_no AS UNSIGNED) ) AS max_no 
        FROM hv_car_details
        WHERE horizon_id = " . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        if ($res[0]['max_no'] == "" || $res[0]['max_no'] == null) {
            $num = "1";
        } else {
            $num = (int)$res[0]['max_no'];
            $num = $num + 1;
        }
        $new_no = str_pad($num, 0, "0", STR_PAD_LEFT);
        return $new_no;
    }


    public function select_active()
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_details WHERE hv_car_details.active = 1 AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    public function select_by_id($id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_details WHERE dep_id = " . $id . "  AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id');

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    public function select_by_dep_type_id($dep_type_id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_details WHERE horizon_id = " . $this->session->userdata('horizon_id') . " AND dep_type_id = " . $dep_type_id;

        $res['arr'] = $this->mdl_dal->select_data($sql);

        echo json_encode($res);

    }

    private function get_by_id($car_d_id)
    {
        $res = array();

        $horizon_id = $this->session->userdata('horizon_id');

        // $sql = "SELECT * FROM hv_car_details 
        // WHERE car_d_id = ? 
        // AND horizon_id = ?";

        $sql = "SELECT hv_car_bodytype_details.*, si_countries_details.*, 
                hv_car_details.*
                FROM
                  hv_car_details
                  LEFT JOIN hv_car_bodytype_details ON hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id
                  LEFT JOIN si_countries_details ON si_countries_details.car_d_id = hv_car_details.car_d_id
                WHERE
                hv_car_details.car_d_id = ? AND hv_car_details.horizon_id = ?";

        $params = array('car_d_id' => $car_d_id, 'horizon_id' => $horizon_id);

        $res = $this->mdl_dal->select_data2($sql, $params);

        return $res;

    }


    //accession register details functionality start here
    public function accession_register_view()
    {

        if ($this->session->userdata('user_id') == "") {

            redirect(base_url() . 'index.php/login/', 'refresh');


        } else {

            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
           

            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->
            userdata('horizon_id'));

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
                }

            }

            if ($this->read_permission) {
                $this->load->view('accession_register_view', $user_data);
            } else {

                $this->load->view('nopermission', $user_data); //nopermission
            }
        }
    }

    public function select_accession_register_by_status()
    {
        $res = array();
        $book_status = $this->input->get('book_status');
        //echo $book_status; exit();

        $offset = $this->uri->segment(3, 0);
        $car_detail = array();

        $sql = "SELECT * FROM hv_car_details
        WHERE hv_car_details.book_status = " . $book_status . "
        AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id');

       

        $car_detail = $this->mdl_dal->select_data($sql);
        $total_rows = count($car_detail);

        $car_detail = array();
        $sql = "SELECT * FROM hv_car_details
        WHERE hv_car_details.book_status = " . $book_status . "
        AND hv_car_details.horizon_id = " . $this->session->userdata('horizon_id') . " LIMIT " . $offset . ", " . $this->limit;
        $car_detail = $this->mdl_dal->select_data($sql);

        $res['car_detail'] = $car_detail;

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/car_detail/select_accession_register_by_status';
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
    }

    //details page functionality
    public function accession_register_detail()
    {
        if ($this->session->userdata('user_id') == "") {
            redirect(base_url() . 'index.php/login/', 'refresh');

        } else {
            $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
           

            $user_data['arr_current_school'] = $this->get_corrent_school($this->session->
            userdata('horizon_id')); 

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
                }

            }

            if ($this->read_permission) {
                $car_d_id = $this->input->get('car_d_id');
                $book_status = $this->input->get('book_status');

                $user_data['arr_user'] = $this->get_user_data($this->session->userdata('user_id'));
                // in this array get user first nam, an institutes list
                $user_data['arr_current_school'] = $this->get_corrent_school($this->session->
                userdata('horizon_id')); // in this array get currect institute id and name only.


                $user_data['book_info'] = $this->select_info_by_id($car_d_id);
                $user_data['borrower_info'] = $this->borrower_details($car_d_id);
                $user_data['car_d_id'] = $car_d_id;
                $user_data['book_status'] = $book_status;

                $this->load->view('accession_register_detail', $user_data);
            } else {

                $this->load->view('nopermission', $user_data); //nopermission
            }
        }
    }

    private function select_info_by_id($car_d_id)
    {
        ///
        $data = array();

        $sql = "SELECT * FROM hv_car_details
        WHERE hv_car_details.car_d_id = " . $car_d_id . "
        AND hv_car_details.horizon_id =" . $this->session->userdata('horizon_id');

        $res = $this->mdl_dal->select_data($sql);

        if (count($res) < 1) {
            redirect(base_url() . 'index.php/car_detail/accession_register_view', 'refresh');
        }

        return $res;
    }

    //details functionality end here

//upload car images start here
   
 public function upload_attachment()
    {
        $horizon_id = $this->session->userdata('horizon_id');

        $file = 'file';
        $car_d_id = $this->security->xss_clean($this->input->post("car_d_id2"));

        $config['max_size'] = '10240';
        $config['upload_path'] = realpath("../../uploads");
        $config['allowed_types'] = '*';//'jpg|png|gif|bmp';
        $config['encrypt_name'] = true;
        //$config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];
        
        $file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

        $file_ext_change = $file_name_wo_ext . ".png";

        $config['file_name'] = $file_ext_change;
        
         //echo 'change file ext after';
            
        //var_dump($config);

        $file_type = end((explode(".", $_FILES['file']['name'])));

        $allowed_types = ['JPG','jpg', 'jpeg', 'png', 'gif'];

        if(!in_array($file_type, $allowed_types))
        {
            echo "Invalid file type.";
            http_response_code(500);
            exit();
        }
        

        $lib = $this->load->library('upload', $config);

      

        if( $this->upload->do_upload($file) )
        {
            $arr_upload_info = $this->upload->data();
        

            $old_image = $this->db->query("SELECT * FROM `hv_car_images` where car_d_id='".$car_d_id."' ORDER BY `s_no` DESC ")->row_array();
            
            
            if(is_null($old_image) == true){
                
                $car_image = $old_image_s_no['s_no'] = 0;
                
            }else{
                $car_image = $old_image['s_no']+1;
            }
            
            //var_dump($old_image);

            //--------------------

            

            $filename = $arr_upload_info['file_name'];
            
            $file_name_wo_ext = pathinfo($filename, PATHINFO_FILENAME);

            //var_dump($file_name_wo_ext);
            //echo 'check';
            //var_dump($file_type);

            $file_ext_change = $file_name_wo_ext . ".png";
            
            //echo 'change file ext after';
            
            //var_dump($file_ext_change);
            
            //var_dump($filename);

              $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $file_ext_change;
              //var_dump($source_path);

              //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/dv/uploads/thumbnail/';
              $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

              //var_dump($target_path);

              $config_manip = array(
                  'image_library' => 'gd2',
                  'source_image' => $source_path,
                  'new_image' => $target_path,
                  'maintain_ratio' => TRUE,
                  'create_thumb' => TRUE,
                  'thumb_marker' => '',
                  'quality' => '75%',
                  'width' => 540,
                  'height' => 357
              );

            //var_dump($config_manip);

              $this->load->library('image_lib', $config_manip);
              if (!$this->image_lib->resize()) {
                  echo $this->image_lib->display_errors();
              }

              $this->image_lib->clear();
              //exit();

            //---------------------


              $data['user_file_name'] = $arr_upload_info['orig_name'];
              //$data['stored_file_name'] = $arr_upload_info['file_name'];
              $data['stored_file_name'] = $file_ext_change;
              $data['file_path'] = $arr_upload_info['full_path'];
              $data['upload_date'] = date("Y-m-d");
              $data['car_d_id'] = $car_d_id;
              $data['horizon_id'] = $horizon_id;      
              $data['s_no'] = $car_image;  
              
              //var_dump($data['s_no']); //exit();
            
            
            $query['query_type'] = "insert";
            $query['table_name'] = "hv_car_images";
            $query['query_data'] = $data;

            $this->mdl_dal3->send_query($query);
            
            $res = $this->mdl_dal3->execute_queries();

            

            if(!$res['result'])
            {
                $uploaded_file = $arr_upload_info['full_path'];
                unlink($uploaded_file);
                echo "Image not saved, please try agian.";
                http_response_code(500);
            }

        } else {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            http_response_code(500);
        }
    }
    
    public function upload_attachment_featured_Image_add()
    {
        $horizon_id = $this->session->userdata('horizon_id');

        $file = 'file';
        $car_d_id = $this->security->xss_clean($this->input->post("car_d_id2"));

        $config['max_size'] = '5000';
        $config['upload_path'] = realpath("../../uploads/thumbnail/");
        $config['allowed_types'] = '*';//'jpg|png|gif|bmp';
        $config['encrypt_name'] = true;
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
        

        $lib = $this->load->library('upload', $config);

      

        if( $this->upload->do_upload($file) )
        {
            $arr_upload_info = $this->upload->data();
        

            //--------------------

            

            $filename = $arr_upload_info['file_name'];

             //$file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $file_name_wo_ext = pathinfo($filename, PATHINFO_FILENAME);

            var_dump($file_name_wo_ext);
            echo 'check';
            var_dump($file_type);

            $file_ext_change = $file_name_wo_ext . ".png";
            
            echo 'change file ext after';
            
            var_dump($file_ext_change);
            //exit();

              $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/thumbnail/' . $file_ext_change;
              var_dump($source_path);

              //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/dv/uploads/thumbnail/';
              $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/thumbnail/';

              var_dump($target_path);

               $config_manip = array(
                  'image_library' => 'gd2',
                  'source_image' => $source_path,
                  'new_image' => $target_path,
                  'maintain_ratio' => TRUE,
                  'create_thumb' => TRUE,
                  'thumb_marker' => '',
                  'quality' => '100%',
                  'width' => 300,
                  'height' => 300
              );

            var_dump($config_manip);

              $this->load->library('image_lib', $config_manip);
              if (!$this->image_lib->resize()) {
                  echo $this->image_lib->display_errors();
              }

              $this->image_lib->clear();
              //exit();

            //---------------------

 $data['user_file_name'] = $arr_upload_info['orig_name'];
              //$data['stored_file_name'] = $arr_upload_info['file_name'];
            $data['stored_file_name'] = $file_ext_change;
              $data['file_path'] = $arr_upload_info['full_path'];
              $data['upload_date'] = date("Y-m-d");
              $data['car_d_id'] = $car_d_id;
              $data['horizon_id'] = $horizon_id;
              $data['featured_iamge'] = 1;      
              //$data['s_no'] = ;  
              
              //var_dump($data['s_no']); //exit();
            
            
            $query['query_type'] = "insert";
            $query['table_name'] = "hv_car_home_page_images";
            $query['query_data'] = $data;



            //send update query in transaction
            $this->mdl_dal3->send_query($query);
        
            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

            //$res = $this->mdl_dal->update_data('si_library_accession_register', $setdata, $whereclause);          
            
            // $data['attachment_type'] = "File";
            // $data['user_file_name'] = $arr_upload_info['client_name'];
            // $data['stored_file_name'] = $arr_upload_info['file_name'];
            // $data['link_url'] = null;
            // $data['accession_register_id'] = $accession_register_id;            
            // $data['school_id'] = $school_id;              
            
            // $query['query_type'] = "insert";
            // $query['table_name'] = "si_plp_plps_of_books_attachements";
            // $query['query_data'] = $data;
    
            // $this->mdl_dal3->send_query($query);
            
            // $res = $this->mdl_dal3->execute_queries();
            
            //sleep(1);
    
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


    public function upload_attachment_for_featured_Image()
    {
        $horizon_id = $this->session->userdata('horizon_id');
            
        $file = 'file';    
        $config['max_size'] = '5120';
        //$config['upload_path'] = './uploads/books';
        $config['upload_path'] = realpath("../../uploads/thumbnail/");
        $config['allowed_types'] = '*';//'jpg|png|gif|jpeg';
        //$config['encrypt_name'] = true;
        //$config['file_name'] = $horizon_id . "_" . $_FILES['file']['name'];
        
        $file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        
        //var_dump($file_name_wo_ext);

        $file_ext_change = $file_name_wo_ext . ".png";

        $config['file_name'] = $file_ext_change;
        
         //echo 'change file ext after';
            
            //var_dump($config['file_name']);


        //$file_type = end((explode(".", $_FILES['file']['name'])));
        $file_type = end((explode(".", $config['file_name'])));

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
            
            $car_d_id = str_replace('"', "", $this->input->post('car_featured_id_for_upload'));

           //var_dump($car_d_id);
          //var_dump($arr_upload_info['file_name']);
    
            //--------------------

            $filename = $arr_upload_info['file_name'];
            
            //$file_name_wo_ext = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $file_name_wo_ext = pathinfo($filename, PATHINFO_FILENAME);

            //var_dump($file_name_wo_ext);
            //echo 'check';
            //var_dump($file_type);

            $file_ext_change = $file_name_wo_ext . ".png";
            
            //echo 'change file ext after';
            
            //var_dump($file_ext_change);
            
            //var_dump($filename);

              $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/thumbnail/' . $file_ext_change;
              //var_dump($source_path);

              //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/dv/uploads/thumbnail/';
              $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/thumbnail/';

              //var_dump($target_path);

              $config_manip = array(
                  'image_library' => 'gd2',
                  'source_image' => $source_path,
                  'new_image' => $target_path,
                  'maintain_ratio' => TRUE,
                  'create_thumb' => TRUE,
                  'thumb_marker' => '',
                  'quality' => '100%',
                  'width' => 300,
                  'height' => 300
              );

            //var_dump($config_manip);

              $this->load->library('image_lib', $config_manip);
              if (!$this->image_lib->resize()) {
                  echo $this->image_lib->display_errors();
              }

              $this->image_lib->clear();
              //exit();

            //---------------------

          
        // exit();

                $data['user_file_name'] = $arr_upload_info['orig_name'];
              $data['stored_file_name'] = $file_ext_change;
              $data['file_path'] = $arr_upload_info['full_path'];
              $data['upload_date'] = date("Y-m-d");
              $data['car_d_id'] = $car_d_id;
              $data['horizon_id'] = $horizon_id;
              $data['featured_iamge'] = 1;      
              //$data['s_no'] = ;  
              
              //var_dump($data['s_no']); //exit();
            
            
            $query['query_type'] = "insert";
            $query['table_name'] = "hv_car_home_page_images";
            $query['query_data'] = $data;



            //send update query in transaction
            $this->mdl_dal3->send_query($query);
        
            $res = $this->mdl_dal3->execute_queries();

            sleep(1);

            //$res = $this->mdl_dal->update_data('si_library_accession_register', $setdata, $whereclause);          
            
            // $data['attachment_type'] = "File";
            // $data['user_file_name'] = $arr_upload_info['client_name'];
            // $data['stored_file_name'] = $arr_upload_info['file_name'];
            // $data['link_url'] = null;
            // $data['accession_register_id'] = $accession_register_id;            
            // $data['school_id'] = $school_id;              
            
            // $query['query_type'] = "insert";
            // $query['table_name'] = "si_plp_plps_of_books_attachements";
            // $query['query_data'] = $data;
    
            // $this->mdl_dal3->send_query($query);
            
            // $res = $this->mdl_dal3->execute_queries();
            
            //sleep(1);
    
            if ($res['result']) {
                echo json_encode("true");
            } else {
                unlink($arr_upload_info['full_path']);
                echo $res['msg'];
                http_response_code(500);
            }
        } else {
            $upload_errors['errors'] = $this->upload->display_errors();
            //var_dump($upload_errors);
            echo "Error in uploading file. " . $this->upload->display_errors();
            http_response_code(500);
        }
    }


    public function delete_attachment()
    {
        $car_d_id = $this->security->xss_clean($this->input->post("car_d_id"));
        $stored_file_name = $this->security->xss_clean($this->input->post("stored_file_name"));

        $sql = "SELECT * FROM hv_car_images
        WHERE car_d_id = ?
        AND stored_file_name = ?
        AND horizon_id = " . $this->session->userdata('horizon_id');
        $params = array($car_d_id, $stored_file_name);
        $attached_file = $this->mdl_dal->select_data2($sql, $params);

        if (count($attached_file) > 0) {
            if (file_exists($attached_file[0]['file_path'])) {

                if (!unlink($attached_file[0]['file_path'])) {
                    echo "Error in deleting file.";
                    http_response_code(500);
                } else {
                    $wheredata['car_d_id'] = $car_d_id;
                    $wheredata['stored_file_name'] = $stored_file_name;
                    $wheredata['horizon_id'] = $this->session->userdata('horizon_id');
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }     

                    $res = $this->mdl_dal->delete_data('hv_car_images', $wheredata);
                    $all_images = $this->db->query("SELECT * FROM `hv_car_images` where car_d_id='".$car_d_id."' ")->result_array();
                    for($i=0; $i<count($all_images); $i++)
                    {
                      $sql = "UPDATE hv_car_images SET s_no='".$i."' WHERE id='".$all_images[$i]['id']."'";
                      $this->db->query($sql);
                    }
                    
                    
                    
                    
                    
                    if ($res == true) {
                        echo $res;
                    } else {
                        http_response_code(500);                
                        echo "Error occurred";
                    }                    
                }
            } else {
                echo "Image does not exist.";
            }
        } else {
            echo "Image does not exist.";
        }
    }
    
    public function delete_attachment_featured_image()
    {
        $car_d_id = $this->security->xss_clean($this->input->post("car_d_id"));
        $stored_file_name = $this->security->xss_clean($this->input->post("stored_file_name"));

        $sql = "SELECT * FROM hv_car_home_page_images
        WHERE car_d_id = ?
        AND stored_file_name = ?
        AND horizon_id = " . $this->session->userdata('horizon_id');
        $params = array($car_d_id, $stored_file_name);
        $attached_file = $this->mdl_dal->select_data2($sql, $params);

        if (count($attached_file) > 0) {
            if (file_exists($attached_file[0]['file_path'])) {

                if (!unlink($attached_file[0]['file_path'])) {
                    echo "Error in deleting file.";
                    http_response_code(500);
                } else {
                    $wheredata['car_d_id'] = $car_d_id;
                    $wheredata['stored_file_name'] = $stored_file_name;
                    $wheredata['horizon_id'] = $this->session->userdata('horizon_id');
                    
                    
                    foreach($attached_file as $file)
                        {
                            if (file_exists($file['file_path'])) {
                                unlink($file['file_path']);
                            }
                        }   

                    $res = $this->mdl_dal->delete_data('hv_car_home_page_images', $wheredata);
                    
                      
                    
                
                    if ($res == true) {
                        echo $res;
                    } else {
                        http_response_code(500);                
                        echo "Error occurred";
                    }                    
                }
            } else {
                echo "Image does not exist.";
            }
        } else {
            echo "Image does not exist.";
        }
    }

    private function delete_attachments($attached_files)
    {
        foreach($attached_files as $file)
        {
            if (file_exists($file['file_path'])) {
                unlink($file['file_path']);
            }
        }        
    }

    private function get_attached_files_list($car_d_id)
    {
        $sql = "SELECT * FROM hv_car_images
        WHERE car_d_id = ?
        AND horizon_id = " . $this->session->userdata('horizon_id');
        $params = array($car_d_id);
        $files_list = $this->mdl_dal->select_data2($sql, $params);

        return $files_list;
    }

    public function select_attached_files_list()
    {
        if ($this->check_permission("read", false)) {
            $car_d_id = $this->security->xss_clean($this->input->get("car_d_id"));

            $files_list['files_list'] = $this->get_attached_files_list($car_d_id);

            echo json_encode($files_list);
        } else {
            //send error to user as forbiddon
            http_response_code(403);
        }
    }
    
    private function get_attached_files_list_featured_iamge($car_d_id)
    {
        $sql = "SELECT * FROM hv_car_home_page_images
        WHERE car_d_id = ?
        AND horizon_id = " . $this->session->userdata('horizon_id');
        $params = array($car_d_id);
        $files_list = $this->mdl_dal->select_data2($sql, $params);

        return $files_list;
    }

    public function select_attached_files_list_featured_image()
    {
        if ($this->check_permission("read", false)) {
            $car_d_id = $this->security->xss_clean($this->input->get("car_d_id"));

            $files_list['files_list'] = $this->get_attached_files_list_featured_iamge($car_d_id);

            echo json_encode($files_list);
        } else {
            //send error to user as forbiddon
            http_response_code(403);
        }
    }

    //upload car images end here
    
    
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
    
     public function test()
    {
        echo realpath("../../uploads");

    }
    
    public
    function select_bodytype()
    {
        
            ///
            $sql = "SELECT * FROM hv_car_bodytype WHERE hv_car_bodytype.horizon_id = " . $this->session->userdata('horizon_id');

            $res['arr'] = $this->mdl_dal->select_data($sql);

            echo json_encode($res);
        
    }

    public
    function select_countryList()
    {
        
            ///
            $sql = "SELECT * FROM si_countries WHERE si_countries.horizon_id = " . $this->session->userdata('horizon_id');

            $res['arr'] = $this->mdl_dal->select_data($sql);

            echo json_encode($res);
        
    }
 
   

   


}

?>