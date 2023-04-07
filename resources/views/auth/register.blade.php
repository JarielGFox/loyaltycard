<x-main>
    <div class="container my-3">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="text text-success">Registration process:</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Username</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error ('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                          <div class="col-12">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control">
                            @error ('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error ('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @error ('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-main>