<div>
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/4.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Offer Letter</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Offer letter</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="offerLetter" class="offerLetter container-fluid my-5">
        <h2>REAL INVESTMENT</h2>
        <h3>Digital Investment Confirmation Letter</h3>
        <p><strong>Issued by:</strong> Real Investment</p>
        <p><strong>Date:</strong> {{ $date }}</p>
        <p><strong>Transaction ID:</strong> {{ $transaction->id }}</p>

        <h4>To:</h4>
        <p><strong>Investor Name:</strong> {{ $user->name }}</p>
        <p><strong>CNIC/NICOP:</strong> {{ $user->cnic }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <h4>Subject: Investment Confirmation for {{ $property->property_name }}</h4>
        <p>Dear {{ $user->name }},</p>
        <p>We are pleased to confirm your investment in {{ $property->property_name }}.</p>

        <h4>Investment Details:</h4>
        <ul>
            <li><strong>Property Name:</strong> {{ $property->property_name }}</li>
            <li><strong>Location:</strong> {{ $property->property_location }}</li>
            <li><strong>Total Shares Purchased:</strong> {{ $transaction->shares_owned }}</li>
            <li><strong>Price per Share:</strong> {{ $transaction->share_price }}</li>
            <li><strong>Total Amount Paid:</strong> {{ $transaction->total_investment }}</li>
            <li><strong>Payment Method:</strong> {{ $transaction->payment_id }}</li>
        </ul>

        <h4>Terms & Conditions:</h4>
        <p>This transaction is final and cannot be reversed once completed.</p>
        <p>Shares are non-transferable outside of the Real Investment platform.</p>
        <p>Future profits are based on market performance and are not guaranteed.</p>
        <p>The investor agrees that these shares do not grant direct ownership of the property.</p>

        <h4>Investor Agreement & Acknowledgment:</h4>
        <p>By signing, I confirm that I agree to the terms outlined.</p>
        <p>
        <div class="d-flex flex-row">
            <div>Investor Signature:</div>
            <div class="d-flex flex-column">
                <img style="height: 70px; width: 70px" src="{{ asset('storage/' . $user->signature) }}" alt="User Signature">
                <span>_____________________</span>
            </div>
        </div>
        </p>
        <p>Date:{{$date}}</p>

        <h4>Authorized by: Real Investment</h4>
        <p>Signature: _____________________</p>

    </section>
    <button id="downloadPDF" class="btn btn-secondary">Download Offer Letter</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

{{--    <script>--}}
{{--         document.getElementById('downloadPDF').addEventListener('click', () => {--}}
{{--             const offerletter = document.getElementById('offerLetter').innerHTML;--}}
{{--             const printWindow = window.open('', '_blank', 'width=600,height=400');--}}
{{--             printWindow.document.write(`--}}
{{--         <html>--}}
{{--             <head>--}}
{{--                 <title>Offer Letter</title>--}}
{{--                 <style>--}}
{{--                     body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }--}}
{{--                     h2 { text-align: center; }--}}
{{--                     p { margin: 10px 0; }--}}
{{--                 </style>--}}
{{--             </head>--}}
{{--             <body>--}}

{{--                 ${offerletter}--}}
{{--             </body>--}}
{{--         </html>--}}
{{--     `);--}}
{{--             printWindow.document.close();--}}
{{--             printWindow.print();--}}
{{--         });--}}

{{--    </script>--}}

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("downloadPDF").addEventListener("click", () => {
                const offerLetterElement = document.getElementById("offerLetter");

                if (!offerLetterElement) {
                    alert("Error: Offer Letter content not found!");
                    return;
                }

                const printWindow = window.open('', '', 'width=800,height=900');
                printWindow.document.open();

                const clonedOfferLetter = offerLetterElement.cloneNode(true);

                // Convert Laravel storage paths to full URLs
                const images = clonedOfferLetter.getElementsByTagName("img");
                for (let img of images) {
                    if (img.src.startsWith("blob:") || img.src.startsWith("data:")) continue;
                    const absoluteUrl = new URL(img.getAttribute("src"), window.location.origin).href;
                    img.setAttribute("src", absoluteUrl);
                }

                printWindow.document.write(`
                <html>
                <head>
                    <title>Offer Letter</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
                        h2, h3, h4 { text-align: center; }
                        p, ul { margin: 10px 0; }
                        ul { padding-left: 20px; }
                        img { max-width: 100%; display: block; margin: 10px auto; }
                    </style>
                </head>
                <body>
                    ${clonedOfferLetter.innerHTML}
                </body>
                </html>
            `);

                printWindow.document.close();

                // Ensure images load before printing
                setTimeout(() => {
                    printWindow.print();
                }, 1000);
            });
        });
    </script>




</div>
