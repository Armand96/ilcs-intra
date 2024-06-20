// ================================ POST ================================ //
/* URL: localhost/makePost (POST) */
// REQUEST
let paramCreate = {
    "content": "string", // mandatory
    "images": [ // optional
        "string base 64",
        "string base 64",
    ],
    "videos": [ // optional
        // FileInstance
    ],
    "files": [ // optional
        // FILES DARI FORM,
        // FILES DARI FORM,
        // FILES DARI FORM,
    ]
};
// REPSONSE
let modelPost = {
    "id": 1,
    "content": "Test Content",
    "posted_by": {
        "id": 1,
        "name": "Admin",
        "image_user": ""
    },
    "total_like": 0,
    "created_at": "2024-06-20T10:56:46.000000Z",
    "updated_at": null,
    "comments": [
        {
            "id": 1,
            "user_id": 2,
            "comment": "Test Comment",
            "parent_comment_id": null,
            "post_id": 1,
            "user": {
                "id": 2,
                "name": "Prakosa Hadi Takariyanto",
                "image_user": "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_prakosa.jpg"
            },
            "replies": [
                {
                    "id": 2,
                    "user_id": 1,
                    "comment": "Balas",
                    "parent_comment_id": 1,
                    "post_id": null,
                    "user": {
                        "id": 1,
                        "name": "Admin",
                        "image_user": ""
                    }
                }
            ]
        }
    ]
};

/* URL: localhost/listPost (GET) */
// Responsenya modelPost array

/* URL: localhost/listPost/{postId: number} (GET) */
// Responsenya modelPost

/* URL: localhost/updatePost/{postId: number} (PUT) */
let paramUpdate = {
    "content": "string", // kirim contentnya saja, untuk file dan lain2nya nya hold dulu
};

// RESPONSE MESSAGE
let responseMessage = {
    "message": "string"
};

/* URL: localhost/deletePost/{postId: number} (GET) */
// RESPONSENYA SAMA MESSAGE

// ================================ COMMENT ================================ //
// MAKE COMMENT
/* URL: localhost/makeComment */
// REQUEST
let comment = {
    'post_id':1, // number, mandatory
    'parent_comment_id':1, // number, opsional: isi untuk reply comment
    'comment': 'string' // mandatory
};

// RESPONSE commentModel
let commentModel = {
    "id": 2,
    "user_id": 1,
    "comment": "Balas",
    "parent_comment_id": 1,
    "post_id": null,
    "user": {
        "id": 1,
        "name": "Admin",
        "image_user": ""
    }
};

// EDIT COMMENT
// REQUEST
let updateComment = {
    'comment': 'string' // mandatory
}
// RESPONSE commentModel

/* URL: localhost/deleteComment/{commentId: number} (GET) */
// RESPONSE responseMessage

// ================================ LIKE ================================ //
// LIKE
/* URL: localhost/like (POST) */
// REQUEST
let paramLike = {
    'post_id': 1, // number, isi untuk like post
    'comment_id': 1, // number, isi untuk like comment
};
// RESPONSE responseMessage

// UNLIKE
/* URL: localhost/unlike (POST) */
let paramUnlike = {
    'post_id': 1, // number, isi untuk unlike post
    'comment_id': 1, // number, isi untuk unlike comment
};
// RESPONSE responseMessage

// ================================ SEE POST (VIEWER) ================================ //
/* URL: localhost/seePost/{postId: number} (GET) */
// RESPONE responseMessage
