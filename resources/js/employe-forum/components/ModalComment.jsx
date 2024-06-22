import React, { useState } from 'react'

export const ModalComment = ({ toggle, show, submit, obj }) => {
    const [formData, setFormData] = useState()

    const handleSubmit = () => {
        submit({
            comment: formData,
            post_id:  obj.level === 2 ? "" : obj?.id ,
            parent_comment_id: obj.level === 2 ? obj?.id : ""
        })
    }
 
    return (
        <dialog id="buat-post" class={show ? "modal modal-open" : "modal"}>
            <div class="modal-box bg-[#283358]">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onClick={toggle}>✕</button>
                </form>
                <h3 class="font-bold text-white text-lg">Balas Pesan</h3>
                <textarea onChange={(v) => setFormData(v.target.value)} class="w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]"></textarea>
                <div class="flex w-full flex-row-reverse">
                    <button class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl" onClick={handleSubmit}>Post</button>
                </div>
            </div>
        </dialog>
    )
}
