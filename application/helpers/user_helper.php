<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function generate_password_hash($password, $salt) {
    return sha1($salt . $password);
}

function is_logged_in(){
    $ci =& get_instance();
    $user = $ci->session->userdata('user_id');
   
    if ($user) {
        return TRUE;
    }
    return FALSE;
}

function get_user_id_session(){
    $ci =& get_instance();
    $user_id = $ci->session->userdata('user_id');
    if ($user_id) {
        return $user_id;
    }
    return false;
}

function get_username_by_id($user_id){
    $ci =& get_instance();
    $username = $ci->Musers->get_username($user_id);
    return $username;
}

function get_logged_username(){
    $ci =& get_instance();
    $user_id = $ci->session->userdata('user_id');
    
    if ($user_id){ 
        $username = $ci->Musers->get_username($user_id);
        return $username;
    }
}

function check_if_admin()
{
    $ci =& get_instance();
    $user_id = $_SESSION['user_id'];
    $is_admin = $ci->Musers->check_is_admin($user_id);
    
    if($is_admin == 1)
       return true;
    else  
        return FALSE;
}

function can_view_edit_project($project_id, $user_id)
{
    $ci =& get_instance();
    $is_admin = check_if_admin($user_id);
    $my_projects = $ci->Mprojects->get_my_projects_id_array($user_id);
    
    if(in_array($project_id, $my_projects) || $is_admin)
        return true;
    else  
        return FALSE;
}

function get_user_level($user_id){
    $ci =& get_instance();
    $whereClause = array(
        'user_id' => $user_id,
        'active' => 'active'
    );
            
    $user_level = $ci->Mcrudcommon->get_Single_Field('role_id' , $whereClause , 'users');
    return $user_level[0]['role_id'];
}
