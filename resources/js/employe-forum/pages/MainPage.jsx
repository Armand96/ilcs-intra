import React, { useCallback, useEffect, useState } from 'react'
import { PostArticle } from '../components/PostArticle'
import { InputPostArticle } from '../components/InputPostArticle'
import usePostStore from '../stores/PostStore'
import { GetPostList } from '../services/Api'
import useProfileStore from '../stores/ProfileStore'
import { toast } from 'react-toastify'
import { v4 as uuidv4 } from 'uuid';
import { Loader } from '../components/Loading'
import useLoadingStroe from '../stores/LoadingStore'

const MainPage = () => {
    const getPostData = usePostStore((state) => state.postData)
    const LoadingAfterUpload = useLoadingStroe((state) => state.loading)
    const setPostData = usePostStore((state) => state.updatePostData)
    const getProfile = useProfileStore((state) => state.profile)
    const setResetPaginate = usePostStore((state) => state.setResetPaginate)
    const resetPaginate = usePostStore((state) => state.resetPaginate)
    const [page, setPage] = useState(1);
    const [hasMore, setHasMore] = useState(true);
    const [loading, setLoading] = useState(false);




    useEffect(() => {
        if (resetPaginate) {
            setResetPaginate(false)
            setHasMore(true)
            setPage(1)
        }
    }, [resetPaginate])

    console.log(hasMore)


    const loadItems = useCallback(() => {
        if (!hasMore) return
        setLoading(true);
        setTimeout(() => {
            setLoading(true);
            GetPostList(`?page=${page}`).then((res) => {
                if (getPostData?.data?.length > 0) {
                    res.data.data = [...getPostData?.data, ...res.data?.data]
                    setHasMore(res.data.last_page >= page);
                    setPostData(res.data)
                } else {
                    setPostData(res.data)
                }
                setLoading(false);
            }).catch((err) => {
                toast.error(`err ${err.error}`)
            })
        }, 1000);
    }, [page]);

    useEffect(() => {
        loadItems();
    }, [page, loadItems]);

    console.log(getPostData)

    const handleScroll = () => {
        if (window.innerHeight + document.documentElement.scrollTop >= document.documentElement.offsetHeight - 19 && hasMore && !loading) {
            setPage(prevPage => prevPage + 1);
        }
    };

    useEffect(() => {
        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, [handleScroll]);
    console.log("LOADING",LoadingAfterUpload)

    return (
        <>
            {
                LoadingAfterUpload && <Loader />
            }
            <InputPostArticle />
            <div className="py-5 w-full flex flex-col gap-6 post-container min-h-screen" >
                {
                    getProfile && getPostData && getPostData?.data?.map((item) => (
                        <PostArticle obj={item} key={uuidv4()} getProfile={getProfile} />
                    ))
                }
            </div>
        </>
    )
}

export default MainPage