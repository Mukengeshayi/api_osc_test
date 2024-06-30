import React, { useEffect, useState } from 'react';
import { deleteArticle, getArticles } from '../service/articleService';

const ListArticle = () => {
    const [articles, setArticles]=useState([])
    
    useEffect(() => {
      fetchArticles();
    }, [])

    const fetchArticles= async()=>{
        const data = await getArticles();
        console.log(data)
        setArticles(data.articles);
    }
    const handleDelete = async (id) => {
        await deleteArticle(id);
        fetchArticles();
    };

    return (
        <div>
            <h1>Liste des articles</h1>
            <ul>
               {articles?.map(article=>(
                  <li key={article.id}>
                  {article.id}-------{article.title}--------{article.author}--------{article.content}
                    <button onClick={() => handleDelete(article.id)}>Delete</button>
                  </li>
               ))}
            </ul>
        </div>
    );
}

export default ListArticle;

