import React, { useEffect } from 'react'
import { PostArticle } from '../components/PostArticle'
import { InputPostArticle } from '../components/InputPostArticle'
import usePostStore from '../stores/PostStore'
import { GetPostList } from '../services/Api'
import useProfileStore from '../stores/ProfileStore'

const MainPage = () => {
    const getPostData = usePostStore((state) => state.postData)
    const setPostData = usePostStore((state) => state.updatePostData)
    const getProfile = useProfileStore((state) => state.profile)


    
    useEffect(() => {
        GetPostList().then((res) => {
            setPostData(res.data)
        }).catch((err) => {
            toast.error(`err ${err.error}`)
        })
    },[])

    console.log("data",getPostData)

    return (
        <>
            <InputPostArticle  />
            <div className="py-5 w-full flex flex-col gap-6 post-container" >
              {
               getPostData && getPostData?.data?.map((item,index) => (
                    <PostArticle obj={item} key={index} getProfile={getProfile}/>
                ))
              }
            </div>
        </>
    )
}

export default MainPage