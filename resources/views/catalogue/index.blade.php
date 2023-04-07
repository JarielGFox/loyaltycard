<x-main>

    <div class="container my-3">
        <table class="table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</x-main>