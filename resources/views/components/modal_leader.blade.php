<dialog id="modal_leader" class="modal ">
  <div class="modal-box max-w-5xl bg-gray-950 text-white">
    <div>
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="closeModal()">✕</button>
    </div>
    <div class="flex flex-col lg:flex-row gap-4 px-3 py-2 w-full">
      <div class="w-full lg:w-2/6">
        <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img" class="w-full h-full object-cover rounded-xl " id="leader_image">
      </div>
      <div class="w-full mt-7 lg:mt-0 lg:w-4/6 flex flex-col overflow-x-hidden h-72">
        <div class="h-full overflow-x-auto backoffice-style ">
          <h2 class="text-dashboard-blue-right font-semibold  text-sm lg:text-xl" id="leader_name">Natal Iman Ginting</h2>
          <p class="text-white font-semibold text-base" id="leader_jabatan">Chief Executive Officer (CEO) at ILCS</p>
          <div id="leader_description">

          </div>
          {{-- <p class="mt-4 text-xs lg:text-sm text-white">
            Served as President Director based on Shareholders' Decision Number KP.03/28/2/1/RKTK/WDUT/PLND-23 Number SK.03/27/2/1/PAPR/DKMT/PLSL-23 dated March 1, 2023.
          </p>
          <p class="mt-2  text-xs lg:text-sm">
            He earned a Bachelor’s degree in Industrial Engineering at University of Sumatera Utara in 1991 and Master's degree in Magister's of Business Administration (MBA) Strategic Management program at University of Birmingham in 2000.
          </p>
          <p class="mt-2  text-xs lg:text-sm">
            Appointed as President Director of PT Integration Logistik Cipta Solusi (ILCS) in March 2023. Previously he served as Project Director Digital Ecosystem Platform at PT Telkom Indonesia (Tbk) for the 2020-present period.
          </p> --}}
        </div>
      </div>

    </div>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>
