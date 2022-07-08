<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Vetor com variaveis que devem ser protegidas
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Usuario responsavel pela abertura do ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Atendente associado ao ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function attendant()
    {
        return $this->belongsTo(User::class, 'attendant_id', 'id');
    }
}