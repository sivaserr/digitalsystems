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
            <form action="/action_page.php">
                @foreach ($currenttrips as $currenttrip)

                <div class="form-group">
                  <label for="email">Current Trip:</label>
                  @foreach ($trips as $trip)
                  @if($trip->id === $currenttrip->set_trip )
                  <input type="email" class="form-control" id="email" value="{{$trip->trip_name}}">
                  @endif
                  @endforeach
                </div>
            <a href="/change_trip/1" class="btn btn-primary my-1">Change</a>
                @endforeach

            </form>

    </div>
</div>
</div>

@endsection

