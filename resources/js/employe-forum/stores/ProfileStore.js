import { create } from 'zustand'

const useProfileStore = create((set) => ({
  profile: {},
  updateData: (data) => set(() => ({profile: data})),
}))

export default useProfileStore