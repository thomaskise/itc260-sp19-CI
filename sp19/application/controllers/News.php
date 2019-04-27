<?php
//application/controllers/News.php
class News extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->config->set_item('banner', 'News Section');
            $this->load->model('news_model');
            $this->load->helper('url_helper');
        }

        public function index()
        {
            //set the tab title
            $this->config->set_item('title','Thoms News');
            //set the navkey for active nav match in makeLinks()
            $this->config->set_item('navkey','news');
            
            $data['news'] = $this->news_model->get_news();
            //set the page title
            $data['title'] = 'News archive';
            $this->load->view('news/index', $data);
        }

        public function view($slug = NULL)
        {
            //slug without dashes
            $dashless_slug = str_replace("-", " ", $slug);
            
            //upper case slug workds
            $dashless_slug = ucwords($dashless_slug);
            
            //Use dashless slug for page tab title
            $this->config->set_item('title', 'News Flash - ' . $dashless_slug);
            
            $data['news_item'] = $this->news_model->get_news($slug);
            
            if (empty($data['news_item']))
            {
                    show_404();
            }
            
            
            $data['title'] = $data['news_item']['title'];
            $this->load->view('news/view', $data);
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            //Configure the web page tab title tag
            $this->config->set_item('title','Create News');
            //set the navkey for active nav match in makeLinks()
            $this->config->set_item('navkey','news/create');
            //set the page heading
            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('news/create', $data);
            }
            else
            {
                //$this->news_model->set_news();
                //$this->load->view('news/success', $data);
                $slug = $this->news_model->set_news();
                if($slug !==false){//slug sent
                    feedback('Data entered successfully', 'info');
                    redirect('news/view/' . $slug);
                }else{//error
                    feedback('Data entry failed!', 'error');
                    redirect('news/create');            
                }
            }
        }
}