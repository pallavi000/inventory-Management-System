@extends('admin.layout.sidebar')

@section('content')

<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Add New Product</h4>
                    <div class="float-right">
                        <a href="{{route('product.index')}}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger"><b>Error </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success"><b>Success </b>
                        <?php echo $message; ?>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required />
                              
                                    <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <input type="text" class="form-control" name="description" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">UOM</label>
                                    <input type="text" class="form-control" name="uom" required />
                                </div>
                              
                               
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <input type="text" class="form-control" name="status"  required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" required />
                                </div>

                               
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection