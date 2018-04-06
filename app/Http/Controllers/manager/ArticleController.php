<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ArticleRequest;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware() ->hasRole('manager');
    }

    public function index(Request $request)
    {
        $articles = Article::all();
        return view('manager.art_man')->with('articles', $articles);
        
    }

    public function update(Request $request, $id)
    {
        Article::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['success'=>$request->all()]);

    }
}
