import React, { useEffect, useState } from 'react'
import { GetPostList, PostArticleData } from '../services/Api'
import { toast } from 'react-toastify'
import useProfileStore from '../stores/ProfileStore'
import usePostStore from '../stores/PostStore'

export const ModalPost = ({ toggle, show, handleEditPost,toggleModalFoto,toggleModalFile, obj}) => {
    const [contentData, setContentData] = useState({
        content : ""
    })
    const getProfile = useProfileStore((state) => state.profile)
    const setPostData = usePostStore((state) => state.updatePostData)
    const setResetPaginate = usePostStore((state) => state.setResetPaginate)

    const PostData = () => {
        let formData = new FormData
        formData.append('content', contentData.content)

        PostArticleData(formData).then((res) => {
            GetPostList(``).then((resp) => {
                toast.success(`success make a post`)
                setPostData(resp.data)
                toggle()
                setResetPaginate(true)
            })
        }).catch((err) => {
            toast.error(`err ${err.error}`)
            toggle()
        })
    }

    useEffect(() => {
        setContentData({...contentData, content: obj?.content })
    },[])

    const handleEditPostPrepare = () => {
        let formData = new FormData
        formData.append('content', contentData.content)
        handleEditPost(formData)
    }


    return (
        <dialog id="buat-post" class={show ? "modal modal-open" : "modal"}>
            <div class="modal-box max-w-3xl bg-[#283358]">
                <form method="dialog">
                    <button onClick={toggle} class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onclick="togglePostModal()">✕</button>
                </form>
                <h3 class="font-bold text-white text-lg">{obj ? "Edit a Post" : "Create a Post"}</h3>
                <div class="flex items-center gap-5 mt-8">
                    <img src={getProfile?.image_user ? getProfile?.image_user.includes("http") ? getProfile?.image_user : `../../storage/profile_picture/${getProfile?.image_user}` : "../../assets/images/sosmed/foto-profile.svg"} alt="profile" className="w-8 h-8 rounded-full" onError={(e) => e.target.src = window.location.origin + "/assets/images/sosmed/foto-profile.svg"} />

                    <div class="flex flex-col">
                        <p class="text-white items-center text-sm">
                            <span class="font-bold">{getProfile?.name}</span>
                        </p>
                        <p class="text-[#37B6E1] font-light text-xs">Post to Employee Forum</p>
                    </div>
                </div>
                <textarea autoFocus value={contentData.content} name="" onChange={(v) => setContentData({...contentData, content: v.target.value})} id="onlyText" class="w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]"></textarea>
                <div class="flex w-full">
                    <div class="w-6/12 flex mt-4 items-center justify-between gap-6">
                        <div onClick={toggleModalFoto} class="w-2/6 justify-center flex items-center gap-6 border-r border-r-[#E1E5F6]">
                            <img src='../../assets/images/sosmed/foto-icon.svg' alt="" />
                            <p class="text-white text-xs">Foto</p>
                        </div>
                        <div class="w-2/6 justify-center flex items-center gap-6 border-r border-r-[#E1E5F6]">
                            <img src='../../assets/images/sosmed/video-icon.svg' alt="" />
                            <p class="text-white text-xs">Video</p>
                        </div>
                        <div onClick={toggleModalFile} class="w-2/6 justify-center flex items-center gap-6" onclick="togglePostFileModal();togglePostModal()">
                            <img src='../../assets/images/sosmed/file-icon.svg' alt="" />
                            <p class="text-white text-xs">File</p>
                        </div>
                    </div>
                    <div class="w-5/12"></div>
                    {
                        obj ? <button id="post-only-text" class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={handleEditPostPrepare} >Update</button> :  <button id="post-only-text" class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={ PostData} >Post</button>
                    }
                </div>
            </div>
        </dialog>
    )
}
