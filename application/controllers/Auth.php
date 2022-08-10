<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

   
    /**
     * Login
     */

    public function login()
    {
        //if user already loggin in then redirect to homepage
        $user_loggin_in  = is_logged_in();

        if ($user_loggin_in) {
            $user_id = get_user_id_session();
            redirect('user');
        }

        //get data from form
        $login_arr = array(
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('password')
        );

        //run validation and if validatation result is true
        if ($this->form_validation->run('login') == TRUE) {
            $whereClause = array(
                'username' => $login_arr['username'],
                'active' => 'active'
            );
            $user_id_exists = $this->Mcrudcommon->get_Single_Field('user_id', $whereClause, 'users');

            if ($user_id_exists) {
                //if user id exists then hash password and match it with database
                $passHash = $this->Mcrudcommon->get_Single_Field('password_hash', $whereClause, 'users');
                $passHash = $passHash[0]['password_hash'];
                if ($this->passwordhash->CheckPassword($login_arr['pass'], $passHash)) {
                    // if password hash matches
                    $user_id = $this->Musers->get_user_id($login_arr['username'], $passHash);
                    if ($user_id) {
                        $loginActivity = array(
                            'user_id' => $user_id,
                            'message' => 'User Login',
                            'username' => $login_arr['username'],
                            'ip' => $_SERVER['REMOTE_ADDR'],
                            'date' => date('Y-m-d H:i:s')
                        );
                        //activity log update - login(id,username,ip,datetime,message)
                        $this->Mcrudcommon->Insert_In_Table("activity_log", $loginActivity);

                        $sess_arr = array(
                            'user_id' => $user_id
                        );
                        //session user data
                        $this->session->set_userdata($sess_arr);

                        //if redirect present then get redirect or go to homepage set in user account
                        if (isset($_SESSION['login_redirect']) && $_SESSION['login_redirect'] != '') {
                            redirect($_SESSION['login_redirect']);
                        }

                        $data['login_data'] = $login_arr['username'];
                        $this->redirect_To_Homepage($user_id);
                    }
                } else {
                    $this->session->set_flashdata('flash_msgFail', 'Incorrect Password. Please try again.');
                    $data['login_data'] = $login_arr['username'];
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('flash_msgFail', 'Email Does not exists');
                $data['login_data'] = $login_arr['username'];
                redirect('login');
            }
        } else {
            //go to login page
            $data['login_data'] = $login_arr['username'];
            $data['title'] = ucfirst("Log In");
            $data['viewFile'] = "auth/login";
            $this->load->view('template', $data);
        }
    }

    /** logout **/
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        $this->session->set_flashdata('flash_msgSuccess', 'You have Logged out successfully.');
        redirect('login');
    }

    /**
     * Redirect user to his homepage which is saved in account setting.
     * @return $string
     */
    function generate_salt()
    {
        $source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $i = 0;
        $salt = '';
        $length = 40;

        while ($i < $length) {
            $salt .= substr($source, rand(1, strlen($source)), 1);
            $i += 1;
        }

        return $salt;
    }
}
