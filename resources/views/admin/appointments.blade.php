@extends('admin.layouts.main')

@section('content')
        <!-- MODAL STICK UP SMALL ALERT -->
        <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <div class="container-xs-height full-height">
                  <div class="row-xs-height">
                    <div class="modal-body col-xs-height col-middle text-center   ">
                      <h5 class="text-primary ">Before you <span class="semi-bold">proceed</span>, Are you sure you want to delete this appointment?</h5>
                      <br>
                      <input type='hidden' value='' name='appointment_id' >
                      <button type="button" class="btn btn-primary btn-block" id='delete' >Continue</button>
                      <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP SMALL ALERT -->
        <!-- MODAL STICK UP  -->
        <div class="modal fade stick-up" id="addNewAppModal"  role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="loading-spiner-holder loading-add" ><div class="loading-spiner"><img src="/assets/img/custom/loader.gif" /></div></div>
              <form role="form" id='add-appointment' method='post' action='/add'>
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">New</span> Appointment</h4>
              </div>
              <div class="modal-body">
                <p>Appointments are booked at an interval of thirty minutes. Multiple Appointments can be booked at a particular time.</p>
                  <p style='color:red; ' id='errorMsgAdd'></p>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Service</label>
                        <select class="full-width" name='service_id' data-placeholder="Select Service" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($services as $service)
                          <option value="{{$service->id}}">{{$service->name}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default form-group-default-select2 required" >
                        <label class="">Customer <a  id="show-addcustomer-modal">Add Customer</a></label>
                        <select class="full-width" name='customer_id' id='selectCustomer' data-placeholder="Select Customer" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($customers as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Priority</label>
                        <select class="full-width" name='priority' data-placeholder="Select Priority" data-init-plugin="select2" autocomplete="off" required>
                          <option value="medium">Medium</option>
                          <option value="high">High</option>
                          <option value="low">Low</option>
                        </select>
                      </div><!-- end form group -->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group form-group-default input-group col-sm-10">
                        <label>Appointment Date</label>
                        <input type="text" name='appointment_date' class="form-control" placeholder="Pick a date" id="datepicker-component2" autocomplete="off" >
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Time</label>
                        <select class="full-width" name='appointment_time' data-placeholder="Select Time" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($timeVal as $time)
                          <option value="{{$time}}">{{$time}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                   
              </div>
              <div class="modal-footer">
                <button  type="button" id='add-appointment-button' class="btn btn-primary  btn-cons">Add</button>
                <button data-dismiss="modal" type="button" class="btn btn-cons">Close</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->

        <!-- MODAL STICK UP  -->
        <div class="modal fade stick-up" id="editAppModal"  role="dialog" aria-labelledby="editAppModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="loading-spiner-holder loading-edit" ><div class="loading-spiner"><img src="/assets/img/custom/loader.gif" /></div></div>
              <form role="form" id='add-appointment' method='post' action='/add'>
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Edit</span> Appointment</h4>
              </div>
              <div class="modal-body">
                <p>Appointments are booked at an interval of thirty minutes. Multiple Appointments can be booked at a particular time.</p>
                  <p style='color:red; ' id='errorMsgEdit'></p>
                  <input type='hidden' name='appointment_id' />
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Service</label>
                        <select class="full-width" name='service_id' data-placeholder="Select Service" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($services as $service)
                          <option value="{{$service->id}}">{{$service->name}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default form-group-default-select2 required" >
                        <label class="">Customer</label>
                        <select class="full-width" disabled name='customer_id' id='selectCustomer' data-placeholder="Select Customer" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($customers as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Priority</label>
                        <select class="full-width" name='priority' data-placeholder="Select Priority" data-init-plugin="select2" autocomplete="off" required>
                          <option value="medium">Medium</option>
                          <option value="high">High</option>
                          <option value="low">Low</option>
                        </select>
                      </div><!-- end form group -->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group form-group-default input-group col-sm-10">
                        <label>Appointment Date</label>
                        <input type="text" name='appointment_date' class="form-control" placeholder="Pick a date" id="datepicker-component3" autocomplete="off" >
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Time</label>
                        <select class="full-width" name='appointment_time' data-placeholder="Select Time" data-init-plugin="select2" autocomplete="off" required>
                          <option value=""></option>
                          @foreach($timeVal as $time)
                          <option value="{{$time}}">{{$time}}</option>
                          @endforeach
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                   
              </div>
              <div class="modal-footer">
                <button  type="button" id='edit-appointment-button' class="btn btn-primary  btn-cons">Update</button>
                <button data-dismiss="modal" type="button" class="btn btn-cons">Close</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->

        <!-- MODAL STICK UP  -->
        <div class="modal fade stick-up" id="addNewCustomerModel" role="dialog" aria-labelledby="addNewCustomerModel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="loading-spiner-holder loading-add-customer" ><div class="loading-spiner"><img src="/assets/img/custom/loader.gif" /></div></div>
              <form role="form" id='add-appointment' method='post' action='/add'>
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">New</span> Customer</h4>
              </div>
              <div class="modal-body">
                  <p>Appointments are booked at an interval of thirty minutes. Multiple Appointments can be booked at a particular time.</p>
                  <p style='color:red; ' id='errorMsgAdd'></p>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group form-group-default required">
                        <label>Name</label>
                        <input type="text" name='name' class="form-control" required>
                      </div><!-- end form group -->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group form-group-default">
                        <label>Email</label>
                        <input type="text" name='email' class="form-control">
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group form-group-default required">
                        <label>Mobile</label>
                        <input type="text" name='mobile' class="form-control" required>
                      </div><!-- end form group -->
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group form-group-default">
                        <label>Age</label>
                        <input type="text" name='age' class="form-control">
                      </div><!-- end form group -->
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group form-group-default form-group-default-select2">
                        <label class="">Sex</label>
                        <select class="full-width" name='sex' data-placeholder="Select Priority" data-init-plugin="select2" autocomplete="off">
                          <option value="m">Male</option>
                          <option value="f">Female</option>
                        </select>
                      </div><!-- end form group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>Address</label>
                        <input type="text" name='address' class="form-control">
                      </div><!-- end form group -->
                    </div>
                  </div> 
              </div>
              <div class="modal-footer">
                <button  type="button" id='add-customer-button' class="btn btn-primary  btn-cons">Add</button>
                <button data-dismiss="modal" type="button" class="btn btn-cons">Close</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->



        <div class="content">
          <!-- START PAGE COVER -->
          <div class="container-fluid container-fixed-lg ">
            <br>
            <div class='row'> 
              <div class="pull-right">
                <div class='col-xs-5'><a ><button  id="show-modal" class="btn btn-primary" >Add Appointment</button></a></div>  
              </div>
            </div><br>
            <div class='row'> <!-- filter groups -->
              <div class='col-md-2'> <!-- start filter item -->
                <div class="form-group form-group-default">
                  <label>Customer Id</label>
                  <input type="text" id='serachById' class="form-control" autocomplete="off">
                </div><!-- end form group -->
              </div><!-- end filter item -->
              
              <div class='col-md-3'> <!-- start filter item -->
                <div class="form-group form-group-default input-group col-sm-10">
                  <label>Appointment Date</label>
                  <input type="text" name='appointment_date' class="form-control" placeholder="Pick a date" id="datepicker-component4" autocomplete="off" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div>
                <!-- end form group -->
              </div><!-- end filter item -->

              <div class='col-md-3'> <!-- start filter item -->
                <div class="form-group form-group-default form-group-default-select2 required">
                  <label class="">Customer</label>
                  <select class="full-width" data-placeholder="Select Country" id='searchByCustomer' data-init-plugin="select2" autocomplete="off">
                    <option value="">all</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                  </select>
                </div><!-- end form group -->
              </div><!-- end filter item -->

              <div class='col-md-2'> <!-- start filter item -->
                <div class="form-group form-group-default form-group-default-select2 required">
                  <label class="">Staff Member</label>
                  <select class="full-width" id='searchByStaff' data-placeholder="Select Country" data-init-plugin="select2" autocomplete="off">
                    <option value="">all</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div><!-- end form group -->
              </div><!-- end filter item -->
        
              <div class='col-md-2'> <!-- start filter item -->
                <div class="form-group form-group-default form-group-default-select2 required">
                  <label class="">Service</label>
                  <select class="full-width" id='searchByService' data-placeholder="Select Country" data-init-plugin="select2" autocomplete="off">
                    <option value="">all</option>
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                  </select>
                </div><!-- end form group -->
              </div><!-- end filter item -->
            </div> <!-- end filter groups -->
          </div>
          <div class="container-fluid container-fixed-lg  bg-white">
             
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Appointments Listing
                </div>
                 
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-search" id="appoitmentTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Appointment Date</th>
                      <th>Staff Member</th>
                      <th>Customer Name</th>
                      <th>Service</th>
                      <th>Priority</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                   
                </table>
              </div>
            </div>
            <!-- END PANEL -->
          </div>
        </div>
@endsection