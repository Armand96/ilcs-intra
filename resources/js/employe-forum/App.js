import React, { useEffect } from 'react'
import { BrowserRouter as Router, Route, Routes, Navigate } from "react-router-dom";
import MainPage from './pages/mainPage';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import useProfileStore from './stores/ProfileStore';
import { GetProfileCurrentUser } from './services/Api';

function App() {
  const setProfile = useProfileStore((state) => state.updateData)
  const getProfile = useProfileStore((state) => state.profile)


  useEffect(() => {    
    GetProfileCurrentUser().then((res) => {
      setProfile(res.data)
    }).catch((err) => {
      toast.error(`err ${err.message}`)
    })
  },[])


  return (
    <>
      <ToastContainer position="top-right" autoClose={5000} hideProgressBar={false} newestOnTop={false} closeOnClick rtl={false} pauseOnFocusLoss draggable pauseOnHover />
      <Router>
        <Routes>
          <Route path="/employee-forum" element={<MainPage />} />
          <Route path="/employee-forum/detail/:id" element={<MainPage />} />
        </Routes>
      </Router>
    </>
  )
}

export default App