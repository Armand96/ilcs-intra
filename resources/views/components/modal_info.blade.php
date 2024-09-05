@if (session('notif_modal'))
    <dialog id="modal_info" class="modal modal-custom-scroll">
        <div class="modal-box modal-custom-scroll max-w-7xl bg-[#283358] text-white">
            <div>
                <button onclick="closeModal()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </div>
            <div class="flex flex-col modal-custom-scroll gap-4 px-3 py-2 w-full ">
                <h2 class="text-dashboard-blue-right font-semibold  text-sm lg:text-xl" id="judul_news">
                    Info
                </h2>
                {{-- IMAGE COVER --}}
                <img src="{{ url('storage/image_info.jpeg') }}" alt="img"
                    onerror="this.src='{{ asset('assets/images/image_info.jpeg') }}'"
                    class="w-full mx-auto object-cover rounded-xl" id="news_image_cover">
            </div>
        </div>
        <div class="modal-backdrop">
            <button onclick="closeModal()">close</button>
        </div>
    </dialog>
@endif
