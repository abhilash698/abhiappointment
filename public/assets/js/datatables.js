/* ============================================================
 * DataTables
 * Generate advanced tables with sorting, export options using
 * jQuery DataTables plugin
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

    'use strict';

    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    var customerTablewithFilters = function(){
        var table = $('#customersTable');
        var tableObj = table.DataTable( {
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/api/customers',
                dataSrc: 'data'
            },
            columns: [ 
                { data: 'id'  },
                { data: 'name'  },
                { data: 'email' },
                { data: 'mobile' },
                { data: 'age'  },
                { data: 'sex'  },
                { data: 'address' },
                { data: 'edit' }
                
            ]
             
        } );

        $('#add-customer-button-2').click(function(){

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
                    tableObj.ajax.reload();                 
                    $('#addNewCustomerModel').modal('hide');
                }
            });

        });

        $('#edit-customer-button').click(function(){
            $('.loading-edit-customer').css('display','block');
            
            $.post("/api/editCustomer",
            {
                customer_id: $('#editCustomerModel :input[name=customer_id]').val(),
                name:$('#editCustomerModel :input[name=name]').val(),
                email: $('#editCustomerModel :input[name=email]').val(),
                mobile: $('#editCustomerModel :input[name=mobile]').val(),
                age: $('#editCustomerModel :input[name=age]').val(),
                sex: $('#editCustomerModel :input[name=sex]').val(),
                address: $('#editCustomerModel :input[name=address]').val(),
            },
            function(data, status){
                $('.loading-edit-customer').css('display','none');
                if(data.status == 'fail'){
                    $('#errorMsgEdit').text(data.message);
                    //alert(data.message);
                }
                else {
                    tableObj.ajax.reload();
                    $('#editCustomerModel').modal('hide');
                }
            });

        });

        $('#customer-search').on( 'keyup', function () {
            tableObj.search( this.value ).draw();
        } );

        $('#customersTable tbody').on('click', 'td a.show-editCustomer-modal', function () {
            var data = tableObj.row( $(this).parents('tr')).data();
            //alert( 'You clicked on '+data.id+'\'s row' );
            $.post("/api/customer",
            {
                customer_id: data.id,
            },
            function(data, status){
                
                if(data.status == 'fail'){
                    alert('data error');
                }
                else {
                    $('#editCustomerModel :input[name=customer_id]').val(data.id);
                    $('#editCustomerModel :input[name=name]').val(data.name);
                    $('#editCustomerModel :input[name=email]').val(data.email);
                    $('#editCustomerModel :input[name=mobile]').val(data.mobile);
                    $('#editCustomerModel :input[name=age]').val(data.age);
                    $('#editCustomerModel :input[name=sex]').select2('data', {id: data.sex ,text: data.sex});
                    $('#editCustomerModel :input[name=address]').val(data.address);
                }
            });
            $('#editCustomerModel').modal('show');
        } );

        $('#customersTable tbody').on('click', 'td a.show-delCustomer-modal', function () {
            var data = tableObj.row( $(this).parents('tr')).data();
            
            $('#modalSlideLeft :input[name=customer_id]').val(data.id);
            $('#modalSlideLeft').modal('show');
        } );

        $('#delete-customer').click(function(){
            var id = $(this).siblings('input[name=customer_id]').val();
            $('#modalSlideLeft').modal('hide');
            $.post("/api/deleteCustomer",
            {
                customer_id: id
            },
            function(data, status){
                if(data == 'fail'){
                    alert('There is error communicating with server. Please contact administrator.');
                }
                else {
                    tableObj.ajax.reload();
                }
                 
            });
        });

    }


    var appointmentTablewithFilters = function(){
        var table = $('#appoitmentTable');
        var tableObj = table.DataTable( {
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/api/appointments',
                dataSrc: 'data'
            },
            columns: [ 
                { data: 'id' , name: 'appointments.id' },
                { data: 'appointment_at' , name: 'appointments.appointment_at' },
                { data: 'staff_name',name: 'appointments.user_id' },
                { data: 'customer_name', name: 'appointments.customer_id' },
                { data: 'service_name' , name: 'appointments.service_id' },
                { data: 'priority' , name: 'appointments.priority' },
                { data: 'edit' }
                
            ]
        } );


        $('#add-appointment-button').click(function(){
            $('.loading-add').css('display','block');
            
            $.post("/api/addAppointment",
            {
                customer_id: $('#addNewAppModal :input[name=customer_id]').val(),
                service_id: $('#addNewAppModal :input[name=service_id]').val(),
                date: $('#addNewAppModal :input[name=appointment_date]').val(),
                time: $('#addNewAppModal :input[name=appointment_time]').val(),
                priority: $('#addNewAppModal :input[name=priority]').val(),
            },
            function(data, status){
                $('.loading-add').css('display','none');
                if(data.status == 'fail'){
                    $('#errorMsgAdd').text(data.message);
                    //alert(data.message);
                }
                else {
                    tableObj.ajax.reload();
                    $('#addNewAppModal').modal('hide');
                }
            });

        });

        $('#delete').click(function(){
            var id = $(this).siblings('input[name=appointment_id]').val();
            $('#modalSlideLeft').modal('hide');
            $.post("/api/deleteAppointment",
            {
                appointment_id: id
            },
            function(data, status){
                if(data == 'fail'){
                    alert('There is error communicating with server. Please contact administrator.');
                }
                else {
                    tableObj.ajax.reload();
                }
                 
            });
        });

        $('#edit-appointment-button').click(function(){
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
                    tableObj.ajax.reload();
                    $('#editAppModal').modal('hide');
                }
            });

        });

        /*$('#appoitmentTable').on( 'click', 'tbody td', function () {
            tableObj.cell( this ).edit( 'bubble' );
        } );*/

        $('#appoitmentTable tbody').on('click', 'td a.show-editApp-modal', function () {
            var data = tableObj.row( $(this).parents('tr')).data();
            //alert( 'You clicked on '+data.id+'\'s row' );
            $.post("/api/appointment",
            {
                appointment_id: data.id,
            },
            function(data, status){
                
                if(data.status == 'fail'){
                    alert('data error');
                }
                else {
                    $('#editAppModal :input[name=appointment_id]').val(data.id);
                    $('#editAppModal :input[name=customer_id]').select2('data', {id: data.customer_id ,text: data.customer_name});
                    $('#editAppModal :input[name=service_id]').select2('data', {id: data.service_id ,text: data.service_name});
                    $('#editAppModal :input[name=appointment_date]').val(data.appointment_date);
                    $('#editAppModal :input[name=appointment_time]').select2('data', {id: data.appointment_time ,text: data.appointment_time});
                    $('#editAppModal :input[name=priority]').select2('data', {id: data.priority ,text: data.priority});
                }
            });
            $('#editAppModal').modal('show');
        } );


        $('#appoitmentTable tbody').on('click', 'td a.show-delApp-modal', function () {
            var data = tableObj.row( $(this).parents('tr')).data();
            
            $('#modalSlideLeft :input[name=appointment_id]').val(data.id);
            $('#modalSlideLeft').modal('show');
        } );

        $('#serachById').on( 'keyup', function () {
            tableObj
                .columns( 0 )
                .search( this.value )
                .draw();
        } );

        $( "#searchByCustomer" ).change(function() {
            tableObj
                .columns( 3 )
                .search( this.value )
                .draw();
        });

        $( "#searchByStaff" ).change(function() {
            tableObj
                .columns( 2 )
                .search( this.value )
                .draw();
        });

        $( "#searchByService" ).change(function() {
            tableObj
                .columns( 4 )
                .search( this.value )
                .draw();
        });

        $('#datepicker-component4').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
        }).on('hide', function (e) {
            tableObj
                .columns( 1 )
                .search( this.value )
                .draw();
        });
    }



    // Initialize datatable showing a search box at the top right corner
    var initTableWithSearch = function() {
        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });
    }

    // Initialize datatable with ability to add rows dynamically
    var initTableWithDynamicRows = function() {
        var table = $('#tableWithDynamicRows');


        var settings = {
            "sDom": "<'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5
        };


        table.dataTable(settings);

        $('#show-modal').click(function() {
            $('#addNewAppModal').modal('show');
        });

        $('#show-addcustomer-modal').click(function() {
            $('#addNewCustomerModel').modal('show');
        });



        $('#add-app').click(function() {
            table.dataTable().fnAddData([
                $("#appName").val(),
                $("#appDescription").val(),
                $("#appPrice").val(),
                $("#appNotes").val()
            ]);
            $('#addNewAppModal').modal('hide');

        });
    }

    // Initialize datatable showing export options
    var initTableWithExportOptions = function() {
        var table = $('#tableWithExportOptions');


        var settings = {
            "sDom": "<'exportOptions'T><'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5,
            "oTableTools": {
                "sSwfPath": "assets/plugins/jquery-datatable/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "csv",
                    "sButtonText": "<i class='pg-grid'></i>",
                }, {
                    "sExtends": "xls",
                    "sButtonText": "<i class='fa fa-file-excel-o'></i>",
                }, {
                    "sExtends": "pdf",
                    "sButtonText": "<i class='fa fa-file-pdf-o'></i>",
                }, {
                    "sExtends": "copy",
                    "sButtonText": "<i class='fa fa-copy'></i>",
                }]
            },
            fnDrawCallback: function(oSettings) {
                $('.export-options-container').append($('.exportOptions'));

                $('#ToolTables_tableWithExportOptions_0').tooltip({
                    title: 'Export as CSV',
                    container: 'body'
                });

                $('#ToolTables_tableWithExportOptions_1').tooltip({
                    title: 'Export as Excel',
                    container: 'body'
                });

                $('#ToolTables_tableWithExportOptions_2').tooltip({
                    title: 'Export as PDF',
                    container: 'body'
                });

                $('#ToolTables_tableWithExportOptions_3').tooltip({
                    title: 'Copy data',
                    container: 'body'
                });
            }
        };


        table.dataTable(settings);

    }

    initTableWithSearch();
    initTableWithDynamicRows();
    initTableWithExportOptions();
    appointmentTablewithFilters();
    customerTablewithFilters();

})(window.jQuery);