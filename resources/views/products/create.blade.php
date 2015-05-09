@extends('app')

@section('content')

    <div class="container">
        <h1>Create Products</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'products.store']) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price','Price') !!}
            {!! Form::text('price',null,['class'=>'form-control']) !!}
        </div>

        <hr/>

        <div class="panel panel-default">
            <div class="panel-heading">Featured ?</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::radio('featured','1') !!}
                    {!! Form::label('featured',' YES') !!}
                    <br/>
                    {!! Form::radio('featured','0') !!}
                    {!! Form::label('featured',' NO') !!}
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Recommend ?</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::radio('recommend','1') !!}
                    {!! Form::label('recommend',' YES') !!}
                    <br/>
                    {!! Form::radio('recommend','0') !!}
                    {!! Form::label('recommend',' NO') !!}
                </div>
            </div>
        </div>

        <hr/>


        <div class="form-group">
            {!! Form::submit('Add Products',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}

    </div>
@endsection