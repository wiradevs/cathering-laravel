@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sukses!</h3>
                </div>
                <div class="panel-body">
                    <p>Hi <strong>{{ session('order')->user->name }}</strong></p>
                    <p></p>
                    <p>Terima Kasih Telah Memesan di Cathering Online.<br>
                    Untuk Melakukan Pembayaran Dengan {{ config('bank-accounts')[session('order')->bank]['title'] }}</p>
                    <ol>
                        <li>Silahkan transfer ke rekening <strong>{{ config('bank-accounts')[session('order')->bank]['bank'] }} {{ config('bank-accounts')[session('order')->bank]['number'] }} An. {{ config('bank-accounts')[session('order')->bank]['name'] }}</strong>.</li>
                        <li>Ketika Melakukan Pembayaran Sertakan nomor pesanan <strong>{{ session('order')->padded_id }}</strong></li>
                        <li>Total Pembayaran <strong>Rp{{ number_format(session('order')->total_payment) }}</strong></li>
                    </ol>
                </div>
                <div class="panel-footer"><button type="button" class="btn btn-success" onclick="location.href='/'">Lanjutkan Memesan</button></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
