@extends('backend')
@section('main')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container">



                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Choose Books</h5>

                        </div>

                        <form action="{{ route('choose_book') }}" method="POST" class="row g-3 needs-validation"
                            novalidate>
                            @csrf

                            <div class="col-sm-10">

                                <table class="table">

                                    <tbody>

                                        <tr>
                                            <th>
                                                Book Name
                                            </th>
                                            <th>Author</th>
                                            <th>Type</th>
                                            <th>Fee per day</th>
                                        </tr>

                                        @foreach ($books as $b)
                                        <tr>

                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="{{$b->id}}" type="checkbox"
                                                        id="gridCheck{{$b->id}}" name="books[]">
                                                    <label class="form-check-label" for="gridCheck{{$b->id}}">
                                                        {{$b->name}}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{$b->author->name}}
                                            </td>
                                            <td>{{$b->type}}</td>
                                            <td>{{$b->rental_fee}}</td>



                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                                @error('books')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary w-100" type="submit">Next</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body py-4">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Books temporary unavailable</h5>

                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        Book Name
                                    </th>
                                    <th>Author Name</th>
                                    <th>Available Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books_not_available as $d)
                                <tr>


                                    <td>{{$d->name}}</td>
                                    <td>{{$d->author->name}}</td>



                                    <td>{{ \Carbon\Carbon::parse($d->borrowedBook->due_date)->addDay()->toDateString()
                                        }}</td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection