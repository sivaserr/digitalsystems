@extends('layouts.master')

@section('navbar_brand')

Products
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
<?php
$product_groups = DB::table('product_group')->select('product_group.*')->get();

$units =DB::table('units')->select('units.*')->get();
//$grp_dec = json_decode($data,true);
//var_dump($grp_dec);

$user = DB::table('product_group')->select('product_group.*')->get();
$unitss =DB::table('units')->select('units.*')->get();

?>
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="product_title">
                  <h4 class="card-title">Products </h4>
              </div>
              <div class="product_create">
                  <a href="#" type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#form" ><span class="glyphicon glyphicon-plus"></span> CREATE</a>
              </div>
            </div>
            
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Create new product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form  action="{{route('Addproduct')}}" method="POST">
                  {{ csrf_field()}} <!--security token-->

                  <div class="modal-body">

                        <div class="form-group">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" name="productname" id="product_name" aria-describedby="product_name" placeholder="Enter Product Name" required>
                          </div>
                          <div class="form-group">
                                <label for="productname">Group</label>
                                  <select name="productgroupid" id="company" class="form-control">
                                    @foreach ($product_groups as $product_group)
                                  <option value="{{$product_group->id}}"> {{$product_group->product_group}}</option>
                                    @endforeach
                                  </select> 
                            </div>
                          <div class="form-group">
                                <label for="unitname">Unit</label>
                                  <select name="unitid" id="unit" class="form-control">
                                    @foreach ($units as $unit)
                                  <option value="{{$unit->id}}"> {{$unit->unit_name}}</option>
                                    @endforeach
                                  </select> 
                            </div>
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="Price" aria-describedby="Price" placeholder="Enter Price" required>
                          </div>
                          <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" name="weight" id="weight" aria-describedby="weight" placeholder="Enter Weight" required>
                          </div>
                          <div class="form-group">
                            <label for="netweight">Net Weight</label>
                            <input type="number" class="form-control" name="netweight" id="net_weight" aria-describedby="net_weight" placeholder="Enter Net Weight" required>
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
                    <th>Group</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Net weight</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                      <?php $id = 1; ?>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $id }}</td>
                      <td>{{ $product->product_name }}</td>
                      @foreach($user as $grp)
                       
                      @if($grp->id === $product->product_group)
                        <td>{{$grp->product_group}}</td>
                      @endif
                      @endforeach
                      @foreach($units as $uts)
                       @if($uts->id === $product->unit_id)
                        <td>{{$uts->unit_name}}</td>
                      @endif
                      @endforeach

                      <td>{{ $product->price }}</td>
                      <td>{{ $product->weight }}</td>
                      <td>{{ $product->net_weight }}</td>
                    <td><a href="product_edit/{{$product ->id}}" class="btn btn-sm btn-info">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="product/{{$product ->id}}" class="btn btn-sm btn-danger">Delete</a></td>
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