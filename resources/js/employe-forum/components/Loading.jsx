import React from 'react'
import { MoonLoader } from 'react-spinners'

export const Loader = () => {
  return (
<div id="loading" class="flex items-center justify-center flex-col fixed bg-gray-800 right-0 left-0 top-0 bottom-0 opacity-80 z-[9999999999]">
<MoonLoader color='white' size="100" />
   </div>
  )
}
