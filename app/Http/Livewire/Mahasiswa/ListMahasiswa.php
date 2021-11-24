<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use Livewire\Component;

class ListMahasiswa extends Component
{

    public $idMahasiswa = 0;

    public $angka = 0;

    protected $listeners = [
        'mahasiswaSaved' => '$refresh'
    ];

    public function render()
    {
        $collection = Mahasiswa::all();
        return view('livewire.mahasiswa.list-mahasiswa', compact('collection'));
    }

    public function pilihMahasiswa($id)
    {
        // $this->idMahasiswa = $id;
        $this->emit('pilihIdMahasiswa', $id);
    }

    public function hapusMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        $this->emit('mahasiswaSaved');

    }
}
