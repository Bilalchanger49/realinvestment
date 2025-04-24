
<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Support & FAQs</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Support & FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <div class="container mt-5">
        <div class="row text-center mb-3">
            <h1>FAQs</h1>
        </div>
        <div class="row">
            <div class="faq-card col-lg-6 col-12">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span class="faq-question">What is Real Estate Tokenization?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Real estate tokenization is the process of converting the ownership of a real estate asset into digital tokens.
                </div>
            </div>
            <div class="faq-card col-lg-6 col-12">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span class="faq-question">How Can I Invest in Tokenized Real Estate?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Sign up, explore available properties, and buy shares in your chosen property.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="faq-card col-lg-6 col-12">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span class="faq-question">What Are the Benefits of Real Estate Tokenization?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Fractional ownership, affordability, easier access, and improved liquidity.
                </div>
            </div>
            <div class="faq-card col-lg-6 col-12">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span class="faq-question">How Secure Is My Investment?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Your investment is secured through strict compliance with regulatory standards.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="faq-card col-lg-6 col-12">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span class="faq-question">Can I Sell My Shares Anytime?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Yes, you can sell your shares on our platform's marketplace, depending on demand.
                </div>
            </div>
        </div>



        <div class="support-section text-center my-5">
            <h4>Need help with Real Estate Investment?</h4>
            <p>Contact us to learn more or get assistance with your investments.</p>
            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3 mt-3">
                <button class="btn btn-base"><a href="{{route('site.contact')}}">Chat with us</a></button>
            </div>
        </div>


    </div>


    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('i');

            if (answer.style.display === "block") {
                answer.style.display = "none";
                icon.style.transform = "rotate(-90deg)";
            } else {
                answer.style.display = "block";
                icon.style.transform = "rotate(0deg)";
            }
        }

    </script>

</div>


<script>
    function toggleFaq(element) {
        const answer = element.nextElementSibling;
        const icon = element.querySelector('i');

        if (answer.style.display === "block") {
            answer.style.display = "none";
            icon.style.transform = "rotate(-90deg)";
        } else {
            answer.style.display = "block";
            icon.style.transform = "rotate(0deg)";
        }
    }

</script>

</div>
