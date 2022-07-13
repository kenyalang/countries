<?php

namespace Kenyalang\Countries\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Kenyalang\Countries\Enums\CountryStatus;

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
 * @property string $phone_code
 * @property string $currency_code
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $status
 * @property string $timezone
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property-read Collection|State[] $states
 *
 * @method Builder|static active()
 */
class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency_code',
        'currency_name',
        'currency_symbol',
        'status',
        'timezone',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class, 'country_name', 'name');
    }

    public function activate(): void
    {
        $this->update(['status' => CountryStatus::ACTIVE->value]);
    }

    public function scopeActive($query): void
    {
        $query->where('status', 'active');
    }
}
