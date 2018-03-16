@foreach($articles as $article) 
<article class="row"> 
    <h1>{!!$article->title!!}</h1> 
    <p> {!! str_limit($article->content, 250) !!} 
        {!! link_to(route('article.show', $article->id), 'Read More') !!} 
    </p> 
</article> 
@endforeach