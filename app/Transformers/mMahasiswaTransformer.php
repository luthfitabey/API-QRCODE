<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\mMahasiswa;
class mMahasiswaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(mMahasiswa $mahasiswa)
    {
        return [
            'niu'        =>  $mahasiswa->niu,
            'nif'        =>  $mahasiswa->nif,
            'angkatan'   =>  $mahasiswa->angkatan,
            'nama'       =>  $mahasiswa->nama,
            'prodi'      =>  $mahasiswa->prodi,
            'nik'        =>  $mahasiswa->nik,
            'alamat'     =>  $mahasiswa->alamat,
            'no_rek'     =>  $mahasiswa->no_rek,
            'nama_rek'   =>  $mahasiswa->nama_rek,
            'npwp'       =>  $mahasiswa->npwp,
            'no_telp'    =>  $mahasiswa->no_telp,
            'user_id'    =>  $mahasiswa->user_id,
            'registered' =>  $mahasiswa->created_at->diffForHumans(),
        ];
    }
}
