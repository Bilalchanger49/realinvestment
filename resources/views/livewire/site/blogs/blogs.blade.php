<div>
    <div x-data="signaturePad()" class="p-4">
        <div>
            <canvas x-ref="signature_canvas" class="border rounded shadow"></canvas>
        </div>

        <!-- Hidden input for Livewire binding -->
        <input type="hidden" wire:model.defer="signature" x-ref="signature_input"
               @change="$wire.set('signature', $event.target.value)">

        <button type="button" wire:click="submit" class="text-white bg-blue-500 px-4 py-2 mt-2">
            Submit
        </button>
    </div>

    <script>
        function signaturePad() {
            return {
                signaturePad: null,

                init() {
                    let canvas = this.$refs.signature_canvas;
                    let input = this.$refs.signature_input;

                    canvas.width = 400;
                    canvas.height = 200;

                    let ctx = canvas.getContext("2d");
                    ctx.fillStyle = "#ffffff";
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    this.signaturePad = new SignaturePad(canvas, {
                        backgroundColor: "rgba(255, 255, 255, 0)"
                    });

                    // Update hidden input value and force Livewire update
                    this.signaturePad.onEnd = () => {
                        let signatureData = this.signaturePad.toDataURL("image/png");
                        input.value = signatureData;
                        input.dispatchEvent(new Event('change'));
                        console.log("Captured Signature:", signatureData); // Debugging
                    };
                }
            };
        }
    </script>


</div>
