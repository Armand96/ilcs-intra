@extends('layouts.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/fullcalendar/packages/core/main.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fullcalendar/packages/daygrid/main.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fullcalendar/packages/bootstrap/main.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fullcalendar/packages/timegrid/main.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fullcalendar/packages/list/main.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/lightpick/lightpick.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/app.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
@component('components.breadcrumb')
@slot('li_1') Home @endslot
@slot('li_2') Our Leader @endslot
@slot('title') Our Leader @endslot
@endcomponent

<div class="row">

    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Our Leaders</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="true">Board Of Commission</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">Board Of Directors</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="false">Board Of Management</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                        <div class="row row-cols-1 justify-content-between row-cols-md-4 gx-3">
                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_prakosa.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">PRAKOSA HADI TAKARIYANTO</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">PRESIDENT COMMISSIONER</h4>
                                        <!-- <p class="card-text">Served as President Commissioner based on Shareholders' Decree Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022. </p> -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-1" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>

                                        @component('components.modal_member')
                                        @slot('title') PRAKOSA HADI TAKARIYANTO @endslot
                                        @slot('subjabatan') PRESIDENT COMMISSIONER @endslot
                                        @slot('modalId') modal-1 @endslot
                                        @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_prakosa.jpg @endslot
                                        @slot('text1') Served as President Commissioner based on Shareholders' Decree Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022. @endslot
                                        @slot('text2') He earned a Bachelor's degree in Civil Engineering from Gajah Mada University, Yogyakarta, and a Master's in Highways Systems and Engineering at the Institute of Technology Bandung in 1995. .@endslot
                                        @slot('text3')Served as Project Manager of PT Pelabuhan Indonesia II (Persero) Car Terminal in 2006, Project Manager of PLTD Bali, PLTG Rengat, and PLTD Ambon in 2009, Manager of the Power Plant and Energy Investment Division in 2013, General Manager of the Investment Department in 2017, and served as Technical Director of PT Pelabuhan Indonesia IV (Persero) in 2018. .@endslot
                                        @endcomponent

                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_budi.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">BUDI MANTORO</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">COMMISSIONER</h4>
                                        <!-- <p class="card-text">Served as President Director based on Shareholders' Decision Number KP.10.05/10/7/1/RKTK/UTMA/PLND-23 Number SK.03/10/7/1/PAPR/DIUT/PLPL-23 dated July 10, 2023 .</p> -->
                                        <button href="#" data-bs-toggle="modal" data-bs-target="#modal-2" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</button>
                                    </div><!--end card-body-->
                                </div><!--end card-->

                                @component('components.modal_member')
                                @slot('title') BUDI MANTORO @endslot
                                @slot('subjabatan') COMMISSIONER @endslot
                                @slot('modalId') modal-2 @endslot
                                @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_budi.jpg @endslot
                                @slot('text1') Served as President Director based on Shareholders' Decision Number KP.10.05/10/7/1/RKTK/UTMA/PLND-23 Number SK.03/10/7/1/PAPR/DIUT/PLPL-23 dated July 10, 2023 .@endslot
                                @slot('text2') He earned a Diploma's degree majoring in Nautica at Jakarta College of Maritime Science in 2001 and Master's degree in Magister's of Administrative Science program at University of Syech Islam Yusuf in 2010..@endslot
                                @slot('text3')He served as Head of sub-directorate of special sea transportation and related service businesses, directorate of traffic, directorate general of sea relations, Ministry of Transportation (2018-2018), Head of the domestic sea transportation sub-directorate, traffic directorate, directorate general of sea relations, Ministry of Transportation (2018-2020), Head of the academic and cadet administration section, BPSDM (2020-2021), Head of the Tanjung Pinang Class 1 Type A navigation district, Directorate General of Maritime Relations, Ministry of Transportation (2020-2021), and Director of Navigation, Directorate General of Maritime Relations, Ministry of Transportation (2022-now), and as Commissioner of PT ILCS. .@endslot
                                @endcomponent

                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_nugroho.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">NUGROHO INDRIO</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">COMMISSIONER</h4>
                                        <!-- <p class="card-text">Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021. </p> -->
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-3" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>
                                    </div><!--end card-body-->


                                    @component('components.modal_member')
                                    @slot('title')NUGROHO INDRIO @endslot
                                    @slot('subjabatan') COMMISSIONER @endslot
                                    @slot('modalId') modal-3 @endslot
                                    @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_nugroho.jpg @endslot
                                    @slot('text1')Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021. @endslot
                                    @slot('text2')He earned his Bachelor of Engineering degree from the Bandung Institute of Technology in 1982. @endslot
                                    @slot('text3')He served as Head of the Land Transportation Research and Development Center (2002-2005), Secretary of the Directorate General of Railways (2005-2010), as Expert Staff for Technology, Energy, and Environment at the Ministry of Transportation for the period 2014 — 2017, and as Commissioner of PT Tanjung Priok Port. @endslot
                                    @endcomponent

                                </div><!--end card-->
                            </div><!--end col-->

                        </div>
                    </div>
                    <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                        <div class="row row-cols-1 justify-content-between row-cols-md-4 gx-3">
                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_natal.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">NATAL IMAN GINTING</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">CHIEF EXECUTIVE OFFICER (CEO)</h4>
                                        <!-- <p class="card-text">Served as President Commissioner based on Shareholders' Decree Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022. </p> -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-4" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>

                                        @component('components.modal_member')
                                        @slot('title') NATAL IMAN GINTING @endslot
                                        @slot('subjabatan') CHIEF EXECUTIVE OFFICER (CEO) @endslot
                                        @slot('modalId') modal-4 @endslot
                                        @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_natal.jpg @endslot
                                        @slot('text1') Served as President Director based on Shareholders' Decision Number KP.03/28/2/1/RKTK/WDUT/PLND-23 Number SK.03/27/2/1/PAPR/DKMT/PLSL-23 dated March 1, 2023. @endslot
                                        @slot('text2')He earned a Bachelor’s degree in Industrial Engineering at University of Sumatera Utara in 1991 and Master's degree in Magister's of Business Administration (MBA) Strategic Management program at University of Birmingham in 2000. @endslot
                                        @slot('text3')Appointed as President Director of PT Integration Logistik Cipta Solusi (ILCS) in March 2023. Previously he served as Project Director Digital Ecosystem Platform at PT Telkom Indonesia (Tbk) for the 2020-present period.@endslot
                                        @endcomponent

                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_agus.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">AGUS DHARMAWAN</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">CHIEF MARKETING OFFICER (CMO)</h4>
                                        <!-- <p class="card-text">Served as President Director based on Shareholders' Decision Number KP.10.05/10/7/1/RKTK/UTMA/PLND-23 Number SK.03/10/7/1/PAPR/DIUT/PLPL-23 dated July 10, 2023 .</p> -->
                                        <button href="#" data-bs-toggle="modal" data-bs-target="#modal-5" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</button>
                                    </div><!--end card-body-->
                                </div><!--end card-->

                                @component('components.modal_member')
                                @slot('title')AGUS DHARMAWAN @endslot
                                @slot('subjabatan')CHIEF MARKETING OFFICER (CMO) @endslot
                                @slot('modalId') modal-5 @endslot
                                @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_agus.jpg @endslot
                                @slot('text1')Served as Chief Marketing Officer (CMO) based on Shareholders' Decision Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022.@endslot
                                @slot('text2')He earned a Diploma III in Informatics Engineering from the STIKOM in 1999 at Surabaya.@endslot
                                @slot('text3')Appointed as Acting President Director of PT Integration Logistik Cipta Solusi (ILCS) in October 2022. Previously he served as Group Head of Information and Communication Technology at PT Pelabuhan Indonesia (Persero) Holding. @endslot
                                @endcomponent

                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_judi.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">JUDI GINTA IRAWAN</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">CHIEF TECHNOLOGY OFFICER (CTO) CURRENT CHIEF FINANCIAL OFFICER (CFO)</h4>
                                        <!-- <p class="card-text">Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021. </p> -->
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-6" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>
                                    </div><!--end card-body-->


                                    @component('components.modal_member')
                                    @slot('title')JUDI GINTA IRAWAN @endslot
                                    @slot('subjabatan') CHIEF TECHNOLOGY OFFICER (CTO) CURRENT CHIEF FINANCIAL OFFICER (CFO) @endslot
                                    @slot('modalId') modal-6 @endslot
                                    @slot('image')https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_judi.jpg @endslot
                                    @slot('text1')SServed as Chief Technology Officer (CTO) based on Shareholder Decision Number KP.03/3/11/3/MTA/UT/PI.II-2020 dated November 3, 2020 and concurrently serves as Chief Financial Officer (CFO) based on Commissioner's Decision Number DK/05/10/1/ILCS-2022 dated 5 October 2022. @endslot
                                    @slot('text2')He earned a Bachelor's degree in Naval Architecture from the Sepuluh November Institute of Technology, Surabaya in 1996. @endslot
                                    @slot('text3')He served as the PMO Team at PT Pelabuhan Indonesia II (Persero) for the 2012-2015 period and as the Information System Manager at PT IPC Terminal Petikemas Koja for the 2016-present period.@endslot
                                    @endcomponent

                                </div><!--end card-->
                            </div><!--end col-->

                        </div>
                    </div>
                    <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                        <div class="row row-cols-1 justify-content-between row-cols-md-4 gx-3">
                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_mas-aldi.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">Kamaldila Puja Yusnika</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">Pjs Senior Manager for Service Management</h4>
                                        <!-- <p class="card-text">Served as President Commissioner based on Shareholders' Decree Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022. </p> -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-7" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>

                                        @component('components.modal_member')
                                        @slot('title') Kamaldila Puja Yusnika @endslot
                                        @slot('subjabatan') Pjs Senior Manager for Service Management(CEO) @endslot
                                        @slot('modalId') modal-7 @endslot
                                        @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_mas-aldi.jpg @endslot
                                        @slot('text1') @endslot
                                        @slot('text2')He earned a Bachelor of Applied Science degree at Semarang State Polytechnic and a Masters in Electrical Engineering at Mercubuana University.@endslot
                                        @slot('text3')As Pjs Senior Manager for Service Management, he manages Managed Services for Pelindo Group, both for applications and IT infrastructure.@endslot
                                        @endcomponent

                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-affandi.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">Afandi Nurrahman</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">Senior Manager of Project Planning and Implementation</h4>
                                        <!-- <p class="card-text">Served as President Director based on Shareholders' Decision Number KP.10.05/10/7/1/RKTK/UTMA/PLND-23 Number SK.03/10/7/1/PAPR/DIUT/PLPL-23 dated July 10, 2023 .</p> -->
                                        <button href="#" data-bs-toggle="modal" data-bs-target="#modal-8" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</button>
                                    </div><!--end card-body-->
                                </div><!--end card-->

                                @component('components.modal_member')
                                @slot('title')Afandi Nurrahman @endslot
                                @slot('subjabatan')Senior Manager of Project Planning and Implementation (CMO) @endslot
                                @slot('modalId') modal-8 @endslot
                                @slot('image') https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-affandi.jpg @endslot
                                @slot('text1')@endslot
                                @slot('text2')He earned a Bachelor's degree in Informatics Engineering at the Islamic University of Indonesia and a Master's degree in Shipping and Transport at the Netherland Maritime University.@endslot
                                @slot('text3')As Senior Manager for Project Planning and Implementation, he is responsible for planning and implementing service delivery to ILCS customers, especially for services with an enterprise solution scheme.@endslot
                                @endcomponent

                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-frenda.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">Frenda Rangga Aksara</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">Senior Manager of Product Development</h4>
                                        <!-- <p class="card-text">Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021. </p> -->
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-9" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>
                                    </div><!--end card-body-->


                                    @component('components.modal_member')
                                    @slot('title')Frenda Rangga Aksara @endslot
                                    @slot('subjabatan')Senior Manager of Product Development @endslot
                                    @slot('modalId') modal-9 @endslot
                                    @slot('image')https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-frenda.jpg @endslot
                                    @slot('text1')@endslot
                                    @slot('text2')He earned a Bachelor's degree in Informatics Engineering at the Sepuluh November Institute of Technology and a Masters in Business Administration at Tanri Abeng University. As Senior Manager of Product Development, he is responsible for developing and implementing a single system across all PT Pelabuhan Indonesia (Persero) entities.      @endslot
                                    @slot('text3')@endslot
                                    @endcomponent

                                </div><!--end card-->
                            </div><!--end col-->


                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-rubi.jpg" class="card-img-top bg-light-alt" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold">Raden Rubiyanto</h5>
                                        <h4 class="card-text  text-center fw-bold mt-0 mb-3 text-primary">Support Services Manager</h4>
                                        <!-- <p class="card-text">Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021. </p> -->
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-10" class="btn col-12 mx-auto btn-primary btn-sm">Full Profile</a>
                                    </div><!--end card-body-->


                                    @component('components.modal_member')
                                    @slot('title')Raden Rubiyanto @endslot
                                    @slot('subjabatan') Support Services Manager @endslot
                                    @slot('modalId') modal-10 @endslot
                                    @slot('image')https://www.ilcs.co.id/cfind/source/thumb/images/cover_w361_h390_pak-rubi.jpg @endslot
                                    @slot('text1') @endslot
                                    @slot('text2')Beliau meraih gelar Sarjana Teknik di Institut Sains dan Teknologi Nasional. @endslot
                                    @slot('text3')Sebagai Manager Layanan Pendukung, saya bertanggung jawab untuk memberikan layanan pendukung yang berkualitas kepada pelanggan atau pengguna.@endslot
                                    @endcomponent

                                </div><!--end card-->
                            </div><!--end col-->
                            

                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>




@endsection
@section('script')
<script src="{{ URL::asset('assets/plugins/apex-charts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.analytics_dashboard.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/packages/core/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/packages/daygrid/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/packages/timegrid/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/packages/interaction/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/packages/list/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/lightpick/lightpick.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.calendar.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection