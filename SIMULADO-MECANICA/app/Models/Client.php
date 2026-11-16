<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Client extends Model
{
    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
    ];

    public function getCpfAttribute(?string $value): ?string
    {
        if ($value === null || $value === '') {
            return $value;
        }

        try {
            return Crypt::decryptString($value);
        } catch (DecryptException) {
            // Exibe registros antigos que foram gravados sem criptografia.
            return $value;
        }
    }

    public function setCpfAttribute(?string $value): void
    {
        $this->attributes['cpf'] = $value === null || $value === ''
            ? $value
            : Crypt::encryptString($value);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'id_cliente', 'id_cliente');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_cliente', 'id_cliente');
    }
}
