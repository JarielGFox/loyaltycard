<x-main>

    <div class="container-md g-3">
        <div class="col-12">
            <div class="my-3 text-bg-dark text-warning mx-auto">
                <h3>Edit the selected item in the catalog</h3>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('catalogue.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Product name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            @error('name') <span class="text-danger sm">{{$message}}</span>  @enderror
                        </div>
                        <div class="col-12">
                            <label for="points">Product points:</label>
                            <input type="number" name="points" id="points" class="form-control" value="{{old('points')}}">
                            @error('points') <span class="text-danger sm">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="quantity">Product stock quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}">
                            @error('quantity') <span class="text-danger sm">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="image">Product primary picture:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="description">Product description:</label>
                            <textarea type="text" name="description" id="description" class="form-control" rows="8" cols="150">{{old('description')}}</textarea>
                            @error('description') <span class="text-danger sm">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="product_code">Product code:</label>
                            <input type="number" name="product_code" id="product_code" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-main>