<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		$(document).ready(function() {
    		$('#routers').DataTable()
		} );
        
	</script>
    <style type="text/css">
        table.dataTable.tablesorter thead th, 
table.dataTable.tablesorter tfoot th {
    background-color: #d6e9f8;
    text-align: left;
    border: 1px solid #ccc;
    font-size: 11px;
    padding: 4px;
    color: #333;
}
div.dataTables_paginate {
    float: right;
    margin: 0;
}

    </style>
</head>
<body >
    <div ng-controller="routerDetailsController">
<div style="margin-left: 125px">
  <h2 class="text-center">DNS Details</h2>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" ng-click="add()">Add Router Details</button>
</div><br>
<!-- add new router form -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <form ng-submit="dns_details.$valid && dnsDetails()" name="dns_details" id="dns_details" novalidate="novalidate">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DNS Details</h4>
         
        </div>
        <div class="modal-body">
                <label for="dns_name">DNS Name:</label>
                <input type="text" name="dns_name" class="form-control input-sm chat-input" placeholder="DNS Name" ng-model="dns_name" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.dns_name.$invalid">
                <span ng-show="submitted && dns_details.dns_name.$error.required">DNS Name is required.</span>
                </span>
              </br>

                <label for="host_name">Host Name:</label>
                <input type="text" name="host_name" class="form-control input-sm chat-input" placeholder="Host Name" ng-model="host_name" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.host_name.$invalid">
                <span ng-show="submitted && dns_details.host_name.$error.required">Host Name is required.</span>
                </span>
              </br>

                <label for="client_ip_address">Client IP Address:</label>
                <input type="text" name="client_ip_address" class="form-control input-sm chat-input" placeholder="Client IP Address" ng-model="client_ip_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.client_ip_address.$invalid">
                <span ng-show="submitted && dns_details.client_ip_address.$error.required">Client IP Address is required.</span>
                </span>
              </br>

                <label for="mac_address">MAC Address:</label>
                <input type="text" name="mac_address" class="form-control input-sm chat-input" placeholder="MAC Address" ng-model="mac_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.mac_address.$invalid">
                <span ng-show="submitted && dns_details.mac_address.$error.required">MAC Address is required.</span>
                </span>
              </br>
         </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    <button type="submit" class="btn btn-default" ng-click="submitted=true" >Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- edit router form -->
    <div class="modal fade" id="myeditModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <form ng-submit="dns_details.$valid && editSaveDetails()" name="dns_details"  novalidate="novalidate">
            <input type="hidden" name="id"  ng-model="dns.id"  />

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DNS Details</h4>
          
        </div>
        <div class="modal-body">
                <label for="dns_name">DNS Name:</label>
                <input type="text" name="dns_name" class="form-control input-sm chat-input" placeholder="DNS Name" ng-model="dns.dns_name" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.dns_name.$invalid">
                <span ng-show="submitted && dns_details.dns_name.$error.required">DNS Name is required.</span>
                </span>
              </br>

                <label for="host_name">Host Name:</label>
                <input type="text" name="host_name" class="form-control input-sm chat-input" placeholder="Host Name" ng-model="dns.host_name" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.host_name.$invalid">
                <span ng-show="submitted && dns_details.host_name.$error.required">Host Name is required.</span>
                </span>
              </br>

                <label for="client_ip_address">Client IP Address:</label>
                <input type="text" name="client_ip_address" class="form-control input-sm chat-input" placeholder="Client IP Address" ng-model="dns.client_ip_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.client_ip_address.$invalid">
                <span ng-show="submitted && dns_details.client_ip_address.$error.required">Client IP Address is required.</span>
                </span>
              </br>

                <label for="mac_address">MAC Address:</label>
                <input type="text" name="mac_address" class="form-control input-sm chat-input" placeholder="MAC Address" ng-model="dns.mac_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.mac_address.$invalid">
                <span ng-show="submitted && dns_details.mac_address.$error.required">MAC Address is required.</span>
                </span>
              </br>
         </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" ng-click="submitted=true" >Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<!-- </div> -->

   	<div style="padding: 0px 130px 0px 130px;">
	<table id="routers" class="display table table-striped table-bordered" datatable="ng" dt-options="vm.dtOptions" dt-instance="vm.dtInstance" dt-column-defs="vm.dtColumnDefs">
        <thead>
            <tr>
                <!-- <th>sno</th> -->
                <th>Id</th>
                <th>DNS Name</th>
                <th>Host Name</th>
                <th>Client IP Address</th>
                <th>MAC Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
            <tr ng-repeat="dns_detail in routerDetails">
                <!-- <td>{{$index +1}}</td> -->
                <td>0000{{dns_detail.id}}</td>
                <td>{{dns_detail.dns_name}}</td>
                <td>{{dns_detail.host_name}}</td>
                <td>{{dns_detail.client_ip_address}}</td>
                <td>{{dns_detail.mac_address}}</td>
                <td>
                    <a href="" class="btn btn-info" ng-click="openModal(dns_detail)">Edit</a> | 
                    <a href="" class="btn btn-danger" ng-click="deleteRoute(dns_detail.id)">Delete</a>
                </td>
            </tr>
            
           

        </tbody>
    </table>

</div>
</div>

</body>
</html>