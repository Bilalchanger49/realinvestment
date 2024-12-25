<div>
    <div class="row g-4 mt-5">
        @foreach($propertyAdds as $propertyAdd)
        <div class="col-md-6 col-lg-4">
            <div class="card__article position-relative">
                <!-- Keeping the same image -->
                <img src="assets/img/banner/2.png" alt="Vancouver Mountains, Canada"
                     class="card__img rounded-3 w-100">
                <div class="card__data position-absolute bg-white shadow rounded-3">
                    <span class="card__description d-block text-muted small mb-1">
                        {{$propertyAdd->property->property_address}}</span>
                    <h2 class="card__title">{{$propertyAdd->property->property_name}}</h2>
                    <span class="card__token-price d-block text-muted small mb-1">
                        Token Price: {{$propertyAdd->share_amount}}</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">
                        Tokens Available: {{$propertyAdd->no_of_shares}}</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">
                        Total Price: {{$propertyAdd->total_amount}}</span>
                    <span
                        class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                    <span class="card__owner d-block text-muted small mb-1">
                        Owner: {{$propertyAdd->user->name}}</span>
                    <div>
                        <a href="#" class="card__button text-decoration-none"
                           wire:click="buyProperty({{$propertyAdd->id}})"
                        >Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row g-4 mt-5">
        <div class="col-md-6 col-lg-4">
            <div class="card__article position-relative">
                <!-- Keeping the same image -->
                <img src="assets/img/banner/2.png" alt="Vancouver Mountains, Canada"
                     class="card__img rounded-3 w-100">
                <div class="card__data position-absolute bg-white shadow rounded-3">
                    <span class="card__description d-block text-muted small mb-1">Downtown, City</span>
                    <h2 class="card__title">High-Yield Residential Property</h2>
                    <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                    <span
                        class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                    <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                    <div>
                        <a href="#" class="card__button text-decoration-none">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card__article position-relative">
                <img src="assets/img/banner/2.png" alt="Poon Hill, Nepal" class="card__img rounded-3 w-100">
                <div class="card__data position-absolute bg-white shadow rounded-3">
                    <span class="card__description d-block text-muted small mb-1">Poon Hill, Nepal</span>
                    <h2 class="card__title">Starry Night</h2>
                    <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                    <span
                        class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                    <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                    <div>
                        <a href="#" class="card__button text-decoration-none">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card__article position-relative">
                <img src="assets/img/banner/2.png" alt="Bojcin Forest, Serbia"
                     class="card__img rounded-3 w-100">
                <div class="card__data position-absolute bg-white shadow rounded-3">
                    <span class="card__description d-block text-muted small mb-1">Bojcin Forest, Serbia</span>
                    <h2 class="card__title">Path Of Peace</h2>
                    <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                    <span
                        class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                    <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                    <div>
                        <a href="#" class="card__button text-decoration-none">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>