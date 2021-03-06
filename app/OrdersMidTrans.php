<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersMidTrans extends Model
{
    protected $fillable = ['invoice', 'id_customer', 'name_customer', 'phone_customer', 'address_customer', 'subtotal','session_id'];
    public $timestamps = true;

    //Set Status
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }
    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
}
