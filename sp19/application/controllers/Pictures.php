<?php
//application/controllers/Pictures.php
class Pictures extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pictures_model');
            $this->load->helper('url_helper');
//            $this->config->set_item('banner', 'Image Section');
        }

        public function index()
        {        
            $tags = 'crafts';
            $data['pictures'] = $this->Pictures_model->get_pictures($tags);
            $this->config->set_item('title','Pictures');
            $this->config->set_item('navkey','pictures');
            $data['title'] = 'Picture Presentation';
            $this->load->view('pictures/index', $data);
        }

//convert this or delete them later
//        public function view($slug = NULL)
//        {
//            //slug without dashes
//            $dashless_slug = str_replace("-", " ", $slug);
//            
//            //upper case slug workds
//            $dashless_slug = ucwords($dashless_slug);
//            
//            //Use dashless slug for title
//            $this->config->set_item('title', 'News Flash - ' . $dashless_slug);
//            
//            $data['news_item'] = $this->news_model->get_news($slug);
//            
//            if (empty($data['news_item']))
//            {
//                    show_404();
//            }
//            
//            $data['title'] = $data['news_item']['title'];
//            $this->load->view('news/view', $data);
//        }


}