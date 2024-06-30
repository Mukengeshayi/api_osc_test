import api from "./api";

export const getArticles = async()=>{
    const response = await api.get('/articles');
    return response.data
}
export const createArticle = async(article)=>{
    const response = await api.post('/articles',article);
    return response.data
}
export const getArticle = async(id)=>{
    const response = await api.get(`/articles/${id}`);
    return response.data
}
export const updateArticle = async (id, article) => {
    const response = await api.put(`/articles/${id}`, article);
    return response.data;
};
export const deleteArticle = async (id) => {
    const response = await api.delete(`/articles/${id}`);
    return response.data;
};