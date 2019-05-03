<?php
//application/models/Pics_model.php
class Pics_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    
    public function get_pics($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            feedback('Opps! Something happened. Try again.', 'error');
            $this->load->view('pics/index');
        }else{
            $tags = $slug;
        }
        $api_key = $this->config->item('flickrkey');//set this up in credentials
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';
        $response = json_decode(file_get_contents($url));
        return $response->photos->photo;
     }
}
