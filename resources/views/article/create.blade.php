@extends("shared.layout") 
@section("content") 
    <h3>Create an Article</h3> 
    {!! Form::open(['route' => 'article.store', 
    'class' => 'form-horizontal', 'role' => 'form']) !!} 
        @include('article.form') 
    {!! Form::close() !!} 
@stop