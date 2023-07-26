<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerModels;
use App\Models\OrderModels;
use App\Models\OrderDistributorModels;
use App\Models\ProductAdminModels;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function income(Request $request)
    {
        $fromDate = $request['from'];
        $untilDate = $request['until'];

        if($request)
        {
            if($fromDate > Carbon::now()){
                $getIncome = OrderModels::whereBetween('updated_at', [$fromDate." 00:00:00", Carbon::now()])
                ->where('status', 'Success')
                ->groupBy('updated_at')
                ->groupBy('name_customer')
                ->orderBy('name_customer', 'ASC')
                ->get();
            }
            else{
                $getIncome = OrderModels::whereBetween('updated_at', [$fromDate." 00:00:00",$untilDate." 23:59:59"])
                ->where('status', 'Success')
                // ->distinct()
                ->groupBy('updated_at')
                ->groupBy('name_customer')
                ->orderBy('name_customer', 'ASC')
                ->get();

                $getTotal = $getIncome->sum('total');
            }
            return view('views_admin.reports.income', compact('getIncome', 'getTotal'));
        }
        else
        {
            $getIncome = "Choose Date to see transactions";
            return view('views_admin.reports.income', compact('getIncome'));
        }
    }

    public function outcome(Request $request)
    {
        $fromDate = $request['from'];
        $untilDate = $request['until'];

        if($request)
        {
            if($fromDate > Carbon::now()){
                $getOutcome = OrderDistributorModels::whereBetween('updated_at', [$fromDate." 00:00:00", Carbon::now()])
                ->where('order_distributor_product_status', 'Completed')
                ->groupBy('updated_at')
                ->groupBy('order_distributor_product_distributor')
                ->orderBy('updated_at', 'ASC')
                ->get();
            }
            else{
                $getOutcome = OrderDistributorModels::whereBetween('updated_at', [$fromDate." 00:00:00",$untilDate." 23:59:59"])
                ->where('order_distributor_product_status', 'Completed')
                ->groupBy('updated_at')
                ->groupBy('order_distributor_product_distributor')
                ->orderBy('updated_at', 'ASC')
                ->get();

                $getTotal = $getOutcome->sum('order_distributor_product_total');
            }
            return view('views_admin.reports.outcome', compact('getOutcome', 'getTotal'));
        }
        else
        {
            $getOutcome = "Choose Date to see transactions";
            return view('views_admin.reports.outcome', compact('getOutcome'));
        }
    }
}
