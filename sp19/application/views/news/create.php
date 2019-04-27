<?php
//application/views/news/create.php

    $this->load->view($this->config->item('theme') . 'header');
    
    echo '
        <h2>' . $title . '</h2>';
    echo validation_errors();
    echo form_open('news/create');
    echo '
            <label for="title">Title</label>
            <input type="input" name="title" /><br />

            <label for="text">Text</label>
            <textarea name="text"></textarea><br />

            <input type="submit" name="submit" value="Create news item" />

        </form>';
    $this->load->view($this->config->item('theme') . 'footer');
?>