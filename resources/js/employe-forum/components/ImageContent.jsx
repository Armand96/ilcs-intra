import { useEffect, useState } from "react";
import ImageGallery from "react-image-gallery";

 const ImageContent = ({image}) => {

  const [imageContent, setImageContent] = useState([])



  useEffect(() => {

    let items = image.map((x) => {
      return {
      original: `../../storage/employee_forum/${x?.path_file}`,
      originalClass: "w-full",
      originalWidth: 300,
      originalHeight: 300
      }
    })

    setImageContent(items)    

  },[])

  return (
   <div className="mt-4 container">
   
    <ImageGallery items={imageContent} showNav={window.innerWidth > 1000 ? true : false} showBullets showPlayButton={false} />
   </div>
  )
}

export default ImageContent
