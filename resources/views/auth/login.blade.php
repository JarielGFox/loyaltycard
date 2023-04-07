<x-main>

    <div class="container my-3">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="dark-orange">Your Account</h2>
                <form action="/login" method="POST" class="form-control">
                    @csrf
                    <div class="row g-3">
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
                            <button type="submit" class="btn btn-danger">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-main>