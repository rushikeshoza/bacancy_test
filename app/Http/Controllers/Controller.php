<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\MonthCalculators;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * <Get method for the accounts>
     * @param  : [void]
     * @return : [arr] [<Array of rows from the database>]
     * @author : Rushikesh Oza <rushikesh.oza27@gmail.com> | 08 May 2020 (Friday)
     */
    public function getAccounts()
    {
        $monthArr = (new MonthCalculators)->getAllMonthNames();
        $all = MonthCalculators::all();
        
        return view('get_accounts', compact('monthArr', 'all'));
    }
    
    /**
     * <Update all the requested data into the database>
     * @param  : [obj] [$request] [<Request Object>]
     * @return : [json] [<Json Response of the function>]
     * @author : Rushikesh Oza <rushikesh.oza27@gmail.com> | 08 May 2020 (Friday)
     */
    public function setAccounts(Request $request)
    {
        $postData = $request->all();
        
        if (!empty($postData['account'])) {
            foreach ($postData['account'] as $row) {
                if ((int) $row['row_id'] > 0) {
                    $monthCal = MonthCalculators::find($row['row_id']);
                } else {
                    $monthCal = new MonthCalculators;
                }
                
                unset($row['row_id']);
                
                foreach ($row as $monthName => $monthValue) {
                    $monthCal->{$monthName} = (int) $monthValue;
                }
                
                $monthCal->save();
            }
        }
        
        $request->session()->flash('status', 'Data updated successfully...!!!');
        
        return redirect()->route('get_accounts');
    }
}
