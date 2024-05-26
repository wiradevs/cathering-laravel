@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Orders</strong></div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'orders', 'method'=>'get', 'class'=>'form-inline']) !!}
                    <div class="form-group {{ $errors->has('q') ? 'has-errot' : '' }}">
                    {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder'=>'Nama/No. Pesanan', 'autocomplete'=>'off']) !!}
                    {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('status')  ? 'has-error' : '' !!}">
                    {!! Form::select('status', [''=>'Semua Status']+App\Order::statusList(), isset($status) ? $status : null, ['class'=>'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                    </div>
                    {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <table class="table">
                        <thead bgcolor="#CFFAB7">
                            <tr>
                                <td>No. Pesanan</td>
                                <td>Nama Pemesan</td>
                                <td>Status</td>
                                <td>Pembayaran</td>
                                <td>Update Terakhir</td>
                            </tr>
                        </thead>
                        @forelse($orders as $order)
                        <tbody>
                            <tr>
                                <td><button type="button" class="btn btn-info" onclick="location.href='{{ route('orders.edit', $order->id) }}'">{{ $order->padded_id }}</button></td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->human_status }}</td>
                                <td>
                                    Total : <strong>{{ number_format($order->total_payment) }}</strong><br>
                                    Transfer ke : {{ config('bank-accounts')[$order->bank]['bank'] }} <br>
                                    Dari : {{ $order->sender }}
                                </td>
                                <td>{{ $order->updated_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak Ada Order Yang ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $orders->appends(compact('status', 'q'))->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
