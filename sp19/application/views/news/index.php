<?php
//application/views/news/index.php

//set currentpage for processing in makeLinks()
$_POST['currentpage'] ='/sp19/news';

$this->load->view($this->config->item('theme') . 'header');//assumes php, ie header.php
?>

<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; 

$this->load->view($this->config->item('theme') . 'footer');
?>