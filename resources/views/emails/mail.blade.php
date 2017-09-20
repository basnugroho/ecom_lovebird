<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tagihan</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img height="90%" src="{{ asset('uploads/front/logo.png') }}">
      </div>
      <h1>TAGIHAN # <B>BELUM DIBAYAR</B></h1>
      <div id="company" class="clearfix">
        <div><b>DARI:</b></div>
        <div>BMW MASTER</div>
        <div>Jl. Bukit Palma C3/33 Citraland Surabaya<br /> Jawa Timur 60292, ID</div>
        <div>(62) 12519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><b>KEPADA:</b></div>
        <div><span>NAMA</span> John Doe</div>
        <div><span>ALAMAT</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>TANGGAL</span> August 17, 2015</div>
        <!-- <div><span>DUE DATE</span> September 17, 2015</div> -->
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Barang</th>
            <th class="desc"></th>
            <th>HARGA JUAL</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>

          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">ONGKOS KIRIM</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>CATATAN:</div>
        <div class="notice">Harap melakukan konfirmasi setelah melakukan pembayaran.</div>
      </div>
    </main>
    <footer>
      Tagihan ini dibuat secara otomatis oleh komputer dan valid.
    </footer>
  </body>
</html>