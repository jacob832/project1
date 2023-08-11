@include('Top')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('register_submit') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- تفاصيل النموذج -->

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" required autocomplete="tel" class="form-control">
                        @error('mobile')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Date of Birth</label>
                        <input id="birthdate" type="date" name="birthdate" required class="form-control">
                        @error('birthdate')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                        @error('password_confirmation')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('down')
