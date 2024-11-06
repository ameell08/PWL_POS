<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Sabberworm\CSS\Property\AtRule;

class UserModel extends Authenticable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return[];
    }
    
    use HasFactory;

    protected $table = 'm_user';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  //Mendefinisikan primary key dari tabel yang digunakan
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'username', 
        'password', 
        'nama',  
        'level_id',
        'created_at',
        'updated_at',
        'image'/**Tambahan*/];

    protected $hidden = ['password'];

    protected $casts = ['password' => 'hashed']; //password akan di-hash secara otomatis

    // Relasi ke tabel level
    public function level():BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    // Mendapatkan nama role
    public function getRoleName(): string {
        return $this -> level ->level_nama;
    }

    //Cek apakah user memiliki role tertentu
    public function hasRole($role): bool{
        return $this->level->level_kode == $role;
    }

    // Mendapatkan kode role
    public function getRole(){
        return $this->level->level_kode;
    }

    // image
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image)=> url('/storage/posts/' . $image),
        );
    }
}
