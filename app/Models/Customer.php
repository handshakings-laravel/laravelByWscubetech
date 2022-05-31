<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //Laravel dont support multiple inheritance. As Customer class already inheriting from Model class
    //so we cannot inherit from HasFactory and SoftDeletes classes. However, we can use Composition by 
    //using these classes inside Customer class as below
    use HasFactory;
    use SoftDeletes;

    protected $table = "customers";
    protected $primaryKey = "customer_id";

    //In case you attribute is double word as user_name in migration/database. Then mutator will be setUserNameAttribute
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function getDobAttribute($value)
    {
        return get_formatted_date($value,'d M, 20y');
    }

}
