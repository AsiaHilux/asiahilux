<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_dal');

        $this->load->model('mdl_dal3');

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function sync_students_data()
    {
        
        $apikey = $this->input->post("apikey");
        
        if($apikey)
        {
            $studetns = array();
            
            $sql = "SELECT student_id, first_name, last_name, father_name, 
            official_id, mobile, father_mobile 
            FROM si_students
            WHERE active = 1
            AND horizon_id = ".$apikey."
            ORDER BY first_name";
            
            $studetns = $this->mdl_dal->select_data($sql);
            
            $result['res'] = "Succeded";
            $result['data'] = $studetns;
            echo json_encode($result);
            exit();
        } else {
            $result['res'] = "Failed";
            $result['data'] = null;
            echo json_encode($result);
            exit();
        }
    }
    
    public function sync_employees_data()
    {
        
        $apikey = $this->input->post("apikey");
        
        if($apikey)
        {
            $employees = array();
            
            $sql = "SELECT emp_id, emp_first_name, emp_last_name, emp_father_name, 
            official_id, emp_mobile 
            FROM si_employees
            WHERE active = 1
            AND horizon_id = ".$apikey."
            ORDER BY emp_first_name";
            
            $employees = $this->mdl_dal->select_data($sql);
            
            $result['res'] = "Succeded";
            $result['data'] = $employees;
            echo json_encode($result);
            exit();
        } else { 
            $result['res'] = "Failed";
            $result['data'] = null;
            echo json_encode($result);
            exit();
        }
    }
    
    public function save_atten_data()
    {
        $apikey = $this->input->post("apikey", true);
        $atten_data_json = $this->input->post("atten_data_json", true);
        
        if($apikey && $atten_data_json)
        {
            $arr_atten_data = json_decode($atten_data_json, true);
            
            if(is_array($arr_atten_data))
            {
                if(count($arr_atten_data) < 1)
                {
                    $result['res'] = "No data supplied.";
                    $result['data'] = null;
                    echo json_encode($result);
                    exit();
                }
                
                $atten_employees = array();
                $atten_students = array();
                $attendance_date = date("Y-m-d", strtotime($arr_atten_data[0]['atten_date']));
                
                foreach($arr_atten_data as $ad)
                {
                    /*
                    $data = array();
                    $query = array();
                    
                    $data['person_id'] = $ad['person_id'];
                    $data['first_name'] = $ad['first_name'];                    
                    $data['last_name'] = $ad['last_name'];
                    $data['user_type'] = $ad['user_type'];
                    $data['atten_date'] = date("Y-m-d", strtotime($ad['atten_date']));
                    $data['atten_log_data'] = date("Y-m-d H:i:s", strtotime($ad['atten_log_data']));                    
                    $data['horizon_id'] = $apikey;
                    
                    $query['query_type'] = "insert";
                    $query['table_name'] = "api_atten_machine_test";
                    $query['query_data'] = $data;
            
                    $this->mdl_dal3->send_query($query);
                    */
                    
                    if($ad['user_type'] == "Staff")
                    {
                        array_push($atten_employees, $ad);
                    }
                    if($ad['user_type'] == "Student")
                    {
                        array_push($atten_students, $ad);
                    }    
                }
                
                /////// preparing to insert employees attendance data                
                //get ids for employees
                $emps_count = count($atten_employees);
                $count = 0;
                $emp_ids = "";
                
                foreach($atten_employees as $emp)
                {
                    $count++;
                    $emp_ids .= $emp['person_id'];
                    
                    if($count < $emps_count)
                    {
                        $emp_ids .= ",";
                    }
                }
                
                if($emp_ids == "")
                {
                    $emp_ids = "0";
                }
                
                //select all active employees with department and employee ids.
                //than inser their attendance into si_employee_attendance table.
                $sql = "SELECT emp_id, dep_id, employee_working_days_group_id
                FROM si_employees
                WHERE active = 1
                AND emp_id IN(".$emp_ids.")
                AND horizon_id = " . $apikey;
                
                $employees = $this->mdl_dal->select_data($sql);
                
                if( count($employees) > 0 )
                {
                    //delete all previous attendance data of this date if exist.
                    $query = array();
                    $query_text = "DELETE FROM si_employee_attendance
                    WHERE attendance_date = '" . $attendance_date . "'
                    AND emp_id IN(".$emp_ids.")
                    AND status IN('P')
                    AND horizon_id = " . $apikey;
                    
                    $query['query_type'] = 'custom';
                    $query['query_text'] = $query_text;
                    $this->mdl_dal3->send_query($query);
                    
                    //loop for attendance table
                    foreach($employees as $emp)
                    {
                        foreach($atten_employees as $att_emp)
                        {
                            if($att_emp['person_id'] == $emp['emp_id'])
                            {
                                $arr_shift_exist = array();
                                $arr_shift_exist = $this->get_employee_shift_timing($emp['employee_working_days_group_id'], $attendance_date, $apikey);
                                if($arr_shift_exist['exist'])
                                {
                                    $status = "P";
                                    $data = array();
                                        
                                    $data['emp_id'] = $emp['emp_id'];
                                    $data['dep_id'] = $emp['dep_id'];
                                    $data['shift_timing_id'] = $arr_shift_exist['shift_timing_id'];
                                    $data['attendance_date'] = $attendance_date;
                                    $data['status'] = $status;
                                    $data['leave_type_id'] = 0;
                                    $data['leave_count'] = 0;
                                    $data['horizon_id'] = $apikey;
                                    
                                    $query['query_type'] = "insert";
                                    $query['table_name'] = "si_employee_attendance";
                                    $query['query_data'] = $data;
                                    $this->mdl_dal3->send_query($query);
                                }
                                break;                                
                            }
                        }
                        // in case of posting as present of this employee
                        // and 'L', 'HD' or 'A' status is exist
                        // we should remove the attendance data with 'P' status.
                        $query = array();
                        $query_text = "DELETE emp_atten1 
                        FROM si_employee_attendance emp_atten1
                        INNER JOIN si_employee_attendance emp_atten2
                        ON emp_atten1.emp_id = emp_atten2.emp_id                       
                        WHERE emp_atten1.attendance_date = '" . $attendance_date . "'
                        AND emp_atten1.emp_id = ".$emp['emp_id']."
                        AND emp_atten1.status IN('P')
                        AND emp_atten1.horizon_id = " .$apikey."
                        AND emp_atten2.attendance_date = '" . $attendance_date . "'
                        AND emp_atten2.emp_id = ".$emp['emp_id']."
                        AND emp_atten2.status IN('A', 'L', 'HD')
                        AND emp_atten2.horizon_id = ".$apikey;
                        
                        $query['query_type'] = 'custom';
                        $query['query_text'] = $query_text;
                        $this->mdl_dal3->send_query($query);
                    }
                    
                    //delete all previous attendance detail data of this date if exist.
                    $query = array();
                    $query_text = "DELETE FROM si_employee_attendance_detail
                    WHERE attendance_date = '" . $attendance_date . "'
                    AND emp_id IN(".$emp_ids.")
                    AND horizon_id = " . $apikey;
                    
                    $query['query_type'] = 'custom';
                    $query['query_text'] = $query_text;
                    $this->mdl_dal3->send_query($query);
                    
                    //loop for attendance detail table
                    foreach($employees as $emp)
                    {
                        $arr_shift_exist = array();
                        $arr_shift_exist = $this->get_employee_shift_timing($emp['employee_working_days_group_id'], $attendance_date, $apikey);
                        if($arr_shift_exist['exist']) //in case of shift not exist, no attendance data will be inserted.
                        {
                            //collect all timing of this day into one array.
                            $arr_one_emp_timings = array();
                            foreach($atten_employees as $att_emp)
                            {
                                if($att_emp['person_id'] == $emp['emp_id'])
                                {
                                    $arr_emp_time = array();
                                    
                                    $arr_emp_time['atten_time'] = date("Y-m-d H:i:s", strtotime($att_emp['atten_log_data']));
                                    
                                    array_push($arr_one_emp_timings, $arr_emp_time);
                                }                                
                            }
                            
                            $count = count($arr_one_emp_timings);
                            for($i = 0; $i < $count; $i++)
                            {
                                if(($i+1) < $count)
                                {
                                    $query = array();
                                    $data = array();
                                    
                                    $data['emp_id'] = $emp['emp_id'];
                                    $data['dep_id'] = $emp['dep_id'];
                                    $data['shift_timing_id'] = $arr_shift_exist['shift_timing_id'];
                                    $data['attendance_date'] = $attendance_date;
                                    $data['in_time'] = $arr_one_emp_timings[$i]['atten_time'];
                                    $data['out_time'] = $arr_one_emp_timings[$i+1]['atten_time'];;
                                    $data['horizon_id'] = $apikey;
                                    
                                    $query['query_type'] = "insert";
                                    $query['table_name'] = "si_employee_attendance_detail";
                                    $query['query_data'] = $data;
                                    $this->mdl_dal3->send_query($query);
                                    $i++;
                                } else {
                                    $query = array();
                                    $data = array();
                                    
                                    $data['emp_id'] = $emp['emp_id'];
                                    $data['dep_id'] = $emp['dep_id'];
                                    $data['shift_timing_id'] = $arr_shift_exist['shift_timing_id'];
                                    $data['attendance_date'] = $attendance_date;
                                    $data['in_time'] = $arr_one_emp_timings[$i]['atten_time'];
                                    $data['out_time'] = null;
                                    $data['horizon_id'] = $apikey;
                                    
                                    $query['query_type'] = "insert";
                                    $query['table_name'] = "si_employee_attendance_detail";
                                    $query['query_data'] = $data;
                                    $this->mdl_dal3->send_query($query);
                                }           
                            }
                        }
                        // in case of posting as present of this employee
                        // and 'L', 'HD' or 'A' status is exist
                        // we should remove the attendance detail log data.
                        $query = array();
                        $query_text = "DELETE FROM si_employee_attendance_detail
                        WHERE attendance_date = '" . $attendance_date . "'
                        AND emp_id IN(
                            SELECT emp_id
                            FROM si_employee_attendance
                            WHERE attendance_date = '" . $attendance_date . "' 
                            AND emp_id = ".$emp['emp_id']."
                            AND status IN('A', 'L', 'HD')                            
                            AND horizon_id = " .$apikey."
                        )
                        AND horizon_id = " . $apikey;
                        
                        $query['query_type'] = 'custom';
                        $query['query_text'] = $query_text;
                        $this->mdl_dal3->send_query($query);
                    }
                }
                
                /////// preparing to insert students attendance data                
                //check timetable for this date, if exist, we proceed next.
                $sql = "SELECT * FROM si_timetables
                WHERE CAST('" . $attendance_date . "' AS DATE) BETWEEN start_date AND end_date
                AND horizon_id = " . $apikey;
                $timetable = $this->mdl_dal->select_data($sql);
                
                if(count($timetable) > 0)
                {
                    //get ids for students
                    $stds_count = count($atten_students);
                    $count = 0;
                    $std_ids = "";
                    
                    foreach($atten_students as $std)
                    {
                        $count++;
                        $std_ids .= $std['person_id'];
                        
                        if($count < $stds_count)
                        {
                            $std_ids .= ",";
                        }
                    }                    
                    if($std_ids == "")
                    {
                        $std_ids = "0";
                    }
                    //select all active students with class batch and student ids.
                    //than inser their attendance into si_attendance_daily table.
                    $sql = "SELECT student_id, class_id, batch_id
                    FROM si_students
                    WHERE active = 1
                    AND student_id IN(".$std_ids.")
                    AND horizon_id = " . $apikey;
                    
                    $students = $this->mdl_dal->select_data($sql);
                    
                    if( count($students) > 0 )
                    {
                        //delete all previous attendance data of this date if exist.
                        $query = array();
                        $query_text = "DELETE FROM si_attendance_daily
                        WHERE attendance_date = '" . $attendance_date . "'
                        AND student_id IN(".$std_ids.")
                        AND status IN('P')
                        AND horizon_id = " . $apikey;
                        
                        $query['query_type'] = 'custom';
                        $query['query_text'] = $query_text;
                        $this->mdl_dal3->send_query($query);
                        
                        //loop for insert into attendance table
                        foreach($students as $std)
                        {
                            foreach($atten_students as $std_atten)
                            {
                                if($std_atten['person_id'] == $std['student_id'])
                                {
                                    $status = "P";
                                    $data = array();
                                        
                                    $data['timetable_id'] = $timetable[0]['timetable_id'];
                                    $data['student_id'] = $std['student_id'];                                    
                                    $data['batch_id'] = $std['batch_id'];
                                    $data['class_id'] = $std['class_id'];
                                    $data['attendance_date'] = $attendance_date;
                                    $data['attendance_datetime'] = date("Y-m-d H:i:s", strtotime($std_atten['atten_log_data']));
                                    $data['status'] = $status;
                                    $data['horizon_id'] = $apikey;
                                    
                                    $query['query_type'] = "insert";
                                    $query['table_name'] = "si_attendance_daily";
                                    $query['query_data'] = $data;
                                    $this->mdl_dal3->send_query($query);
                                    break;                                
                                }
                            }
                            // in case of posting as present of this student
                            // and 'A' status is exist
                            // we should remove the attendance data with 'P' status.
                            $query = array();
                            $query_text = "DELETE atten_daily1 
                            FROM si_attendance_daily atten_daily1
                            INNER JOIN si_attendance_daily atten_daily2
                            ON atten_daily1.student_id = atten_daily2.student_id
                            WHERE atten_daily1.attendance_date = '" . $attendance_date . "'
                            AND atten_daily1.student_id = ".$std['student_id']."
                            AND atten_daily1.status IN('P')                            
                            AND atten_daily1.horizon_id = " .$apikey."
                            AND atten_daily2.attendance_date = '" . $attendance_date . "'
                            AND atten_daily2.student_id = ".$std['student_id']."
                            AND atten_daily2.status IN('A')                            
                            AND atten_daily2.horizon_id = " . $apikey;
                            
                            $query['query_type'] = 'custom';
                            $query['query_text'] = $query_text;
                            $this->mdl_dal3->send_query($query); 
                        }
                    }
                }
                
                $res = $this->mdl_dal3->execute_queries();
                    
                //sleep(1);
    
                if ($res['result'] == true) {
                    $result['res'] = "Succeded";
                    $result['data'] = null;
                    echo json_encode($result);
                    exit();
                } else {
                    $result['res'] = $res['msg'];
                    $result['data'] = null;
                    echo json_encode($result);
                    exit();
                }                
            } else {                
                $result['res'] = "Invalid data supplied";
                $result['data'] = null;
                echo json_encode($result);
                exit();
            }           
            
        } else {
            
            $result['res'] = "Failed";
            $result['data'] = null;
            echo json_encode($result);
            exit();
        }
    }
    
    private function get_employee_shift_timing($employee_working_days_group_id, $attendance_date, $horizon_id)
    {
        $result = array();        
        $weekday = 0;
        $day_shortname = date("D", strtotime($attendance_date));
        
        switch ($day_shortname) 
        {
            case "Mon":
                $weekday = 1;
                break;
            case "Tue":
                $weekday = 2;
                break;
            case "Wed":
                $weekday = 3;
                break;
            case "Thu":
                $weekday = 4;
                break;
            case "Fri":
                $weekday = 5;
                break;
            case "Sat":
                $weekday = 6;
                break;
            case "Sun":
                $weekday = 7;
                break;
        }        
        //get employee shift timing of this date.
        $sql = "SELECT shift_timing_id 
        FROM si_employee_working_days_group_detail 
        WHERE employee_working_days_group_id = " . $employee_working_days_group_id ."
        AND weekday_id = ".$weekday."
        AND is_working_day = 1
        AND horizon_id = " . $horizon_id;
        $shift_timing =  $this->mdl_dal->select_data($sql);
        
        if( count($shift_timing) > 0 )
        {
            $result['exist'] = true;
            $result['shift_timing_id'] = $shift_timing[0]['shift_timing_id'];
        } else {
            $result['exist'] = false;
            $result['shift_timing_id'] = "0";
        }
        
        return $result;
    }
    
    function testarr()
    {
        $arrmaster = array();        
        $arrchild = array();
        
        $arrchild['date'] = "20181009";
        $arrchild['time'] = "20181009 08:03:10";        
        array_push($arrmaster, $arrchild);
        
        $arrchild['date'] = "20181009";
        $arrchild['time'] = "20181009 08:04:19";        
        array_push($arrmaster, $arrchild);
        
        $arrchild['date'] = "20181009";
        $arrchild['time'] = "20181009 08:07:49";        
        array_push($arrmaster, $arrchild);
        
        var_dump($arrmaster);
        
        if(asort($arrmaster))
        {
            echo "sorted." . "<br />";
        }
        
        
        $count = count($arrmaster);
        $counter = 0;
        
        echo "<table border='1'>";        
        for($i = 0; $i < $count; $i++)
        {
            if(($i+1) < $count)
            {
                echo "<tr>";
                echo '<td>', $arrmaster[$i]['time'], '</td>';
                echo '<td>', $arrmaster[$i+1]['time'], '</td>';
                echo "<tr>";
                $i++;
            } else {
                echo "<tr>";
                echo '<td>', $arrmaster[$i]['time'], '</td>';
                echo '<td>&nbsp;</td>';
                echo "<tr>";
            }           
        }
        echo "</table>";
        //var_dump($arrmaster);
        
    }
    
}

?>

