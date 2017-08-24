<?php

namespace Potato\Settings;

use Illuminate\Database\Eloquent\Model;

class DatabaseSetting extends Model
{
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string
     */
    public $incrementing = false;

    /**
     * @var string
     */
    public $primaryKey = 'setting_key';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $fillable = [
        'setting_key', 'setting_value'
    ];
}