<div class="modal fade" id={{$modalId}} tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="mt-0 fs-4">{{ $title }}</h5>
                <h5 class="mt-0 fs-5">{{ $subjabatan }}</h5>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-6">
                        <p class="text-title">{{ $text1 }}</p>
                        <p class="text-title mt-2">{{ $text2 }}</p>
                        <p class="text-title mt-2">{{ $text3 }}</p>

                    </div>
                    <div class="col-lg-4">
                        <img src={{$image}} alt="" class="rounded float-end">
                    </div>
                </div>
            </div><!--end modal-body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div><!--end modal-footer-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->