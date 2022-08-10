<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function generate_password_hash($password, $salt)
{
    return sha1($salt . $password);
}

function is_logged_in()
{
    $ci = &get_instance();
    $user = $ci->session->userdata('user_id');

    if ($user) {
        return TRUE;
    }
    return FALSE;
}

function get_user_id_from_session()
{
    $ci = &get_instance();
    $user_id = $ci->session->userdata('user_id');
    if ($user_id) {
        return $user_id;
    }
    return false;
}

function check_if_admin()
{
    $ci = &get_instance();
    $user_id = $_SESSION['user_id'];
    $is_admin = $ci->MGuestBook->check_is_admin($user_id);

    if ($is_admin == 1)
        return true;
    else
        return FALSE;
}
