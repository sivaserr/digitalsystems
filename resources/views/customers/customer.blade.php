@extends('layouts.master')

@section('title')
  Dashboard | Digital systems
@endsection

<style>
  .customer_title {
    display: inline-block;
}
.customer_create {
    display: inline-block;
    float: right;
}
</style>
@section('navbar_brand')
Customer list page
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="customer_title">
                  <h4 class="card-title">Customers </h4>
              </div>
              <div class="customer_create">
                  <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
              </div>
            </div>
            
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create new customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form action="{{route('Addcustomer')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->

                  <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name" required>
                            {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                          </div>
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" name="address" id="address" aria-describedby="address" placeholder="Enter address" required>
                            </div>
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" name="city" id="city" aria-describedby="city" placeholder="Enter city" required>
                            </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Enter email" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required>
                      </div>

                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                      <?php $id = 1; ?>
                    @foreach($customers as $customer)
                    <tr>
                      <td>{{ $id }}</td>
                      <td>{{$customer ->name}}</td>
                      <td>{{$customer ->address}}</td>
                      <td>{{$customer ->city}}</td>
                      <td>{{$customer ->email}}</td>
                      <td>{{$customer ->phone}}</td>
                    <td><a href="/customer_edit/{{$customer ->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="/customer/{{$customer ->id}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                    <?php $id++; ?>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('scripts')

@endsection