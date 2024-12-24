<?php

namespace App\Livewire\Site;

use App\Models\Selling;
use Livewire\Component;

class ViewSellingComponent extends Component
{
    public function render()
    {
//        if (!empty(auth()->user())) {
//            $user = auth()->user();
//        } else {
//            return redirect('/login');
//        }
//        dd();
        $propertyAdds = Selling::where('status','active')->with('property')->get();

        return view('livewire.site.viewSelling', compact('propertyAdds') )->extends('layouts.site');
    }
}
