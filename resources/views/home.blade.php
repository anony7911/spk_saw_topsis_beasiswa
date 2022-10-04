@extends('layouts.template')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
<<<<<<< HEAD
                    <h1 class="m-0">Dashboard</h1>
=======
                    <h1 class="m-0">Selamat Datang, {{Auth::user()->name}}</h1>
>>>>>>> d497433 (aa)
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
<<<<<<< HEAD
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>155</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

=======
                <div class="col-lg-12 col-12 text-center">
                    <!-- <h1>SISTEM PENDUKUNG KEPUTUSAN PENENTUAN PENERIMA PROGRAM INDONESIA PINTAR (PIP) </h1> -->
                </div>
>>>>>>> d497433 (aa)
            </div>


            <div class="row">
<<<<<<< HEAD
=======
            <div class="col-lg-12 col-12 text-center mt-4">
                <img src="{{asset('/logo.png')}}" alt="" width="200px" height="200px" class="mt-2 mb-4">
                    <h2>SISTEM PENDUKUNG KEPUTUSAN PENENTUAN PENERIMA</h2>
                    <h2>PROGRAM INDONESIA PINTAR (PIP) </h2>
                    <h1 class="text-primary font-weight-bold">SD NEGERI 4 KOLAKAASI </h1>
                </div>
>>>>>>> d497433 (aa)
            </div>

        </div>
    </section>

</div>
@endsection
