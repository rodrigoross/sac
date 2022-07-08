<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ticket da resposta
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Anexos adicionado durante resposta
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
