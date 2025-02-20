<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'palaceName', 'numberOfPeople', 'checkinTime', 'checkoutTime', 'hotel'
    // ];
    protected $fillable = [
        'palaceName', 'numberOfPeople', 'checkinTime', 'checkoutTime', 'hotel', 'user_id'
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
