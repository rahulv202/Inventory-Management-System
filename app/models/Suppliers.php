<?php

namespace App\Models;

use App\Core\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    private static $instance_obj;
    public static function getInstance()
    {
        if (!self::$instance_obj) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
