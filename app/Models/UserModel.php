<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticable;

class UserModel extends Authenticable
{
    use HasFactory;

    protected $table = 'm_user';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  //Mendefinisikan primary key dari tabel yang digunakan
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['username', 'password', 'nama',  'level_id', 'created_at', 'updated_at'];

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

}
