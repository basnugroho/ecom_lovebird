
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Alamat Kirim/Pengambilan</h3>
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
                        <td>Berat Total</td>
                        <th id="beratSummary">{{ Session::has('berat_total') ? (strval(Session::get('berat_total'))/1000) : '0' }}Kg</th>
                    </tr>
                    <tr>
                        <td>Total Ongkos kirim</td>
                        <th id="ongkirSummary">Rp{{ Session::has('ongkir_total') ? number_format(Session::get('ongkir_total'),2,',', '.'): '0,00' }}</th>
                    </tr>

                    <tr>
                        <td><b>Total</b></td>
                        <th id="totalSummary">Rp{{ number_format(strval(1000*Cart::total()) +  strval(Session::get('ongkir_total')),2,',','.') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>



