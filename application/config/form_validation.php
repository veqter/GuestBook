<?php

/**
 * This is where we store our validation rules. callback_x will run function x in the calling controller
 */

$config = array(
    'error_prefix' => '<div class="alert alert-danger" role="alert">',
    'error_suffix' => '</div>',
    //Login
    'login' =>  array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|min_length[5]|max_length[50]|valid_email|xss_clean'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[8]|max_length[100]|xss_clean'
        )
    ),
    'admin_setting' =>  array(
        array(
            'field' => 'd_licence',
            'label' => 'Default licences',
            'rules' => 'required|trim|min_length[1]|max_length[3]|is_numeric|xss_clean'
        ),
        array(
            'field' => 'd_storage',
            'label' => 'Default storage',
            'rules' => 'required|trim|min_length[1]|max_length[3]|is_numeric|xss_clean'
        )
    )
);
