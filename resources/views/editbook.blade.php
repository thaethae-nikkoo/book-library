@extends('backend')
@section('main')


<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body py-4">

                    <!-- General Form Elements -->
                    <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control shadow-none" value="{{$book->name}}" name="name"
                                    id="name">
                                @error('name')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" class="form-control shadow-none "
                                    cols="30" rows="6">{{$book->description}}</textarea>
                                @error('description')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" id="type" class="form-control shadow-none" value="{{$book->type}}"
                                    name="type">
                                @error('type')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <select name="author_id" class="form-select shadow-none " aria-label="">
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" {{$book->author_id == $author->id ? 'selected' :
                                        ''}}>{{$author->name}}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rental_fee" class="col-sm-2 col-form-label">Price per day</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$book->rental_fee}}" id="rental_fee"
                                    class="form-control shadow-none " name="rental_fee">
                                @error('rental_fee')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_cover" class="col-sm-2 col-form-label">Cover</label>
                            <div class="col-sm-5">
                                <input type="file" id="new_cover" name="new_cover" class="form-control shadow-none ">
                                @error('new_cover')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="old_cover" value="{{$book->cover}}">

                            <div class="col-sm-2">
                                <img src="/storage/{{$book->cover}}" alt="" width="100%">
                            </div>
                        </div>

                        <div class="row my-3">

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary shadow-none">Submit Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
@endsection