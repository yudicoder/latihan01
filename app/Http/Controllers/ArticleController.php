<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article; //utk menunjukkan lokasi Article
// use resources\views\article\Create;
use Session, Redirect;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $articles = Article::all(); // bs jg ditulis App\Article
        // return view('article.index')->with('articless', $articles);

        // $action = Input::get('action', 'none');
        //     dd($request->content);
        // if ($request->ajax()) {
        //     $articles = Article::where('title', 'like', '%' . $request->content . '%')->orWhere('content', 'like', 
        //     '%'. $request->content. '%')
        //     ->orderBy('updated_at', 'desc')->paginate(5);
        //     $view = (String) view('article.list')
        //     ->with('articles', $articles)
        //     ->render();
        //     return response()->json(['view' => $view, 'status' => 'success']);
        // } else {  ->utk ajax

        $action = Input::get('action', 'none');
        if($request->ajax()) { 
            $articles = Article::where('title', 'like', '%'.$request->content.'%') ->where('status','show')->paginate(3); 
            // dd ($article);
                $view = (String) view('article.list') 
                ->with('articless', $articles) 
                ->render(); 
                return response()->json(['view' => $view, 'status' => 'success']); 
            } else {
            if ($action == 'Search') {
                $articles = Article::where('title', 'like', 'status', 'show','%'. $request->content. '%')->paginate(3);
                // ->orWhere('content', 'like', '%'. 
                // $request->content. 
                // '%')-> orWhere('status','Show')->orderBy('updated_at', 'desc')->paginate(3); //get atau paginate(5);
                // dd($articles);
                return view('article.index')->with('articless', $articles)->with('action', $action)->with('status','Show');
            } elseif ($action == 'Oldest') {
                $articles = Article::where('title', 'like', '%'. $request->content. '%')->orWhere('content', 'like', '%'. 
                $request->content. 
                '%')-> orWhere('status','Show')->orderBy('updated_at', 'asc')->paginate(3); //get atau paginate(5);
                return view('article.index')->with('articless', $articles)->with('action', $action);
            } else {
                $articles = Article::Where('status','show')->orderBy('updated_at', 'desc')->paginate(3); //get atau paginate(5)
                return view('article.index')->with('articless', $articles)->with('action', $action);
            }
        }
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
        // Article::create($request->all()); 
        // Session::flash("notice", "Article success created"); 
        // return redirect()->route("article.index");

        // $artikel = Article::create($request->all());
        $article = new Article();

        //upload the image //
        $file = $request->file('path');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->path = $destination_path . $filename;
        $article->save();

        if ($article) {
            Session::flash("notice", "Article successfully created");
        } else {
            Session::flash("errors", "Article creation failed");
        }
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
        return view('article.show') ->with('article', $article) ->with('comments', $comments) ;
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
    public function update(Request $request, $id)
    {
        // Article::find($id)->update($request->all()); 
        // Session::flash("notice", "Article success updated"); 
        // return redirect()->route("article.show", $id);

        // $file = $request->file('path');
        // $destination_path = 'uploads/';
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        // $file->move($destination_path, $filename);
        
        //Validation//
        $validation = Validator::make($request->all(), [
            'title'   => 'required',
            'content'=> 'required',
            'path'  => 'required'
        ]);

        //check if it fails//
        if($validation->fails()){
            return redirect()->back()->withInput()
                ->with('errors',$validation->errors());
        }

        //process valid data & go to success page//
        $article = Article::find($id);
        
        //if user choose a file, replace the old one//
        if($request->hasFile('path')){
            $file = $request->file('path');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path,$filename);
            $article->path=$destination_path.$filename;
        }
        
        //replace old data with new data from the submitted form//
        $article->title=$request->title;
        $article->content=$request->content;
        $article->save();

        return redirect()->route("article.index");
    
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
        Session::flash("notice", "Article successfully deleted");
        if (Auth::user()->hasRole('manager'))
        {
            return redirect() -> route('status.index');
        }
        else         
        {
            return redirect() -> route('article.index');
        } 
        
    }
    public function comments() { 
        return $this->hasMany('App\Comment', 'article_id'); 
    }
}

