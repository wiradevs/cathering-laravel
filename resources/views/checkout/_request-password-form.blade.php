{!! Form::open(['url'=>'/password/email', 'method'=>'post', 'class'=>'form-horizontal']) !!}
    <div class="form-group{!! $errors->has('email') ? 'has-error' : '' !!}">
    {!! Form::label('email', 'Alamat email', ['class'=>'col-md-4 control-tabel']) !!}
    <div class="col-md-6">
    {!! Form::email('email', session()->has('email') ? session('email') : null, ['class'=>'form-control']) !!}
    <p class="help-block">Sepertinya Anda pernah memesan di Cathering Online. Klik "Kirim Petunjuk" untuk menerima password baru.</p>
    {!! $errors->first('email','<p class="help-block">:message</p>') !!}
    </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Kirim Petunjuk <i class="fa fa-arrow-right"></i>', array('type'=>'submit', 'class'=>'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
