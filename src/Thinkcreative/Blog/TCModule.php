<?php

namespace Thinkcreative\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class TCModule extends Model
{

    protected $table = 'modules';


    public static function AddModule($name, $showinmenu = false) {
        $module = new Self;
        $module->name = $name;
        $module->show_in_menu = $showinmenu;
        $module->save();
    }
}
