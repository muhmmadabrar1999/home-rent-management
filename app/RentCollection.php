<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use App\Flat;

class RentCollection extends Model
{
    use SoftDeletes;

    protected $table = 'collections';
    protected $dates = ['collectionDate'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rents_id',
        'customers_id',
        'collectionNo',
        'amount',
        'collectionType',
        'chequeNo',
        'bankName',
        'branchName',
        'poNo',
        'poName',
        'poCode',
        'note',
        'collectionDate',
        'fromAdvance',
        'users_id',
        'isDeduction',
    ];


    public function rent() {
        return $this->belongsTo('App\Rent','rents_id')->withTrashed();
    }
    public function customer() {
        return $this->belongsTo('App\Customer','customers_id')->withTrashed()->select(['id','name','cellNo']);
    }
    public function entry() {
        return $this->belongsTo('App\User','users_id')->withTrashed()->select('id','name');
    }

    function setCollectionDateAttribute($value)
    {
        $this->attributes['collectionDate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    function setIsDeductionAttribute($value)
    {
        if($value=='on'){
            $this->attributes['isDeduction'] = 1;

        }
        else{
            $this->attributes['isDeduction'] = 0;
        }
    }
}
