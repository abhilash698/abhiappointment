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
                      <h5 class="text-primary ">Before you <span class="semi-bold">proceed</span>, Are you sure you want to delete this Customer?</h5>
                      <br>
                      <input type='hidden' value='' name='customer_id' >
                      <button type="button" class="btn btn-primary btn-block" id='delete-customer' >Continue</button>
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
                <button  type="button" id='add-customer-button-2' class="btn btn-primary  btn-cons">Add</button>
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
        <div class="modal fade stick-up" id="editCustomerModel" role="dialog" aria-labelledby="editCustomerModel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="loading-spiner-holder loading-edit-customer" ><div class="loading-spiner"><img src="/assets/img/custom/loader.gif" /></div></div>
              <form role="form" id='add-appointment' method='post' action='/add'>
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Edit</span> Customer</h4>
              </div>
              <div class="modal-body">
                  <p>Appointments are booked at an interval of thirty minutes. Multiple Appointments can be booked at a particular time.</p>
                  <p style='color:red; ' id='errorMsgEdit'></p>
                  <input name='customer_id' type='hidden'>
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
                <button  type="button" id='edit-customer-button' class="btn btn-primary  btn-cons">Update</button>
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
                <div class='col-xs-5'><a ><button  id="show-addcustomer-modal" class="btn btn-primary" >Add Customer</button></a></div> 
                <div class="col-xs-6">
                  <input type="text" id="customer-search"  class="form-control pull-right" placeholder="Search">    
                </div> 
              </div>
            </div><br>
          </div>
          <div class="container-fluid container-fixed-lg  bg-white">
             
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Customers Listing
                </div>
                 
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-search" id="customersTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Address</th>
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