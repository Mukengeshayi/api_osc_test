<?php

namespace App\Repository\Article;

use App\Models\Article;
use App\Repository\Article\ArticleContract;

class ArticleRepo implements ArticleContract
{
	/**
	 * @param array $inputs
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function toAdd(array $inputs): \Illuminate\Database\Eloquent\Model {
        $article = Article::create( $inputs );
        return $article;
	}

	/**
	 *
	 * @param array $inputs
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function toUpdate(array $inputs, $id): \Illuminate\Database\Eloquent\Model {
        $article =  $this->toGetById( $id );
        foreach ( $inputs as $property => $value )
        $article->$property = $value;
        $article->update();

        return $article;
	}

	/**
	 *
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function toDelete($id): \Illuminate\Database\Eloquent\Model {
        $article =  $this->toGetById( $id );
        $article->delete();
        return $article;
	}

	/**
	 *
	 * @param mixed $n
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function toGetAll($n = 50) {
        $article = Article::paginate( $n );
        return $article;
	}

	/**
	 *
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function toGetById($id): \Illuminate\Database\Eloquent\Model|null {
        return Article::findOrFail( $id );
	}
}
