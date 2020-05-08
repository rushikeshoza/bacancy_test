<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthCalculators extends Model
{
    protected $table = 'month_calculators';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
    ];
    
    /**
     * <Get all the month names in return as an array>
     * @param  : [void]
     * @return : [arr] [<Array of Month names>]
     * @author : Rushikesh Oza <rushikesh.oza27@gmail.com> | 08 May 2020 (Friday)
     */
    public function getAllMonthNames()
    {
        return array_diff($this->getFillable(), ['id']);
    }
}
