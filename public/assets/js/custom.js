(function($) {

    'use strict';

    $(document).ready(function() {
    	$('#datepicker-component2,#datepicker-component3').datepicker({
		        format: "dd-mm-yyyy",
		        autoclose: true
		});
		

		$('#daterangepicker').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM-DD-YYYY h:mm A'
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });


		$('#add-appointment').validate();

		

		$('#edit-appointment-calendar-button').click(function(){
            $('.loading-edit').css('display','block');
            
            $.post("/api/editAppointment",
            {
                appointment_id: $('#editAppModal :input[name=appointment_id]').val(),
                service_id: $('#editAppModal :input[name=service_id]').val(),
                date: $('#editAppModal :input[name=appointment_date]').val(),
                time: $('#editAppModal :input[name=appointment_time]').val(),
                priority: $('#editAppModal :input[name=priority]').val(),
            },
            function(data, status){
                $('.loading-edit').css('display','none');
                if(data.status == 'fail'){
                    $('#errorMsgEdit').text(data.message);
                    //alert(data.message);
                }
                else {
                    $('#calendar').fullCalendar( 'refetchEvents' );
                    $('#editAppModal').modal('hide');
                }
            });

        });

		

		

		$('#add-customer-button').click(function(){

			$('.loading-add-customer').css('display','block');
			
			$.post("/api/addCustomer",
		    {
		        name: $('#addNewCustomerModel :input[name=name]').val(),
		        email: $('#addNewCustomerModel :input[name=email]').val(),
		        mobile: $('#addNewCustomerModel :input[name=mobile]').val(),
		        age: $('#addNewCustomerModel :input[name=age]').val(),
		        sex: $('#addNewCustomerModel :input[name=sex]').val(),
		        address: $('#addNewCustomerModel :input[name=address]').val(),
		    },
		    function(data, status){
		    	$('.loading-add-customer').css('display','none');
		        if(data.status == 'fail'){
		        	$('#errorMsgAdd').text(data.message);
		        	//alert(data.message);
		        }
		        else {
		        	var option = new Option(data.name, data.id);
					option.selected = true;
		        	$("#selectCustomer").append(option);
					$("#selectCustomer").trigger("change");
		        	$('#addNewCustomerModel').modal('hide');
		        }
		    });

		});
        

    });


})(window.jQuery);