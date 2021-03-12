<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productOrders = new ProductOrder;
        $currentdate = nepalicurrenntdate();


        if (Auth::user()->hasRole(['admin'])) {
            $confirm = $productOrders->where('status', 'confirm')->count();
            $shipping = $productOrders->where('status', 'shipping')->count();
            $delivered = $productOrders->where('status', 'delivered')->count();
            $notDeliver = $productOrders->where('status', 'not-deliver')->count();

            for ($i = 0; $i < 30; $i++) {
                $produdctOrederConfirm[$i] = $productOrders->where('status', 'confirm')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederShipping[$i] = $productOrders->where('status', 'shipping')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederDelivereds = $productOrders->where('status', 'delivered')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->get();
                $produdctOrederNotDelivere[$i] = $productOrders->where('status', 'not-deliver')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederDelivered[$i] = $produdctOrederDelivereds->count();
                $date[$i] = Carbon::createFromFormat('Y-m-d', $currentdate);
                $date[$i]->subDay($i); // Subtracts 1 day
                $date[$i] = date("Y-m-d", strtotime($date[$i]));
                $totalIncome[$i] = 0;
                foreach ($produdctOrederDelivereds as $produdct_Oreder) {
                    $totalIncome[$i] = $totalIncome[$i] + $produdct_Oreder->price;
                }
            }

            // ExampleController.php

            $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 400, 'height' => 100])
                ->labels(array_reverse($date))
                ->datasets([
                    [
                        "label" => "Confirm",
                        'backgroundColor' => "rgba(48, 242, 110, 0.31)",
                        'borderColor' => "rgba(48, 242, 110, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederConfirm[29],
                            $produdctOrederConfirm[28],
                            $produdctOrederConfirm[27],
                            $produdctOrederConfirm[26],
                            $produdctOrederConfirm[25],
                            $produdctOrederConfirm[24],
                            $produdctOrederConfirm[23],
                            $produdctOrederConfirm[22],
                            $produdctOrederConfirm[21],
                            $produdctOrederConfirm[20],
                            $produdctOrederConfirm[19],
                            $produdctOrederConfirm[18],
                            $produdctOrederConfirm[17],
                            $produdctOrederConfirm[16],
                            $produdctOrederConfirm[15],
                            $produdctOrederConfirm[14],
                            $produdctOrederConfirm[13],
                            $produdctOrederConfirm[12],
                            $produdctOrederConfirm[11],
                            $produdctOrederConfirm[10],
                            $produdctOrederConfirm[9],
                            $produdctOrederConfirm[8],
                            $produdctOrederConfirm[7],
                            $produdctOrederConfirm[6],
                            $produdctOrederConfirm[5],
                            $produdctOrederConfirm[4],
                            $produdctOrederConfirm[3],
                            $produdctOrederConfirm[2],
                            $produdctOrederConfirm[1],
                            $produdctOrederConfirm[0],
                        ],
                    ],
                    [
                        "label" => "Shipping",
                        'backgroundColor' => "rgba(86, 218, 245, 0.31)",
                        'borderColor' => "rgba(86, 218, 245, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederShipping[29],
                            $produdctOrederShipping[28],
                            $produdctOrederShipping[27],
                            $produdctOrederShipping[26],
                            $produdctOrederShipping[25],
                            $produdctOrederShipping[24],
                            $produdctOrederShipping[23],
                            $produdctOrederShipping[22],
                            $produdctOrederShipping[21],
                            $produdctOrederShipping[20],
                            $produdctOrederShipping[19],
                            $produdctOrederShipping[18],
                            $produdctOrederShipping[17],
                            $produdctOrederShipping[16],
                            $produdctOrederShipping[15],
                            $produdctOrederShipping[14],
                            $produdctOrederShipping[13],
                            $produdctOrederShipping[12],
                            $produdctOrederShipping[11],
                            $produdctOrederShipping[10],
                            $produdctOrederShipping[9],
                            $produdctOrederShipping[8],
                            $produdctOrederShipping[7],
                            $produdctOrederShipping[6],
                            $produdctOrederShipping[5],
                            $produdctOrederShipping[4],
                            $produdctOrederShipping[3],
                            $produdctOrederShipping[2],
                            $produdctOrederShipping[1],
                            $produdctOrederShipping[0],
                        ],
                    ],
                    [
                        "label" => "delivered",
                        'backgroundColor' => "rgba(235, 166, 47, 0.31)",
                        'borderColor' => "rgba(235, 166, 47, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederDelivered[29],
                            $produdctOrederDelivered[28],
                            $produdctOrederDelivered[27],
                            $produdctOrederDelivered[26],
                            $produdctOrederDelivered[25],
                            $produdctOrederDelivered[24],
                            $produdctOrederDelivered[23],
                            $produdctOrederDelivered[22],
                            $produdctOrederDelivered[21],
                            $produdctOrederDelivered[20],
                            $produdctOrederDelivered[19],
                            $produdctOrederDelivered[18],
                            $produdctOrederDelivered[17],
                            $produdctOrederDelivered[16],
                            $produdctOrederDelivered[15],
                            $produdctOrederDelivered[14],
                            $produdctOrederDelivered[13],
                            $produdctOrederDelivered[12],
                            $produdctOrederDelivered[11],
                            $produdctOrederDelivered[10],
                            $produdctOrederDelivered[9],
                            $produdctOrederDelivered[8],
                            $produdctOrederDelivered[7],
                            $produdctOrederDelivered[6],
                            $produdctOrederDelivered[5],
                            $produdctOrederDelivered[4],
                            $produdctOrederDelivered[3],
                            $produdctOrederDelivered[2],
                            $produdctOrederDelivered[1],
                            $produdctOrederDelivered[0],
                        ],
                    ],
                    [
                        "label" => "Not Deliver",
                        'backgroundColor' => "rgba(240, 96, 67, 0.31)",
                        'borderColor' => "rgba(240, 96, 67, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederNotDelivere[29],
                            $produdctOrederNotDelivere[28],
                            $produdctOrederNotDelivere[27],
                            $produdctOrederNotDelivere[26],
                            $produdctOrederNotDelivere[25],
                            $produdctOrederNotDelivere[24],
                            $produdctOrederNotDelivere[23],
                            $produdctOrederNotDelivere[22],
                            $produdctOrederNotDelivere[21],
                            $produdctOrederNotDelivere[20],
                            $produdctOrederNotDelivere[19],
                            $produdctOrederNotDelivere[18],
                            $produdctOrederNotDelivere[17],
                            $produdctOrederNotDelivere[16],
                            $produdctOrederNotDelivere[15],
                            $produdctOrederNotDelivere[14],
                            $produdctOrederNotDelivere[13],
                            $produdctOrederNotDelivere[12],
                            $produdctOrederNotDelivere[11],
                            $produdctOrederNotDelivere[10],
                            $produdctOrederNotDelivere[9],
                            $produdctOrederNotDelivere[8],
                            $produdctOrederNotDelivere[7],
                            $produdctOrederNotDelivere[6],
                            $produdctOrederNotDelivere[5],
                            $produdctOrederNotDelivere[4],
                            $produdctOrederNotDelivere[3],
                            $produdctOrederNotDelivere[2],
                            $produdctOrederNotDelivere[1],
                            $produdctOrederNotDelivere[0],
                        ],
                    ]
                ])
                ->options([]);

            // ExampleController.php

            $income = app()->chartjs
                ->name('income')
                ->type('line')
                ->size(['width' => 400, 'height' => 100])
                ->labels(array_reverse($date))
                ->datasets([
                    [
                        "label" => "Total Sales",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => array_reverse($totalIncome),
                    ],
                ])
                ->options([]);
            $j=2;
            for ($i = 0; $i < 12; $i++) {
                $monthprodudctOrederDelivereds = $productOrders->where('status', 'delivered')->whereBetween('date', [Carbon::createFromFormat('Y-m-d', $currentdate)->subMonths($j), Carbon::createFromFormat('Y-m-d', $currentdate)->subMonths($i)])->get();
               $j++;
                $month[$i] = Carbon::createFromFormat('Y-m-d', $currentdate);
                $month[$i]->subMonths($i); // Subtracts 1 day
                $month[$i] = date("Y-m", strtotime($month[$i]));
                $monthTotalIncome[$i] = 0;
                foreach ($monthprodudctOrederDelivereds as $produdct_Oreder) {
                    $monthTotalIncome[$i] = $monthTotalIncome[$i] + $produdct_Oreder->price;
                }
            }

            $monthIncome = app()->chartjs
            ->name('monthincome')
            ->type('line')
            ->size(['width' => 400, 'height' => 100])
            ->labels(array_reverse($month))
            ->datasets([
                [
                    "label" => "Total Sales",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => array_reverse($monthTotalIncome),
                ],
            ])
            ->options([]);

            $productOrders = ProductOrder::with('customer', 'city', 'user', 'branch',)->latest()->paginate(20);
            return view('home', compact('confirm', 'shipping', 'delivered', 'notDeliver', 'productOrders', 'chartjs', 'income','monthIncome'));
        } elseif (Auth::user()->hasRole(['user'])) {
            $confirm = $productOrders->where('status', 'confirm')->where('branch_id', Auth::user()->branch->id)->count();
            $shipping = $productOrders->where('status', 'shipping')->where('branch_id', Auth::user()->branch->id)->count();
            $delivered = $productOrders->where('status', 'delivered')->where('branch_id', Auth::user()->branch->id)->count();
            $notDeliver = $productOrders->where('status', 'not-deliver')->where('branch_id', Auth::user()->branch->id)->count();

            for ($i = 0; $i < 30; $i++) {
                $produdctOrederConfirm[$i] = $productOrders->where('status', 'confirm')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederShipping[$i] = $productOrders->where('status', 'shipping')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederDelivereds = $productOrders->where('status', 'delivered')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->get();
                $produdctOrederNotDelivere[$i] = $productOrders->where('status', 'not-deliver')->whereDate('date', Carbon::createFromFormat('Y-m-d', $currentdate)->subDays($i))->count();
                $produdctOrederDelivered[$i] = $produdctOrederDelivereds->count();
                // $billNetTotals = $bill_obj->where('status', 'complete')->whereDate('date', today()->subDays($i))->get();
                $date[$i] = Carbon::createFromFormat('Y-m-d', $currentdate);
                $date[$i]->subDay($i); // Subtracts 1 day
                $date[$i] = date("Y-m-d", strtotime($date[$i]));

                $totalIncome[$i] = 0;
                foreach ($produdctOrederDelivereds as $produdct_Oreder) {
                    $totalIncome[$i] = $totalIncome[$i] + $produdct_Oreder->price;
                }
            }

            // ExampleController.php

            $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 400, 'height' => 100])
                ->labels(array_reverse($date))
                ->datasets([
                    [
                        "label" => "Confirm",
                        'backgroundColor' => "rgba(48, 242, 110, 0.31)",
                        'borderColor' => "rgba(48, 242, 110, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederConfirm[29],
                            $produdctOrederConfirm[28],
                            $produdctOrederConfirm[27],
                            $produdctOrederConfirm[26],
                            $produdctOrederConfirm[25],
                            $produdctOrederConfirm[24],
                            $produdctOrederConfirm[23],
                            $produdctOrederConfirm[22],
                            $produdctOrederConfirm[21],
                            $produdctOrederConfirm[20],
                            $produdctOrederConfirm[19],
                            $produdctOrederConfirm[18],
                            $produdctOrederConfirm[17],
                            $produdctOrederConfirm[16],
                            $produdctOrederConfirm[15],
                            $produdctOrederConfirm[14],
                            $produdctOrederConfirm[13],
                            $produdctOrederConfirm[12],
                            $produdctOrederConfirm[11],
                            $produdctOrederConfirm[10],
                            $produdctOrederConfirm[9],
                            $produdctOrederConfirm[8],
                            $produdctOrederConfirm[7],
                            $produdctOrederConfirm[6],
                            $produdctOrederConfirm[5],
                            $produdctOrederConfirm[4],
                            $produdctOrederConfirm[3],
                            $produdctOrederConfirm[2],
                            $produdctOrederConfirm[1],
                            $produdctOrederConfirm[0],
                        ],
                    ],
                    [
                        "label" => "Shipping",
                        'backgroundColor' => "rgba(86, 218, 245, 0.31)",
                        'borderColor' => "rgba(86, 218, 245, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederShipping[29],
                            $produdctOrederShipping[28],
                            $produdctOrederShipping[27],
                            $produdctOrederShipping[26],
                            $produdctOrederShipping[25],
                            $produdctOrederShipping[24],
                            $produdctOrederShipping[23],
                            $produdctOrederShipping[22],
                            $produdctOrederShipping[21],
                            $produdctOrederShipping[20],
                            $produdctOrederShipping[19],
                            $produdctOrederShipping[18],
                            $produdctOrederShipping[17],
                            $produdctOrederShipping[16],
                            $produdctOrederShipping[15],
                            $produdctOrederShipping[14],
                            $produdctOrederShipping[13],
                            $produdctOrederShipping[12],
                            $produdctOrederShipping[11],
                            $produdctOrederShipping[10],
                            $produdctOrederShipping[9],
                            $produdctOrederShipping[8],
                            $produdctOrederShipping[7],
                            $produdctOrederShipping[6],
                            $produdctOrederShipping[5],
                            $produdctOrederShipping[4],
                            $produdctOrederShipping[3],
                            $produdctOrederShipping[2],
                            $produdctOrederShipping[1],
                            $produdctOrederShipping[0],
                        ],
                    ],
                    [
                        "label" => "delivered",
                        'backgroundColor' => "rgba(235, 166, 47, 0.31)",
                        'borderColor' => "rgba(235, 166, 47, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederDelivered[29],
                            $produdctOrederDelivered[28],
                            $produdctOrederDelivered[27],
                            $produdctOrederDelivered[26],
                            $produdctOrederDelivered[25],
                            $produdctOrederDelivered[24],
                            $produdctOrederDelivered[23],
                            $produdctOrederDelivered[22],
                            $produdctOrederDelivered[21],
                            $produdctOrederDelivered[20],
                            $produdctOrederDelivered[19],
                            $produdctOrederDelivered[18],
                            $produdctOrederDelivered[17],
                            $produdctOrederDelivered[16],
                            $produdctOrederDelivered[15],
                            $produdctOrederDelivered[14],
                            $produdctOrederDelivered[13],
                            $produdctOrederDelivered[12],
                            $produdctOrederDelivered[11],
                            $produdctOrederDelivered[10],
                            $produdctOrederDelivered[9],
                            $produdctOrederDelivered[8],
                            $produdctOrederDelivered[7],
                            $produdctOrederDelivered[6],
                            $produdctOrederDelivered[5],
                            $produdctOrederDelivered[4],
                            $produdctOrederDelivered[3],
                            $produdctOrederDelivered[2],
                            $produdctOrederDelivered[1],
                            $produdctOrederDelivered[0],
                        ],
                    ],
                    [
                        "label" => "Not Deliver",
                        'backgroundColor' => "rgba(240, 96, 67, 0.31)",
                        'borderColor' => "rgba(240, 96, 67, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [
                            $produdctOrederNotDelivere[29],
                            $produdctOrederNotDelivere[28],
                            $produdctOrederNotDelivere[27],
                            $produdctOrederNotDelivere[26],
                            $produdctOrederNotDelivere[25],
                            $produdctOrederNotDelivere[24],
                            $produdctOrederNotDelivere[23],
                            $produdctOrederNotDelivere[22],
                            $produdctOrederNotDelivere[21],
                            $produdctOrederNotDelivere[20],
                            $produdctOrederNotDelivere[19],
                            $produdctOrederNotDelivere[18],
                            $produdctOrederNotDelivere[17],
                            $produdctOrederNotDelivere[16],
                            $produdctOrederNotDelivere[15],
                            $produdctOrederNotDelivere[14],
                            $produdctOrederNotDelivere[13],
                            $produdctOrederNotDelivere[12],
                            $produdctOrederNotDelivere[11],
                            $produdctOrederNotDelivere[10],
                            $produdctOrederNotDelivere[9],
                            $produdctOrederNotDelivere[8],
                            $produdctOrederNotDelivere[7],
                            $produdctOrederNotDelivere[6],
                            $produdctOrederNotDelivere[5],
                            $produdctOrederNotDelivere[4],
                            $produdctOrederNotDelivere[3],
                            $produdctOrederNotDelivere[2],
                            $produdctOrederNotDelivere[1],
                            $produdctOrederNotDelivere[0],
                        ],
                    ]
                ])
                ->options([]);

            $income = app()->chartjs
                ->name('income')
                ->type('line')
                ->size(['width' => 400, 'height' => 100])
                ->labels(array_reverse($date))
                ->datasets([
                    [
                        "label" => "Total Sales",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => array_reverse($totalIncome),
                    ],
                ])
                ->options([]);

                $j=2;
                for ($i = 0; $i < 12; $i++) {
                    $monthprodudctOrederDelivereds = $productOrders->where('status', 'delivered')->where('branch_id', Auth::user()->branch_id)->whereBetween('date', [Carbon::createFromFormat('Y-m-d', $currentdate)->subMonths($j), Carbon::createFromFormat('Y-m-d', $currentdate)->subMonths($i)])->get();
                   $j++;
                    $month[$i] = Carbon::createFromFormat('Y-m-d', $currentdate);
                    $month[$i]->subMonths($i); // Subtracts 1 day
                    $month[$i] = date("Y-m", strtotime($month[$i]));
                    $monthTotalIncome[$i] = 0;
                    foreach ($monthprodudctOrederDelivereds as $produdct_Oreder) {
                        $monthTotalIncome[$i] = $monthTotalIncome[$i] + $produdct_Oreder->price;
                    }
                }
    
                $monthIncome = app()->chartjs
                ->name('monthincome')
                ->type('line')
                ->size(['width' => 400, 'height' => 100])
                ->labels(array_reverse($month))
                ->datasets([
                    [
                        "label" => "Total Sales",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => array_reverse($monthTotalIncome),
                    ],
                ])
                ->options([]);
            $productOrders = $productOrders->with('customer', 'city', 'user', 'branch')->where('branch_id', Auth::user()->branch_id)->latest()->paginate(20);
            return view('home', compact('confirm', 'shipping', 'delivered', 'notDeliver', 'productOrders', 'chartjs', 'income','monthIncome'));
        } else {
            return redirect()->route('delivery-agent.index');
        }
    }
}
