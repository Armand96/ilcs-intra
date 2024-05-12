@extends('layouts.master')
@section('title') Dashboard @endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
@endsection

    @section('content')
        @component('components.breadcrumb')
        @slot('li_1') Home @endslot
            @slot('li_2') Dashboard @endslot
            @slot('title') Dashboard @endslot
        @endcomponent

        <div class="row">
            <div class="col-lg-9">
                <div class="row ">

                    <div class="col-md-6 col-lg-6">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 fw-semibold">Selamat Datang</p>
                                        <h3 class="m-0">Nama user</h3>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->

                    </div> <!--end col-->

                    <div class="col-md-6 col-lg-6">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 fw-semibold">Selamat Datang</p>
                                        <h3 class="m-0">Nama user</h3>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->

                    </div> <!--end col-->
                    
                </div><!--end row-->
              
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Berita 1</h4>
                                        </div><!--end col-->
                                </div>  <!--end row-->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                    <img src="{{ URL::asset('assets/images/small/img-4.jpg') }}" class="d-block" style="width: 100% ; height: 33vh ; object-fit: cover ;" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="carousel-item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Berita 2</h4>
                                        </div><!--end col-->
                                </div>  <!--end row-->
                                <div class="card-body">
                                <img src="{{ URL::asset('assets/images/small/img-4.jpg') }}" class="d-block" style="width: 100% ; height: 33vh ; object-fit: cover ;" alt="...">
                                </div>
                            </div>
                        </div>
                        </div>
                       
                        <div class="carousel-item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Berita 3</h4>
                                        </div><!--end col-->
                                </div>  <!--end row-->
                                <div class="card-body">
                                <img src="{{ URL::asset('assets/images/small/img-4.jpg') }}" class="d-block" style="width: 100% ; height: 33vh  ; object-fit: cover ;" alt="...">
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
           
                    
            </div><!--end col-->

            <div class="col-lg-3">
                 <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Employe of the month</h4>
                            </div><!--end col-->
                        
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <ul class="list-group custom-list-group mb-n3">
                            <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-1.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Mamat anunja</h6>
                                        <p class="mb-0 text-muted">20 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-2.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">dudung ambarani</h6>
                                        <p class="mb-0 text-muted">21 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-3.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">kururu</h6>
                                        <p class="mb-0 text-muted">22 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Upcoming birthday</h4>
                            </div><!--end col-->
                        
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <ul class="list-group custom-list-group mb-n3">
                            <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-1.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Mamat anunja</h6>
                                        <p class="mb-0 text-muted">20 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-2.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">dudung ambarani</h6>
                                        <p class="mb-0 text-muted">21 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-3.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">kururu</h6>
                                        <p class="mb-0 text-muted">22 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div>
                
            </div> <!--end col-->

        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Calendar</h4>
                            </div><!--end col-->
                         
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <ul class="list-group custom-list-group mb-n3">
                            <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/rgb.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Dastone - Admin Dashboard</h6>
                                        <p class="mb-0 text-muted">analytic-index</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">4.3k <i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/cobweb.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Metrica Simple- Admin Dashboard</h6>
                                        <p class="mb-0 text-muted">sales-index</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">3.7k <i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/blocks.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Crovex - Admin Dashboard</h6>
                                        <p class="mb-0 text-muted">helpdesk-index</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">2.9k <i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/atom.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Annex - Admin Dashboard</h6>
                                        <p class="mb-0 text-muted">calendar</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">1.6k <i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div><!--end card-->
             
            </div> <!--end col-->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">ILCS Event</h4>
                            </div><!--end col-->
                         
                        </div>  <!--end row-->
                    </div><!--end card-header-->

                    <div class="card-body">
                        <ul class="list-group custom-list-group mb-n3">
                            <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/rgb.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Event 1</h6>
                                        <p class="mb-0 text-muted">12 mei 2024</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">read more<i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/cobweb.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">event diluar kantor</h6>
                                        <p class="mb-0 text-muted">16 mei</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">read more<i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                <img src="{{ URL::asset('assets/images/small/cobweb.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">event internal kantor</h6>
                                        <p class="mb-0 text-muted">16 mei</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">read more<i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/small/atom.svg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                    <h6 class="m-0">event ditengah kantor</h6>
                                        <p class="mb-0 text-muted">30 mei</p>
                                    </div><!--end media body-->
                                </div>
                                <div class="align-self-center">
                                    <a href="" class="btn btn-sm btn-soft-primary">read more<i class="las la-external-link-alt font-15"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div><!--end card-->
             
            </div> <!--end col-->
            

            <div class="col-lg-3">
            <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">welcome onboard</h4>
                            </div><!--end col-->
                        
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <ul class="list-group custom-list-group mb-n3">
                            <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-1.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">Mamat anunja</h6>
                                        <p class="mb-0 text-muted">20 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-2.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">dudung ambarani</h6>
                                        <p class="mb-0 text-muted">21 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ URL::asset('assets/images/users/user-3.jpg') }}" height="30" class="me-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center">
                                        <h6 class="m-0">kururu</h6>
                                        <p class="mb-0 text-muted">22 desember 2025</p>
                                    </div><!--end media body-->
                                </div>
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div>
            </div>

        </div>

@endsection
@section('script')
        <script src="{{ URL::asset('assets/plugins/apex-charts/apexcharts.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/jquery.analytics_dashboard.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
