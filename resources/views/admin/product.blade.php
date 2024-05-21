@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper">

    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row g-3">
            <div class="col-auto">
                <a name="" id="" class="btn btn-warning text-white font-weight-bold m-2" href="" role="button" data-toggle="modal" data-target="#modaladdproduct">Add Product+</a>
            </div>
      
            <div class="row-auto d-flex align-items-center">
                
                <div class="input-group">
                    <form action="/filterproduct" method="GET" id="filterform">
                        
                    <select class="custom-select" id="inputGroupSelect01" name="filterproduct">
                        <option selected></option>
                            @foreach ($category as $ct)
                            <option value="{{ $ct->id }}" {{ $ct->id == request('filterproduct') ? 'selected' : ''}}>{{ $ct->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                
                
                <div class="col-auto d-flex align-items-center">
                    <input type="search" class="form-control" autocomplete="off" placeholder="Search Product Name" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-warning text-white font-weight-bold ml-2">Filter</button>
                    
                </div>
        </div>
        <div class="row g-3">
            <div class="col-auto">
                <div class="input-group mb-3">
                    <select class="custom-select" id="limitselect" name="limit">
                        <option value="5">5</option>
                        <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('limit') == 30 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <tbody>
                
                @if(count($data)>0)
                    
                @foreach ($data as $no => $dt)
                
                <tr>
                    <td scope="row">{{ $no +$data->firstItem() }}</td>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->category->name }}</td>
                    <td>
                        {{ 'Rp '.number_format($dt->price, 0, ',', '.') }}
                    </td>
                    <td>{{ $dt->stock }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary" data-toggle="modal" href="#detail{{$dt->id}}" 
                                >Detail</a>
                                @include('admin.modal.modaldetailproduct')
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    
                                    <a class="dropdown-item" href="/editproduct/{{ $dt->id }}">Edit</a>
                                    <a class="dropdown-item delete" data-id="{{ $dt->id }}" href="#">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="10" class="text-center">No Result Found!</td>
                    </tr>
                    @endif
                </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>


{{-- Modal --}}

{{-- Modal Add Data --}}
<div class="modal fade" id="modaladdproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/storeproduct" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Enter Product Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Enter Product Description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Choose</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="category_id">
                              <option selected>Choose Category</option>
                              @foreach($category as $ct)
                              <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <label for="">Product Image</label>
                            <input type="file" class="form-control-file" name="image_path">
                        </div>
                    </div>

                

                    
        
                    {{-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_path">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div> --}}


                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price(RP)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Product Price" name="price" id="rupiahInput" autocomplete="off">
                          </div>
                    </div>
                    
                    <div class="d-flex mb-2 flex-column">
                        <div class="row">
                            <label for="">Set Stock</label>
                        </div>
                        <div class="row">

                            <button type="button" class="btn btn-dark rounded-end-0 border-1 border-light-subtle" id="btn-minus">-</button>
                            <input type="text" name="stock" class="form-control text-center rounded-0 bg-white border-0 border-top border-bottom border-light-subtle" style="width: 60px;" id="quantity" name="quantity" value="1" readonly>
                            <button type="button" class="btn btn-dark rounded-start-0 border-1 border-light-subtle" id="btn-plus">+</button>
                        </div>
                    </div>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addproduct" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        </div>
    </div>
</div>




<script src="{{ asset('js/quantity.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Limit Data --}}
<script src="{{ asset('js/limit.js') }}">
</script>



{{-- Toastr --}}
<script>
    @if(Session::has('addproduct'))

    toastr.success('{{ Session::get('addproduct') }}');

    @elseif(Session::has('deleteproduct'))

    toastr.success('{{ Session::get('deleteproduct') }}');
    @elseif(Session::has('updateproduct'))

    toastr.success('{{ Session::get('updateproduct') }}');
    @endif
</script>
{{-- Sweet Alert --}}
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
