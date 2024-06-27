<?php

namespace App\Http\Controllers\Apis\Articles;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Controllers\Controller;
use App\Repository\Article\ArticleContract;
use App\Utils\ConstantName;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected ArticleContract $articleContract;
    public function __construct(ArticleContract $_articleContract) {
        $this->articleContract = $_articleContract;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=$this->articleContract->toGetAll();
        return $this->sendResponse($articles, ConstantName::RETRIEVE_DATA_SUCCESS_MESSAGE);
    }
    public function store(ArticleStoreRequest $request)
    {
        $inputs = $request->all();
        $articles=$this->articleContract->toAdd($inputs);
        return $this->sendResponse($articles, ConstantName::STORE_SUCCESS_MESSAGE);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $article = $this->articleContract->toUpdate( $input, $id );

        return $this->sendResponse( $article, ConstantName::UPDATE_SUCCESS_MESSAGE );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
