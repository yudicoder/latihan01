<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article; //utk menunjukkan lokasi Article
// use resources\views\article\Create;
use Session, Redirect;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all(); // bs jg ditulis App\Article
        return view('article.index')->with('articless', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all()); 
        Session::flash("notice", "Article success created"); 
        return redirect()->route("article.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id); 
        // return view('article.show')->with('article', $article);
        // $article = Article::find($id); 
        $comments = Article::find($id)->comments->sortBy('Comment.created_at'); 
        return view('article.show') ->with('article', $article) ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id); 
        return view('article.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        Article::find($id)->update($request->all()); 
        Session::flash("notice", "Article success updated"); 
        return redirect()->route("article.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id); 
        Session::flash("notice", "Article success deleted"); 
        return redirect()->route("article.index");
    }
    public function comments() { 
        return $this->hasMany('App\Comment', 'article_id'); 
    }
}
