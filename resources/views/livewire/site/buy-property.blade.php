<div class="col-lg-4">
    <aside class="sidebar-area">
        <div class="widget widget-category">
            <form wire:submit.prevent="calculateTotal" method="POST">
                <div class="d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">
                    <label>Total Shares</label>
                    <p class="mb-0 text-right">{{ $totalShares }}</p>
                </div>

                <div class="mt-2 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">
                    <label>Available Shares</label>
                    <p class="mb-0 text-right">{{ $availableShares }}</p>
                </div>

                <div class="mt-2 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">
                    <label>Share Price</label>
                    <p id="sharePrice" class="mb-0 text-right">{{ $sharePrice }}</p>
                </div>

                <!-- Input to select the number of shares -->
                <div class="mt-3">
                    <label for="numShares">Number of Shares to Buy:</label>

                    <input type="number" id="numShares" name="numShares" class="form-control" min="1"
                           max="{{ $availableShares }}"
                           wire:model="numShares"
                           wire:input="calculateTotal">
                </div>

                <!-- Display the total price -->
                <div class="mt-3 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">
                    <label>Total Price</label>
                    <p id="totalPrice" class="mb-0 text-right">{{ $totalPrice }}</p>
                </div>

                <!-- Buy button -->
                <div class="mt-3 text-center">
                    <div class="btn-wrap">
                        <button  wire:click="buyProperty({{$property->id}})" class="btn btn-base w-md-auto w-50">Buy</button>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>
