@extends('shared.layout')

@section('page_title', 'Home')

@section('content')
<div class="container">
<div class="row"> 
    <h2 class="pull-left">List Articles</h2> {!! link_to(route("article.create"), 
    "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!} 
</div>

<div class="row">
    {{--  <div class="form-group" style="">  --}}
    {{--  {!! Form::label('content', 'Search', array('class'=>'control-label')) !!}
    {!! Form::text('content', null, array('class'=>'form-control', 'placeholder'=>'Search','id'=>'search')) !!}
    {!! Form::submit('Search', array('class'=>'btn btn-primary', 'name'=>'action', 'id'=>'cari'))!!}  --}}
    <input type="text" name="content" id="content">
    <input type="submit" id="search" value="Search">
</div>
</div>

{{--  <div class="row">
    <form action="{{ route("article.index") }}" method="get">
        <label for="Search" input type="text" name="Search">Search</label>
        <input type="text" name="search">
        <input type="submit" value="Search" name="action">
        <input type="submit" value="Newest" name="action" class="btn btn-info">
        <input type="submit" value="Oldest" name="action" class="btn btn-info">
    </form>
</div>  --}}


<!-- This for handle ajax search --> 
<script> 
    $('#search').on('click', function(){ 
        $.ajax({ 
            url : '/article', 
            type : 'GET', 
            dataType : 'json', 
            data : { 
                'content' : $('#content').val(), 
            }, 
            success: function(data) { 
                $('#data-content').html(data['view']);
                // $('#search').val(data['cari']); 
                },
            error: function(xhr, status) { 
                console.log(xhr.error + " ERROR STATUS : " + status); 
            }, 
            complete: function() { 
                alreadyloading = false; 
            } 
        }); 
    }); 
</script>

<div

{{--  <div class="row">
    <div class="col-md-20">
        <form class="form-inline">
            <div class="form-group">
        {{--  <form action="{{ route('article.index') }} " method="get" class="form-inline pull-right" role="form">  --}}
            {{--  {{csrf_field()}}  --}}
            {{--  <label for="action" class="control-label">Sort by: </label>
            <input type="submit" value="Newest" name="action" class="btn btn-info">
            <input type="submit" value="Oldest" name="action" class="btn btn-info">
            </div>
        </form>
    </div>
</div>  --}}  
        
<div id='data-content' class="row">
        
            <div class="row">
                @include("article.list")
            </div>
        
        
</div>

@endsection


@section('info')
    {{--  @foreach($profil as $key => $value)
    <p>{{ $key.": ".$value}}</p>
    @endforeach  --}}
@endsection

