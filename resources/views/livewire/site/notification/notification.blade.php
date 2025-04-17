<div class="notification-container">
    <div class="notification-icon">
        <i class="fa fa-bell"></i>
        @if(auth()->user()->unreadNotifications->count())
            <div class="notification-indicator">
                <div class="notification-count" role="status">
                    {{ auth()->user()->unreadNotifications->count() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Dropdown Menu -->
    <div class="notification-dropdown">
        <header>
            <div class="nav nav-underline" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="all-tabs" data-bs-toggle="tab" href="#all"
                   role="tab">All ({{ auth()->user()->notifications->count() }})</a>

                <a class="nav-item nav-link" id="message-tab" data-bs-toggle="tab" href="#message"
                   role="tab">New ({{ auth()->user()->unreadNotifications->count() }})</a>
            </div>
        </header>

        <div class="tab-content" id="myTabContent">
            <!-- All Notifications -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                @foreach(auth()->user()->notifications as $notification)
                    <a href="#" wire:click.prevent="markAsRead('{{ $notification->id }}')"
                       class="notification-link">
                        <div class="media media-sm p-3 border-bottom">
                            <div class="media-sm-wrapper">
                                <img src="{{ asset('assets/img/agent/11.png') }}" alt="User Image"
                                     class="notification-img">
                            </div>
                            <div class="media-body">
                                <h5 class="title mb-0">{{ $notification->data['name'] }}</h5>
                                <p class="discribe">{{ $notification->data['message'] }}</p>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::createFromTimestamp($notification->data['time'])->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Unread Notifications -->
            <div class="tab-pane fade" id="message" role="tabpanel">
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <a href="#" wire:click.prevent="markAsRead('{{ $notification->id }}')"
                       class="notification-link">
                        <div class="media media-sm p-3 border-bottom">
                            <div class="media-sm-wrapper">
                                <img src="{{ asset('assets/img/agent/11.png') }}" alt="User Image"
                                     class="notification-img">
                            </div>
                            <div class="media-body">
                                <h5 class="title mb-0">{{ $notification->data['name'] }}</h5>
                                <p class="discribe">{{ $notification->data['message'] }}</p>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::createFromTimestamp($notification->data['time'])->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
