@extends("shared.layout") 
@section("content") 
    <h3>Create an Article</h3> 
    {!! Form::open(['route' => 'article.store', 
    'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true']) !!} 
        @include('article.form')
        {{--  <div class="form-group">
                <label for="userfile">Image File</label>
                <input type="file" class="form-control" name="userfile">
        </div>  --}}
   
    {!! Form::close() !!} 
@stop