import React, { useState } from 'react'
import { ModalPost } from './ModalPost'
import useProfileStore from '../stores/ProfileStore'
import { ModalPostFoto } from './ModalPostFoto'
import { ModalPostFile } from './ModalPostFile'

export const InputPostArticle = () => {
    const [toggleModalPost, setToggleModalPost] = useState(false)
    const [toggleModalPostFoto, setToggleModalPostFoto] = useState(false)
    const [toggleModalPostFile, setToggleModalPostFile] = useState(false)
    const getProfile = useProfileStore((state) => state.profile)


    return (
        <>
           {toggleModalPost && <ModalPost toggleModalFoto={() => {setToggleModalPost(!toggleModalPost);setToggleModalPostFoto(!toggleModalPostFoto)}} toggleModalFile={() => {setToggleModalPost(!toggleModalPost);setToggleModalPostFile(!toggleModalPostFile)}} show={toggleModalPost} toggle={() => setToggleModalPost(!toggleModalPost)} /> }
           {toggleModalPostFile && <ModalPostFile show={toggleModalPostFile} toggle={() => setToggleModalPostFile(!toggleModalPostFile)} /> }
           {toggleModalPostFoto && <ModalPostFoto show={toggleModalPostFoto} toggle={() => setToggleModalPostFoto(!toggleModalPostFoto)} /> }
            <div class="bg-[#283358] flex flex-col w-5/6 mx-auto mt-5 mb-6 px-4 py-4 border border-blue-900 rounded-xl">
                <div class="w-full flex gap-6 items-center cursor-pointer">
                    <img src={getProfile?.image_user ? getProfile?.image_user : "../../assets/images/sosmed/foto-profile.svg"} onError={(e) => e.target.src = window.location.origin + "/assets/images/sosmed/foto-profile.svg"} alt="profile" class="w-10 h-10 rounded-full" />
                    <div onClick={() => setToggleModalPost(!toggleModalPost)} class="w-11/12 border border-blue-900 bg-[#384478] flex px-2 py-3 justify-between rounded-md items-center">
                        <p class="text-[#E9E9E9] text-xs">Buat postingan berbagilah sesuatu</p>
                        <img src="../../assets/images/sosmed/send-icon.svg" class="w-6 h-6" />
                    </div>
                </div>
                <div class="w-11/12 flex mt-4 justify-between gap-6">
                    <div onClick={() => setToggleModalPostFoto(true)} class="w-2/6 cursor-pointer justify-center flex items-center gap-6 border-r border-r-white">
                        <img src="../../assets/images/sosmed/foto-icon.svg" alt="" />
                        <p class="text-white text-xs">Foto</p>
                    </div>
                    <div class="w-2/6 justify-center flex items-center gap-6 border-r cursor-pointer border-r-white">
                        <img src="../../assets/images/sosmed/video-icon.svg" alt="" />
                        <p class="text-white text-xs">Video</p>
                    </div>
                    <div  onClick={() => setToggleModalPostFile(true)} class="w-2/6 cursor-pointer justify-center flex items-center gap-6">
                        <img src="../../assets/images/sosmed/file-icon.svg" alt="" />
                        <p class="text-white text-xs">File</p>
                    </div>
                </div>
            </div>

        </>
    )
}
