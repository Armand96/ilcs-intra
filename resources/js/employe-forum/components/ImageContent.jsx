import { useEffect, useState } from "react";
import ImageGallery from "react-image-gallery";

 const ImageContent = ({image}) => {

  const [imageContent, setImageContent] = useState([])



  useEffect(() => {

    let items = image.map((x) => {
      return {
      original: `../../storage/employee_forum/${x?.path_file}`,
      originalClass: "w-full h-64",
      originalWidth: 300,
      originalHeight: 300
      }
    })

    setImageContent(items)    

  },[])

  return (
   <div className="mt-4 container">
   
    <ImageGallery items={imageContent} showNav={false} showBullets showPlayButton={false} />
   </div>
  )
}

export default ImageContent
