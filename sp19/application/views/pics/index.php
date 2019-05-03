<?php
    //application/views/pics/index.php

    $this->load->view($this->config->item('theme') . 'header');//assumes php, ie header.php
    
    echo '
        <h2>' . $title . '</h2>
        <h3>Select one of our topics: </h3>
        <form method="post" action="' . site_url("pics/view") . '">
            <div class="form-group">
                <select class="custom-select" name="filter">' .
                    makeDropdown($this->config->item("dropdown1"), 
                        $this->session->userdata('sessionfilter')) .  '                       
                </select>
            </div>
            <input type="submit" value="Select Picture Topic" class="btn btn-primary btn-sm" />
        </form>            
        <hr/>

        <h3>Or enter a topic of your own: </h3>
        <div class="form-group">
            <form method="post" action="' . site_url("pics/view") . '">
                <input name="filter" type="text" class="form-control form-control-sm"  placeholder="Enter a picture topic" required/>
                <input type="submit"  value="Submit Your Topic" id="tagname" class="btn btn-primary btn-sm" />
            </form>
        </div>';


    $this->load->view($this->config->item('theme') . 'footer');
?>


