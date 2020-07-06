@extends('layouts.index')

@section('content')

<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      {!! Form::open(['url'=>'users']) !!}
       <div class="form-group">
          {!! Form::label('name') !!}
          {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
          {!! Form::label('email') !!}
          {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
          {!! Form::label('password') !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
       </div>

       {!! Form::submit('Add User',['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->



@endsection
