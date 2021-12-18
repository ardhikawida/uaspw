@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <a href="{{ url('history') }}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
           </div>
           <div class="col-md-12 mt-2">
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                   </ol>
               </nav>
           </div>
           <div class="col-md-12">
               <div class="card">
                    <div class="card-body">
                        <h3>Berhasil Check Out!! </h3>
                        <h5>Pesanan Anda Sudah Berhasil Dicheck out, untuk pembayaran silahkan transfer di rekening <strong>Bank Mandiri Nomor Rekening : 111111-222222-333 dengan nominal :</strong>
                            <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong>
                        </h5>
                    </div>
               </div>
               <div class="card">
                   <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"> Detail Pemesanan</i></h3>
                    @if(!empty($pesanan))
                       <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                       <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="">
                                    </td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }} Pcs</td>
                                    <td align="right">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga : </strong></td>
                                    <td align="right"><strong>{{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                </tr>

                                <tr>
                                    <td colspan="5" align="right"><strong>Kode Barang : </strong></td>
                                    <td align="right"><strong>{{ number_format($pesanan->kode) }}</strong></td>
                                </tr>

                                <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus ditransfer : </strong></td>
                                    <td align="right"><strong>{{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</strong></td>
                                </tr>
                            </tbody>
                       </table>
                    @endif
                   </div>
               </div>
           </div>
       </div>
    </div>

@endsection
