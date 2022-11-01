@extends('admin.layout.sidebar')

@section('content')

<span class="text"> Product</span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Product List</h4>
                    <div class="float-right">
                        <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible "><b>Error </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible"><b>Success </b>
                        <?php echo $message; ?>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Id</th>
                                    <th>BarCode</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>UOM</th>
                                    <th>Status</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->item_id}}</td>
                                    <td>
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->item_id,'C128')}}"/>
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->uom}}</td>
                                    <td>{{$product->status}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning mr-2">Edit</a>
                                        <form method="POST" action="{{route('product.destroy',$product->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection