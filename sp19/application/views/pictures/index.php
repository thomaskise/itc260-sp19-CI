<?php
    //application/views/pictures/index.php

    $this->load->view($this->config->item('theme') . 'header');//assumes php, ie header.php
    
    echo '<h2>' . $title . '</h2>';

        /*  Save this code to revied object properties if needed
            echo "<pre>";
            echo var_dump($pictures);
            echo "</pre>";
            die;
        */
    
    if(!empty($this->config->item('searchfilter'))){ 
       // var_dump($this->config->item("searchfilter"));
    //    die;
    }else{
        echo '
            <p>Current picture topic: ' . ucfirst($this->session->userdata("sessionfilter")) . '</p>
            <form method="get" action="' . site_url("pictures/set_filter") . '">
                <select name="filter">' .

                    makeDropdown($this->config->item("dropdown1"), 
                        $this->session->userdata("sessionfilter")) .                            
    //                    $data['tags'] .   
                '</select>
                <input type="submit" value="Select Picture Topic" class="button warning" />
            </form>'
        ;
    }
    echo '<hr/>';

    echo '
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">     </th>
                <th scope="col">Picture</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>';
            foreach($pictures as $pic)
            {
                $slug = $pic->id;
                $size = 'm';
                $photo_url = '
                http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

                echo "
                <tr>
                    <th scope='row'></th>
                    <td>
                        <img title='" . $pic->title . "' src='" . $photo_url . "' /><br />
                    </td>
                    <td>
                        <a href='" . site_url('pictures/' . $slug) . "'>" . $pic->title . "</a>
                    </td>
                </tr>
                ";
            }
    echo '
        </tbody>
    </table>';

    $this->load->view($this->config->item('theme') . 'footer');
?>


