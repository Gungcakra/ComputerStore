@extends('layouts.adminmain')

@section('content')
<div class="content-wrapper">
    <h1 class="text-center">Manage Order</h1>

    <div class="container">
        <div class="row g-3">
    
            <form action="/filterorderdate" method="get" class="row" id="filterform">

                <div class="col-auto">
                    <label for="Start Date">Start Date</label>
            <input type="date" id="" class="form-control" name="startdate" value="{{ request('startdate') }}">
        </div>
        <div class="col-auto">
            <label for="Start Date">End Date</label>
            <input type="date"  id="" class="form-control" name="enddate" value="{{ request('enddate') }}">
        </div>
        <div class="col-auto">
            <label for="">Delivery Status</label>
            <div class="input-group mb-3">
                <select class="custom-select" name="status">
                    <option value="">All</option>
                    <option value="P"{{ request('status') == 'P' ? 'selected' : '' }}>Pending</option>
                    <option value="C"{{ request('status') == 'C' ? 'selected' : '' }}>Canceled</option>
                    <option value="S"{{ request('status') == 'S' ? 'selected' : '' }}>Success</option>
                </select>
            </div>
        </div>
        <div class="col-auto d-flex flex-column align-items-center">
            <label style="opacity: 0" for="">Filter</label>
            <button class="btn btn-warning font-weight-bold text-white" type="submit">Filter</button>
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
    </form>
    </div>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Order Date</th>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($data)>0)
                @foreach ($data as $no => $or)
                
                <tr>
                    <td scope="row">{{ $no +$data->firstItem() }}</td>
                    <td>{{ $or->users->name }}</td>
                    <td>{{ $or->products->name }}</td>
                    <td>{{ $or->quantity }}</td>
                    <td>
                        {{ 'Rp '.number_format($or->total_price, 0, ',', '.') }}
                    </td>
                    <td>{{ $or->created_at }}</td>

                    <td><a class="btn font-weight-bold {{ $or->delivery_status == 'P' ? 'btn-warning': '' }} {{ $or->delivery_status == 'C' ? 'btn-danger' : '' }} {{ $or->delivery_status == 'S' ? 'btn-success' : '' }}">{{ $or->delivery_status == 'P' ? 'Pending' : '' }}{{ $or->delivery_status == 'C' ? 'Canceled' : ''}} {{ $or->delivery_status == 'S' ? 'Success' : ''}}</a>

                    </td>
                    <td>
                        <a class="btn btn-secondary" data-toggle="modal" href="#edit{{ $or->id }}">Set Status<a>
                                @include('admin.modal.modalorderstatus')
                            </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">No Result Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/limit.js') }}"></script>
<script>
    @if(Session::has('updateorder'))

    toastr.success('{{ Session::get('updateorder') }}');
    @endif

</script>

@endsection
