@extends('includes.deletes')

@section('delete_content')
<p>Confirm delete recoard No. {{ $data->id }} - {{ $data->mac }} - {{ $data->users[0]->name }}</p>
@stop


  