import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { PostArticle } from '../components/PostArticle';
import { GetPostList } from '../services/Api';
import useProfileStore from '../stores/ProfileStore';

export const DetailPage = () => {
  const params = useParams();
  const [data, setData] = useState(null)
  const getProfile = useProfileStore((state) => state.profile)


  useEffect(() => {
    GetPostList(`/${params?.id}`).then((res) => {
      setData(res.data)
    })
  }, [params])

  return (
    <>
      <div className="flex flex-col mt-5">
        <PostArticle getProfile={getProfile} obj={data} />
        <button class="bg-login-button px-6 mt-5 py-2 mx-auto text-white rounded-xl" onClick={() => window.location.replace("/employee-forum")}>Back to home</button>
      </div>
    </>
  )
}
