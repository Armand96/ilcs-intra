import { create } from 'zustand'

const useLoadingStroe = create((set) => ({
  loading: false,
 setLoading: (state) => set(() => ({loading: state})),
}))

export default useLoadingStroe