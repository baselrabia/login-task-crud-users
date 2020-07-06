@extends('layouts.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>'users/'.$user->id,'method'=>'put' ]) !!}
     <div class="form-group">
        {!! Form::label('name','name') !!}
        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('email','email') !!}
        {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password','password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>

     {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
