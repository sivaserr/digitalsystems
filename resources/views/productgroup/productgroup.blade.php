@extends('layouts.master')

@section('navbar_brand')
    Product Group List
@endsection
<style>
        .product_title {
          display: inline-block;
      }
      .product_create {
          display: inline-block;
          float: right;
      }
      </style>
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="product_title">
                  <h4 class="card-title">Group list </h4>
              </div>
              <div class="product_create">
                  <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
              </div>
            </div>
            
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create new product group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form  action="{{route('Addproductgroup')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->

                  <div class="modal-body">
                        <div class="form-group">
                            <label for="productgroup">Product Name</label>
                            <input type="text" class="form-control" name="productgroup" id="productgroup" aria-describedby="productgroup" placeholder="Enter Product group" required>
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
                          <th>Group name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php $id = 1; ?>
                          @foreach($product_groups as $product_group)
                          <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $product_group->product_group }}</td>
                          <td><a href="product_group_edit/{{$product_group ->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                          <td><a href="product_group/{{$product_group ->id}}" class="btn btn-sm btn-danger">Delete</a></td>
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