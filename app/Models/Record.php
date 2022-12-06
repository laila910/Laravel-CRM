<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Record extends Model
{
    use HasFactory;
    public function getPrettyCreatedAttribute(){
        return date('F d, Y @ h:i:s',strtotime($this->created_at));
    }
    protected $fillable = [
        'customer_id',
        'status',
        'notes'//record belong to this status
    ];
    public function record()
    {
        return $this->belongsTo(Customer::class);
    }
}
