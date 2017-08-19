@extends('admin.includes.deletes')

@section('delete_content')
<p>Confirm delete recoard No. {{ $data->id }} - {{ $data->mac }}</p>
<ul>
@foreach ($data->users as $user)
    <li>{{ $user->id }} - {{ $user->name }} - {{ $user->last_name }} - {{ $user->email }} - Premium : {{ $user->premium === 1 ? 'Yes' : 'No' }}</li>
@endforeach
</ul>
@stop


  
  