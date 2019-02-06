<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\User;
use App\mMahasiswa;
use App\mPegawai;
use App\Transformers\mMahasiswaTransformer;
use App\Transformers\mPegawaiTransformer;
// use App\Transformers\VehicleTransformer;
// use App\Transformers\ParkingTransformer;
use Illuminate\Support\Facades\DB;
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'mahasiswa', 'pegawai'
    ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'        => $user->id,
            'niu'     => $user->niu,
        ];
    }
    public function includeMahasiswa(User $user)
    {
        $mahasiswa = $user->mahasiswa;
        return $this->item($mahasiswa, new mMahasiswaTransformer);
    }
    public function includePegawai(User $user)
    {
        $pegawai = $user->pegawai;
        return $this->item($pegawai, new mPegawaiTransformer);
    }
    // public function includeVehicle(User $user)
    // {
    //     $vehicle = $user->vehicle;
    //     return $this->item($vehicle, new VehicleTransformer);
    // }
    // public function includeParking(User $user)
    // {
    //     $parking = $user->parking;
    //     return $this->item($parking, new ParkingTransformer);
    // }
}
