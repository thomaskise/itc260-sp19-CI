<?php
//application/controllers/Pictures.php
class Pictures extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pictures_model');
            $this->load->helper('url_helper');
        }
    
        public function set_filter() 
        {
            $this->config->set_item('searchfilter', $this->input->get('filter'));
            $data['tags'] = $this->config->item('searchfilter');
            $tempfilter = $this->config->item('searchfilter');
            $this->session->set_userdata('sessionfilter', $tempfilter);
            redirect('pictures/index/');
        }
    
        public function index()
        {   
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['pictures'] = $this->Pictures_model->get_pictures();
            $this->config->set_item('pic_array', $data['pictures']);
            $this->config->set_item('title','Pictures');
            $this->config->set_item('navkey','pictures');
            $data['title'] = 'Picture Topics';
            $this->load->view('pictures/index', $data);
        }
    
}