@extends("shared.layout") 
@section("content") 
    <h3>Edit Article</h3> 
    {!! Form::model($article, ['route' => ['article.update', $article->
    id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 
    'form']) !!} 
        @include('article.form') 
    {!! Form::close() !!} 
@stop