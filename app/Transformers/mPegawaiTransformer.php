<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\mPegawai;
class mPegawaiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(mPegawai $pegawai)
    {
        return [
            'nip'       =>  $pegawai->niu,
            'nama'      =>  $pegawai->nif,
            'no_telp'   =>  $pegawai->angkatan,
            'role'      =>  $pegawai->nama,
            'pegawai_id'=>  $pegawai->prodi,
            'registered'=>  $pegawai->created_at->diffForHumans(),
        ];
    }
}
