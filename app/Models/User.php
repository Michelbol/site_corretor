<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Papel[] $papeis
 * @property-read int|null $papeis_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function adicionaPapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis()->save(
                Papel::where('nome', '=', '$papel')->firstOrFail()
            );
        }
        return $this->papeis()->save(
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }

    public function removePapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis()->detach(
                Papel::where('nome', '=', '$papel')->firstOrFail()
            );
        }
        return $this->papeis()->detach(
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }

    public function existeAdmin()
    {
        return $this->existePapel('admin');
    }

    public function existePapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis->contains('nome', $papel);
        }
        return $papel->intersect($this->papeis)->count();
    }

    public function teste()
    {
        echo("Entrou");
        exit;
    }
}
