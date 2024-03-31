@extends('backend')
@section('main')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Borrow Book</h5>

                                </div>


                                <form action="{{route('borrowed.store')}}" method="POST"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf



                                    <input type="hidden" name="choosed_books" value="{{$selectedBooks}}">

                                    <div class="row mb-3">

                                        <div class="accordion " id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        You choose {{$book_count}}
                                                        book(s)
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">

                                                        @if(count($choosed_books) > 0)

                                                        <ul>
                                                            @foreach($choosed_books as $cbook)
                                                            <li>{{ $cbook->name }}</li>
                                                            <!-- Assuming your book model has a 'title' attribute -->
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- End Accordion without outline borders -->


                                    </div>

                                    <div class="row mb-3">
                                        <label for="member_id" class="col-sm-2 col-form-label">Member Name</label>
                                        <div class="col-sm-10">
                                            <select name="member_id" class="form-select shadow-none " aria-label="">
                                                @foreach ($users as $member)
                                                <option value="{{$member->id}}">{{$member->name}}</option>

                                                @endforeach
                                            </select>
                                            @error('member_id')
                                            <p class="text-danger mt-2">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="date_count" class="col-sm-2 col-form-label">No. of days</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" name="date_count" class="form-control"
                                                id="date_count" required>

                                            @error('date_count')
                                            <small class="text-danger  ml-2 ">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                                    </div>

                                </form>

                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection