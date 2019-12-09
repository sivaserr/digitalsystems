@extends('layouts.master')
@section('navbar_brand')
    Bill
@endsection
@section('content')



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="addform" >
        <div class="modal-body">
                {{ csrf_field()}}

           <div class="form-group">
               <label for="name"></label>
               <input type="text" class="form-control" name="fname">
           </div>
           <div class="form-group">
               <label for="email"></label>
               <input type="text" class="form-control" name="email">
           </div>
           <div class="form-group">
               <label for="body"></label>
               <input type="text" class="form-control" name="body">
           </div>
        </div>
    </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



@endsection