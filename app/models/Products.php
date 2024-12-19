<?php

namespace App\Models;

use App\Core\Model;

class Products extends Model
{
    protected $table = 'products';
    private static $instance_obj;
    public static function getInstance()
    {
        if (!self::$instance_obj) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
