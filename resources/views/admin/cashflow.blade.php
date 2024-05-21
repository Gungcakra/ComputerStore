@extends('layouts.adminmain')

@section('content')
<div class="content-wrapper">
    <h1 class="text-center">{{ $title }}</h1>
    <div class="container mt-3">

        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-hand-holding-dollar" style="color: #ffffff;"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Balance</span>
                        <span class="info-box-number">
                            {{ 'Rp '.number_format($income, 0, ',', '.') }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-sack-dollar" style="color: #ffffff;"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cash In</span>
                        <span class="info-box-number">
                            {{ 'Rp '.number_format($cashin, 0, ',', '.') }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-money-bill-transfer" style="color: #ffffff;"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cash Out</span>
                        <span class="info-box-number">
                            {{ 'Rp '.number_format($cashout, 0, ',', '.') }}

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row g-3">
            <div class="col-auto d-flex flex-column justify-content-center align-items-center">
                <label for="" style="opacity: 0">Add</label>
                <button href="" class="btn btn-warning text-white font-weight-bold" data-toggle="modal" data-target="#addcashflow">Add CashFlow</button>
            </div>
            <form action="/filtercashflow" method="GET" class="row">
                @csrf
                <div class="col-auto">
                    <label for="Start Date">Start Date</label>
                    <input type="date" id="" class="form-control" name="startdate" value="{{ request('startdate') }}">
                </div>
                <div class="col-auto">
                    <label for="Start Date">End Date</label>
                    <input type="date" id="" class="form-control" name="enddate" value="{{ request('enddate') }}">
                </div>
                <div class="col-auto d-flex flex-column">
                    <label for="" style="opacity: 0">pp</label>
                    <button type="submit" class="btn btn-warning font-weight-bold text-white">Filter</button>
                </form>
            </div>
        </div>

        <div class="row g-3 mt-3">
            <table class="table table-striped">
                <thead class="thead thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cash as $no => $ch)
                        
                    <tr>
                        
                        <td>{{ $no + $cash->firstItem() }}</td>
                        <td>{{ $ch->name }}</td>
                        <td> {{ 'Rp '.number_format($ch->amount, 0, ',', '.') }}</td>
                        <td><a class="btn font-weight-bold {{ $ch->type=='Cash In' ? 'btn-success' : 'btn-danger' }}">{{ $ch->type }}</a></td>
                        <td>{{ $ch->created_at }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="">Detail</a>
                                  <a class="dropdown-item" href="#">Delete Cash</a>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $cash->links() }}
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addcashflow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add CashFlow</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/cashflowadd" class="d-flex flex-column" method="POST">
            @csrf
            <label for="">CashFlow Name</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Example : Buy Something">
            </div>
            <label for="">Amount</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" class="form-control" name="amount" autocomplete="off" placeholder="Example : 100000" >
              </div>

              <label for="">CashFlow Type</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Type</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="type">
                  <option selected>Choose...</option>
                  <option value="Cash In">Cash In</option>
                  <option value="Cash Out">Cash Out</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
