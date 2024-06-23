import React, { useEffect, useState } from 'react'
import { Comment2 } from './Comment2'
import useProfileStore from '../stores/ProfileStore'

export const Comment = ({ obj, handleReplies, handleLike, handleEdit, handleDelete }) => {
    const getProfile = useProfileStore((state) => state.profile)
    const [toggleComment, setToggleComment] = useState(false)
    const [likeToggle, setLikeToggle] = useState(false)

    useEffect(() => {
        if(obj?.likers?.filter((x) => x.user_id === getProfile.id)?.length > 0){
            setLikeToggle(true)
        }
    },[getProfile, obj])

    const submitLike = () => {
        if(likeToggle){
            obj.isLike = true
            handleLike(obj)
        }else{
            obj.isLike = false
            handleLike(obj)
        }
        setLikeToggle(!likeToggle)
    }

    const handlePrepareEdit = () => {
        obj.isEdit = true
        handleEdit(obj)
    }

    const handlePrepareDelete = () => {
        handleDelete(obj)
    }

    return (
        <div className="flex flex-col gap-4  px-4 py-2 rounded-xl border-blue-900">
            <div className="flex justify-between">
                <div className="flex items-center gap-5 ">
                <img src={obj?.user?.image_user ? obj?.user?.image_user?.includes("http") ?  obj?.user?.image_user : `../../storage/profile_picture/${obj?.user?.image_user}` : "../../assets/images/sosmed/foto-profile.svg"} alt="profile" className="w-8 h-8 rounded-full" />
                <div className="flex flex-col">
                        <p className="text-white items-center text-sm">
                            <span className="font-bold">{obj?.user?.name}</span>
                        </p>
                        <p className="text-white font-light text-xs">{moment(obj?.created_at).fromNow()}</p>
                    </div>
                </div>
                <div className={obj?.user_id === getProfile?.id ? "flex-reverse-row flex" : "hidden"} >
                    <div className="dropdown dropdown-end ">
                        <div className="flex items-center" tabindex="0" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>
                        </div>
                        <ul tabindex="0" className="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                            <li><a onClick={handlePrepareDelete}>Delete</a></li>
                            <li><a onClick={handlePrepareEdit}>Edit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <p className="text-white text-sm">
                {
                    obj?.comment
                }
            </p>
            <div className="flex gap-5 pb-4">
                <div className="flex gap-2 cursor-pointer justify-center items-center"  onClick={submitLike}>
                    <img src={likeToggle ? "../../assets/images/sosmed/like-active.svg" : "../../assets/images/sosmed/like.svg"} className="h-4 w-4" alt="like" />
                    <p className="text-xs mt-1 text-white">like</p>
                </div>
                <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={() => handleReplies(obj)}>
                    <img src="../../assets/images/sosmed/comment-icon.svg" className="h-4 w-4" alt="like"  />
                    <p className="text-sm mt-1 text-white">comment</p>
                </div>
            </div>
            {
                obj?.replies?.length > 0 ? <>
                    <div className={toggleComment ? "flex flex-col gap-3" : "hidden"}>
                        {
                            obj?.replies?.map((x) => (
                                <Comment2 handleEdit={handleEdit} obj={x} handleLike={handleLike} />
                            ))
                        }
                    </div>
                    <p onClick={() => setToggleComment(!toggleComment)} className="text-[#4AA5FF] text-xs cursor-pointer flex items-center">
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
    )
}
