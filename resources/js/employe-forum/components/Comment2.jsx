import React, { useEffect, useState } from 'react'
import useProfileStore from '../stores/ProfileStore'

export const Comment2 = ({ obj, handleLike, handleEdit, handleDelete }) => {
    const getProfile = useProfileStore((state) => state.profile)
    const [likeToggle, setLikeToggle] = useState(false)
   
    useEffect(() => {
        if (obj?.likers?.filter((x) => x.user_id === getProfile.id)?.length > 0) {
            setLikeToggle(true)
        }
    }, [getProfile, obj])

    const submitLike = () => {
        if (likeToggle) {
            obj.isLike = true
            handleLike(obj)
        } else {
            obj.isLike = false
            handleLike(obj)
        }
        setLikeToggle(!likeToggle)
    }

    const handlePrepareEdit = () => {
        obj.level = 2
        obj.isEdit = true
        handleEdit(obj)
    }

    const handlePrepareDelete = () => {
        handleDelete(obj)
    }

    return (
        <div className="flex flex-col gap-4 pl-4 border-l py-3 border-blue-900">
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
                {obj?.comment}
            </p>
            <div className="flex ">
                <div className="flex gap-2 cursor-pointer justify-center items-center" onClick={submitLike}>
                    <img src={likeToggle ? "../../assets/images/sosmed/like-active.svg" : "../../assets/images/sosmed/like.svg"} className="h-4 w-4" alt="like" />
                    <p className="text-xs mt-1 text-white">like</p>
                </div>
            </div>
        </div>
    )
}
