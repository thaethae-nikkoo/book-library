@extends('backend')
@section('main')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container col-12">

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title mb-3 pb-0 fs-4">Member Details & his history</h5>
                            <div class="row">
                                <div class="col-4 my-3">
                                    <img src="/storage/{{$user->avatar}}" width="100px" height="100px"
                                        class="rounded-circle" alt="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <h6>Memebr_id</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$user->id}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <h6>Email</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <h6>Phone</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$user->phone}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <h6>Address</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$user->address}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <h6>Role</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$user->role}}</p>
                                </div>
                            </div>

                            @if (count($histories)>0)
                            <table class="table">
                                <h6 class="my-3 fw-bold">History</h6>
                                <tbody>
                                    <tr>
                                        <th>Book</th>
                                        <th>Author</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                    @php
                                    $total_price = 0;

                                    @endphp
                                    @foreach ($histories as $d)
                                    <tr>
                                        <td>{{$d->book->name}}</td>
                                        <td>{{$d->author->name}}</td>
                                        <td>{{$d->created_at->format('Y-m-d')}}</td>
                                        <td>{{$d->date_to}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>{{$d->status}}</td>
                                    </tr>
                                    @php
                                    $total_price+= $d->price
                                    @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="4">Total Price</td>
                                        <th>{{$total_price}}.00 </th>
                                    </tr>


                                </tbody>
                            </table>
                            @endif



                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection