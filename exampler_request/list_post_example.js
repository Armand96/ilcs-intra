const list = [
    { // single post langsung object
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
    }
]
