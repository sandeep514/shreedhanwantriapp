@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <h1>{{ trans('coreadmin::admin.users-create-create_user') }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('
                        <li class="error">:message</li>
                        ')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', trans('coreadmin::admin.users-create-name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=> trans('coreadmin::admin.users-create-name_placeholder')]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('user_id', 'User Id', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('user_id', old('user_id'), ['class'=>'form-control', 'placeholder'=> 'User Id']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('coreadmin::admin.users-create-email'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=> trans('coreadmin::admin.users-create-email_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('mobile', 'Mobile', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('mobile', old('mobile'), ['class'=>'form-control', 'placeholder'=> 'Mobile']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('staff_type', 'Staff Type', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('staff_type', old('staff_type'), ['class'=>'form-control', 'placeholder'=> 'Staff Type']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('DOJ', 'DOJ', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('DOJ', old('DOJ'), ['class'=>'form-control', 'placeholder'=> 'Staff Type']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('head_qtr', 'Head Qtr', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('head_qtr', old('head_qtr'), ['class'=>'form-control', 'placeholder'=> 'Head Qtr']) !!}
        </div>
    </div>
    
    

    <div class="form-group">
        {!! Form::label('state', 'State', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('state', old('state'), ['class'=>'form-control', 'placeholder'=> 'State']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', trans('coreadmin::admin.users-create-password'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> trans('coreadmin::admin.users-create-password_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('division', 'Division', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <!--{!! Form::select('division[]', $division, old('division'), ['class'=>'form-control' ,'multiple'=>'true']) !!}-->
            @foreach($division as $k => $v)
                <label><input type="checkbox" name="division[]" value="{{ $k }}"> {{ $v }}</label>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('role_id', trans('coreadmin::admin.users-create-role'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('role_id', $roles, old('role_id'), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('coreadmin::admin.users-create-btncreate'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}


{!! Form::open(array('files' => true, 'route' => config('coreadmin.route').'.product.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
        </div>
    </div>
   
    <div class="form-group">
        {!! Form::label('image', 'Image* ( 402 × 402 )', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('image') !!}
            {!! Form::hidden('image_w', 4096) !!}
            {!! Form::hidden('image_h', 4096) !!}
        </div>
    </div>
    


    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
          {!! Form::submit( trans('coreadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

{!! Form::close() !!}
@endsection


