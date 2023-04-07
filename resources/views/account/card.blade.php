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
                    {{$card->points}}
                </div>
            </div>
      @endforeach

      {{-- INSERISCI ACCOUNT POINTS --}}
    </div>
</x-main>