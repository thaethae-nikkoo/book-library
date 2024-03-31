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
                                <th>
                                    Name
                                </th>
                                <th>
                                    Avatar
                                </th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($members as $member)
                            <tr>
                                <td>{{$member->name}}</td>
                                <td><img src="/storage/{{$member->avatar}}" width="100px" height="100px"
                                        class="rounded-circle" alt=""></td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->phone}}</td>
                                <td>{{$member->address}}</td>


                                <td>
                                    <a href="{{route('members.show',$member->id)}}" class="btn btn-sm btn-success">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{route('members.edit',$member->id)}}" class="btn btn-sm my-1 btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{route('members.destroy',$member->id)}}" method="post">
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