@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 grid-margin">
                          <div class="row">
                              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                  <h3 class="font-weight-bold">Welcome Aamir</h3>
                                  {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}
                              </div>                    
                          </div>
                      </div>
                  </div>
                      <div class="row">
                          <div class="col-md-4 mb-4 stretch-card transparent">
                              <div class="card card-tale">
                                  <div class="card-body">
                                      <p class="mb-4">Total Dataset</p>
                                      <p class="fs-30 mb-2">{{ $totalImages }}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 mb-4 stretch-card transparent">
                              <div class="card card-light-blue">
                                  <div class="card-body">
                                      <p class="mb-4">Truck Normal</p>
                                      <p class="fs-30 mb-2">{{ $totalNormal }}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 mb-4 stretch-card transparent">
                              <div class="card card-light-danger">
                                  <div class="card-body">
                                      <p class="mb-4">Truck OverDimensi</p>
                                      <p class="fs-30 mb-2">{{ $totalOD }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>                    
              </div>
            </div>
        </div>  
    </div>

      <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

@endsection