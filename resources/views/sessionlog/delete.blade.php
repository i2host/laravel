@extends('includes.deletes')

@section('delete_content')
<p>Confirm delete recoard No. {{ $data->id }} - {{ $data->device->mac }} - {{ $data->server->name }}</p>
@stop


  
  