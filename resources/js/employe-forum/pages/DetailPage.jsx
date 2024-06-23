import React from 'react'
import { useParams } from 'react-router-dom';

export const DetailPage = () => {

    const params = useParams();

    console.log(params)

  return (
    <div>DetailPage</div>
  )
}
