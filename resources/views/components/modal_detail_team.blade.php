<dialog id="modal_detail_team" class="modal ">
  <div class="modal-box max-w-3xl bg-gray-950 text-white">
    <div>
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="closeModal()">✕</button>
    </div>
    <div class="flex justify-center items-center gap-4 px-3 py-2 w-full">
        <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img" class="w-full h-full object-cover rounded-xl " id="detail_team_image">
    </div>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>
