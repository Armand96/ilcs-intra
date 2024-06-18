@extends('intranet.master_intranet')

@section('content')
<div class="bg-[#283358] flex flex-col w-5/6 mx-auto mt-5 mb-6 px-4 py-4 border border-blue-900 rounded-xl">
    <div class="w-full flex gap-6 items-center">
        <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-10 h-10">
        <div onclick="togglePostModal()" class="w-11/12 border border-blue-900 bg-[#384478] flex px-2 py-3 justify-between rounded-md items-center">
            <p class="text-[#E9E9E9] text-xs">Buat postingan berbagilah sesuatu</p>
            <img src="{{ asset('assets/images/sosmed/send-icon.svg') }}" class="w-6 h-6">
        </div>
    </div>
    <div class="w-11/12 flex mt-4 justify-between gap-6">
        <div onclick="togglePostImageModal()" class="w-2/6 justify-center flex items-center gap-6 border-r border-r-white">
            <img src="{{ asset('assets/images/sosmed/foto-icon.svg') }}" alt="">
            <p class="text-white text-xs">Foto</p>
        </div>
        <div class="w-2/6 justify-center flex items-center gap-6 border-r border-r-white">
            <img src="{{ asset('assets/images/sosmed/video-icon.svg') }}" alt="">
            <p class="text-white text-xs">Video</p>
        </div>
        <div class="w-2/6 justify-center flex items-center gap-6">
            <img src="{{ asset('assets/images/sosmed/file-icon.svg') }}" alt="">
            <p class="text-white text-xs">File</p>
        </div>
    </div>
</div>

<!--  CARD Post -->
<div class="bg-[#283358] flex flex-col w-5/6 mx-auto mt-5 px-4 py-4 border border-blue-900 rounded-xl">

    <!-- Header Post -->
    <div class="flex items-center gap-5">
        <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-10 h-10">
        <div class="flex flex-col">
            <p class="text-white items-center text-sm">
                <span class="font-bold">Natal Iman Ginting</span> | <span class="font-light"> Chief Executive Officer (CEO) ILCS</span>
            </p>
            <p class="text-white font-light text-xs">2 minutes ago</p>
        </div>
    </div>

    <!-- Body post -->
    <div class="flex flex-col mt-5">
        <p class="text-xs text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate ratione architecto quidem et, doloremque illum cumque consequatur fuga pariatur. Reiciendis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolor inventore eum a perferendis officia odio ut eius odit modi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa ipsum facere ex quibusdam impedit nostrum, possimus hic iste dolorem et ab saepe error nobis inventore tenetur sit! Quaerat, velit illum!
        </p>
        <img src="{{ asset('assets/images/background/login-right-image.svg') }}" class="w-full mt-6 top-3 h-[26rem] rounded-lg object-cover">
    </div>

    <!-- Like and comment btn to trigger -->
    <div class="flex gap-5 mt-5 border-b border-gray-[#E1E5F6] pb-4">
        <div class="flex gap-2 cursor-pointer justify-center items-center">
            <img src="{{ asset('assets/images/sosmed/like-active.svg') }}" class="h-4 w-4" alt="like">
            <p class="text-xs mt-1 text-white">like</p>
        </div>
        <div class="flex gap-2 cursor-pointer justify-center items-center" onclick="toggleReplyModal()">
            <img src="{{ asset('assets/images/sosmed/comment-icon.svg') }}" class="h-4 w-4" alt="like">
            <p class="text-xs mt-1 text-white">comment</p>
        </div>
    </div>

    <!-- Like and comment statistic -->
    <div class="flex mt-2 justify-between w-full">
        <div class="w-2/6 items-center flex gap-3">
            <img src="{{ asset('assets/images/sosmed/like-stat-icon.svg') }}" class="h-7 w-7" alt="like">
            <p class="text-xs font-light mt-1 text-white">Muhammad Aditya Suazi and 15 others </p>
        </div>
        <div class="w-2/6 flex items-center flex-row-reverse gap-3">
            <p class="text-xs font-light mt-1 text-white">300</p>
            <img src="{{ asset('assets/images/sosmed/eye-icon.svg') }}" class="h-4 w-4" alt="like">
            <p class="text-xs font-light mt-1 text-white">299</p>
            <img src="{{ asset('assets/images/sosmed/comment-icon.svg') }}" class="h-4 w-4" alt="like">
        </div>
    </div>


    <!-- comment component -->
    <div class="flex flex-col mt-6 gap-4  px-4 py-2 rounded-xl border-blue-900">
        <!--  comment header -->
        <div class="flex justify-between">
            <div class="flex items-center gap-5 ">
                <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-8 h-8">
                <div class="flex flex-col">
                    <p class="text-white items-center text-sm">
                        <span class="font-bold">Yogi Muhammad Irshad</span>
                    </p>
                    <p class="text-white font-light text-xs">2 minutes ago</p>
                </div>
            </div>
            <div class="flex-reverse-row flex">
                <div class="dropdown dropdown-end ">
                    <div class="flex items-center" tabindex="0" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                        <li><a>Delete</a></li>
                        <li><a>Edit</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- comment content -->
        <p class="text-white text-sm">
            Menyala abangku
        </p>
        <!-- like comment button trigger -->
        <div class="flex gap-5 pb-4">
            <div class="flex gap-2 cursor-pointer justify-center items-center">
                <img src="{{ asset('assets/images/sosmed/like-active.svg') }}" class="h-4 w-4" alt="like">
                <p class="text-xs mt-1 text-white">like</p>
            </div>
            <div class="flex gap-2 cursor-pointer justify-center items-center" onclick="toggleReplyModal()">
                <img src="{{ asset('assets/images/sosmed/comment-icon.svg') }}" class="h-4 w-4" alt="like">
                <p class="text-xs mt-1 text-white">comment</p>
            </div>
        </div>
        <!-- comment feedback lvl 1 -->
        <div class="flex flex-col">
            <div class="flex flex-col gap-4 pl-4  border-l py-3 border-blue-900">
                <!--  comment header  feedback lvl 1 -->
                <div class="flex justify-between">
                    <div class="flex items-center gap-5 ">
                        <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-8 h-8">
                        <div class="flex flex-col">
                            <p class="text-white items-center text-sm">
                                <span class="font-bold">Yogi Muhammad Irshad</span>
                            </p>
                            <p class="text-white font-light text-xs">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex-reverse-row flex">
                        <div class="dropdown dropdown-end ">
                            <div class="flex items-center" tabindex="0" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                                <li><a>Delete</a></li>
                                <li><a>Edit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  comment content  feedback lvl 1  -->
                <p class="text-white text-sm">
                    nyalain sendiri api nya abangku
                </p>
                <!-- like button trigger  feedback lvl 1  -->
                <div class="flex gap-3 pb-4">
                    <div class="flex gap-2 cursor-pointer justify-center items-center">
                        <img src="{{ asset('assets/images/sosmed/like.svg') }}" class="h-4 w-4" alt="like">
                        <p class="text-xs mt-1 text-white">like</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 pl-4  border-l py-3 border-blue-900">
                <!--  comment  header  feedback lvl 1 -->
                <div class="flex justify-between">
                    <div class="flex items-center gap-5 ">
                        <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-8 h-8">
                        <div class="flex flex-col">
                            <p class="text-white items-center text-sm">
                                <span class="font-bold">Yogi Muhammad Irshad</span>
                            </p>
                            <p class="text-white font-light text-xs">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex-reverse-row flex">
                        <div class="dropdown dropdown-end ">
                            <div class="flex items-center" tabindex="0" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                                <li><a>Delete</a></li>
                                <li><a>Edit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  comment content  feedback lvl 1  -->
                <p class="text-white text-sm">
                    iya njir nyalain sendiri api nya
                </p>
                <!-- like button trigger  feedback lvl 1  -->
                <div class="flex gap-3 pb-4">
                    <div class="flex gap-2 cursor-pointer justify-center items-center">
                        <img src="{{ asset('assets/images/sosmed/like.svg') }}" class="h-4 w-4" alt="like">
                        <p class="text-xs mt-1 text-white">like</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="text-[#4AA5FF] text-xs cursor-pointer flex items-center">
        see replies
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </p>

</div>


<!-- modal balas pesan -->
<dialog id="balas-pesan" class="modal ">
    <div class="modal-box bg-[#283358]">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onclick="toggleReplyModal()">✕</button>
        </form>
        <h3 class="font-bold text-white text-lg">Balas Pesan</h3>
        <textarea name="" id="" class="w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]"></textarea>
        <div class="flex w-full flex-row-reverse">
            <button class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl">Post</button>
        </div>
    </div>
</dialog>

<!-- modal buat post -->
<dialog id="buat-post" class="modal ">
    <div class="modal-box max-w-3xl bg-[#283358]">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onclick="togglePostModal()">✕</button>
        </form>
        <h3 class="font-bold text-white text-lg">Create a Post</h3>
        <div class="flex items-center gap-5 mt-8">
            <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-10 h-10">
            <div class="flex flex-col">
                <p class="text-white items-center text-sm">
                    <span class="font-bold">Natal Iman Ginting</span>
                </p>
                <p class="text-[#37B6E1] font-light text-xs">Post to Employee Forum</p>
            </div>
        </div>
        <textarea name="" id="" class="w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]"></textarea>
        <div class="flex w-full">
            <div class="w-6/12 flex mt-4 items-center justify-between gap-6">
                <div onclick="togglePostImageModal();togglePostModal()" class="w-2/6 justify-center flex items-center gap-6 border-r border-r-[#E1E5F6]">
                    <img src="{{ asset('assets/images/sosmed/foto-icon.svg') }}" alt="">
                    <p class="text-white text-xs">Foto</p>
                </div>
                <div class="w-2/6 justify-center flex items-center gap-6 border-r border-r-[#E1E5F6]">
                    <img src="{{ asset('assets/images/sosmed/video-icon.svg') }}" alt="">
                    <p class="text-white text-xs">Video</p>
                </div>
                <div class="w-2/6 justify-center flex items-center gap-6">
                    <img src="{{ asset('assets/images/sosmed/file-icon.svg') }}" alt="">
                    <p class="text-white text-xs">File</p>
                </div>
            </div>
            <div class="w-5/12"></div>
            <button class="btn mt-4  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl">Post</button>
        </div>
    </div>

</dialog>

<!-- modal buat post gambar -->
<dialog id="buat-post-gambar" class="modal ">
    <div class="modal-box max-w-3xl bg-[#283358]">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white border border-white rounded-full" onclick="togglePostImageModal()">✕</button>
        </form>
        <h3 class="font-bold text-white text-lg">Upload a picture</h3>
        <div class="flex items-center gap-5 mt-8">
            <img src="{{ asset('assets/images/sosmed/foto-profile.svg') }}" alt="profile" class="w-10 h-10">
            <div class="flex flex-col">
                <p class="text-white items-center text-sm">
                    <span class="font-bold">Natal Iman Ginting</span>
                </p>
                <p class="text-[#37B6E1] font-light text-xs">Post to Employee Forum</p>
            </div>
        </div>

        <label for="file-input" id="firstFileInput" class="w-full flex flex-col mt-5 rounded-xl outline-none text-white px-4 py-5 text-xs bg-[#384478FC]">
            <img src="{{ asset('assets/images/sosmed/image-upload-icon.svg') }}" alt="profile" class="self-center w-6 h-6">
            <input type="file" id="file-input" accept="image/*" multiple class="hidden">
            <h4 class="text-white font-bold text-sm self-center my-2">Upload a Picture</h4>
            <p class="text-[#BCBCBD] font-bold text-xs self-center">Support PNG,JPG,JPEG</p>
            <p class="text-[#BCBCBD] font-bold text-xs self-center">Maximum upload file size 10MB</p>
            <p class="text-[#4AA5FF] font-bold text-xs self-center mt-2">Choose File..</p>
        </label>
        <textarea name="" id="getTextImage" class="hidden w-full mt-5 h-28 rounded-xl outline-none text-white px-4 py-2 text-xs bg-[#384478FC]"></textarea>
        <div id="preview-image-list" class="mt-6 hidden w-full gap-6 flex-wrap">
            <label for="file-input" class="flex flex-col w-48 h-48 bg-[#374478] rounded-md border border-blue-700 items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mb-4 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p class="text-white font-light text-xs">Add Another Photo</p>
            </label>
        </div>

        <button id="upload-button" class="btn mt-4 w-full  text-white bg-[#0B5AFD] px-4 py-2 rounded-xl">Post</button>
    </div>

</dialog>



<script>
    function toggleReplyModal() {
        const modalPesanComp = document.querySelector("#balas-pesan")
        if (modalPesanComp.classList.contains("modal-open")) {
            modalPesanComp.classList.remove("modal-open")
        } else {
            modalPesanComp.classList.add("modal-open")

        }
    }

    function togglePostModal() {
        const modalPesanComp = document.querySelector("#buat-post")
        if (modalPesanComp.classList.contains("modal-open")) {
            modalPesanComp.classList.remove("modal-open")
        } else {
            modalPesanComp.classList.add("modal-open")

        }
    }

    function togglePostImageModal() {
        const modalPesanComp = document.querySelector("#buat-post-gambar")
        if (modalPesanComp.classList.contains("modal-open")) {
            modalPesanComp.classList.remove("modal-open")
        } else {
            modalPesanComp.classList.add("modal-open")

        }
    }

    const fileInput = document.getElementById('file-input');
    const previewContainer = document.getElementById('preview-image-list');
    const uploadButton = document.getElementById('upload-button');


    fileInput.addEventListener('change', function() {
        // previewContainer.innerHTML = ''; // Clear previous previews
        const firstFileInput = document.getElementById('firstFileInput');
        const textInput = document.getElementById('getTextImage')
        previewContainer.classList.replace("hidden", 'flex')

        const files = fileInput.files;
        if (files.length !== 0) {
            firstFileInput.classList.add("hidden")
            textInput.classList.replace("hidden", 'flex')
        } else {
            firstFileInput.classList.remove("hidden")
            textInput.classList.replace("flex", 'hidden')


        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'relative w-48 h-48 rounded-lg overflow-hidden';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'object-cover w-full h-full';

                    const removeButton = document.createElement('button');
                    removeButton.innerHTML = '&times;';
                    removeButton.className = 'absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs';
                    removeButton.onclick = function() {
                        previewContainer.removeChild(imgContainer);
                        const firstFileInput = document.getElementById('firstFileInput');
                        const imagesItemContainer = document.getElementById('preview-image-list')
                        const textInput = document.getElementById('getTextImage')

                        if (imagesItemContainer.querySelectorAll('img').length > 0) {
                            imagesItemContainer.classList.replace("hidden", 'flex')
                        } else {
                            imagesItemContainer.classList.replace("flex", 'hidden')
                        }

                        if (imagesItemContainer.children.length > 1) {
                            firstFileInput.classList.replace("flex", 'hidden')
                            textInput.classList.replace("hidden", 'flex')
                        } else {
                            // firstFileInput.classList.remove("hidden")
                            firstFileInput.classList.replace("hidden", 'flex')
                            textInput.classList.replace("flex", 'hidden')
                        }
                    };

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(removeButton);
                    previewContainer.appendChild(imgContainer);
                }
                reader.readAsDataURL(file);
            }
        }
    });

    uploadButton.addEventListener('click', function() {
        // Placeholder for the upload action
        // alert('Post button clicked. Implement the upload functionality here.');

        let dataArr = []
        const imagesItem = document.getElementById('preview-image-list').children
        const textInput = document.getElementById('getTextImage')

        for (let i = 0; i < imagesItem.length; i++) {
            let img = imagesItem[i].querySelector('img')

            if (img !== null) {
                dataArr.push(img.src)
            }
        }

        console.log({
            text: textInput.value,
            image: dataArr
        })
    });
</script>
@endsection