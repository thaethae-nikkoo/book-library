@extends('backend')
@section('main')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container col-8">

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title mb-3 pb-0 fs-4">Borrow Summary</h5>
                            <div class="row">
                                <div class="col-4">
                                    <h6>Borrower</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$member}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h6>Borrowed Date</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$borrowed_date}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <h6>Due Date</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$due_date}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h6>No. of days</h6>
                                </div>
                                <div class="col-8">
                                    <p>{{$date_count}} day(s)</p>
                                </div>
                            </div>

                            <table class="table">

                                <tbody>
                                    <tr>
                                        <th>Book</th>
                                        <th>Author</th>
                                        <th>Price (MMK)</th>
                                    </tr>
                                    @php
                                    $prices_per_day = 0;
                                    @endphp

                                    @foreach ($bookDetails as $d)
                                    <tr>

                                        <td>{{$d->book_name}}</td>
                                        <td>{{$d->author_name}}</td>
                                        <td>{{$d->price}}</td>
                                    </tr>
                                    @php
                                    $prices_per_day +=$d->price;

                                    @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="2"></td>
                                        <th>{{$prices_per_day}}.00 * {{$date_count}} days</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total Price</td>
                                        <th>{{$price}}.00 </th>
                                    </tr>


                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection