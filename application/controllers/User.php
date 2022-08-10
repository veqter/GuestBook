<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Loginss
     */

    public function add_entry()
    {
        $user_loggin_in  = is_logged_in();
        if (!$user_loggin_in) {
            redirect('login');
        }

        $user_id = get_user_id_from_session();
        $new_entry = $this->input->post('new_entry');
        $is_admin = $this->MGuestBook->check_is_admin($user_id);

        //run validation and if validatation result is true
        if ($this->form_validation->run('new_entry') == TRUE) {

            $new_entry_array = array(
                'user_id' => $user_id,
                'text' => $new_entry,
                'date' => date('Y-m-d H:i:s')
            );
            $new_entry_id = $this->MGuestBook->Insert_In_Table("bookentries", $new_entry_array, true);

            $loginActivity = array(
                'user_id' => $user_id,
                'message' => 'New Entry Added',
                'e_id' => $new_entry_id,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'date' => date('Y-m-d H:i:s')
            );
            //activity log update
            $this->MGuestBook->Insert_In_Table("activity_log", $loginActivity);
            //$this->session->set_flashdata('flash_msgSuccess', 'Entry Added Successfully....');

        } else {
            $data['new_entry'] = $new_entry;
        }

        $whereClause = array(
            'user_id' => $user_id,
            'deleted' => 0
        );
        $ListEntries = array();

        if ($is_admin) {
            $ListEntries =  $this->MGuestBook->get_all_Entries();
        } else {
            $ListEntries =  $this->MGuestBook->get_all_rows_with_clause('bookentries', $whereClause);
        }

        $data['ListEntries'] = $ListEntries;
        $data['is_admin'] = $is_admin;
        $data['title'] = ucfirst("User Entries");
        $data['viewFile'] = "user/add_entry";
        $this->load->view('template', $data);
    }

    public function delete_entry($id){
        $this->MGuestBook->delete_entry($id);
        $this->session->set_flashdata('flash_msgSuccess', 'Entry Deleted Successfully.');
        redirect('user/add_entry/');
    }
}
