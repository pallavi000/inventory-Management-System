@extends('admin.layout.sidebar')

@section('content')
<span class="text">Dashboard</span>
</div>
<div class="container-fluid">
        <div class="header bg-gradient-primary pb-5 pt-5 px-5">
          <div class="header-body">
            <div class="row">
              <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                          Total Users
                        </h5>
                        <span class="h2 font-weight-bold mb-0">{{$user}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                          Total Products
                        </h5>
                        <span class="h2 font-weight-bold mb-0">{{$product}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fa-brands fa-product-hunt"></i>
                        </div>
                      </div>
                    </div>
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection