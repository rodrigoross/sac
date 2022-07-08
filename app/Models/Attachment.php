<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Atendente associado ao ticket
     *
     * @return Illuminate\Support\Database\Eloquent\Collection
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
