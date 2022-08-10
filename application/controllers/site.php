<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Site extends CI_Controller
{
    /**
     * The constructor, handles essential session stuff etc.
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Home page
    */
    public function index()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']){
            redirect('users/book/' . $_SESSION['user_id']);
        }
        
        $data['title'] = ucfirst("Log In");		
        $data['viewFile'] = "auth/login";
        $this->load->view('template', $data);    
    }         
}
