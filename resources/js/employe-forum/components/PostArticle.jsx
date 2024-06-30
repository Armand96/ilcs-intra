import React, { useEffect, useState } from 'react'
import { Comment } from './Comment1'
import moment from 'moment'
import { GetDeleteComment, GetDeletePost, GetPostList, PostCommentArticle, PostDisLike, PostEditArticle, PostEditComment, PostLike, PostView } from '../services/Api'
import usePostStore from '../stores/PostStore'
import { ModalComment } from './ModalComment'
import { toast } from 'react-toastify'
import { ModalPost } from './ModalPost'
import { useInView } from 'react-intersection-observer'
import ImageContent from './ImageContent'

export const PostArticle = ({ obj, getProfile }) => {
    const setPostData = usePostStore((state) => state.updatePostData)
    const getPostData = usePostStore((state) => state.postData)
    const [toggleComment, setToggleComment] = useState(false)
    const [isLike, setIsLike] = useState(false)
    const [detailData, setDetailData] = useState(null)
    const [toggleModalComment, setToggleModalComment] = useState(false)
    const [detailDataComment, setDetailDataComment] = useState(null)
    const [toggleModalEdit, setToggleModalEdit] = useState(false)
    const [toggleModalDelete, setToggleModalDelete] = useState(false)
    const setResetPaginate = usePostStore((state) => state.setResetPaginate)
    const { ref, inView } = useInView({
        triggerOnce: true, // Hanya trigger sekali ketika pertama kali masuk viewport
        threshold: 0.5, // Komponen dianggap terlihat jika 50% dari komponen sudah masuk viewport
      });
    
    // console.log()

    useEffect(() => {
        if (obj?.likers?.filter((x) => x.user_id == getProfile?.id).length > 0) {

            setIsLike(true)
        }
    }, [getProfile])



    // console.log("LIKE",isLike,"obj", obj?.likers, "profle", getProfile?.id)

    useEffect(() => {
        setDetailData(obj)
    }, [obj])

    useEffect(() => {
        if (inView) {
          // Fungsi untuk mengirim data ketika komponen terlihat
          PostView(`/${obj?.id}`).then((res) => {
            // GetPostList(`/${obj?.id}`).then((resp) => {
            //     let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
            //     setDetailData(resp.data)
            //     getPostData.data[currentIndex] = resp.data
            //     setPostData(getPostData)
            // })
        })
          };
    
         
      }, [inView]);

    const handleLike = () => {

        if (isLike) {
            setIsLike(!isLike)
            PostDisLike({ 'post_id': obj?.id }).then((res) => {
                GetPostList(`/${obj?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            })
        } else {
            setIsLike(!isLike)
            PostLike({ 'post_id': obj?.id }).then((res) => {
                GetPostList(`/${obj?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            })
        }

    }


    const handleComment = () => {
        setToggleModalComment(true)
        setDetailDataComment(detailData)
    }

    const handleReplies = (obj) => {
        obj.level = 2
        setToggleModalComment(true)
        setDetailDataComment(obj)
    }


    const handleEdit = (obj) => {
        setToggleModalComment(true)
        setDetailDataComment(obj)
    }

    const handleSubmitComment = (data) => {
        if (data.isEdit) {
            PostEditComment(data, `/${data.comment_id}`).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === detailData?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
                setToggleModalComment(!toggleModalComment)
            }).catch((err) => {
                toast.error(`err ${err.error}`)
            })
        } else {
            PostCommentArticle(data).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === detailData?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
                setToggleModalComment(!toggleModalComment)
            }).catch((err) => {
                toast.error(`err ${err.error}`)
            })
        }

    }

    const handleLikeComment = (obj) => {
        if (obj?.isLike) {
            PostDisLike({ 'comment_id': obj?.id }).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            }).catch((err) => {
                toast.error(`err ${err.error}`)
            })
        } else {
            PostLike({ 'comment_id': obj?.id }).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            }).catch((err) => {
                toast.error(`err ${err.error}`)
            })
        }
    }

    const handleDelete = (obj) => {
        console.log("LOCATION", window.location.href)
        // GetDeleteComment(`/${obj.id}`).then((res) => {
        //     GetPostList(`/${detailData?.id}`).then((resp) => {
        //         let currentIndex = getPostData?.data?.findIndex((x) => x?.id === detailData?.id);
        //         setDetailData(resp.data)
        //         getPostData.data[currentIndex] = resp.data
        //         setPostData(getPostData)
        //     })
        //     toast.success("Delete comment success")
        // }).catch((err) => {
        //     toast.error(`err ${err.error}`)
        // })
    }

    const handleEditPost = (data) => {
        PostEditArticle(data, `/${detailData.id}`).then((res) => {
            GetPostList(`/${detailData?.id}`).then((resp) => {
                let currentIndex = getPostData?.data?.findIndex((x) => x?.id === detailData?.id);
                setDetailData(resp.data)
                getPostData.data[currentIndex] = resp.data
                setPostData(getPostData)
            })
            setToggleModalEdit(!toggleModalEdit)
            toast.success("success update a post")
        }).catch((err) => {
            toast.error(`err ${err.error}`)
        })
    }


    const handleDeletePost = () => {

        GetDeletePost(`/${detailData.id}`).then((res) => {
            GetPostList(``).then((resp) => {
                setPostData(resp.data)
                setResetPaginate(true)
                setToggleModalDelete(false)
                toast.success("success delete a post")
                if (window.location.href.includes("detail")) {
                    window.location.replace("/employee-forum")
                }
            })
        }).catch((err) => {
            toast.error(`err ${err.error}`)
        })
    }


    return (
        <>

            {
                toggleModalEdit && <ModalPost obj={detailData} toggle={() => setToggleModalEdit(!toggleModalEdit)} show={toggleModalEdit} handleEditPost={handleEditPost} />
            }
            {
                toggleModalComment && <ModalComment obj={detailDataComment} toggle={() => setToggleModalComment(!toggleModalComment)} show={toggleModalComment} submit={handleSubmitComment} />
            }

            <dialog id="buat-post" class={toggleModalDelete ? "modal modal-open" : "modal"}>
                <div class="modal-box max-w-3xl bg-[#283358]">
                    <form method="dialog">
                        <button onClick={() => setToggleModalDelete(false)} class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onclick="togglePostModal()">✕</button>
                    </form>
                    <h3 class="font-bold text-white text-lg">Are you sure to delete a post ?</h3>
                    <div className="row">
                        <button id="post-only-text" class="btn mt-4  text-white bg-red-600 px-4 py-2 rounded-xl mr-2" onClick={() => setToggleModalDelete(false)} >cancel</button>
                        <button id="post-only-text" class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={handleDeletePost} >Submit</button>
                    </div>
                </div>
            </dialog>


            <div className="bg-[#283358] flex flex-col  w-5/6 mx-auto px-4 py-4 border border-blue-900 rounded-xl" ref={ref}>

                <div className="flex items-center justify-between">
                    <div className="flex items-center gap-5">
                        <img src={detailData?.posted_by?.image_user ? detailData?.posted_by?.image_user.includes("http") ? detailData?.posted_by?.image_user : `../../storage/profile_picture/${detailData?.posted_by?.image_user}` : "../../assets/images/sosmed/foto-profile.svg"} onError={(e) => e.target.src = window.location.origin + "/assets/images/sosmed/foto-profile.svg"} alt="profile" className="w-8 h-8 rounded-full" />
                        <div className="flex flex-col">
                            <p className="text-white items-center text-sm">
                                <span className="font-bold">{detailData?.posted_by?.name}</span> | <span className="font-light"> {detailData?.posted_by?.jabatan}</span>
                            </p>
                            <p className="text-white font-light text-xs">{moment(detailData?.created_at).fromNow()}</p>
                        </div>
                    </div>

                    <div className={detailData?.posted_by?.id === getProfile?.id ? "flex-reverse-row flex" : "hidden"}>
                        <div className="dropdown dropdown-end ">
                            <div className="flex items-center" tabindex="0" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="size-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </div>
                            <ul tabindex="0" className="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                                <li><a onClick={() => setToggleModalDelete(true)} >Delete</a></li>
                                <li><a onClick={() => setToggleModalEdit(true)} >Edit</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div className="flex flex-col mt-5">
                    <p className="text-sm text-white">
                        {detailData && detailData?.content}
                    </p>
                    <div className="w-full flex flex-col">
                        {detailData?.files[0]?.tipe === "gambar" ? 
                            <ImageContent image={detailData?.files} />
                        : detailData?.files?.map((file, index) => (
                            <a target='_blank' href={`../../storage/employee_forum/${file?.path_file}`} className="flex border border-blue-800 rounded-xl mt-5 w-full items-center gap-6 data-file" key={index}>
                                <div className="w-1/6 flex items-center justify-center ">
                                    <img src="../../assets/images/sosmed/file-upload-icon.svg" alt="pdf icon" className="size-24  bg-[#00000033] rounded-full p-3" />
                                </div>
                                <div className="flex flex-col w-4/6">
                                    <p className="text-white text-sm mb-2">
                                        {file?.path_file?.replace("_", " ")}
                                    </p>
                                </div>
                            </a>
                        ))}
                    </div>


                    {/* <img src="../../assets/images/background/login-right-image.svg" className="w-full mt-6 top-3 h-[26rem] rounded-lg detailDataect-cover" /> */}
                </div>

                <div className="flex gap-5 mt-5 border-b border-gray-[#E1E5F6] pb-4">
                    <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={handleLike}>
                        <img src={isLike && isLike ? "../../assets/images/sosmed/like-active.svg" : "../../assets/images/sosmed/like.svg"} className="h-4 w-4" alt="like" />
                        <p className="text-xs mt-1 text-white">like</p>
                    </div>
                    <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={handleComment}>
                        <img src="../../assets/images/sosmed/comment-icon.svg" className="h-4 w-4" alt="like" />
                        <p className="text-xs mt-1 text-white">comment</p>
                    </div>
                </div>


                <div className="flex mt-2 justify-between w-full">
                    {
                       detailData && detailData?.likers?.length > 0 ? <div className="w-2/6 items-center flex gap-3">
                            <img src="../../assets/images/sosmed/like-stat-icon.svg" className="h-7 w-7" alt="like" />
                            <p className="text-xs font-light mt-1 text-white">{
                                detailData?.total_like === 1 ? detailData?.likers[0]?.user_id === getProfile?.id ? "Anda menyukai postingan ini" :  detailData?.likers[0]?.user?.name
                                    : detailData?.likers[0]?.user_id === getProfile?.id ? ` Anda ${ detailData.total_like > 2 ? `dan ${detailData?.likers[1]?.user?.name}` : ""} dan ${detailData?.total_like > 1 ? detailData?.total_like - 1 : detailData?.total_like - 2  } lainnya`  :  ` ${detailData?.likers[0]?.user?.name} dan ${detailData?.total_like - 1 } lainnya`
                            } </p>
                        </div> : ""
                    }
                    <div className={isLike ? "w-2/6 flex items-center flex-row-reverse gap-3" : "w-full flex items-center flex-row-reverse gap-3"}>
                        <p className="text-xs font-light mt-1 text-white">{detailData?.total_view}</p>
                        <img src="../../assets/images/sosmed/eye-icon.svg" className="h-4 w-4" alt="like" />
                        <p className="text-xs font-light mt-1 text-white">{detailData?.total_comments}</p>
                        <img src="../../assets/images/sosmed/comment-icon.svg" className="h-4 w-4" alt="like" />
                    </div>
                </div>

                {
                    detailData?.comments?.length > 0 ? <>
                        <div className={toggleComment ? "flex flex-col gap-3" : "hidden"}>
                            {
                                detailData && detailData?.comments?.map((item) => (
                                    <Comment handleDelete={handleDelete} handleEdit={handleEdit} handleLike={handleLikeComment} handleReplies={handleReplies} obj={item} />
                                ))
                            }
                        </div>
                        <p onClick={() => setToggleComment(!toggleComment)} className="text-[#4AA5FF] text-xs cursor-pointer flex mt-4 items-center">
                            {
                                toggleComment ? "close replies" : "see replies"
                            }
                            {
                                toggleComment ? <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="size-4 ml-4 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg> : <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="size-4 ml-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            }
                        </p>
                    </> : ""
                }

            </div>
        </>
    )
}
