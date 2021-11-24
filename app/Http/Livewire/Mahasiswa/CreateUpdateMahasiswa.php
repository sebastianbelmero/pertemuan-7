<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use Livewire\Component;

class CreateUpdateMahasiswa extends Component
{
    public $nama, $nim;
    public $idMahasiswa = 0;

    protected $listeners = [
        'pilihIdMahasiswa'
    ];

    protected $rules = [
        'nama' => 'required',
        'nim' => 'required|min:9|max:9',
    ];

    public function render()
    {
        return view('livewire.mahasiswa.create-update-mahasiswa');
    }

    function tambahMahasiswa()
    {
        $this->validate();
        Mahasiswa::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
        ]);
        $this->reset();

        $this->emit('mahasiswaSaved');
    }
    public function pilihIdMahasiswa($id)
    {
        $this->idMahasiswa = $id;
        $mahasiswa = Mahasiswa::find($id);
        $this->nama = $mahasiswa->nama;
        $this->nim = $mahasiswa->nim;
    }

    function simpanMahasiswa()
    {
        $this->validate();
        $mahasiswa = Mahasiswa::find($this->idMahasiswa);
        $mahasiswa->nama = $this->nama;
        $mahasiswa->nim = $this->nim;
        $mahasiswa->save();
        $this->reset();

        $this->emit('mahasiswaSaved');
    }
}
