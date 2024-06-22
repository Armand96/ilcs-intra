import { create } from 'zustand'

const usePostStore = create((set) => ({
  postData: {},
  updatePostData: (data) => set(() => ({postData: data})),
}))

export default usePostStore