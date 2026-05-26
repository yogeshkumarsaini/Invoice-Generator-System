# Invoice Generator System

A modern Invoice Generator System built using PHP, MySQL, Bootstrap 5, jQuery, and DomPDF.

---

## Features

- Create invoices dynamically
- Add multiple invoice items
- Automatic GST Calculation
- PDF Invoice Download
- Modern Bootstrap UI
- Responsive Design
- MySQL Database Integration
- Printable Invoice Page

---

## Technologies Used

- PHP
- MySQL
- Bootstrap 5
- jQuery
- DomPDF

---

## Project Structure

```bash
Invoice_Generator_System/
│
├── assets/
│   └── style.css
│
├── config/
│   └── db.php
│
├── vendor/
│
├── index.php
├── save_invoice.php
├── view_invoice.php
├── generate_pdf.php
├── invoices.sql
├── composer.json
└── README.md
```

---

## Installation Steps

### 1. Clone or Download Project

Copy the project folder into:

```bash
htdocs/
```

if using XAMPP.

---

### 2. Create Database

Import the SQL file:

```bash
invoices.sql
```

into phpMyAdmin.

---

### 3. Configure Database

Open:

```bash
config/db.php
```

Update database credentials:

```php
$conn = mysqli_connect("localhost", "root", "", "invoice_generator");
```

---

### 4. Install DomPDF

Open terminal inside project folder and run:

```bash
composer require dompdf/dompdf
```

---

### 5. Start Server

Start:

- Apache
- MySQL

from XAMPP Control Panel.

---

### 6. Run Project

Open browser:

```bash
http://localhost/Invoice_Generator_System
```

---

## GST Calculation

Current GST Rate:

```bash
18%
```

You can change GST from:

```javascript
let gst = subtotal * 0.18;
```

inside:

```bash
index.php
```

---

## PDF Invoice

PDF generation is handled using:

```bash
Dompdf
```

Download PDF button available on invoice view page.

---

## Main Files

| File | Description |
|------|-------------|
| index.php | Create Invoice Form |
| save_invoice.php | Save Invoice Data |
| view_invoice.php | View Invoice |
| generate_pdf.php | Download PDF |
| db.php | Database Connection |
