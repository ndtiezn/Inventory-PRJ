@extends('print.layout.paper')
@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm
@endsection
@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection
@section('custom-css')
<style>
.logo {
    width: 200px;
    height: 200px;
}
.hinhSanPham-resize {
    width: 200px;
    height: 200px;
}
.ds1{
    color: red;
    font-size: 30px;
}
</style>
@endsection
@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty TNHH MTV Freshfruit<br />
                    http://Freshfruit.com/<br />
                    (0939)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('img/images1.jpg') }}" class="logo" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachsanpham)/5);
            ?>
        <table border="1" align="center" cellpadding="5">
            <caption class="ds1">Danh sách sản phẩm</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">
                    <img class="hinhSanPham-resize" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" />
                </td>
                <td align="left">{{ $sp->sp_ten }}</td>
                <td align="right">{{ $sp->sp_gia }}</td>
                @foreach ($danhsachloai as $l)
                @if ($sp->l_ma == $l->l_ma)
                <td align="left">{{ $l->l_ten }}</td>
                @endif
                @endforeach
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection
