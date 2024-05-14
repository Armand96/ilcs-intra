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
@slot('li_2') regulations @endslot
@slot('title') Regulations @endslot
@endcomponent

<div class="row">

    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3>Regulations</h3>
            </div>
               <div class="card-body">
               <img src="https://www.ilcs.co.id/cfind/source/thumb/images/dev/content/cover_w1110_h371_compliance.jpg" class="col-12 mx-auto my-4" alt="">
                <p class="text-title lead">ILCS realizes the importance of implementing Good Corporate Governance (GCG) as a tool to increase the value of long-term sustainable business growth not only for shareholder but also for all stakeholders. </p>
                <p class="text-title lead">ILCS is always committed to implement GCG practices as part of efforts to achieve the company’s vision and mission. The Company also continuously improves the quality of GCG implementation and follows the development of the best applicable governance practices, both in the national, regional, and international realms that are relevant and in accordance with what needed. </p>
                <p class="text-title lead">ILCS strives to implement the five basic principles of GCG: transparency, accountability, responsibility, independence, and fairness, as has been released in the General Guidelines for GCG issued by the National Committee on Governance Policy (KNKG)</p>
                <p class="text-title lead">ILCS has policies as guidelines for implementing GCG in accordance with applicable laws and regulations and regularly updated, including:</p>
                <ul class="list-group">
                    <li class="list-group-item"><i class="la la-check text-success me-2"></i>Good Corporate Governance Guidelines;  </li>
                    <li class="list-group-item"><i class="la la-check text-success me-2"></i>Guidelines for the Work Procedures of the Board of Commissioners and Directors (Board Manual)</li>
                    <li class="list-group-item"><i class="la la-check text-success me-2"></i>Code of Business Ethics Guidelines (Code of Conduct);  </li>
                    <li class="list-group-item"><i class="la la-check text-success me-2"></i>Gratification Control Guidelines. </li>
                </ul>
               </div>
           
            <div class="card-body row">
                <!-- Nav tabs -->
                <div class="col-lg-4">
                    <div class="nav flex-column  nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link waves-effect waves-light active" id="v-pills-home-tab" data-bs-toggle="pill" href="#home-1" role="tab" aria-controls="v-pills-home" aria-selected="true">Code of Conduct</a>
                        <a class="nav-link waves-effect waves-light" id="v-pills-profile-tab" data-bs-toggle="pill" href="#home-2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Board Manual</a>
                        <a class="nav-link waves-effect waves-light" id="v-pills-settings-tab" data-bs-toggle="pill" href="#home-3" role="tab" aria-controls="v-pills-settings" aria-selected="false">GCG</a>
                        <a class="nav-link waves-effect waves-light" id="v-pills-settings-tab" data-bs-toggle="pill" href="#home-4" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="col-lg-6">
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                            <h3 class="text-title">Code of Conduct</h3>
                            <p class="lead">
                                The company has compiled a Code of Conduct as a guide for professional behavior for all company personnel. The purpose of implementing the code of ethics so that every employee has the awareness to practice good ethics and will ultimately improve and strengthen the company's reputation.
                            </p>
                            <p class="lead">
                                Therefore, ILCS is determined to actively implement a culture of compliance with ethical behavior in the company, including by encouraging the implementation of reporting on matters that can cause financial or non-financial losses to the company.
                            </p>
                            <p class="lead">
                                Company or cause tarnishing of the Company's good name.
                            </p>
                            <a href="https://www.ilcs.co.id/cfind/source/files/complience/pedoman-kode-etik-bisnis-025.umm.doo.2020-2020.pdf" class="btn btn-primary">Code of Conduct guidelines <br /> 7.62 mb </a>
                        </div>
                        <div class="tab-pane p-3" id="home-2" role="tabpanel">
                            <h3 class="text-title">Board Manual</h3>
                            <p class="lead">
                                The work guidelines and implementation of the duties of the Board of Commissioners, Directors, Supporting Organs of the Board of Commissioners, Supporting Organs of the Board of Directors refer to the Board Manual which is useful as a reference in each of their activities.
                            </p>
                            <a href="https://www.ilcs.co.id/cfind/source/files/complience/board-of-manual-019.hkm.d00.2020-2020.pdf" class="btn btn-primary">Board of Manual BOD and BOC PT ILCS <br />12.3 mb</a>
                        </div>
                        <div class="tab-pane p-3" id="home-3" role="tabpanel">
                            <h3 class="text-title">GCG</h3>
                            <p class="lead">
                                ILCS is committed to implementing good corporate governance with high moral standards by referring to the Guidelines for the Implementation of Good Corporate Governance.
                            </p>
                            <p class="lead">
                                GCG guidelines are guidelines for all company personnel in making decisions and carrying out actions based on high morals, compliance with applicable laws and awareness of the existence of corporate social responsibility towards interested parties (stakeholders) consistently. </p>
                            <a href="https://www.ilcs.co.id/cfind/source/files/complience/pemutakhiran-pedoman-gcg-pt-ilcs-signed-off.pdf" class="btn btn-primary">Guidelines for Implementing GCG
                                <<br />27.81 mb
                            </a>
                        </div>
                        <div class="tab-pane p-3" id="home-4" role="tabpanel">
                            <h3 class="text-title">Gratification</h3>
                            <p class="lead">
                                The Company upholds commitments related to GCG principles and creates a healthy business climate. The management and all employees of the company try to avoid actions, behaviors, or actions that will cause a conflict of interest. In addition, the company also applies rules for every form of giving, requesting, and receiving gratuities, as well as attempts to obtain bribes.
                            </p>
                            <a href="https://www.ilcs.co.id/cfind/source/files/complience/pedoman-gratifikasi-027.hkm.d00.2020-2020.pdf" class="btn btn-primary">Gratification Guide<br />5.79 mb</a>
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