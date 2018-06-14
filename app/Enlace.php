<?php

namespace App;


class Enlace extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }


    public function scopeFilter($query, $filters)
    {
        if ( isset($filters['month']) ){
            if ( $month = $filters['month'] ) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }

        if ( isset($filters['year']) ){
            if ( $year = $filters['year'] ) {
                $query->whereYear('created_at', $year);
            }
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function addComment($mensaje)
    {
        $this->comentarios()->create([
            'enlace_id' => $this->id,
            'mensaje' => $mensaje
        ]);
    }

}
