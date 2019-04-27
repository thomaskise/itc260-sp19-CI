<?php
    //application/views/news/index.php

    $this->load->view($this->config->item('theme') . 'header');//assumes php, ie header.php
    
    echo '<h2>' . $title . '</h2>';

        /*  Save this code to revied object properties if needed
            echo "<pre>";
            echo var_dump($pictures);
            echo "</pre>";
            die;
        */
    
    echo '
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-info">Select Topic</button>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop3" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>
        </div>
        ';

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
                $size = 'm';
                $photo_url = '
                http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

                echo "
                <tr>
                    <th scope='row'></th>
                    <td>
                        <img title='" . $pic->title . "' src='" . $photo_url . "' /><br />
                    </td>
                    <td>" . $pic->title . "</td>
                </tr>
                ";
            }
    echo '
        </tbody>
    </table>';

    $this->load->view($this->config->item('theme') . 'footer');
?>