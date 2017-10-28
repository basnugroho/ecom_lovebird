<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tagihan Pesanan #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" /> -->
    <style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 21cm;  
      height: 29.7cm; 
      margin: 0 auto; 
      color: #001028;
      background: #FFFFFF; 
      font-family: Arial, sans-serif; 
      font-size: 12px; 
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;        
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }

    table th,
    table td {
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;        
      font-weight: normal;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: right;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table td.grand {
      border-top: 1px solid #5D6975;;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }

    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img height="90%" src="{{ asset('uploads/front/logo.png') }}">
      </div>
      <h1>PESANAN #{{ $order->id }} <B>BELUM DIBAYAR</B></h1>
      <div id="company" class="clearfix">
        <div><b>DARI:</b></div>
        <div>BMW MASTER</div>
        <div>Jl. Bukit Palma C3/33 Citraland Surabaya<br /> Jawa Timur 60292, Indonesia</div>
        <div>(62) 12519-0450</div>
        <div><a href="mailto:admin@bmwmastersby.com">admin@bmwmastersby.com</a></div>
      </div>
      <div id="project">
        <div><b>KEPADA:</b></div>
        <div><span>NAMA</span> {{ $user->name }}</div>
        @if(count($user->address->street) > 0)
        <div><span>ALAMAT</span> {{ $user->address->street }}{{ $user->address->city }},{{ $user->address->state }}  {{ $user->address->zip }}, {{ $user->address->country }}</div>
        <div><span>TELEPON</span> {{ $user->address->phone }}</div>
        @endif
        <div><span>EMAIL</span> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
        <div><span>TANGGAL</span> {{ $order->created_at }}</div>
        <!-- <div><span>DUE DATE</span> September 17, 2015</div> -->
      </div>
    </header>
    <main>
      <p><b>Rincian Pesanan: </b></p>
      <table>
        <thead>
          <tr>
            <th class="service">Produk</th>
            <th class="desc"></th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach(Cart::content() as $product)
          <tr>
            <td class="service"><img height="40" src="{{ asset($product->model->image) }}" alt="{{ $product->rowId }}"></td>
            <td class="desc">{{ $product->name }}</td>
            <td class="unit">{{ $product->price() }}</td>
            <td class="qty">{{ $product->qty }}</td>
            <td class="total">Rp{{ $product->total()}}</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="4">Subtotal</td>
            <td class="total">Rp{{ Cart::total() }}</td>
          </tr>

          <tr>
            <td colspan="4">Berat Total</td>
            <td class="total">{{ strval(Session::get('berat_total'))/1000 }}Kg</td>
          </tr>
          @if(Session::has('ongkir'))
          <tr>
            <td colspan="4">Ongkos Kirim Total</td>
            <td class="total">Rp{{ Session::has('ongkir_total') ? number_format(strval(Session::get('ongkir_total')), 2, ',', '.') : 'diambil ditempat' }}</td>
          </tr>
          @endif
          <tr>
            <td colspan="4" class="grand total">Total</td>
            <td class="grand total">Rp{{ number_format(strval($total), 2, ',', '.') }}</td>
          </tr>
        </tbody>
      </table>
      <br>
      <p><b>Silahkan melakukan pembayaran dengan salah satu metode pembayaran dibawah ini </b></p>
      <table>
        <thead>
          <tr>
            <th class="desc">Metode Pembayaran</th>
            <th class="desc">Detail</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="desc">Transfer Bank</td>
            <td class="desc">BCA: 0111929822 an Baskoro Nugroho</td>
          </tr>
          <tr>
            <td class="desc">Bayar Ditempat</td>
            <td class="desc">Jl. Bukit Palma C3/33 Citraland Surabaya</td>
          </tr>
        </tbody>
      </table>
        <div id="notices">
            <div><b>Catatan:</b></div>
            <div class="notice">
                <small>Harap melakukan konfirmasi pada kontak diatas dengan format:<br>
                sudah_bayar#(metode pembayaran)#nomor_pesanan</small></br>
                <small>contoh: sudah_bayar#(Transfer Bank)#16</small><br>
            </div>
        </div>
    </main>
    <footer>
      Tagihan ini dibuat secara otomatis sebagai nota pembayaran yang valid oleh bmwmasterindonesia.com
    </footer>
  </body>
</html>