<dialog id="modal_news" class="modal ">
    <div class="modal-box max-w-7xl bg-[#283358] text-white">
        <div>
            <button onclick="closeModalNews()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </div>
        <div class="flex flex-col gap-4 px-3 py-2 w-full">
            <h2 class="text-dashboard-blue-right font-semibold  text-sm lg:text-xl" id="judul_news">Judul</h2>
            <p class="mb-2 text-sm font-semibold text-white">
                <span id="created_at">19 juni 2024</span> | <span id="poster">admin</span>
            </p>
            {{-- IMAGE COVER --}}
            <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img"
                class="w-full mx-auto object-cover rounded-xl" id="news_image_cover">
            <div class="w-full mt-7 lg:mt-0  flex flex-col overflow-x-hidden h-72">
                <div class="h-full overflow-x-auto backoffice-style" id="content_body">
                    Content
                </div>

            </div>
        </div>
    </div>
    <div class="modal-backdrop">
        <button onclick="closeModalNews()">close</button>
    </div>
</dialog>
