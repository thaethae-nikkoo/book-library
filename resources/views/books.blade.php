@extends('backend')
@section('main')


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-body py-4">
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Book ID (ISBN)</th>
                                <th>
                                    Name
                                </th>
                                <th>Cover</th>
                                <th>Author Name</th>
                                <th>Type</th>
                                <th>Fee (MMK)</th>
                                <th>Description</th>
                                {{-- <th>Status</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>ISBN00{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td><img src="/storage/{{$book->cover}}" width="120px" height="160px" alt=""></td>
                                <td>{{$book->author->name}}</td>
                                <td>{{$book->type}}</td>
                                <td>{{$book->rental_fee}}</td>
                                <td> {{Str::words($book->description, 10, '...')}}</td>
                                {{-- <td>{{$book->status }}</td> --}}
                                <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{route('books.show',$book->id)}}" class="btn btn-sm  btn-success">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <form action="{{route('books.destroy',$book->id)}}" class="mt-1" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-sm shadow-none btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection