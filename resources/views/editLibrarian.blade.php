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
                                    <h5 class="card-title text-center pb-0 fs-4">Edit a librian account</h5>

                                </div>

                                <form action="{{route('members.update',$user->id)}}" method="post"
                                    class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}"
                                            id="name" required>
                                        @error('name')
                                        <span class="text-danger text-xs ml-2 tracking-wider">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="role" value="librarian">

                                    <div class="col-12 ">
                                        <label for="avatar" class="form-label">Avatar</label>
                                        <div class="row">
                                            <div class="col-7">
                                                <input type="hidden" value="{{$user->avatar}}" name="old_avatar"
                                                    id="old_avatar">
                                                <input type="file" name="new_avatar" class="form-control"
                                                    id="new_avatar">
                                                @error('avatar')
                                                <span
                                                    class="text-danger text-xs ml-2 tracking-wider">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-5">

                                                <img src="/storage/{{$user->avatar}}" width="50%" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}"
                                            id="email" required>
                                        @error('email')
                                        <span class="text-danger text-xs ml-2 tracking-wider">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{$user->address}}" id="address" required>
                                        @error('address')
                                        <span class="text-danger text-xs ml-2 tracking-wider">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}"
                                            id="phone" required>
                                        @error('phone')
                                        <span class="text-danger text-xs ml-2 tracking-wider">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Update Account</button>
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