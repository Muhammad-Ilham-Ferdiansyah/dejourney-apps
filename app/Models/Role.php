<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function roleMenus() {
        return $this->hasMany(RoleMenu::class);
    }

    public function menus() {
        return $this->belongsToMany(Menu::class, 'role_menus', 'role_id', 'menu_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
