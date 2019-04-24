<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//custom_config.php - a place to save global settings

$config['style'] = 'flatly.css';
$config['banner'] = 'Default Banner';
$config['title'] = 'Default Title';
$config['copyright'] = 'Default Copyright';
$config['masthead'] = 'Default MastHead';
$config['theme'] = 'themes/bootswatch/';
$_POST['currentpage'] ='';//Not needed on everypage, so initializing to avoid error

//added /sp19/ to prevent adding extra news/ folder in url
$config['nav1'] = array(
    '/sp19/news' => 'Read News',
    '/sp19/news/create' => 'Add News'
);
