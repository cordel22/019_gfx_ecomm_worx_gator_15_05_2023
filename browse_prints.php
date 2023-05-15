<?php # Script 19.6 - browse_prints.php
$page_title = 'Browse the Prints';
include('includes/header.html');
require('./mysqli_connect.php');

$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) AS
  artist, print_name, price, description, print_id FROM artists, prints WHERE 
  artists.artist_id = prints.artist_id ORDER BY artists.last_name ASC, prints.print_name ASC";

//  Are we looking at a particular artist?
if (isset($_GET['aid']) && filter_var($_GET['aid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
  //  Overwrite the query:
  $q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) AS
    artist, print_name, price, description, print_id FROM artists, prints WHERE
    artists.artist_id=prints.artist_id AND prints.artist_id={$_GET['aid']} ORDER BY prints.print_name";
}

//  buffer

echo '<div id="buffer">
         
 <p></p><br />
 <p></p><br />
 <p></p><br />
 </div>';

//  end buffer

//  Create the table hed:
echo '<table border="0" width="90% cellspacing="3" cellpadding="3" align="center">
  <tr>
    <td align="left width="20%"><b>Artist</b></td>
    <td align="left width="20%"><b>Print Name</b></td>
    <td align="left width="40%"><b>Description</b></td>
    <td align="right width="20%"><b>Price</b></td>
  </tr>';

//  Disply all the prints, linked to URLs:
$r = mysqli_query($dbc, $q);
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  //  Display each record:
  echo "\t<tr>
    <td align=\"left\"><a href=\"browse_prints.php?aid={$row['artist_id']}\">{$row['artist']}
    </a></td>
    <td align=\"left\"><a href=\"view_print.php?pid={$row['print_id']}\">{$row['print_name']}</td>
    <td align=\"left\">{$row['description']}</td>
    <td align=\"right\">\${$row['price']}</td>
  </tr>\n";
} //  End of while loop.

echo '</table>';
mysqli_close($dbc);
include('includes/footer.html');