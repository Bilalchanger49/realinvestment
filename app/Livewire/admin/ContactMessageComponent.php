<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $email = '';
    public $filterStatus = '';
    public function updateStatus($messageId, $newStatus)
    {
        $message = ContactMessage::find($messageId);
        if ($message) {
            $message->status = $newStatus;
            $message->save();
        }
        session()->flash('success', 'Message status updated!');
    }

    public function render()
    {
        $query = ContactMessage::query();
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        if ($this->email) {
            $query->where('email', 'like', '%' . $this->email . '%');
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        $messages = $query->latest()->paginate(4);

//        $messages = ContactMessage::latest()->get();

        return view('livewire.admin.contactmessage', compact('messages'))->extends('layouts.auth');
    }
}
