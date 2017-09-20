
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
                        <th id="">{{ Cart::total() * 1000 }}</th>
                        <form action="">
                            <input type="hidden" id='subtotalSummary' value='{{ Cart::total() * 1000 }}'>
                        </form>
                    </tr>
                    <tr>
                        <td>Ongkos kirim</td>
                        <th id="ongkirSummary">{{ Session::has('ongkir') ? Session::get('ongkir') * 1000 : '' }}</th>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th id="totalSummary">{{ Cart::total() *1000 +  Session::get('ongkir') * 1000 }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>



