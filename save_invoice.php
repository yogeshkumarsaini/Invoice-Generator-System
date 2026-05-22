<?php

include 'config/db.php';

$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$invoice_date = $_POST['invoice_date'];
$subtotal = $_POST['subtotal'];
$gst = $_POST['gst'];
$grand_total = $_POST['grand_total'];

$query = "INSERT INTO invoices(
customer_name,
customer_email,
invoice_date,
subtotal,
gst,
grand_total
)
VALUES(
'$customer_name',
'$customer_email',
'$invoice_date',
'$subtotal',
'$gst',
'$grand_total'
)";

mysqli_query($conn, $query);

$invoice_id = mysqli_insert_id($conn);

$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

for($i=0; $i<count($item_name); $i++) {

    $total = $quantity[$i] * $price[$i];

    $insertItem = "INSERT INTO invoice_items(
    invoice_id,
    item_name,
    quantity,
    price,
    total
    )
    VALUES(
    '$invoice_id',
    '$item_name[$i]',
    '$quantity[$i]',
    '$price[$i]',
    '$total'
    )";

    mysqli_query($conn, $insertItem);
}

header("Location: view_invoice.php?id=$invoice_id");

?>