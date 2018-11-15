@extends('layouts.index')

@section('style')
    <style>
        #map { width : 400px; height : 400px; }
    </style>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>{{ config('app.name', '模板里面的title') }}, the best barber shop in Hamilton</h1>
            </div>

            <div class="col-md-12" style="font-size: 8em; padding: 50px;">
                Coming Soon
            </div>

            <div class="col-md-12" style="position: fixed;bottom: 50px;">
                174 Clarkin Rd, Fairfield, Hamilton 3214
                07-855 6874
            </div>

            <div class="col-md-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#JackModal">
                    Test
                </button>
                <a href="/booking">Booking</a>
            </div>


        </div>
    </div>

@endsection

@section('script')

@endsection