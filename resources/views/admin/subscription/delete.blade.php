@extends('admin.includes.deletes')

@section('delete_content')
<p>Confirm delete recoard No. {{ $data->id }} - {{ $data->user->name }} - {{ $data->plan->name }}</p>
@stop


  