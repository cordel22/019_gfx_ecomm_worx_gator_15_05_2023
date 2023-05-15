<?php # Script 19.11 - checkout.php 
//  This page inserts the order information into the table.
//  This pge would come after the billing process.
//  This page assumes that the billing process worked (the money hs been taken).

//  Set the page title and include the HTML header:
$page_title = 'Order Confirmation';
include('includes/header.html');

//  buffer

echo '<div id="buffer">
         
<p></p><br />
<p></p><br />
<p></p><br />
</div>';

//  end buffer

//  Assume that the customer is logged in and that this page hs access to the customer's ID:
$cid = 1; //  Temporary.

//  Assume that this page receives the oder total:
$total = 178.93;   //  Temporry.

require('./mysqli_connect.php');  //  Connect to the database.

//  Turn autocommit off:
mysqli_autocommit($dbc, FALSE);

//  dd the order to the orders table...
$q = "INSERT INTO orders (customer_id, total) VALUES ($cid, $total)";
$r = mysqli_query($dbc, $q);
if (mysqli_affected_rows($dbc) == 1) {

  //  Need the order ID:
  $oid = mysqli_insert_id($dbc);

  //  Insert the specific order contents into the database...

  //  Prepre the query:
  $q = "INSERT INTO order_contents (order_id, print_id, quantity, price) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($dbc, $q);
  mysqli_stmt_bind_param($stmt, 'iiid', $oid, $pid, $qty, $price);

  //  Execute each query; count the total affected:
  $affected = 0;
  foreach ($_SESSION['cart'] as $pid => $item) {
    $qty = $item['quantity'];
    $price = $item['price'];
    mysqli_stmt_execute($stmt);
    $affected += mysqli_stmt_affected_rows($stmt);
  }

  //  Close the prepared statement:
  mysqli_stmt_close($stmt);

  //  Report on the success...
  if ($affected == count($_SESSION['cart'])) {
    //  Whooooo!

    //  Commit the transaction:
    mysqli_commit($dbc);

    //  Clear the cart:
    unset($_SESSION['cart']);

    //  Message the customer:
    echo '<p>Thank you for your order.
        You will be notified when the item ships.</p>';

    //  Send emails and do whatevr
  } else {

    //  Rollback and report the problem.
    mysqli_rollback($dbc);

    echo '<p>Your order could not be processed due to a system error.
      Yu will be contacted in order to hve the problem fixed.
      We apologize for the inconvenience.
      </p>';
    //  Send the information to the adinistrtor.
  }
} else {

  //  Rollbck and report the problem.
  mysqli_rollback($dbc);

  echo '<p>Your order could not be processed due to a system error.
      You will be contacted in order t have the problem fixxed.
      We apologize for the inconvenience.
      </p>';

  //  Send the order information tothe administrator.
}

mysqli_close($dbc);

include('includes/footer.html');
