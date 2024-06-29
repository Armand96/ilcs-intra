import axios from "axios";


axios.defaults.baseURL = window.location.origin


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


export const PostEditComment = async (body, params) => {
    try {
        const { data } = await axios.post(`/updateComment${params}`, body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const GetDeleteComment = async (params) => {
    try {
        const { data } = await axios.get(`/deleteComment${params}`);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const PostEditArticle = async (body, params) => {
    try {
        const { data } = await axios.post(`/updatePost${params}`, body);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const GetDeletePost = async (params) => {
    try {
        const { data } = await axios.get(`/deletePost${params}`);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}

export const PostView = async (params) => {
    try {
        const { data } = await axios.get(`/seePost${params}`);
        return { success: true, data };
    } catch (error) {
        console.log(error.toJSON());
        throw { success: false, error: error.message };
    }
}
