<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Profile Verification</h1>

        <!-- Transactions Table (Only Updates Data, Not Page) -->
        <div class="card card-default">
            <div class="container mt-4">
                <div>
                    <table class="table">
                        <thead>
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
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->cnic }}</td>
                                <td><img src="{{ asset('storage/'.$request->profile_photo_path) }}" width="100"></td>
                                <td><img src="{{ asset('storage/'.$request->nic_front) }}" width="100"></td>
                                <td><img src="{{ asset('storage/'.$request->nic_back) }}" width="100"></td>
                                <td><img src="{{ asset('storage/'.$request->signature) }}" width="100"></td>
                                <td>
                                    <button wire:click="verify({{$request->id}})" class="btn btn-success">Verify</button>
                                    <button  wire:click="reject({{$request->id}})" class="btn btn-danger">Reject</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
