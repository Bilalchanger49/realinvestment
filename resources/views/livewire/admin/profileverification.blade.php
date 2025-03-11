<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Profile Verification</h1>

        <!-- Transactions Table -->
        <div class="card card-default">
            <div class="container mt-4">
                <div>
                    <table class="profile-verification-table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>CNIC</th>
                                <th>Profile Photo</th>
                                <th>NIC Front</th>
                                <th>NIC Back</th>
                                <th>Signature</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td class="text-capitalize">{{ $request->name }}</td>
                                <td class="text-nowrap">{{ $request->email }}</td>
                                <td class="text-nowrap">{{ $request->cnic }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$request->profile_photo_path) }}"
                                        class="img-thumbnail preview-img">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$request->nic_front) }}"
                                        class="img-thumbnail preview-img">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$request->nic_back) }}"
                                        class="img-thumbnail preview-img">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$request->signature) }}"
                                        class="img-thumbnail preview-img">
                                </td>
                                <td>
                                    {{-- <button wire:click="verify({{$request->id}})"
                                        class="btn btn-success">Verify</button> --}}
                                    {{-- <button wire:click="reject({{$request->id}})"
                                        class="btn btn-danger">Reject</button> --}}
                                        <button class="action-verify-btn"><i class="fas fa-check"></i></button>
                                        <button class="action-reject-btn"><i class="fas fa-times"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Fullscreen Image Preview Modal -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img id="previewImage" src="" class="img-fluid" alt="Preview">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".preview-img").forEach(img => {
            img.addEventListener("click", function () {
                document.getElementById("previewImage").src = this.src;
                new bootstrap.Modal(document.getElementById("imagePreviewModal")).show();
            });
        });
    });
</script>