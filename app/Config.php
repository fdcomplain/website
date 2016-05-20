<?php

namespace App;

class Config extends \Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'configs';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'key';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'array',
    ];

    /**
     * Find the specific config and get it's value.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed|null
     */
    public static function getConfig($key, $default = null)
    {
        $config = self::find($key);

        if (is_null($config)) {
            return $default;
        }

        return $config->getAttribute('value');
    }
}