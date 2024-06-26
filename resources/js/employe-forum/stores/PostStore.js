import { create } from 'zustand'

const usePostStore = create((set) => ({
  postData: {},
  resetPaginate: false,
  setResetPaginate: (data) => set(() => ({resetPaginate: data})),
  updatePostData: (data) => set(() => ({postData: data})),
}))

export default usePostStore