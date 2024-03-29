    @extends('admin.layouts.main')

    @section('css')
        <link href="{{ asset('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <!--**********************************
        Content body start
    ***********************************-->
    @if (Auth::user()->type == 'admin')

    @php
        $total_food = DB::table('menus')->where('user_id',Auth::user()->id)->count();

        $total_food_category = DB::table('food_categories')->where('user_id',Auth::user()->id)->count();

        $total_team_member = DB::table('teams')->where('user_id',Auth::user()->id)->count();

        $total_review = DB::table('testimonials')->where('user_id',Auth::user()->id)->count();
    @endphp

    @elseif(Auth::user()->type == 'superadmin')

    @php
        $total_restaurent = DB::table('users')->where('type','admin')->count();

        $basic = DB::table('plans')->where('id',1)->first();

        $premium = DB::table('plans')->where('id',2)->first();

        $total_basic_restaurent = DB::table('subscriptions')->where('stripe_price',$basic->stripe_plan)->count();

        $total_premium_restaurent = DB::table('subscriptions')->where('stripe_price',$premium->stripe_plan)->count();

    @endphp

    @endif
    <div class="content-body">

        <div class="container-fluid mt-3">
          @if (Auth::user()->type == 'admin')
          <div class="row">
              <div class="col-lg-3 col-sm-6">
                  <div class="card gradient-1">
                      <div class="card-body">
                          <h3 class="card-title text-white">Total Food Item</h3>
                          <div class="d-inline-block">
                              <h2 class="text-white">{{ $total_food }}</h2>
                              {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                          </div>
                          <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="card gradient-2">
                      <div class="card-body">
                          <h3 class="card-title text-white">Total Food Category</h3>
                          <div class="d-inline-block">
                              <h2 class="text-white">{{ $total_food_category }}</h2>
                              {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                          </div>
                          <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="card gradient-3">
                      <div class="card-body">
                          <h3 class="card-title text-white">Total Team Member</h3>
                          <div class="d-inline-block">
                              <h2 class="text-white">{{ $total_team_member }}</h2>
                              {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                          </div>
                          <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="card gradient-4">
                      <div class="card-body">
                          <h3 class="card-title text-white">Total Review</h3>
                          <div class="d-inline-block">
                              <h2 class="text-white">{{ $total_review }}</h2>
                              {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                          </div>
                          <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                      </div>
                  </div>
              </div>
          </div>

          @elseif(Auth::user()->type == 'superadmin')
          <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Restaurent</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $total_restaurent }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Basic Restaurent</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $total_basic_restaurent }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total premium Restaurent</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $total_premium_restaurent }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>
          @endif

            @if (Auth::user()->type == 'superadmin')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1">Subscription Sold</h4>
                                        <p>Total Earnings of the Month</p>
                                        @php
                                            $total_basic_subs = DB::table('subscriptions')->whereMonth('created_at',\Carbon\Carbon::now()->format('m'))->where('stripe_price',$basic->stripe_plan)->count();

                                            $total_premium_subs = DB::table('subscriptions')->whereMonth('created_at',\Carbon\Carbon::now()->format('m'))->where('stripe_price',$premium->stripe_plan)->count();
                                        @endphp
                                        <h3 class="m-0">$ {{ ($total_basic_subs * $basic->price) + $total_premium_subs * $premium->price}}</h3>
                                    </div>
                                    {{-- <div>
                                        <ul>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                            <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                                {{-- <div class="chart-wrapper">
                                    <canvas id="chart_widget_2"></canvas>
                                </div> --}}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="w-100 mr-2">
                                            <h6>Basic Subscriber</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-danger" style="width: {{ ((($total_basic_subs+$total_premium_subs)/100)*$total_basic_subs)*100 }}%"></div>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-100">
                                            <h6>Premium Subscriber</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-primary" style="width: {{ ((($total_basic_subs+$total_premium_subs)/100)*$total_premium_subs)*100 }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order Summary</h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-widget">
                            <div class="card-body">
                                <h5 class="text-muted">Order Overview </h5>
                                <h2 class="mt-4">5680</h2>
                                <span>Total Revenue</span>
                                <div class="mt-4">
                                    <h4>30</h4>
                                    <h6>Online Order <span class="pull-right">30%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>50</h4>
                                    <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>20</h4>
                                    <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-0">
                                <h4 class="card-title px-4 mb-3">Todo</h4>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul id="todo_list">
                                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>

            <div class="row">
                @foreach ($team as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('storage/'.$item->image) }}" class="rounded-circle" alt="">
                                <h5 class="mt-3 mb-1">{{ $item->name }}</h5>
                                <p class="m-0">{{ $item->position }}</p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0 table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Customers</th>
                                                <th>Email</th>
                                                <th>Plan</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Card End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                              $customer = DB::table('users')->where('type','admin')->limit(10)->get();
                                          @endphp
                                          @foreach ($customer as $item)
                                          <tr>
                                              <td>{{ $item->name }}</td>
                                              <td>{{ $item->email }}</td>
                                              <td>
                                                @php
                                                    $plan = DB::table('subscriptions')->where('user_id',$item->id)->latest()->first();
                                                    if ($plan != null) {
                                                      # code...
                                                      $plan_name = DB::table('plans')->where('stripe_plan',$plan->stripe_price)->first();
                                                    }else {
                                                      # code...
                                                      $plan_name = null;
                                                    }
                                                @endphp
                                                {{ $plan_name->name ?? 'Unpaid'}}
                                              </td>
                                              <td>
                                                @php
                                                    $name = DB::table('settings')->where('user_id',$item->id)->first();
                                                @endphp
                                                  {{ $name->name }}
                                              </td>
                                              <td>
                                                  Active
                                              </td>
                                              <td>
                                                  {{ $item->pm_last_four }}
                                              </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">

                    <div class="card">
                        <div class="chart-wrapper mb-4">
                            <div class="px-4 pt-4 d-flex justify-content-between">
                                <div>
                                    <h4>Sales Activities</h4>
                                    <p>Last 6 Month</p>
                                </div>
                                <div>
                                    <span><i class="fa fa-caret-up text-success"></i></span>
                                    <h4 class="d-inline-block text-success">720</h4>
                                    <p class=" text-danger">+120.5(5.0%)</p>
                                </div>
                            </div>
                            <div>
                                    <canvas id="chart_widget_3"></canvas>
                            </div>
                        </div>
                        <div class="card-body border-top pt-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul>
                                        <li>5% Negative Feedback</li>
                                        <li>95% Positive Feedback</li>
                                    </ul>
                                    <div>
                                        <h5>Customer Feedback</h5>
                                        <h3>385749</h3>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="chart_widget_3_1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Activity</h4>
                            <div id="activity">
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/1.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>Received New Order</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>iPhone develered</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>3 Order Pending</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>Join new Manager</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>Branch open 5 min Late</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media border-bottom-1 pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>New support ticket received</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img width="35" src="{{ asset('admin/images/avatar/3.jpg') }}" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5>Facebook Post 30 Comments</h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                    </div><span class="text-muted ">April 24, 2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title mb-0">Store Location</h4>
                            <div id="world-map" style="height: 470px;"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-facebook">
                                <span class="s-icon"><i class="fa fa-facebook"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-linkedin">
                                <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-googleplus">
                                <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon"><i class="fa fa-twitter"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> --}}
            @endif

        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    @endsection

    @section('js')
        <script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    @endsection


