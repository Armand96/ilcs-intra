import React, { useEffect, useState } from 'react'
import usePostStore from '../stores/PostStore'
import useProfileStore from '../stores/ProfileStore'
import { GetPostList, PostArticleData } from '../services/Api'
import { toast } from 'react-toastify'

export const ModalPostFoto = ({ toggle, show, handleEditPost, obj }) => {

    const [contentData, setContentData] = useState({
        content: "",
        images: []
    })
    const getProfile = useProfileStore((state) => state.profile)
    const setPostData = usePostStore((state) => state.updatePostData)
    const setResetPaginate = usePostStore((state) => state.setResetPaginate)
    

  

    const PostData = () => {
        let formData = new FormData()
        formData.append('content', contentData.content)
        contentData.images.forEach((image, index) => {
            formData.append(`images[${index}]`, image)
        })

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



    const handleAdd = async (e) => {
        const files = [...e.target.files]
        if (files) {
            const base64Promises = files.map(async (file) => {
                return await convertToBase64(file);
            });
            const base64Files = await Promise.all(base64Promises);
            setContentData({ ...contentData, images: [...contentData.images, ...base64Files] });
        }
        
        e.target.value = '' 
    }

    

    const handleDelete = (index) => {
        const updatedImages = contentData.images.filter((_, i) => i !== index)
        setContentData({ ...contentData, images: updatedImages })
    }

    const convertToBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onload = () => resolve(reader.result)
            reader.onerror = error => reject(error)
        })
    }

    

    useEffect(() => {
        setContentData({ ...contentData, content: obj?.content || "" })
    }, [obj])

    const handleEditPostPrepare = () => {
        let formData = new FormData()
        formData.append('content', contentData.content)
        contentData.images.forEach((image, index) => {
            formData.append(`images[${index}]`, image)
        })
        handleEditPost(formData)
    }

    return (
        <>
            <dialog id="buat-post" className={show ? "modal modal-open" : "modal"}>
                <div className="modal-box max-w-3xl bg-[#283358]">
                    <form method="dialog">
                        <button onClick={toggle} className="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full">✕</button>
                    </form>
                    <h3 className="font-bold text-white text-lg">{obj ? "Edit a Post" : "Create a Post"}</h3>
                    <div className="flex items-center gap-5 mt-8">
                        <img src={getProfile?.image_user ? getProfile?.image_user.includes("http") ? getProfile?.image_user : `../../storage/profile_picture/${getProfile?.image_user}` : "../../assets/images/sosmed/foto-profile.svg"} alt="profile" className="w-8 h-8 rounded-full" onError={(e) => e.target.src = window.location.origin + "/assets/images/sosmed/foto-profile.svg"} />
                        <div className="flex flex-col">
                            <p className="text-white items-center text-sm">
                                <span className="font-bold">{getProfile?.name}</span>
                            </p>
                            <p className="text-[#37B6E1] font-light text-xs">Post to Employee Forum</p>
                        </div>
                    </div>
                    <label htmlFor="file-input" id="firstFileInput" className={`w-full ${contentData.images.length > 0 ? "hidden" : "flex"} flex-col mt-5 rounded-xl outline-none text-white px-4 py-5 text-xs bg-[#384478FC]`}>
                        <img src="../../assets/images/sosmed/image-upload-icon.svg" alt="profile" className="self-center w-6 h-6" />
                        <input type="file" id="file-input" accept="image/*" multiple className="hidden" onChange={handleAdd} />
                        <h4 className="text-white font-bold text-sm self-center my-2">Upload a Picture</h4>
                        <p className="text-[#BCBCBD] font-bold text-xs self-center">Support PNG,JPG,JPEG</p>
                        <p className="text-[#BCBCBD] font-bold text-xs self-center">Maximum upload file size 10MB</p>
                        <p className="text-[#4AA5FF] font-bold text-xs self-center mt-2">Choose File..</p>
                    </label>
                    <textarea onChange={(v) => setContentData({...contentData, content: v.target.value})} value={contentData.content} className={`${contentData.images.length > 0 ? "flex" : "hidden"} w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]`}></textarea>
                    <div id="preview-image-list" className={`mt-6 ${contentData.images.length > 0 ? "flex" : "hidden"} w-full gap-6 flex-wrap`}>
                    <label htmlFor="file-input" className="flex flex-col w-48 h-48 bg-[#374478] rounded-md border border-blue-700 items-center justify-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="size-8 mb-4 text-white">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p className="text-white font-light text-xs">Add Another Photo</p>
                        </label>
                        {contentData.images.map((image, index) => (
                            <div key={index} className="w-48 h-48 rounded-xl relative border border-blue-700">
                                <img src={image} className='w-full' alt="" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="size-6 absolute z-[2] top-0 right-0 bg-blue-800 text-white cursor-pointer" onClick={() => handleDelete(index)}>
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        ))}
                      
                    </div>

                    {obj ? (
                        <button id="post-only-text" className="btn mt-4 text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={handleEditPostPrepare}>Update</button>
                    ) : (
                        <button id="post-only-text" className="btn mt-4 text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={PostData}>Post</button>
                    )}
                </div>
            </dialog>
        </>
    )
}
