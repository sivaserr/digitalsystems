@extends('layouts.master')

@section('title')
  Dashboard | Digital system
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Customers </h4>
              <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
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
                  <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name">
                            {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                          </div>
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" id="address" aria-describedby="address" placeholder="Enter address">
                            </div>
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="Enter city">
                            </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="phone">
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Salary</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Ram</td>
                      <td>Test address</td>
                      <td>salem</td>
                      <td>ram@gmail.com</td>
                      <td>1234567890</td>
                      <td>$36,738</td>
                    </tr>
                    <tr>
                      <td>Kumar</td>
                      <td>Test address</td>
                      <td>salem</td>
                      <td>kumar@gmail.com</td>
                      <td>0987654321</td>
                      <td>$36,738</td>
                    </tr>
                    
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