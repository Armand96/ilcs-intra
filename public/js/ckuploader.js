class CKUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                const formData = new FormData();
                formData.append('upload', file);

                fetch('/ckupload', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        resolve({
                            default: data.url
                        });
                    })
                    .catch(error => {
                        reject('Upload failed');
                    });
            }));
    }

    abort() {
        // Handle the aborting of the upload process.
    }
}

function uploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new CKUploadAdapter(loader);
    };
}
