@extends('admin.layouts.calendar')

@section('content')


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
                <button  type="button" id='edit-appointment-calendar-button' class="btn btn-primary  btn-cons">Update</button>
                <button data-dismiss="modal" type="button" class="btn btn-cons">Close</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->

      <!-- START PAGE CONTENT -->
        <div class="content">
           
            
               
               
                <div id='calendar'></div>
               
            
           
        </div>
        <!-- END PAGE CONTENT -->
         

     
 
    
@endsection