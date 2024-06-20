


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

function togglePostFileModal() {
    const modalPesanComp = document.querySelector("#buat-post-file")
    if (modalPesanComp.classList.contains("modal-open")) {
        modalPesanComp.classList.remove("modal-open")
    } else {
        modalPesanComp.classList.add("modal-open")

    }
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// modal upload gambar

const fileInput = document.getElementById('file-input');
const previewContainer = document.getElementById('preview-image-list');
const uploadButton = document.getElementById('upload-button');


fileInput.addEventListener('change', function () {
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
            reader.onload = function (e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative w-48 h-48 rounded-lg overflow-hidden';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'object-cover w-full h-full';

                const removeButton = document.createElement('button');
                removeButton.innerHTML = '&times;';
                removeButton.className = 'absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs';
                removeButton.onclick = function () {
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


uploadButton.addEventListener('click', function () {
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

// modal upload file

const fileInputFile = document.getElementById("file-input-2")
const previewContainerFile = document.getElementById("preview-file-list")
const uploadButtonFile = document.getElementById("upload-button-file")
const fileInputFilePertama = document.getElementById("fileInput2")
const textFile = document.getElementById("getTextFile")
let tempDataFile = []

fileInputFile.addEventListener('change', () => {
    const files = fileInputFile.files;

    previewContainerFile.classList.replace("hidden", "flex")
    fileInputFilePertama.classList.replace("flex", "hidden")
    textFile.classList.replace("hidden", "flex")


    for (let i = 0; i < files.length; i++) {
        const idFile = uuid.v4()
        const file = files[i];
        if (file) {
            file.uuid = idFile
            tempDataFile.push(file)
            const template = document.createElement('div');
            template.className = "flex items-center gap-6 border-b data-file pb-4";
            template.innerHTML = `
                <div class="w-1/6 flex items-center justify-center" id-file=${idFile}>
                    <img src="../../assets/images/sosmed/file-upload-icon.svg" alt="pdf icon" class="size-16 bg-[#00000033] rounded-full p-3">
                </div>
                <div class="flex flex-col w-4/6">
                    <p class="text-white text-sm mb-2">
                        ${file.name}
                    </p>
                    <p class="text-white text-sm">
                        ${formatFileSize(file.size)}
                    </p>
                </div>
                <div class="flex w-1/6 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-white delete-icon" style="cursor: pointer;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
            `;
            const deleteIcon = template.querySelector('.delete-icon');
            deleteIcon.addEventListener('click', () => {
                previewContainerFile.removeChild(template);
                tempDataFile = tempDataFile.filter((x) => x.uuid !== idFile)

                const currentPreviewContainerFile = document.getElementById("preview-file-list")

                if (currentPreviewContainerFile.querySelectorAll(".data-file").length > 0) {
                    currentPreviewContainerFile.classList.replace("hidden", "flex")
                } else {
                    currentPreviewContainerFile.classList.replace("flex", "hidden")
                    fileInputFilePertama.classList.replace("hidden", "flex")
                    textFile.classList.replace("flex", "hidden")

                }
            });
            previewContainerFile.appendChild(template);

        }
    }

    console.log(tempDataFile)
})

uploadButtonFile.addEventListener('click', function () {

    let textFile = document.querySelector("#getTextFile")
    textFile.classList.replace("flex","hidden")
    fileInputFilePertama.classList.replace("hidden", "flex")

    tempDataFile.map((x) => {
        delete x.uuid
    })

    let remakeTempData = tempDataFile

    tempDataFile = []

    previewContainerFile.innerHTML = ``

    console.log({
        text: textFile.value ,
        file: remakeTempData
    })

    textFile.value = ""

    const form = new FormData();
    form.append('content', textFile.value);
    form.append('files', remakeTempData);

    axios.post('http://localhost:8000/makePost ', form).then(() => {
        togglePostFileModal()
        // function show(bgColor, message, duration = 5000){
        //     Toastify({
        //         close: true,
        //         text: message,
        //         duration: duration,
        //         style: {
        //             background: bgColor,
        //         },
        //     }).showToast();
        // }
    })

   
});
