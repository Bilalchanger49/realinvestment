<?php

namespace App\Livewire\Site;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactComponent extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';
    public function submit()
    {

        if (Auth::check()){
            $user = Auth::user();
        }else{
            session()->flash('error', 'Please login to send message');
            return redirect()->route('login');
        }



        $this->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        ContactMessage::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'status' => 'pending'
        ]);

        session()->flash('success', 'Message sent successfully!');
        return redirect()->route('site.contact');
    }
    public function render()
    {
        return view('livewire.site.contact' )->extends('layouts.site');
    }
}
