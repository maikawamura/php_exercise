<?php
/*
 * displays array as table
 * */
function display_array($array)
{
    echo '
        <table style="width: 400px">
            <tr>
                <td class="hclass">No.' . $array[0] . '</td>
                <td>' . $array[1] . '</td>
            </tr>
            <tr>
                <td class="hclass">Name:</td>
                <td>' . html_entity_decode($array[2]) . '</td>
            </tr>
            <tr>
                <td class="hclass">Comment:</td>
                <td>' . html_entity_decode($array[3]) . '</td>
            </tr>
        </table>
        <br/><br/>';
}

function remove_newlines($string)
{
    return str_replace(array("\r\n","\n")," ",$string);
}

?>