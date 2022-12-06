<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;
    public function getPrettyCreatedAttribute(){
      return date('F d, Y',strtotime($this->created_at));
  }
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'website',
       'createdBy',
       'user_id'//asigned to this user
       
    ];
    public function records(){
        return $this->hasMany(Record::class);
    }
  public function user(){
    return $this->belongsTo(User::class);
  }
}
