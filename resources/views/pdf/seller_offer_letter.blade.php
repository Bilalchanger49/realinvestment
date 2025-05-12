<div>


    <section id="offerLetter" class="offerLetter container-fluid mt-5 pt-5">
        <h2>REAL INVESTMENT</h2>
        <h3>Digital Share Sale Confirmation Letter</h3>
        <p><strong>Issued by:</strong> Real Investment</p>
        <p><strong>Date:</strong> {{ $date }}</p>
        <p><strong>Transaction ID:</strong> {{ $transactionId }}</p>

        <h4>To:</h4>
        <p><strong>Investor Name:</strong> {{ $user->name }}</p>
        <p><strong>CNIC/NICOP:</strong> {{ $user->cnic }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <h4>Subject: Share Sale Confirmation for {{ $property->property_name }}</h4>
        <p>Dear {{ $user->name }},</p>
        <p>We confirm your successful sale of shares in {{ $property->property_name }}.</p>

        <h4>Transaction Details:</h4>
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
        <p>The seller no longer holds any rights over the sold shares.</p>
        <p>Future investment opportunities will be subject to availability.</p>

        <h4>Seller Agreement & Acknowledgment:</h4>
        <p>By signing, I confirm that I agree to the terms outlined.</p>
        <div class="d-flex flex-row">
            <div>Seller Signature:</div>
            <div class="d-flex flex-column">
                <img style="height: 70px; width: 70px" src="{{ asset('storage/' . $user->signature) }}"
                    alt="User Signature">
                <span>_____________________</span>
            </div>
        </div>
        </p>
        <p>Date:{{$date}}</p>

        <h4>Authorized by: Real Investment</h4>
        <div class="d-flex flex-column">
            <img  style="height: 70px; width: 200px; margin-bottom: 0px"  src="{{ asset('storage/signatures/real investment signature.png') }}"
                 alt="User Signature">
            <span>_________________________</span>
        </div>
    </section>
    <button id="downloadPDF" class="btn btn-secondary">Download Offer Letter</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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
