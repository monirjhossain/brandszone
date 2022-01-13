@extends('install.app')
@section('content')

    <div class="card-body m-5 py-3">
        <h3 class="text-lg-center px-3 pb-3 mb-3">@translate(Create Admin User)</h3>

        @if($message = Session::get('failed'))
            <div class="alert alert-danger">{{Session::get('failed')}}</div>
            @endif

        @if($message = Session::get('invalidKey'))
            <div class="alert alert-danger">This purchase key is not valid</div>
        @endif

        @if($message = Session::get('notManyvendor'))
            <div class="alert alert-danger">You inserted a wrong purchase code, Please purchase our item from CODECANYON for a valid code</div>
        @endif

        @if($message = Session::get('used'))
            <div class="alert alert-danger">{{Session::get('used')}}</div>
        @endif

        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="text-md-right">@translate(Name)</label>
                <input placeholder="Enter UserName" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="text-md-right">@translate(E-Mail Address)</label>
                <input id="email" placeholder="Enter Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="text-md-right">@translate(Password)</label>
                <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="text-md-right">@translate(Confirm Password)</label>

                <input id="password-confirm" placeholder="Re-type Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group mt-4 mb-0">
                <label class="text-md-right">@translate(Important information)</label>
            </div>
            <div className="form-group row mb-3">
                <label className="col-md-4 col-form-label text-md-right"></label>
                <div className="col-md-6">
                    <ul className="list-group ml-0 pl-0">
                        <li className="list-group-item text-semibold border-0 pl-0 sm-text">
                            You can use this
                            <span className="text-danger">
                                    purchase code
                                  </span>
                            only in one domain. Once used, you can only
                            transfer the website in it's subdomains. The
                            main domain can not be changed unless you
                            verify your purchase code from the support
                            team of this software. And this support will
                            not be free.
                        </li>
                        <li className="list-group-item text-semibold border-0 pl-0 sm-text">
                            You can install in localhost, it will not
                            affect your live server installation with the
                            same purchase code.
                        </li>

                        <li className="list-group-item text-semibold text-secondary border-0 pl-0 sm-text">
                            <i className="fa fa-info mr-2"></i>You need
                            internet connection to save these information
                        </li>
                    </ul>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="purchase_key" class="text-md-right">@translate(Purchase code)</label>
                <input placeholder="Enter purchase code" id="purchase_key" type="text" class="form-control" name="purchase_key" value="{{ old('purchase_key') }}" required>
            </div>

            <input type="hidden" name="domain_name" value="{{request()->getHttpHost()}}"/>
            <input type="hidden" name="ip_address" value="{{request()->ip()}}"/>
            <input type="hidden" name="ip_address" value="{{request()->ip()}}"/>

            <button type="submit" class="btn btn-block btn-primary">
                @translate(Register)
            </button>
        </form>
    </div>

@endsection
