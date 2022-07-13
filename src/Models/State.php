<?php

namespace Kenyalang\Countries\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kenyalang\Countries\Traits\HasCountry;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Country firstOrNew(array $attributes = [], array $values = [])
 * @method Country firstOrFail($columns = ['*'])
 * @method Country firstOrCreate(array $attributes, array $values = [])
 * @method Country firstOr($columns = ['*'], \Closure $callback = null)
 * @method Country firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Country updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int $id
 *
 * @property string $name
 * @property string $code
 * @property string latitude',
 * @property string longitude',
 * @property string country_name',
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class State extends Model
{
    use HasCountry;

    protected $fillable = [
        'name',
        'code',
        'latitude',
        'longitude',
        'country_name',
    ];
}
