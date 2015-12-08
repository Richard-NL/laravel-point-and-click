<h1>New Item</h1>

<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(['route' => 'item_store', 'class' => 'form', 'novalidate' => 'novalidate']) !!}

<div class="form-group">
    {!! Form::label('Item Name') !!}
    {!! Form::text('name', null,
    array('required',
    'class'=>'form-control',
    'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Active state') !!}
    {!! Form::checkbox('active', 1) !!}
</div>


<div class="form-group">
    {!! Form::submit('Save',
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}