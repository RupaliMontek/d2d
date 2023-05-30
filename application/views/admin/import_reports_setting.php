<div class="container-fluid frIECreports orgnization_update main-content bgc-grey-100">
    <div class="frIECreportsInn">
      <h3>Create Importer/Exporter Master Report Settings</h3>

      <div class="row" id="Export-Import">
           <form id="ie_form" class="form-horizontal" action="<?php echo base_url(
                   "admin/saveimport_export_data"
               ); ?>" method="POST">
<div class="UpperForm">
               <div class="col-lg-4 col-sm-4 form-group">
                        <select id="importer_exporter" name="importer_exporter[]" multiple  required multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" size="10" required onchange="console.log(this.selectedOptions)">
                         <?php foreach ($users_list as $exp) { ?>
                           <option value="<?php echo $exp->lucrative_users_id; ?>"><?php echo $exp->iec_no .
    " - " .
    $exp->fullname; ?></option>
                           <?php } ?>
                        </select>
                     </div>

<div class="col-lg-2 col-sm-2 form-group"> 
                                
 <!--select onchange="myFunction1(this.value)" class="form-control" id="type" name="type" required-->
 <select onchange="select_sheet_type(this.value)"  class="form-control" id="type" name="type" required>
 <option seleted value="">Select Type</option>
 <option value="1">Import</option>
<option value="2">Export</option>
<option value="3">Courier</option>
 </select>
</div>

<div class="col-lg-3 col-sm-3 form-group"> 
<select class="form-control" id="report_email_frequency" name="report_email_frequency" required>
<option value="1">Daily</option>
<option value="2">Weekly-Sunday</option>
<option value="3">Weekly-Monday</option>
<option value="4">Weekly-Tuesday</option>
<option value="5">Weekly-Wednsday</option>
<option value="6">Weekly-Thursday</option>
<option value="7">Weekly-Friday</option>
<option value="8">Weekly-Saturday</option>
<option value="9">Fourthnight-1st and 16th</option>
<option value="10">Fourthnight-15th and 30th</option>
<!--option value="11">Monthly-1st day of month</option-->
<!--option value="12">Monthly-last day of month</option-->
</select>
</div>

<div class="col-lg-2 col-sm-2 form-group">
                        <select class="form-control" id="time" name="time" required>
                           <option value="1">7 A.M.</option>
                           <option value="2">8 A.M.</option>
                           <option value="3">5 P.M.</option>
                           <option value="4">6 P.M.</option>
                        
                        </select>
                     </div>

<div class="col-lg-1 col-sm-1">
                        <div class="text-right btn_1">
                           <a href="<?php echo base_url(
                               "admin/ImportExport_Master"
                           ); ?>" class="btn btn-primary">Back</a>
                        </div>
                     </div>
</div>

<div class="bottomForm">

<div class="row ppmregbtm-p">
                    <div class="col-lg-2 col-sm-2"><input type="radio" class="form-check-input" id="excel" name="optradio" value="excel" checked>
                        <label class="form-check-label" for="radio1">Excel</label></div>
                        <div class="col-lg-2 col-sm-2"><input type="radio" class="form-check-input" id="csv" name="optradio" value="csv" >
                        <label class="form-check-label" for="radio1">Csv</label></div>
                        <div class="col-lg-2 col-sm-2"><input type="radio" class="form-check-input" id="both" name="optradio" value="both" >
                        <label class="form-check-label" for="radio1">Both</label></div>

                  </div>

                  <div class="row padd-row coE-accordion">
                     <div class="col-lg-2 col-sm-2"></div>
                     <div class="col-lg-10 col-sm-10 box-border" id="import" >
                        <input type="checkbox" id="ChkAll_import" name="ChkAll_import[]"  onchange="javascript:CheckedAll_import();">
                        <label for="vehicle1"> Select Import Sheets</label><br>
                        <div class="col" id="all_import">
                           <!--<h2>Open <b>Multiple</b></h2>-->
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllChkboe_summary" name="Chkboe_summary[]"  onchange="javascript:CheckedAllChkboe_summary();">
                                 <label class="tab-label" for="chck1">BOE Summary</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="Chkboe_summary">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM bill_of_entry_summary";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_summary" name="bill_summary[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllChkboe_entry" name="AllChkboe_entry[]"  onchange="javascript:CheckedAllChkboe_entry();">
                                 <label class="tab-label" for="chck1">Bill Of Entry</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="Chkboe_entry">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM bill_of_entry_summary";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                       <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_of_entry" name="bill_of_entry[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllBond_Details" name="Chkboe_Bond_Details[]"  onchange="javascript:CheckedAllBond_Details();">
                                 <label class="tab-label" for="chck1">Bond Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="ChkBond_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM bill_bond_details";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_bond_details" name="bill_bond_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllContainer_Details" name="Container_Details[]"  onchange="javascript:CheckedAllContainer_Details();">
                                 <label class="tab-label" for="chck1">Container Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="ChkContainer_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM bill_container_details";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_container_details" name="bill_container_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                              </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllManifest_Details" name="Container_Details[]"  onchange="javascript:CheckedAllManifest_Details();">
                                 <label class="tab-label" for="chck1">Manifest Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="ChkManifest_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  bill_manifest_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_manifest_details" name="bill_manifest_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllPayment_Details" name="Payment_Details[]"  onchange="javascript:CheckedAllPayment_Details();">
                                 <label class="tab-label" for="chck1">Payment Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="ChkPayment_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  bill_payment_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_payment_details" name="bill_payment_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllLicense_Details" name="License_Details[]"  onchange="javascript:CheckedAllLicense_Details();">
                                 <label class="tab-label" for="chck1">License Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="ChkLicense_Details">
                                     <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  bill_licence_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="bill_licence_details" name="bill_licence_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                                 
                                 
                              </li>
                          
                           </ul>
                        </div>
                    
                     </div>
                     
                     <div class="col-lg-12 col-sm-12 box-border" id="export" >
                        <input type="checkbox" id="ChkAll_export" name="ChkAll_export[]"  onchange="javascript:CheckedAll_Export();">
                        <label for="vehicle1"> Select Export Sheets</label><br>
                        <div class="col" id="all_export">
                           <!--<h2>Open <b>Multiple</b></h2>-->
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllChkSHB_Summary" name="SHB_Summary[]"  onchange="javascript:CheckedAllChkSHB_Summary();">
                                 <label class="tab-label" for="chck1">SHB Summary</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkSHB_Summary">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  bill_licence_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="shb_summary" name="shb_summary[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                          
                           </ul>
                           
                           
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllShipping_Bill_Summary" name="Shipping_Bill_Summary[]"  onchange="javascript:CheckedAllChkSHB_Summary();">
                                 <label class="tab-label" for="chck1">Shipping Bill Summary</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkShipping_Bill_Summary">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  ship_bill_summary ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="shipping_bill_summary" name="shipping_bill_summary[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllEquipment_Details" name="Equipment_Details[]"  onchange="javascript:CheckedAllEquipment_Details();">
                                 <label class="tab-label" for="chck1">Equipment Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkEquipment_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                        "SHOW COLUMNS FROM  equipment_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="equipment_details" name="equipment_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                           
                            <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllChallan_Details" name="Challan_Details[]"  onchange="javascript:CheckedAllChallan_Details();">
                                 <label class="tab-label" for="chck1">Challan Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkChallan_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  challan_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="challan_details" name="challan_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                            <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllJobbing_Details" name="Jobbing_Details[]"  onchange="javascript:CheckedAllJobbing_Details();">
                                 <label class="tab-label" for="chck1">Jobbing Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkJobbing_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  jobbing_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="jobbing_details" name="jobbing_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllDFIA_Licence_Details" name="DFIA_Licence_Details[]"  onchange="javascript:CheckedAllDFIA_Licence_Details();">
                                 <label class="tab-label" for="chck1">DFIA Licence Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkDFIA_Licence_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  aa_dfia_licence_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="dfia_licence_details" name="dfia_licence_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllDrawback_Details" name="Drawback_Details[]"  onchange="javascript:CheckedAllDrawback_Details();">
                                 <label class="tab-label" for="chck1">Drawback Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkDrawback_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  drawback_details ";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="drawback_details" name="drawback_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                            <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllThird_Party_Details" name="Third_Party_Details[]"  onchange="javascript:CheckedAllThird_Party_Details();">
                                 <label class="tab-label" for="chck1">Third Party Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkThird_Party_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM  third_party_details";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="third_party_details" name="third_party_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                           <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllItem_Manufacturer" name="Item_Manufacturer[]"  onchange="javascript:CheckedAllItem_Manufacturer();">
                                 <label class="tab-label" for="chck1">Item Manufacturer</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkItem_Manufacturer">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM item_manufacturer_details";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="item_manufacture" name="item_manufacture[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                                                      <ul class="tabs">
                              <li class="tab li-backg">
                                 <input type="checkbox" class="check-algn" id="AllRodtep_Details" name="Rodtep_Details[]"  onchange="javascript:CheckedAllRodtep_Details();">
                                 <label class="tab-label" for="chck1">Rodtep Details</label>
                                 <div class="tab-content scroll-wrp my-custom-scrollbar">
                                     <div class="col" id="chkRodtep_Details">
                                    <ul class="list">
                                        <?php
                                        $query =
                                            "SHOW COLUMNS FROM rodtep_details";
                                        $statement = $this->db->query($query);
                                        $result = $statement->result_array();
                                        ?>
                                         <?php foreach ($result as $row) { ?>
                                       <li>
                                          <input type="checkbox" id="rodtep_details" name="rodtep_details[]" value="<?php echo $row[
                                              "Field"
                                          ]; ?>">
                                          <label for="vehicle1"><?php echo $row[
                                              "Field"
                                          ]; ?></label><br>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           
                        </div>
                    
                     </div>
                   
                     <div class="col-lg-12 col-sm-12">
                        <div class="btn_1 sav-btn">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </div>
                  </div>
              </div>



        </form>

      </div>
</div>
</div>

<script>
$(document).ready(function(){
    var base_url = "<?php echo base_url(); ?>";


  
  
     function CheckedAllGeneral(){
     if ($('#ChkAllGeneral').is(':checked')) {
          $('#General input[type=checkbox]').attr('checked', 'checked');           
     }
     else {
          $('#General input[type=checkbox]:checked').removeAttr('checked');
     }
   }
       
       
    $.ajax({
    url:base_url+"Admin/get_worksheet_name_by_type",
     method:"POST",
     data:{type:selected},
     success:function(data)
     {//alert(data);
      $('#worksheet').html(data);
      $('#worksheet').multiselect('rebuild');
     }
    })
   }
  }
 });

 var select_ids = [];
   
       $('#worksheet').change(function() { 
        
           
           var selected1 = $("#worksheet :selected").map((_, e) => e.value).get();
          //alert(selected1);
      
       
       if(selected1!= '')
       {
   
           $.ajax({
               url:'<?php echo base_url(); ?>admin/get_worksheet_columns',
               method: 'POST',
               data:{selected1:selected1},
               success:function(data){
                alert(data);
                $("#importer_exporter_branch").append(data);
                $("#importer_exporter_branch").css("display", "block");
               },
               error: function(data){
                 alert(data);
               }
           });
       }
       
       
       });
});
</script>
