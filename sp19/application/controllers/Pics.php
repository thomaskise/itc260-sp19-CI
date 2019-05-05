<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pics_model');
            $this->load->helper('url_helper');
        }
    
        public function set_slug()
        {
            //get the slug from the form input
            $slug = $this->input->post('filter');
            $slug = str_replace(" ", "-", $slug);            
            
            //set value of search filter in session to use later for persisting in dropdown
            $this->session->set_userdata('sessionfilter', $slug);

            //
            redirect('pics/view/' . $slug);            
        }
    
        public function index()
        {   
            $this->config->set_item('navkey','pics');//used to match active nav
            $this->config->set_item('title','Pics');//browser tab title
            $data['title'] = 'Picture Topics';// page title
            $this->load->view('pics/index', $data);
        }
    
        public function view($slug = NULL)
        {
            //slug without dashes
            $dashless_slug = str_replace("-", " ", $slug);
            
            //upper case slug workds
            $dashless_slug = ucwords($dashless_slug);
            
            //Use dashless slug for page tab title
            $this->config->set_item('title', 'Images - ' . $dashless_slug);
            
            $data['pics'] = $this->Pics_model->get_pics($slug);
            $data['title'] = 'Picture Topic: ' . strtoupper($dashless_slug);
            $this->load->view('pics/view', $data);
        }

}