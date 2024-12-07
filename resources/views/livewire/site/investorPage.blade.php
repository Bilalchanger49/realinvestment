<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Investor Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Investor Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!--Search-->
    <div class="blog-page-area pd-top-90">
        <div class="container">
            <div>
                <h2 class="ms-2">
                    Investor profile
                </h2>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                    <div class="card investor-profile-card">
                        <div class="card-img">
                            <img src="assets/img/agent/default user.jpeg" style="border-radius: 100%"
                                 class="card-img-top" alt="...">
                        </div>
                        <div class="card-body investor-profile-card-body">
                            <div class="text-section">
                                <h5 class="card-title"><strong>Furqan</strong></h5>
                                <h6 class="card-title"><strong>furqan@gmail.com</strong></h6>
                                <div>
                                    <div class="card-text">
                                        <div class="card-text d-flex">
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-coins" style="color: #5ba600;"></i>
                                                <strong>5</strong> properties
                                            </p>
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-money" style="color: #5ba600;"></i>
                                                <strong>15</strong> shares
                                            </p>
                                        </div>
                                        <div>

                                            <p>
                                                <i class="fa fa-solid fa-circle-check" style="color: #5ba600;"></i>
                                                <strong>Verified</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- <div class="card-text">
                                        <p>Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                    </div> -->
                                </div>

                            </div>
                            <div class="cta-section">
                                <div>
                                    <p>Total Income<strong> $1500</strong></p>
                                    <p>Pending <strong> $1200</strong></p>
                                </div>
                                <button class="btn btn-base ">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <!-- Pagination Area -->

            <div class="container mt-5">
                <div class="card-header">
                    Active Investments
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Shares</th>
                                <th scope="col">Shares</th>
                                <th scope="col">Remaining Shares</th>
                                <th scope="col">Holding date</th>
                                <th scope="col">Current price</th>
                                <th scope="col">Total investments</th>
                                <th scope="col">status</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propertyInvestments as $propertyInvestment)
                                @if($propertyInvestment->status == 'holding')
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            {{$propertyInvestment->property->property_name}}
                                            <br><small
                                                class="text-muted">code:#{{$propertyInvestment->property->property_reg_no}}</small>
                                        </td>
                                        <td>{{$propertyInvestment->property->property_total_shares}}</td>
                                        <td>{{$propertyInvestment->shares_owned}}</td>
                                        <td>{{$propertyInvestment->property->property_remaining_shares}}</td>
                                        <td>{{$propertyInvestment->created_at}}</td>
                                        <td><strong>{{$propertyInvestment->share_price}}</strong></td>
                                        <td><strong>PK {{$propertyInvestment->total_investment}}</strong></td>

                                        <td><span class="status-completed">{{$propertyInvestment->status}}</span></td>
                                        <td>
                                            <button id="openPopup" class="details-btn">&rarr;</button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td>2</td>
                                <td>
                                    Visit the Laken Valley
                                    <br><small class="text-muted">code:#B0154</small>
                                </td>
                                <td>120</td>
                                <td>5</td>
                                <td>115</td>
                                <td>Feb 21 2023</td>
                                <td><strong>$50</strong></td>
                                <td><strong>$389.50</strong></td>

                                <td><span class="status-unpaid">UNPAID</span></td>
                                <td>
                                    <button id="openPopup" class="details-btn">&rarr;</button>
                                {{--                                <a id="openPopup" class="details-btn">&rarr;</a></td>--}}
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    Bathing at Noriva Beach
                                    <br><small class="text-muted">code:#B0167</small>
                                </td>
                                <td>120</td>
                                <td>5</td>
                                <td>115</td>
                                <td>Feb 21 2023</td>
                                <td><strong>$50</strong></td>
                                <td><strong>$389.50</strong></td>

                                <td><span class="status-cancelled">CANCELLED</span></td>
                                <td>
                                    <button id="openPopup" class="details-btn">&rarr;</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="card-header">
                    Transactions
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transctions as $transction)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        {{$transction->property->property_name}}
                                        <br><small
                                            class="text-muted">code:#{{$transction->property->property_reg_no}}</small>
                                    </td>
                                    <td><strong>PK {{$transction->total_investment}}</strong></td>
                                    <td>{{$transction->created_at}}</td>
                                    <td><span class="status-completed">{{$transction->activity}}</span></td>
                                    <td><span class="status-completed">{{$transction->status}}</span></td>
                                    <td><a href="#" class="details-btn">&rarr;</a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>2</td>
                                <td>
                                    Visit the Laken Valley
                                    <br><small class="text-muted">code:#B0154</small>
                                </td>
                                <td><strong>$412.50</strong></td>
                                <td>10:30 Feb 21 2023</td>
                                <td><span class="status-unpaid">sold</span></td>
                                <td><span class="status-cancelled">not holding</span></td>
                                <td><a href="#" class="details-btn">&rarr;</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    Bathing at Noriva Beach
                                    <br><small class="text-muted">code:#B0167</small>
                                </td>
                                <td><strong>$390.50</strong></td>
                                <td>10:30 Feb 21 2023</td>
                                <td><span class="status-completed">Buy</span></td>
                                <td><span class="status-completed">holding</span></td>
                                <td><a href="#" class="details-btn">&rarr;</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="pagination-area text-center mt-4 mb-5">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="popup" class="popup">
            <div class="popup-content">
                <span id="closePopup" class="close-btn">&times;</span>
                <h2>Furqan</h2>

                <!-- Popup Form Start -->
                <form id="popupForm">
                    <div class="form-row">

                        <div class="form-group">
                            <label for="shares">Price Per Share</label>
                            <input type="text" id="shares" placeholder="Enter shares">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dropdown1">Number of Shares</label>
                        <select id="dropdown1" name="category">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>


                    <div class="form-row">
                        <div class="form-group">
                            <label for="dropdown1">Number of Shares</label>
                            <select id="dropdown1" name="category">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="totalPrice">Total Price</label>
                            <input type="text" id="totalPrice" placeholder="Total price" readonly>
                        </div>



                    </div>
                    <div class="form-group" style="display: flex;     flex-direction: row;">
                        <input type="checkbox" id="confirmAction">
                        <label for="confirmAction">I confirm that I want to sell these shares</label>
                    </div>

                    <button type="submit" class="submit-btn btn">Sell</button>
                </form>
                <!-- Popup Form End -->
            </div>
        </div>
    </div>


    <script>
        // Get elements
        // Get elements
        const openPopup = document.getElementById('openPopup');
        const closePopup = document.getElementById('closePopup');
        const popup = document.getElementById('popup');

        // Open popup
        openPopup.addEventListener('click', () => {
            popup.style.display = 'flex';
        });

        // Close popup
        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        // Close popup when clicking outside of it
        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
            }
        });

        // Handle form submission
        const popupForm = document.getElementById('popupForm');
        popupForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent actual form submission
            const category = document.getElementById('dropdown1').value;
            const subcategory = document.getElementById('dropdown2').value;
            alert(`Selected Category: ${category}\nSelected Sub-Category: ${subcategory}`);
            popup.style.display = 'none'; // Close popup after submission
        });


    </script>


</div>



