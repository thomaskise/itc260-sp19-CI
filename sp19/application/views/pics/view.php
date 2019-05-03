<?php
//application/views/pics/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h2>' . $title . '</h2>';
echo '
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">     </th>
                    <th scope="col"><h3>Picture</h3></th>
                    <th scope="col"><h3>Details</h3></th>
                </tr>
            </thead>
        <tbody>';
            foreach($pics as $pic)
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
                        <b>Title: </b>" . $pic->title . "<br />
                        <b>Owner: </b>" . $pic->owner . "<br />
                        <b>Server: </b>" . $pic->server . "<br />
                        <b>Farm: </b>" . $pic->farm . "<br />
                    </td>
                </tr>
                ";
            }
    echo '
        </tbody>
    </table>';


$this->load->view($this->config->item('theme') . 'footer');
?>