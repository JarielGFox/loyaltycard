<x-main>
    <div class="container my-3">
        <h1>Points Manager</h1>

        @if (session()->has('success'))
            <div class="text-success mb-3">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row my-3">
            <div class="col-4">
                <form action="{{route('cards.points.check')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idcard">ID Card</label>
                            <input type="text" name="idcard" id="idcard" class="form-control" value="{{ old('idcard', $idcard) }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Check total points</button>
                        </div>
                    </div>
                </form>
            </div>
            @if (isset($card))
                <div class="col-4">
                    <form action="{{route('cards.points.update')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="points">Update points</label>
                                <input type="number" name="points" id="points" class="form-control" value="{{$card->points}}">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-warning">UPDATE POINTS</button>
                            </div>
                        </div>
                        <input type="hidden" name="idcard" value="{{$card->card}}">
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-main>
