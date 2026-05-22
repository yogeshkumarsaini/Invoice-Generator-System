<?php

require 'vendor/autoload.php';
include 'config/db.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

$invoice = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM invoices WHERE id='$id'"));

$items = mysqli_query($conn,
"SELECT * FROM invoice_items WHERE invoice_id='$id'");

$html = '
<h2>Invoice #'.$invoice['id'].'</h2>

<p>
<strong>Customer:</strong>
'.$invoice['customer_name'].'
</p>

<table width="100%" border="1" cellspacing="0" cellpadding="8">
<tr>
<th>Item</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
</tr>
';

while($row = mysqli_fetch_assoc($items)) {

$html .= '
<tr>
<td>'.$row['item_name'].'</td>
<td>'.$row['quantity'].'</td>
<td>'.$row['price'].'</td>
<td>'.$row['total'].'</td>
</tr>
';
}

$html .= '
</table>

<h3>Subtotal: ₹'.$invoice['subtotal'].'</h3>
<h3>GST: ₹'.$invoice['gst'].'</h3>
<h2>Grand Total: ₹'.$invoice['grand_total'].'</h2>
';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('invoice.pdf');

?>