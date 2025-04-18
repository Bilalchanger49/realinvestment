<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/8.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Contact</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <div class="container py-5 ">
        <div class="row py-5 g-3">

            <div class="col-md-6 first_col ">
                <h1 class="text-center mt-3">Contact Us</h1>
                <form class="p-3 mt-3"  wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Enter your Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="name">
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email ID</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" wire:model="email">
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Enter your massage</label>
                        <textarea  type="text" class="form-control" id="exampleFormControlTextarea1" rows="7" wire:model="message"></textarea>
                        @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 sec_col " style="position: static">
                <img src="assets/img/project/14.png"
                     class="img-fluid">
            </div>

        </div>
        <div class="row-last">
            <div class="row row-cols-1 row-cols-md-3  p-3 text-white">
                <div class="col">
                    <h4>CALL US</h4>
                    <p>Phone: <strong>0349 5101379</strong></p>
                    <p>Hours: Monday to Friday,<br>9 AM - 5 PM</p>
                </div>
                <div class="col">
                    <h4>LOCATION</h4>
                    <p>Address: <strong>420 Real Estate Street, I-14/4</strong></p>
                    <p>City: <strong>Islamabad</strong>, State: <strong>Pakistan</strong>, ZIP: <strong>41041</strong></p>
                </div>
                <div class="col">
                    <h4>Email</h4>
                    <p>Have questions or need assistance? Reach out to us via email!</p>
                    <p><strong>hamza@real.com</strong></p>
                    <p>We aim to respond to all inquiries within 24 hours.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-page-map m-5  px-5"> <!-- Add mt-4 for top margin -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26559.881691762537!2d72.96755217665297!3d33.68344710204144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbde37b1f3fe9%3A0x742d0ad4f5b956fd!2sF-11%2C%20Islamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1735188285577!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>
