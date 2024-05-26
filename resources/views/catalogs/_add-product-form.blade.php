<p>
    {!! Form::open(['url'=>'cart', 'method'=>'post', 'class'=>'form-inline']) !!}
        {!! Form::hidden('product_id', $product->id) !!}

        <div class="form-group">
            {!! Form::number('quantity', null, ['class'=>'form-control', 'min'=>1, 'placeholder'=> 'Jumlah Pesanan']) !!}
        </div>
        @if (Auth::guest())
        {!! Form::button('Pesan', ['class'=>'btn btn-success disabled']) !!}
        @else
        {!! Form::submit('Pesan', ['class'=>'btn btn-success']) !!}
        @endif
    {!! Form::close() !!}
</p>
