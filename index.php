<!DOCTYPE html>
                            <input type="text" id="gst" name="gst" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Grand Total</label>
                            <input type="text" id="grand_total" name="grand_total" class="form-control" readonly>
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Save Invoice
                </button>

            </form>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

function calculateTotal() {

    let subtotal = 0;

    $("tbody tr").each(function() {

        let qty = $(this).find('.qty').val();
        let price = $(this).find('.price').val();

        let total = qty * price;

        $(this).find('.total').val(total.toFixed(2));

        subtotal += total;
    });

    let gst = subtotal * 0.18;
    let grandTotal = subtotal + gst;

    $('#subtotal').val(subtotal.toFixed(2));
    $('#gst').val(gst.toFixed(2));
    $('#grand_total').val(grandTotal.toFixed(2));
}

$(document).on('keyup change', '.qty, .price', function() {
    calculateTotal();
});

$('#addRow').click(function() {

    let row = `
    <tr>
        <td><input type="text" name="item_name[]" class="form-control" required></td>
        <td><input type="number" name="quantity[]" class="form-control qty" required></td>
        <td><input type="number" step="0.01" name="price[]" class="form-control price" required></td>
        <td><input type="text" class="form-control total" readonly></td>
        <td><button type="button" class="btn btn-danger removeRow">X</button></td>
    </tr>
    `;

    $('#invoiceTable tbody').append(row);
});

$(document).on('click', '.removeRow', function() {

    $(this).closest('tr').remove();

    calculateTotal();
});

</script>

</body>
</html>