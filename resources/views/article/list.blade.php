
@foreach($articless as $article) 
<article class="row"> 
    <h1>{!!$article->title!!}</h1> 
    <p> {!! str_limit($article->content, 250) !!} 
        {!! link_to(route('article.show', $article->id), 'Read More') !!} 
    </p> 
</article> 
@endforeach

{{--  //Pagination  --}}
{{--  <div class="text-center"><hr>
    @if($action="Search" || $action='Oldest' || $action='Newest')
    {{ $articless->appends($request->except('page'))->links() }}  -->kalau tdk pake ajax
    @else  --}}
    {{ $articless->links() }}
    {{--  @endif
</div>  --}}