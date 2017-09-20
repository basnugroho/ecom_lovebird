<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tagihan Pesanan #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
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
        @if(count($user->street) > 0)
        <div><span>ALAMAT</span> {{ $user->address->street }}{{ $user->address->city }},{{ $user->address->state }}  {{ $user->address->zip }}, {{ $user->address->country }}</div>
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
            <th class="service">Barang</th>
            <th class="desc"></th>
            <th>HARGA JUAL</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        @foreach(Cart::content() as $product)
          <tr>
            <td class="service"><img height="40" src="{{ asset($product->model->image) }}" alt="{{ $product->rowId }}"></td>
            <td class="desc">{{ $product->name }}</td>
            <td class="unit">{{ $product->price()*1000 }}</td>
            <td class="qty">{{ $product->qty }}</td>
            <td class="total">{{ $product->total()*1000 }}</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ Cart::total()*1000 }}</td>
          </tr>
          <tr>
            <td colspan="4">ONGKOS KIRIM</td>
            <td class="total">{{ Session::has('ongkir') ? Session::get('ongkir')*1000 : 'diambil ditempat' }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">{{ $total }}</td>
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
            <div>CATATAN:</div>
            <div class="notice">
                <b>Harap melakukan konfirmasi pada kontak diatas dengan format:</b><br>
                sudah_bayar#(metode pembayaran)#nomor_pesanan</br>
                <small>contoh: sudah_bayar#(Transfer Bank)#16</small><br>
            </div>
        </div>
    </main>
    <footer>
      Tagihan ini dibuat secara otomatis oleh bmwmastersby.com dan valid.
    </footer>
  </body>
</html>