<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        // $data2 = User::where('email', Auth::user()->email)->first();
        // $data2->utype = 'ADM';
        // $data2->save();
        // dd($data2);
        return view('livewire.home-component')->layout('layouts.base');
    }
}
