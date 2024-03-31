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
                                <th>Borrowed Code</th>
                                <th>Book ID (ISBN)</th>
                                <th>
                                    Book Name
                                </th>
                                <th>Author Name</th>
                                <th>Borrower</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Status</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>C-{{$d->borrowed_code}}</td>
                                <td>ISBN{{$d->book_id}}</td>
                                <td>{{$d->book->name}}</td>
                                <td>{{$d->author->name}}</td>
                                <td>{{$d->user->name}}</td>
                                <td>{{$d->created_at->format("Y-m-d")}}</td>
                                <td>{{$d->date_to}}</td>

                                <td>{{$d->status}}</td>

                                {{-- <td>

                                    <form action="{{route('histories.destroy',$d->id)}}" class="mt-1" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-sm shadow-none btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>

                                </td> --}}
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