import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000"

export const PostArticleData = async (body) => {
    try {
        const { data } = await axios.post("/makePost", body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const GetProfileCurrentUser = async () => {
    try {
        const { data } = await axios.get("/currentUser");
        return { success: true, data };
    } catch (error) {
        throw { success: false, error: error.message };
    }
}

export const GetPostList = async (param) => {
    try {
        const { data } = await axios.get(`/listPost${param || ""}`);
        return { success: true, data };
    } catch (error) {
        throw { success: false, error: error.message };
    }
}

export const PostLike = async (body) => {
    try {
        const { data } = await axios.post("/like", body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const PostDisLike = async (body) => {
    try {
        const { data } = await axios.post(`/unlike`, body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const PostCommentArticle = async (body) => {
    try {
        const { data } = await axios.post(`/makeComment`, body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}