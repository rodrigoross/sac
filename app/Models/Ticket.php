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
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    /**
     * Usuario responsavel pela abertura do ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Atendente associado ao ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function attendant()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Anexos adicionado ao criar o ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
