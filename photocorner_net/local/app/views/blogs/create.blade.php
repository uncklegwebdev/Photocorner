@extends('admin/master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            <small><i class="fa fa-file-text-o"></i></small>
            Napravi Novi Blog
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        {{ Form::open() }}
        <div class="form-group">
            <label for="title">Naziv</label>
            {{ Form::text('title',NULL,array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            <label for="description">Telo Bloga</label>
            {{ Form::textarea('description',NULL,array('class'=>'form-control ckeditor')) }}
        </div>

        {{ Form::submit('Create',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>
@stop
