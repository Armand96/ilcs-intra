<dialog id="my_modal_2" class="modal ">
  <div class="modal-box max-w-3xl bg-gray-950 text-white">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <div class="flex gap-4 px-3 py-2 w-full">
      <div class="w-2/6">
        <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img" class="w-full h-full object-cover rounded-xl " alt="">
      </div>
      <div class="w-4/6 flex flex-col overflow-x-hidden h-72">
        <div class="h-full overflow-x-auto backoffice-style ">
          <h2 class="text-dashboard-blue-right font-semibold text-xl">Natal Iman Ginting</h2>
          <p class="text-white font-semibold text-base">Chief Executive Officer (CEO) at ILCS</p>
          <p class="mt-4 text-white">
            Served as President Director based on Shareholders' Decision Number KP.03/28/2/1/RKTK/WDUT/PLND-23 Number SK.03/27/2/1/PAPR/DKMT/PLSL-23 dated March 1, 2023.
          </p>
          <p class="mt-2">
            He earned a Bachelor’s degree in Industrial Engineering at University of Sumatera Utara in 1991 and Master's degree in Magister's of Business Administration (MBA) Strategic Management program at University of Birmingham in 2000.
          </p>
          <p class="mt-2">
            Appointed as President Director of PT Integration Logistik Cipta Solusi (ILCS) in March 2023. Previously he served as Project Director Digital Ecosystem Platform at PT Telkom Indonesia (Tbk) for the 2020-present period.
          </p>
        </div>
        <div class="flex w-full mt-5 ">
          <button onclick="my_modal_2.showModal()" class="text-white mt-4 px-4 text-base py-2 rounded-2xl login-button bg-login-button">See
            message</button>
        </div>
      </div>

    </div>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>