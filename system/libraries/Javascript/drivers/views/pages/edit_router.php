<div ng-controller="routerUpdateController">
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
                <input type="text" name="host_name" class="form-control input-sm chat-input" placeholder="DNS Name" ng-model="host_name" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.host_name.$invalid">
                <span ng-show="submitted && dns_details.host_name.$error.required">Host Name is required.</span>
                </span>
              </br>

                <label for="client_ip_address">Client IP Address:</label>
                <input type="text" name="client_ip_address" class="form-control input-sm chat-input" placeholder="DNS Name" ng-model="client_ip_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.client_ip_address.$invalid">
                <span ng-show="submitted && dns_details.client_ip_address.$error.required">Client IP Address is required.</span>
                </span>
              </br>

                <label for="mac_address">MAC Address:</label>
                <input type="text" name="mac_address" class="form-control input-sm chat-input" placeholder="DNS Name" ng-model="mac_address" required autocomplete="off" />
                <span class="text-danger" ng-show="submitted && dns_details.mac_address.$invalid">
                <span ng-show="submitted && dns_details.mac_address.$error.required">MAC Address is required.</span>
                </span>
              </br>
         </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    <button type="submit" class="btn btn-default" ng-click="submitted=true">Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>