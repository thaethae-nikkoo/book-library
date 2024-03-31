@extends('backend')
@section('main')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container col-12">

                <div class="card mb-3">

                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0 fs-4">Book Details</h5>
                        <div class="row">
                            <div class="col-4">
                                <img src="/storage/{{$data->cover}}" width="200px" height="300px" alt="">
                            </div>
                            <div class="col-8">
                                <div class="pt-4 pb-2">

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <span
                                                class="badge bg-{{$data->status == 'borrowed'? 'danger': 'success'}}">{{$data->status}}</span>

                                            @if ($data->status == 'borrowed')
                                            <span class="text-danger mx-3 fs-10 ">This book will available at
                                                {{$data->borrowedBook->due_date}}.</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Book ID</h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->id}}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Book </h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Author </h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->author->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Type </h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->type}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Fee per day </h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->rental_fee}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h6>Description </h6>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$data->description}}</p>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection