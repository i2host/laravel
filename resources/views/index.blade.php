@extends('interface.main')

@section('main_content')

{{ var_dump(Auth::check()) }}

@stop