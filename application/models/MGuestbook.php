<?php

class MGuestBook extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function check_auth($user_name, $pass)
    {
        // check if email exists
        $query = $this->db->select('*')
            ->where('username', $user_name)
            ->where('IsActive', 1)
            ->get('users')
            ->result();


        if ($query) {
            return $query[0];
        }
        return false;
    }

    public function Insert_In_Table($tableName, $arr, $need_created_line_id = false)
    {
        if (!$need_created_line_id)
            return $this->db->insert($tableName, $arr);
        else {
            $query = $this->db->insert($tableName, $arr);
            return $this->db->insert_id();
        }
    }

    public function check_is_admin($user_id)
    {
        // check if email exists
        $query = $this->db->select('role')
            ->where('id', $user_id)
            ->where('IsActive', 1)
            ->get('users')
            ->result();


        if ($query && strtolower($query[0]->role) == 'admin') {
            return true;
        }
        return false;
    }

    public function get_single_field_from_table($fieldname, $tablename, $whereClause)
    {
        $query = $this->db->select($fieldname)
            ->where($whereClause)
            ->get($tablename)
            ->result_array();

        return $query[0]['username'];
    }

    public function get_all_rows_with_clause($tablename, $whereClause)
    {
        $query = $this->db->select('*')
            ->where($whereClause)
            ->get($tablename)
            ->result_array();

        return $query;
    }

    public function get_all_Entries()
    {
        $query = $this->db->select('bookentries.*, users.username')
            ->from('bookentries')
            ->join('users', 'users.id = bookentries.user_id')
            ->where('deleted',0)
            ->get()
            ->result_array();

        return $query;
    }

    public function delete_entry($id)
    {
        $whereClause=array(
            'id'=> $id
        );
        $update_arr = array(
            'deleted'=>1
        );

        $this->db->where($whereClause);
        $this->db->update('bookentries', $update_arr);
    }
}
