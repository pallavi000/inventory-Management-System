@extends('admin.layout.sidebar')

@section('content')

<span class="text">Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Update Product</h4>
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
                    <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$product->name}}" required />
                              
                                    <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{$product->description}}" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">UOM</label>
                                    <input type="text" class="form-control" name="uom" value="{{$product->uom}}" required />
                                </div>
                              
                               
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <input type="text" class="form-control" name="status" value="{{$product->status}}"  required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" required rows="4"/>
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