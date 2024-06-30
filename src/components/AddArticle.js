import React, { useState } from 'react';
import { createArticle } from '../service/articleService';

const AddArticle = () => {
    const [title, setTitle] = useState('');
    const [author, setAuthor] = useState('');
    const [content, setContent] = useState('');

    const handleSubmit = async (e) => {
        e.preventDefault();
        await createArticle({ title, author,content });
        setTitle('');
        setAuthor('');
        setContent('')
    };
    return (
        <form onSubmit={handleSubmit}>
            <div>
                <label>Titre:</label>
                <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} required />
            </div>
            <div>
                <label>Auteur:</label>
                <input value={author} onChange={(e) => setAuthor(e.target.value)} />
            </div>
            <div>
                <label>Contenu:</label>
                <textarea value={content} onChange={(e) => setContent(e.target.value)} />
            </div>
            <button type="submit">Ajouter Article</button>
        </form>
    );
}

export default AddArticle;
