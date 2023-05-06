<x-main>

    <div class="container my-3">
        <div class="row">
            <div class="col-6">
                Available Items
            </div>
            <div class="col-6 text-end my-2">
                <a class="btn btn-sm btn-secondary" href="{{route('catalogue.create')}}">New Item</a>
            </div>
        </div>

        <x-success />

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Stock Quantity</th>
                    <th>Points</th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-secondary fw-bold text-decoration-underline">{{$product->name}}</td>
                        <td class="text-primary">
                            @if ($product->quantity === 0)
                                <span class="text-danger fw-bold">OUT OF STOCK</span>
                            @else 
                                <span>{{$product->quantity}}</span>
                            @endif
                        </td>
                        <td class="text-success fw-bold">{{$product->points}}</td>
                        <td class="text-end">
                            <a href="{{route('catalogue.edit', $product->id)}}" class="btn btn-sm btn-success">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</x-main>