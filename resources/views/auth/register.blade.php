@extends('layouts.app')

@section('auth-links') 
    <li class="nav-item">
        <a class="auth auth-log" href="{{ route('login') }}">Login</a>
    </li>
@stop

@section('hero-area')
        <div class="col-md-7 login">
            <div class="card"  id="login-form">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multi-part/data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('department') }}</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department">
                                    
                                    <option value="">---Select an option---</option>
                                    <option value="1">Computer With Math</option>
                                    <option value="2">Computer With Economics</option>
                                    <option value="3">Computer Engineering</option>
                                </select>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-login">
            <svg id="b41acc08-8e22-4855-9573-a5b5d021adc0" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1096 760"><title>personal_information</title><path d="M52,70V438H420V70ZM239,430a10,10,0,1,1,10-10A10,10,0,0,1,239,430Z" transform="translate(-52 -70)" fill="#6c63ff"/><path d="M1148,500c0,163.89-119.49,299.89-276.1,325.62A332.43752,332.43752,0,0,1,818,830,329.92955,329.92955,0,0,1,488,500c0-182.25,147.75-330,330-330a328.48456,328.48456,0,0,1,192.01,61.6C1093.56,291.46,1148,389.37,1148,500Z" transform="translate(-52 -70)" fill="#6c63ff"/><path d="M1047.06786,179.89381l28.66016-8.93607,2.47252-25.24147s-69.70783-26.3317-91.99361,20.24431c-7.86881,16.44533-17.78612,26.32181-27.32452,32.21782-13.13849,8.12153-29.33272,9.07457-43.84136,3.7758-48.31123-17.64388-59.68824,32.53114-59.68824,32.53114s4.17627,7.14246,33.9562,8.89857c14.8204.874,26.94714,12.02675,35.39079,23.01105,18.08056,23.52114,55.21977,16.72343,64.33919-11.50758q.2204-.68255.43415-1.38248c14.24559-46.667,79.10078-9.51094,79.10078-9.51094l4.14032-42.26841Z" transform="translate(-52 -70)" fill="#2f2e41"/><circle cx="799.78382" cy="189.02224" r="35.10282" fill="#2f2e41"/><circle cx="782.23241" cy="282.62975" r="93.60751" fill="#2f2e41"/><circle cx="779.30717" cy="316.75749" r="64.35516" fill="#a0616a"/><path d="M805.95514,435.5114l11.70094,62.405,58.50469-7.80063s-9.75078-48.75391-3.90031-62.405Z" transform="translate(-52 -70)" fill="#a0616a"/><path d="M517.332,677.3308s-66.30532-39.00313-72.15579-11.70094S511.48151,704.633,511.48151,704.633Z" transform="translate(-52 -70)" fill="#a0616a"/><path d="M921.01437,299.00045s-46.80375-35.10282-66.30532-21.45172,52.65422,58.50469,60.45485,54.60438S921.01437,299.00045,921.01437,299.00045Z" transform="translate(-52 -70)" fill="#a0616a"/><path d="M876.16077,456.96312l-70.20563,11.70094v31.2025s-66.30532,21.45173-66.30532,31.20251-17.55141,46.80375-17.55141,46.80375-42.90344,31.20251-7.80062,68.25548c0,0,13.65109,21.45172,3.90031,23.40188s-31.2025,7.80062-21.45172,15.60125S852.75889,745.58628,864.45983,741.686,965.868,599.32454,965.868,564.22173s-37.053-85.80689-37.053-85.80689l-42.90345-5.85047Z" transform="translate(-52 -70)" fill="#d0cde1"/><path d="M745.50029,529.11891s-27.30219-3.90031-37.053,29.25235-42.90345,140.41126-42.90345,140.41126-118.95954-1.95015-150.162-31.2025l-13.6511,44.8536s179.4144,64.35516,195.01565,52.65422,83.85673-200.86611,83.85673-200.86611Z" transform="translate(-52 -70)" fill="#d0cde1"/><path d="M922.96453,484.26531l5.85047-5.85047s74.10594-79.95641,72.15578-99.458c0,0-39.00312-48.75391-87.757-35.10281,0,0-21.45172-52.65423,11.70094-50.70407S1080.9272,287.29951,1078.977,343.854,960.0175,573.97251,960.0175,573.97251Z" transform="translate(-52 -70)" fill="#d0cde1"/><path d="M871.9,825.62A332.43752,332.43752,0,0,1,818,830a328.46686,328.46686,0,0,1-163.57-43.33l11.59-23.47,36.89-74.76,1.64-3.31,26.87,8.1,134.99,40.66.37006,6.23Z" transform="translate(-52 -70)" fill="#2f2e41"/><ellipse cx="834.23241" cy="337.0285" rx="40.95329" ry="64.35516" transform="translate(194.43918 948.22674) rotate(-71.20833)" fill="#2f2e41"/><path d="M240.59744,422.55629c13.5524-24.83118,46.01231-40.5539,72.56588-26.38219,11.9521,6.37887,21.453,17.66311,24.46934,31.00044,3.50391,15.49324-3.875,30.2656-11.48815,43.282-4.1321,7.06475-8.65974,13.98587-12.07963,21.43785-3.54139,7.71673-6.07177,16.63614-3.40555,25.0311,2.40209,7.56329,8.41771,13.06443,15.00773,17.10718a111.82571,111.82571,0,0,0,23.06105,10.29521,135.74212,135.74212,0,0,0,51.48525,6.66089,140.79482,140.79482,0,0,0,25.65993-4.148c8.94347-2.27978,17.71919-5.17,26.67734-7.39514,14.95643-3.715,32.00927-5.56181,46.191,1.903,13.77762,7.25206,19.94382,22.41914,21.8514,37.1745,3.52233,27.24554-7.28117,55.52031-26.78642,74.6019-9.35766,9.1544-21.13384,16.71654-33.96016,19.811-11.19142,2.7-25.56139,2.527-34.46664-5.83912-9.93849-9.33685-7.60451-24.30918.29265-34.16047,10.07547-12.56862,27.14314-15.58788,42.37434-15.89363,17.32642-.34781,34.636,2.23245,51.952.62849a79.79791,79.79791,0,0,0,24.56814-5.92628,62.258,62.258,0,0,0,18.51515-12.52935c10.68957-10.38574,17.89563-24.22241,21.48538-38.60847,4.317-17.30075,3.376-35.482.02495-52.85855a238.35678,238.35678,0,0,0-6.88813-26.50745c-1.15724-3.66956-6.95166-2.10226-5.78568,1.595,10.31994,32.72422,16.07353,70.563-3.86507,100.94554a60.10714,60.10714,0,0,1-35.94321,25.87346c-17.25707,4.28882-35.36519,2.16856-52.90853,1.53055-16.682-.60668-34.997.04762-49.29947,9.76363-11.731,7.96919-19.93576,23.12692-16.39008,37.43725,3.41923,13.8,16.68122,20.797,29.94512,21.8781,13.91688,1.13429,27.61207-3.53732,39.29944-10.84092,24.31288-15.19346,40.47873-41.91259,43.86236-70.24154,1.76311-14.76131-.03065-30.661-6.72468-44.05932a43.133,43.133,0,0,0-15.84676-17.66125c-6.81034-4.17513-14.67638-6.22986-22.57559-6.9574-17.94764-1.653-35.19238,4.50906-52.21755,9.22283a144.79191,144.79191,0,0,1-26.6282,5.08271,132.98378,132.98378,0,0,1-26.27173-.42791,129.36219,129.36219,0,0,1-25.45722-5.64965,101.89165,101.89165,0,0,1-23.10771-10.447c-6.38519-4.08327-11.9068-9.93075-12.22091-17.89514-.34077-8.64067,4.01574-16.7238,8.16022-24.009,8.18678-14.39074,18.2966-28.46728,20.4346-45.31431,1.87017-14.73655-4.05969-29.262-14.29848-39.77289A53.77092,53.77092,0,0,0,290.128,384.80913c-15.193.43466-29.74017,7.04159-40.9151,17.18861A67.3583,67.3583,0,0,0,235.41662,419.528c-1.85057,3.39068,3.32842,6.42236,5.18082,3.02831Z" transform="translate(-52 -70)" fill="#3f3d56"/><path d="M251,104a43.79566,43.79566,0,0,0-23.0976,81.00409c.12726.07922.26215.147.39032.22491a23.99269,23.99269,0,0,1,45.41456,0c.12817-.07794.26306-.14569.39032-.22491A43.79566,43.79566,0,0,0,251,104Zm0,60.746a15.5397,15.5397,0,1,1,15.53967-15.53967A15.53969,15.53969,0,0,1,251,164.746Z" transform="translate(-52 -70)" fill="#3f3d56"/><circle cx="124" cy="156" r="8" fill="#3f3d56"/><circle cx="124" cy="192" r="8" fill="#3f3d56"/><circle cx="124" cy="228" r="8" fill="#3f3d56"/><circle cx="124" cy="264" r="8" fill="#3f3d56"/><rect x="146" y="220" width="106" height="16" rx="7.99999" fill="#3f3d56"/><rect x="146" y="256" width="106" height="16" rx="7.99999" fill="#3f3d56"/><rect x="146" y="184" width="106" height="16" rx="7.99999" fill="#3f3d56"/><rect x="146" y="148" width="106" height="16" rx="7.99999" fill="#3f3d56"/></svg>
        </div>
@endsection
