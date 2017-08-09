@extends('includes.deletes')

@section('delete_content')
<p>Confirm delete recoard No. {{ $data->id }} - {{ $data->name }} - {{ $data->email }} </p>
@stop


  