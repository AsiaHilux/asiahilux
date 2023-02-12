<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_dal extends CI_Model
{
    ///
    ///
    private $query_list = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // below is the dynamic function for insert record
    // this function holds all values for INSERT sent by controller
    // and make the proper insert statement.
    public function insert_data($table_name, $data)
    {
        ///
        $res = $this->db->insert($table_name, $data);

        if ($res) {
            return true;
        } else {
            return false;
            //$res['msg'] = $this->db->_error_message();
            //return $res;
        }
        ///NEw
        // $res['result'] = $this->db->insert($table_name, $data);
        //$res['msg'] = $this->db->_error_message();
        //return $res;
    }

    public function insert_data_return_id($table_name, $data)
    {
        ///
        $res = $this->db->insert($table_name, $data);
        $new_id = $this->db->insert_id();

        if ($res) {
            return $new_id;
        } else {
            return false;
        }
        ///
    }

    // below is the dynamic function for update record
    // this function holds all SET and WHERE data for update sent by controller
    // and make the proper update statement.
    public function update_data($table_name, $set_data, $where_data)
    {
        ///
        $res = $this->db->update($table_name, $set_data, $where_data);

        if ($res) {
            return true;
        } else {
            return false;
        }
        ///
    }

    // below is the dynamic function for delete record
    // this function holds all WHERE data for delete sent by controller
    // and make the proper delete statement.
    public function delete_data($table_name, $where_data)
    {
        ///
        $res = $this->db->delete($table_name, $where_data);

        if ($res) {
            return true;
        } else {
            return false;
        }
        ///
    }
    

    public function select_data($sql)
    {
        ///
        $query = $this->db->query($sql);

        return $query->result_array();
    }
    
    public function select_data2($sql, $arr)
    {
        $query = $this->db->query($sql, $arr);
    
        return $query->result_array();
    }
    
    public function select_num_rows($sql, $arr)
    {
        $number_of_rows = 0;
        
        $query = $this->db->query($sql, $arr);
        
        $number_of_rows = $query->num_rows();
        
        return $number_of_rows;
    }
    
    public function create_temp_table_and_select_data($arr_queries)
    {
        ///
        foreach($arr_queries as $arr_query1)
        {
            if( $arr_query1['query_type'] == "create" )
            {
                $query = $this->db->query($arr_query1['query']);
            }
        }
        
        foreach($arr_queries as $arr_query2)
        {
            if( $arr_query2['query_type'] == "select" )
            {
                $query = $this->db->query($arr_query2['query']);
                break;
            }
        }

        return $query->result_array();
    }

}
