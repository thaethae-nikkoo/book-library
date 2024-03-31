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
                                    <h5 class="card-title text-center pb-0 fs-4">Create an account</h5>

                                </div>

                                <form action="{{route('members.store')}}" method="POST" class="row g-3 needs-validation"
                                    novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                        @error('name')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="avatar" class="form-label">Avatar</label>
                                        <input type="file" name="avatar" class="form-control" id="avatar" required>
                                        @error('avatar')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" class="form-select shadow-none " aria-label="">
                                            <option value="member">Member</option>
                                            <option value="librarian">Libraian</option>

                                        </select>
                                        @error('role')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                        @error('email')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            required>
                                        @error('password')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror

                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" required>
                                        @error('address')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror

                                    </div>

                                    <div class="col-12">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" required>
                                        @error('phone')
                                        <small class="text-danger  ml-2 ">{{$message}}</small>
                                        @enderror
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
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
