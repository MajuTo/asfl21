<?php

namespace App;

use App\Helpers\Alert;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Spatie\Geocoder\Facades\Geocoder;

/**
 * Class Address
 * @package App
 * @mixin Eloquent
 */
class Address extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['address', 'zipCode', 'phone', 'city', 'name', 'description', 'hidePhone', 'fax', 'hideFax', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function save(array $options = [])
    {
        ['lat' => $this->lat, 'lng' => $this->lng] = Geocoder::getCoordinatesForAddress($this->address . ' ' . $this->zipCode . ' ' . $this->city . ' ' . $this->country);
        if ($this->lat == 0 || $this->lng == 0) {
            Alert::add('alert-warning', 'Cette adresse n\'a pas pu être trouvée dans Google Map.');
        }
        return parent::save($options);
    }
}
