<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Messages</h1>

        <!-- Search Form -->
        <div class="card card-default">
            <div class="container mt-4 mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="name" class="form-control"
                               placeholder="Search Name">
                    </div>
                    <div class="col-md-3">
                        <input type="email" wire:model.defer="email" class="form-control"
                               placeholder="Search Email">
                    </div>
                    <div class="col-md-3 ">
                        <select wire:model="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <button wire:click="$refresh" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div wire:loading class="text-center mt-3">
            <span class="spinner-border spinner-border-sm" role="status"></span> Loading...
        </div>

        <!-- Transactions Table (Only Updates Data, Not Page) -->
        <div class="card card-default">
            <div class="container mt-4">
                <div wire:loading.remove>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>status</th>
                            <th>Sent At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $msg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $msg->name }}</td>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->message }}</td>
                                <td>
                                    <select class="form-control"
                                            wire:change="updateStatus({{ $msg->id }}, $event.target.value)">
                                        <option value="pending" {{ $msg->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="completed" {{ $msg->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </td>
                                <td>{{ $msg->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $messages->links() }}
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
