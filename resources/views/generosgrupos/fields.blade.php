<!-- Idgrupos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idgrupos', 'Idgrupos:') !!}
    {!! Form::text('idgrupos', null, ['class' => 'form-control']) !!}
</div>

<!-- Idgenero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idgenero', 'Idgenero:') !!}
    {!! Form::text('idgenero', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('generosgrupos.index') }}" class="btn btn-default">Cancel</a>
</div>
