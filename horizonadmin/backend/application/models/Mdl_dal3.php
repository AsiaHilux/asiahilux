<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_dal3 extends CI_Model
{

    private $query_list = array();

    function __construct()
    {

        parent::__construct();

        $this->load->database();

    }
    
    public function send_query($query_data)
    {
        array_push($this->query_list, $query_data);
    }
    
    public function execute_queries()
    {
        //
        if( count($this->query_list) > 0 )
        {
            ///////////////////////////////////////////////////////////
            $result = array();

            $this->db->trans_start();
            
            $err_msg = "";
    
            foreach ($this->query_list as $query) {
    
                $params = array();
                if( isset($query['params']) )
                {
                    $params = $query['params'];
                }
                if ($query['query_type'] == 'insert') {
    
                    $this->db->insert($query['table_name'], $query['query_data']);
    
                }
                if ($query['query_type'] == 'update') {
    
                    $this->db->update($query['table_name'], $query['set_data'], $query['where_clause']);
    
                }
                if ($query['query_type'] == 'delete') {
    
                    $this->db->delete($query['table_name'], $query['where_clause']);
    
                }
                if($query['query_type'] == 'custom')
                {
                    $this->db->query($query['query_text'], $params);
                }
                $arr_error = $this->db->error();

                $err_msg = $arr_error['message'];
            }
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE)
            {
                $result['result'] = false;
                $result['msg'] = "Query Faild." . $err_msg;
            } else {
    
                $result['result'] = true;
                $result['msg'] = "Query executed successfuly.";
            }
            ///////////////////////////////////////////////////////////
        } else {
            $result['result'] = false;
            $result['msg'] = "No Query Executed.";
        }
        return $result;
        //
    }
}

?>