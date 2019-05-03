<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pics_model');
            $this->load->helper('url_helper');
        }
    
        public function index()
        {   
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->config->set_item('title','Pics');
            $this->config->set_item('navkey','pics');
            $data['title'] = 'Picture Topics';
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
            
            $this->config->set_item('searchfilter', $this->input->post('filter'));
            //set value of search filter in session to use later for persisting in dropdown
            $this->session->set_userdata('sessionfilter', $this->config->item('searchfilter'));
            $data['pics'] = $this->Pics_model->get_pics($this->config->item('searchfilter'));
            $data['title'] = 'Picture Topic: ' . strtoupper($this->config->item('searchfilter'));
            $this->load->view('pics/view', $data);
        }

}