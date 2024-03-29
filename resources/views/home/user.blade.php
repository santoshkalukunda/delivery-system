<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$confirm}}</h2>
                <div class="m-b-5">Confirm</div><i class="ti-shopping-cart widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$shipping}}</h2>
                <div class="m-b-5">Shipping</div><i class="fa fa-shipping-fast widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$delivered}}</h2>
                <div class="m-b-5">Delivered</div><i class="fa fa-truck-loading widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$notDeliver}}</h2>
                <div class="m-b-5">Not Deliver</div><i class="fa fa-frown widget-stat-icon"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Statistics</div>
            </div>
            <div class="ibox-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <canvas id="doughnut_chart" style="height:160px;"></canvas>
                    </div>
                    <div class="col-md-6">
                        <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop
                            52%</div>
                        <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%
                        </div>
                        <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-divider list-group-full">
                    <li class="list-group-item">Chrome
                        <span class="float-right text-success"><i class="fa fa-caret-up"></i> 24%</span>
                    </li>
                    <li class="list-group-item">Firefox
                        <span class="float-right text-success"><i class="fa fa-caret-up"></i> 12%</span>
                    </li>
                    <li class="list-group-item">Opera
                        <span class="float-right text-danger"><i class="fa fa-caret-down"></i> 4%</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-4">
                    <div>
                        <h3 class="m-0">Statistics</h3>
                        <div>Your shop sales analytics</div>
                    </div>
                    <div class="d-inline-flex">
                        <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                            <div class="text-muted">WEEKLY INCOME</div>
                            <div>
                                <span class="h2 m-0">$850</span>
                                <span class="text-success ml-2"><i class="fa fa-level-up"></i>
                                    +25%</span>
                            </div>
                        </div>
                        <div class="px-3">
                            <div class="text-muted">WEEKLY SALES</div>
                            <div>
                                <span class="h2 m-0">240</span>
                                <span class="text-warning ml-2"><i class="fa fa-level-down"></i>
                                    -12%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <canvas id="bar_chart" style="height:260px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Latest Orders</div>

            </div>
            <div class="ibox-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th width="91px">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="invoice.html">AT2584</a>
                            </td>
                            <td>@Jack</td>
                            <td>$564.00</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT2575</a>
                            </td>
                            <td>@Amalia</td>
                            <td>$220.60</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT1204</a>
                            </td>
                            <td>@Emma</td>
                            <td>$760.00</td>
                            <td>
                                <span class="badge badge-default">Pending</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT7578</a>
                            </td>
                            <td>@James</td>
                            <td>$87.60</td>
                            <td>
                                <span class="badge badge-warning">Expired</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT0158</a>
                            </td>
                            <td>@Ava</td>
                            <td>$430.50</td>
                            <td>
                                <span class="badge badge-default">Pending</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT0127</a>
                            </td>
                            <td>@Noah</td>
                            <td>$64.00</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>