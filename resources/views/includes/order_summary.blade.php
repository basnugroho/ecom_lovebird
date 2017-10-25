
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
                        <th id="">Rp{{ number_format(Cart::total() *1000,2,',', '.')}}</th>
                        <form action="">
                            <input type="hidden" id='subtotalSummary' value='{{ Round(1000*Cart::total(),2) }}'>
                        </form>
                    </tr>
                    <tr>
                        <td>Ongkos kirim</td>
                        <th id="ongkirSummary">Rp{{ Session::has('ongkir') ? number_format(Session::get('ongkir'),2,',', '.'): '' }}</th>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th id="totalSummary">Rp{{ number_format(strval(1000*Cart::total()) +  strval(Session::get('ongkir')),2,',','.') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>



