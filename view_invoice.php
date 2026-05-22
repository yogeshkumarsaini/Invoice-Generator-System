<?php
include 'config/db.php';

$id = $_GET['id'];

$invoice = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM invoices WHERE id='$id'")
);

$items = mysqli_query(
    $conn,
    "SELECT * FROM invoice_items WHERE invoice_id='$id'"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .table th{
            background:#198754;
            color:white;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-lg">

        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h3>Invoice #<?= $invoice['id']; ?></h3>

            <a href="generate_pdf.php?id=<?= $invoice['id']; ?>"
               class="btn btn-light">
                Download PDF
            </a>
        </div>

        <div class="card-body">

            <h5 class="mb-3">Customer Details</h5>

            <p>
                <strong>Name:</strong>
                <?= $invoice['customer_name']; ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= $invoice['customer_email']; ?>
            </p>

            <p>
                <strong>Date:</strong>
                <?= $invoice['invoice_date']; ?>
            </p>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Item</th>
                        <th width="120">Qty</th>
                        <th width="150">Price</th>
                        <th width="150">Total</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while($row = mysqli_fetch_assoc($items)) { ?>

                    <tr>
                        <td><?= $row['item_name']; ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td>₹<?= $row['price']; ?></td>
                        <td>₹<?= $row['total']; ?></td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>

            <div class="text-end mt-4">
                <h5>Subtotal: ₹<?= $invoice['subtotal']; ?></h5>
                <h5>GST: ₹<?= $invoice['gst']; ?></h5>
                <h3 class="text-success">
                    Grand Total: ₹<?= $invoice['grand_total']; ?>
                </h3>
            </div>

        </div>

    </div>

</div>

</body>
</html>