<x-main>
    <div class="container my-3">
        <h1>Welcome to your card manager!</h1>

       @foreach (auth()->user()->cards as $card) {{-- auth()->user()-> identifica la sessione del login --}}
            <div class="card border-3 shadow bg-light">
                <div class="card-body">
                    <h3>Collection Card</h3>
                    <div>
                        {{auth()->user()->name}}
                    </div>
                    <div>
                        <img src="https://media.istockphoto.com/id/1326393932/tr/vekt%C3%B6r/abstract-dark-gold-vip-card-template-vector-design-style-premium-luxury-template.jpg?s=1024x1024&w=is&k=20&c=0lLFsfxEZLG3wtfcOiMvsp5uWat4JFyav187xIcUjR8=" width="500" height="300" />
                    </div>
                    <div class="lead fw-bold text-end">
                    {{$card->card}}
                    </div>
                </div>
            </div>
            <div class="my-3">
                <h4>Your reward points:</h4>
                <div class="text-end">
                    <span class="text-bg-dark text-warning fw-bold">{{$card->points}}</span>
                </div>
            </div>
      @endforeach

      <div class="my-3">
            <h4>Prize Catalog</h4>

            <x-success />

            @foreach ($products as $product)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                @if($product->image)
                                <img src="{{Storage::url($product->image)}}" alt="{{$product->name}}" class="img-fluid border border-1 border-dark">
                                @else
                                <img src="https://picsum.photos/200/200" alt="{{$product->name}}" class="img-fluid border border-1 border-dark">
                                @endif
                            </div>
                            <div class="col-10">
                                <div>
                                    {{$product->name}}
                                </div>
                                
                                <div>
                                    Points: {{$product->points}}
                                    <div class="mt-2">
                                        @if(auth()->user()->cards->first() && $product->points > auth()->user()->cards->first()->points)
                                        <span class="text-secondary"> You miss only <span class="text-danger"> {{$product->points - auth()->user()->cards->first()->points}}</span> points to collect the prize!</span>
                                        @endif

                                        @if(auth()->user()->cards->first() && $product->points < auth()->user()->cards->first()->points)
                                        <div class="mt-2">
                                            @if(auth()->user()->products->contains($product->id))
                                            <span class="text-success">Premio richiesto il xxx</span>
                                            <form action="{{route('card.reward.undo', $product)}}" method="POST" class="mt-2">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel Order</button>
                                            </form>    
                                            @else
                                            <form action="{{route('card.reward', $product)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Collect Item</button>
                                            </form>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

      {{-- INSERISCI TOTALE PUNTI DELLE CARTE --}}
    </div>
</x-main>