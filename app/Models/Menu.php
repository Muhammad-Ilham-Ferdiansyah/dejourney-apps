<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function roleMenus() {
        return $this->hasMany(RoleMenu::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_menus', 'menu_id', 'role_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'main_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'main_id');
    }
}
