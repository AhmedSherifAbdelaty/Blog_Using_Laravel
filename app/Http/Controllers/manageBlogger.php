<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class manageBlogger extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addArticleGet(){
        return view('Article.add');
    }

    public function addArticlePost(Request $request){
        $request->validate([
           'title' =>'required|min:10|max:100',
           'body'  =>'required|min:15|max:100'
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = Auth::id();
        $article->save();
       return redirect('view');
    }

    public function viewArticle(){
        $articles = Article::all();
        return view('Article.view' , ['allArticles' => $articles]);
    }

    public  function  read(Request $request , $id){
        $article = Article::find($id);
        return view('Article.read' , ['oneArticle' => $article]);
    }

    public function postComment(Request $request , $id){
        $request->validate([
            'comment' =>'required|min:10|max:100',
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->article_id = $id ;
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect("read/$id");

    }


    public function edit($id){
        $this->authorize('update', Article::find($id));

        $article = Article::find($id);
        return view('Article.edit' , ['article' => $article]);
    }

    public function update (Request $request , $id){
        $request->validate([
            'title' =>'required|min:10|max:100',
            'body'  =>'required|min:15|max:100'
        ]);
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = Auth::id();
        $article->save();
        return redirect('/view');
    }

    public function delete($id){
        $this->authorize('delete', Article::find($id));
        Article::find($id)->delete();
        return redirect('/view');
    }

    public function editcomment($id){
        $comment = Comment::find($id);
        return view('Article.editcomment' , ['comment' => $comment]);
    }


    public function updatecomment(Request $request , $id){
        $this->authorize('edit',Comment::find($id));
        $request->validate([
            'comment' =>'required|min:10|max:100',
        ]);
        $comment = Comment::find($id);
        $comment->comment = $request->input('comment');
        $comment->article_id =  $comment->article->id;
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect('/read/'.$comment->article->id);
    }

    public function deletecomment($id){
        $this->authorize('del',Comment::find($id));
        $articleId = Comment::find($id)->article->id ;
        Comment::find($id)->delete();
        return redirect('/read/'.$articleId);

    }

}
