<?php

namespace App\Models;

use App\Core\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    private static $instance_obj;
    public static function getInstance()
    {
        if (!self::$instance_obj) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
