<?php
//application/views/news/index.php

$this->load->view($this->config->item('theme') . 'header');//assumes php, ie header.php

echo '
    <h2>' . $title . '</h2>';

foreach ($news as $news_item):
    echo '
        <h3>' . $news_item['title'] . '</h3>
        <div class="main">'
                . $news_item['text'] . '
        </div>
        <p><a href="' . site_url("news/" .$news_item["slug"] ) . '">View article
        </a></p>';
endforeach; 

$this->load->view($this->config->item('theme') . 'footer');
?>