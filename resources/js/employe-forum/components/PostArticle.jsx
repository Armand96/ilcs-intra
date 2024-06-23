import React, { useEffect, useState } from 'react'
import { Comment } from './Comment1'
import moment from 'moment'
import { GetPostList, PostCommentArticle, PostDisLike, PostLike } from '../services/Api'
import usePostStore from '../stores/PostStore'
import { ModalComment } from './ModalComment'
import { toast } from 'react-toastify'

export const PostArticle = ({ obj, getProfile }) => {
    const setPostData = usePostStore((state) => state.updatePostData)
    const getPostData = usePostStore((state) => state.postData)
    const [toggleComment, setToggleComment] = useState(false)
    const [isLike, setIsLike] = useState(false)
    const [detailData, setDetailData] = useState(obj)
    const [toggleModalComment, setToggleModalComment] = useState(false)
    const [detailDataComment, setDetailDataComment] = useState(null)

    console.log("profle", getProfile?.id)
    console.log("obj", obj)

    useEffect(() => {
        if (obj?.likers?.filter((x) => x.user_id == getProfile?.id).length > 0) {
            setIsLike(true)
        }
    }, [getProfile])

    useEffect(() => {
        setDetailData(obj)
    },[obj])

    const handleLike = () => {
        setIsLike(!isLike)

        if (isLike) {
            PostDisLike({ 'post_id': obj?.id }).then((res) => {
                GetPostList(`/${obj?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            })
        } else {
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



    const handleSubmitComment = (data) => {
        PostCommentArticle(data).then((res) => {
            GetPostList(`/${obj?.id}`).then((resp) => {
                let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                setDetailData(resp.data)
                getPostData.data[currentIndex] = resp.data
                setPostData(getPostData)
            })
            setToggleModalComment(!toggleModalComment)
        })
    }

    const handleLikeComment = (obj) => {
        if (obj?.isLike) {
            PostDisLike({ 'post_id': detailData?.id, 'comment_id': obj?.id }).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            })
        } else {
            PostLike({ 'post_id': detailData?.id, 'comment_id': obj?.id }).then((res) => {
                GetPostList(`/${detailData?.id}`).then((resp) => {
                    let currentIndex = getPostData?.data?.findIndex((x) => x?.id === obj?.id);
                    setDetailData(resp.data)
                    getPostData.data[currentIndex] = resp.data
                    setPostData(getPostData)
                })
            })
        }
    }


    return (
        <>
            {
                toggleModalComment && <ModalComment  obj={detailDataComment} toggle={() => setToggleModalComment(!toggleModalComment)} show={toggleModalComment} submit={handleSubmitComment} />
            }

            <div className="bg-[#283358] flex flex-col w-5/6 mx-auto px-4 py-4 border border-blue-900 rounded-xl">

                <div className="flex items-center gap-5">
                    <img src={!detailData?.posted_by?.image_user ? "../../assets/images/sosmed/foto-profile.svg" : detailData?.posted_by?.image_user} alt="profile" className="w-10 h-10 rounded-full" />
                    <div className="flex flex-col">
                        <p className="text-white items-center text-sm">
                            <span className="font-bold">{detailData?.posted_by?.name}</span> | <span className="font-light"> {detailData?.posted_by?.jabatan}</span>
                        </p>
                        <p className="text-white font-light text-xs">{moment(detailData?.created_at).fromNow()}</p>
                    </div>
                </div>

                <div className="flex flex-col mt-5">
                    <p className="text-sm text-white">
                        {detailData && detailData?.content}
                    </p>
                    {/* <img src="../../assets/images/background/login-right-image.svg" className="w-full mt-6 top-3 h-[26rem] rounded-lg detailDataect-cover" /> */}
                </div>

                <div className="flex gap-5 mt-5 border-b border-gray-[#E1E5F6] pb-4">
                    <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={handleLike}>
                        <img src={isLike ? "../../assets/images/sosmed/like-active.svg" : "../../assets/images/sosmed/like.svg"} className="h-4 w-4" alt="like" />
                        <p className="text-xs mt-1 text-white">like</p>
                    </div>
                    <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={handleComment}>
                        <img src="../../assets/images/sosmed/comment-icon.svg" className="h-4 w-4" alt="like" />
                        <p className="text-xs mt-1 text-white">comment</p>
                    </div>
                </div>


                <div className="flex mt-2 justify-between w-full">
                    {
                        detailData?.likers?.length > 0 ? <div className="w-2/6 items-center flex gap-3">
                            <img src="../../assets/images/sosmed/like-stat-icon.svg" className="h-7 w-7" alt="like" />
                            <p className="text-xs font-light mt-1 text-white">{
                                detailData?.likers?.length === 1 ? detailData?.likers[0]?.user_id === getProfile.id ? "Anda menyukai postingan ini" : detailData?.likers[0]?.user?.name
                                    : ` ${detailData?.likers[0].user?.name} and ${detailData?.likers?.length - 1} other`
                            } </p>
                        </div> : ""
                    }
                    <div className={isLike ? "w-2/6 flex items-center flex-row-reverse gap-3" : "w-full flex items-center flex-row-reverse gap-3"}>
                        <p className="text-xs font-light mt-1 text-white">{detailData?.total_like}</p>
                        <img src="../../assets/images/sosmed/eye-icon.svg" className="h-4 w-4" alt="like" />
                        <p className="text-xs font-light mt-1 text-white">{detailData?.total_view}</p>
                        <img src="../../assets/images/sosmed/comment-icon.svg" className="h-4 w-4" alt="like" />
                    </div>
                </div>

                {
                    detailData?.comments?.length > 0 ? <>
                        <div className={toggleComment ? "flex flex-col gap-3" : "hidden"}>
                           {
                            detailData && detailData?.comments?.map((item) => (
                                <Comment handleLike={handleLikeComment} handleReplies={handleReplies} obj={item} />
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
