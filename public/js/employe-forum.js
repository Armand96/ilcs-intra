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