@extends('layouts.master')

@section('title')
    supplier list
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
                  <h4 class="card-title">supplier </h4>
              </div>
              <div class="customer_create">
                  <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
              </div>
            </div>
            
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create new supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form action="{{route('Addsupplier')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->

                  <div class="modal-body">
                        <div class="form-group">
                            <label for="supplier_name">supplier</label>
                            <input type="text" class="form-control" name="supplier_name" id="supplier_name" aria-describedby="supplier_name" placeholder="Enter supplier name" required>
                            {{-- <small id="name" class="form-text text-muted">Your information is safe with us.</small> --}}
                          </div>
                          <div class="form-group">
                              <label for="short_name">short name</label>
                              <input type="text" class="form-control" name="short_name" id="short_name" aria-describedby="short_name" placeholder="Enter short_name" required>
                            </div>
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" name="city" id="city" aria-describedby="city" placeholder="Enter city" required>
                            </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required>
                      </div>
                      <div class="form-group">
                        <label for="opening_balance">Opening balance</label>
                        <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="opening_balance" required>
                      </div>
                      <div class="form-group">
                        <label for="opening_box">Opening Box</label>
                        <input type="text" class="form-control" name="opening_box" id="opening_box" placeholder="opening_box" required>
                      </div>
                     <div class="customer_status">
                        <label for="phone">Active</label>
                       <select name="status" id="status" class="form-control">
                         <option value="1" selected="selected">Enable</option>
                         <option value="0">Disable</option>

                       </select>
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
                      <th>Short name</th>
                      <th>City</th>
                      <th>Phone</th>
                      <th>open balance</th>
                      <th>open box</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Status</th>

                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                      @foreach($suppliers as $supplier)
                      <tr>
                        <td>{{ $id }}</td>
                        <td>{{$supplier ->supplier_name}}</td>
                        <td>{{$supplier ->short_name}}</td>
                        <td>{{$supplier ->city}}</td>
                        <td>{{$supplier ->phone}}</td>
                        <td>{{$supplier ->opening_balance}}</td>
                        <td>{{$supplier ->opening_box}}</td>
                      <td><a href="/supplier_edit/{{$supplier ->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                      <td><a href="/supplier/{{$supplier ->id}}" class="btn btn-sm btn-danger">Delete</a></td>
                      <td>
                        @if($supplier->status==1)
                       <span class="custome_status_en">Enable</span>
                        @else 
                        <span class="custome_status_ds">Disable</span>
                        @endif
                       </td> 
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