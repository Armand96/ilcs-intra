import React, { useEffect, useState } from 'react'
import usePostStore from '../stores/PostStore'
import useProfileStore from '../stores/ProfileStore'
import { GetPostList, PostArticleData } from '../services/Api'
import { toast } from 'react-toastify'

export const ModalPostVideo = ({ toggle, show, handleEditPost, obj }) => {

    const [contentData, setContentData] = useState({
        content: "",
        files: []
    })
    const [video, setVideo] = useState(null)
    const getProfile = useProfileStore((state) => state.profile)
    const setPostData = usePostStore((state) => state.updatePostData)
    const setResetPaginate = usePostStore((state) => state.setResetPaginate)

    const PostData = () => {
        let formData = new FormData()
        formData.append('content', contentData.content)
        contentData.files.forEach((image, index) => {
            formData.append(`files[${index}]`, image)
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
        const filesRaw = [...e.target.files];
        if (filesRaw.length) {
            setContentData((prevState) => ({
                ...prevState,
                files: [...prevState.files, ...filesRaw]
            }));
    
            const base64Promises = filesRaw.map(async (file) => {
                return await convertToBase64(file);
            });
    
            const base64Files = await Promise.all(base64Promises);
    
            const videoFile = filesRaw[0];
            const videoUrl = window.URL.createObjectURL(videoFile);
    
            setVideo(videoUrl);
    
            e.target.value = ''; // Clear input value
        }
    }

    const convertToBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onload = () => resolve(reader.result)
            reader.onerror = error => reject(error)
        })
    }

    const handleDelete = (index) => {
        const updateFiles = contentData.files.filter((_, i) => i !== index)
        setContentData({ ...contentData, files: updateFiles })
        console.log(updateFiles)
    }

    useEffect(() => {
        setContentData({ ...contentData, content: obj?.content || "" })
    }, [obj])

    const handleEditPostPrepare = () => {
        let formData = new FormData()
        formData.append('content', contentData.content)
        contentData.files.forEach((image, index) => {
            formData.append(`videos[${index}]`, image)
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
                    <label htmlFor="file-input-2" id="firstFileInput" className={`w-full ${contentData.files.length > 0 ? "hidden" : "flex"} flex-col mt-5 rounded-xl outline-none text-white px-4 py-5 text-xs bg-[#384478FC]`}>
                        <img src="../../assets/images/sosmed/video-upload-icon.svg" alt="profile" class="self-center w-6 h-6" />
                        <input type="file" id="file-input-2" className="hidden" onChange={handleAdd} />
                        <h4 class="text-white font-bold text-sm self-center my-2">Upload a Video</h4>
                        <p class="text-[#BCBCBD] font-bold text-xs self-center">Support 30 second video or less</p>
                        <p class="text-[#BCBCBD] font-bold text-xs self-center">Maximum upload file size 100MB</p>
                        <p class="text-[#4AA5FF] font-bold text-xs self-center mt-2">Choose Video..</p>
                    </label>
                    <textarea onChange={(v) => setContentData({ ...contentData, content: v.target.value })} value={contentData.content} className={`${contentData.files.length > 0 ? "flex" : "hidden"} w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]`}></textarea>
                    <div id="preview-image-list" className={`mt-6 ${contentData.files.length > 0 ? "flex" : "hidden"} w-full gap-6 flex-wrap`}>
                        {contentData?.files?.map((file, index) => (
                            <div className="flex w-full items-center gap-6 border-b data-file pb-4" key={index}>
                              <video  src={video} controls >
                              </video>
                                <div className="flex w-1/6 items-center justify-center" onClick={() => handleDelete(index)}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        ))}
                        {/* <label for="file-input-2" class={`${contentData.files.length > 0 ? "flex" : "hidden"} flex-col w-full py-2 bg-[#374478] rounded-md border border-blue-700 items-center justify-center `}>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mb-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class="text-white font-light text-xs">Add Another File</p>
                        </label> */}
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
