<?php

namespace App\Livewire;

use App\Service\HttpClientService;
use Illuminate\Support\Collection;
use Livewire\Component;

class Users extends Component
{
    public ?Collection $users = null;

    public ?Collection $states = null;

    public string $selectedState = '';

    public string $search = '';

    public function data($selectedState = null, $search = null){

        $this->users = collect((new HttpClientService())->get(url: 'https://dummyjson.com/users', limit: 100)['users']);
        $this->states = $this->users->pluck('address.state')->unique()->values();;
      
        // Filtrando por estado a partir do estado selecionado
        if ($selectedState) {
            $this->users = $this->users->filter(function ($user) use ($selectedState) {
                return $user['address']['state'] === $selectedState;
            });
        }

        // Filtrando por nome a partir do campo de busca
        if ($search) {
            $this->users = $this->users->filter(function ($user) use ($search) {
                return stripos($user['firstName'], $search) !== false || stripos($user['lastName'], $search) !== false;
            });
        }
    
        $this->users = $this->users->sortBy('firstName')->values();
    
        return $this->users;
    }

    public function render()
    {
        return view('livewire.users', [
            'data' => $this->data($this->selectedState, $this->search),
        ]);
    }
}
