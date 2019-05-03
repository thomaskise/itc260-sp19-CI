<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//custom_config.php - a place to save global settings

$config['style'] = 'flatly.css';
$config['banner'] = 'Default Banner';
$config['title'] = 'Default Title';
$config['copyright'] = 'Default Copyright';
$config['masthead'] = 'Default MastHead';
$config['theme'] = 'themes/bootswatch/';
$config['navkey'] = '';
$config['flickrkey'] = 'ae95e4a5908ae0b0f21fc34fcc690a16';
//$config['searchfilter'] = '';

//main nav
$config['nav1'] = array(
    'news' => 'Read News',
    'news/create' => 'Add News',
    'pics' => 'Pics'
);

// dropdown selection
$config['dropdown1'] = array(
    'ceramics' => 'Ceramics',
    'craft' => 'Craft',
    'dada' => 'Dada'
);
