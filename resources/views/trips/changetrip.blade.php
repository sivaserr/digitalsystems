@extends('layouts.master')

@section('navbar_brand')
    Set Trip
@endsection
<style>
.settrip {
    padding: 50px;
}
</style>
@section('content')
<?php
    $trips = DB::table('trips')->select('trips.*')->get();
?>
<div class="card">
<div class="container">
    <div class="settrip">

            <form class="form" action="/set_trip/1" method="POST">
                    {{ csrf_field()}} <!--security token-->
                    {{ method_field('PUT')}}

                     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Set Trip</label>
                     <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="settrip">
                     <option selected>Choose...</option>
                     @foreach ($trips as $trip)
                     <option value="{{$trip->id}}">{{$trip->trip_name}}</option>
                     @endforeach
                     </select>
                     <button type="submit" class="btn btn-primary my-1">Submit</button>
                   </form>
    </div>
</div>
</div>

@endsection

