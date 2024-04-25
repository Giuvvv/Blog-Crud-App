@extends('layout')

@section('title', 'Login')

@section('content')


    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto" id="modalElement" style="margin-top: 4em;">


                <form action="{{ route('login.post') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-12">
                    <h1><b>Login</b></h1>
                    <br>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" aria-describedby="emailHelp"
                                placeholder="Enter email">

                            @if ($errors->has('email'))
                                <div class="error">
                                    <p style="color:red;">{{ $errors->first('email') }} </p>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">

                        @if ($errors->has('password'))
                            <div class="error">
                                <p style="color:red;">{{ $errors->first('password') }} </p>
                            </div>
                        @endif

                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© Created by <a
                    class="link-offset-2 link-underline link-underline-opacity-0" href="https://github.com/Giuvvv">Giovan
                    Battista Lo Buglio</a></span>
        </div>


    </footer>

@endsection