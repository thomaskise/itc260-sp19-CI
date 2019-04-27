<?php
//application/models/News_model.php
class Pictures_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    
    public function get_pictures($tags = FALSE)
    {
            $api_key = $this->config->item('flickrkey');//set this up in credentials
        
            //tags should be passed in via a querystring controller
            $perPage = 25;
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
            $url.= '&api_key=' . $api_key;
            $url.= '&tags=' . $tags;
            $url.= '&per_page=' . $perPage;
            $url.= '&format=json';
            $url.= '&nojsoncallback=1';

            $response = json_decode(file_get_contents($url));
            return $response->photos->photo;
        

            echo "<pre>";
            echo var_dump($response);
            echo "</pre>";
            die;

    }

}