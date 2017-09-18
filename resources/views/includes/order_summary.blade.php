
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Total Bayar</h3>
        </div>
        <p class="text-muted">Ongkos kirim dan tambahan biaya dihitung berdasarkan pengisian yang anda pilih.</p>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Subtotal pemesanan</td>
                        <th>{{ Cart::total() }}</th>
                    </tr>
                    <tr>
                        <td>Ongkos kirim dan layanan</td>
                        <th>0</th>
                    </tr>
                    <tr>
                        <td>Pajak</td>
                        <th>0</th>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th>{{ Cart::total() }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>



