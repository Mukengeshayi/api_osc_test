<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json([
            'status'=>true,
            'articles'=>$articles
        ],200);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationArticle= Validator::make( $request->all(),[
            'title'=>'required|string|max:258',
            'author'=>'required|string',
            'content'=>'required|string',
        ]);
        if ($validationArticle->fails()) {
            return response()->json([
                'status'=>false,
                'message'=> "Validator error",
                'article'=> $validationArticle->errors(),
            ],422);
        }
        $article = Article::create($request->All());

        return response()->json([
            'status'=> true,
            'message'=> " Article crée avec success",
            'article'=> $article
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return  response()->json([
                'status'=> false,
                'message'=> "l'article introuvable"
            ],404); ;
        }
        return  response()->json([
            'status'=> true,
            'article'=> $article
        ],200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Item not found'
            ],402);
        }
        $validationArticle= Validator::make( $request->all(),[
            'title'=>'required|string|max:258',
            'author'=>'required|string',
            'content'=>'required|string',
        ]);
        if ($validationArticle->fails()) {
            return response()->json([
                'status'=>false,
                'message'=> "Validator error",
                'article'=> $validationArticle->errors(),
            ],422);
        }

        $article->update($validationArticle->validated());

        return response()->json([
            'status'=> true,
            'message'=> " Article modifé avec success",
            'article'=> $article
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Article introuvable'
            ],422);
        }
        $article->delete();

        return response()->json([
            'status' => true,
            'message' => 'Article supprimé success'
        ], 200);

    }
}
