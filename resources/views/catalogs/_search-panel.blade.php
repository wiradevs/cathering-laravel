<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Cari Menu</h3>
    </div>

    <div class="panel-body">
        {!! Form::open(['url'=> 'catalogs', 'method'=>'get']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                {!! Form::text('q', $q, ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Ketik Nama Menu']) !!}
                {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-9">
                    {!! Form::hidden('cat', $cat) !!}
                    {!! Form::submit('Cari', ['class'=>'btn btn-sm btn-info']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
