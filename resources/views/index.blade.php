@extends('shared.layout')

@section('page_title', 'Home')

@section('content')
<!-- content -->
<p>{{$kalimat}}</p>
@endsection


@section('info')
    @foreach($profil as $key => $value)
    <p>{{ $key.": ".$value}}</p>
    @endforeach
@endsection