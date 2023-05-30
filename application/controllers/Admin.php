<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
        $this->load->model('user/User_model');
        $this->load->model('admin/Common_model');
        $this->load->library('PHPReport', NULL, 'excel');
        $this->load->dbforge();
	}

	public function check_login()
	{
		if( ($this->session->userdata('user_id')=='') || ($this->session->userdata('user_name')=='') || ($this->session->userdata('user_email')=='' || $this->session->userdata('user_role')==''))
		{
			redirect('login');
		}
	}
	
	
		public function download_digital_client_requirment_upload_sample(){
	   
        $objPHPExcel    =   new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $data['report_import'] = $this->Common_model->get_entity_data('report_setting_export', array('type'=>1,'IS_DELETED'=>0));
        $objWorkSheet = $objPHPExcel->createSheet();
        $objWorkSheet->setTitle("autofill");
        if(!empty($data['report_import'])){
            foreach($data['report_import'] as $row){
                if(!empty($row["BOE_Summary"])){
                    
                }
                else if(!empty($row["Bill_Of_Entry"])){
                    $objPHPExcel->getActiveSheet()->setTitle("BOE Summary");
                    $column_name=explode(",",$row["Bill_Of_Entry"]);
                   $columnIndex = 'A';
                   // Number of columns to increment
                   $numberOfColumns = 3;

for ($i = 0; $i < $numberOfColumns; $i++) {
    // Get the cell based on the column index
    $cell = $objPHPExcel->getActiveSheet()->getCell($columnIndex . '1');

    // Do something with the cell value
    $cellValue = $cell->getValue();
    print_r($cell); die();
    echo "Cell Value: " . $cellValue . "<br>";

    // Increment the column index
    $columnIndex++;
}

die();
                }
                
                
            }
            
        }
        
        $objPHPExcel->getActiveSheet()->setTitle("Roles");
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'CLIENT NAME');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'POST DATE TIME');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'POST');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'POST DESCRIPTION');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'IS PAID ADD');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'PAID ADD AMOUNT');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'PAID ADD SOUREC');
        $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()
        ->getStyle('A1:G1')
        ->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'E05CC2')
                )
            )
        );
        for($col = 'A'; $col !== 'C'; $col++) {
            $objPHPExcel->getActiveSheet()
            ->getColumnDimension($col)
            ->setAutoSize(true);
        }

			
	$array4['yh1']=",Facebook,Instagram,Twitter,Linkdin";		
			$col_count = 1000;
			$stop_cnt1='4';
            $cnt3=1;
            $feebackstatus12=explode(",",$array4['yh1']);
               for($i = 0; $i <= $col_count; $i++)
       {
           	for($d=0;$d<=4; $d++)
			{
				$objWorkSheet->setCellValue('G'.$d, $feebackstatus12[$d]);

			}
                $s=0;
                $configs = "Facebook,Instagram,Twitter,Linkdin"; 
                $objValidation = $objPHPExcel->getActiveSheet()->getCell('G'.$cnt3)->getDataValidation();
                $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
                $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
                $objValidation->setAllowBlank(false);
                $objValidation->setShowInputMessage(true);
                $objValidation->setShowErrorMessage(true);
                $objValidation->setShowDropDown(true);
                $objValidation->setErrorTitle('Input error');
                $objValidation->setError('Value is not in list.');
                $objValidation->setPromptTitle('Pick from list');
                $objValidation->setPrompt('Please pick a value from the drop-down list.');
                $objValidation->setFormula1('=\'autofill\'!$G$1:$G'.$stop_cnt1.'');
                $cnt3++;  
 }
			

 $array4['yh2']=",Yes,No";
$stop_cnt1='2';
       $cnt22=1;
		$col_count1=1000;
		$feebackstatus12=explode(",",$array4['yh2']);
// 		 print_r($feebackstatus1);exit;
        for ($c=0; $c<=1000;$c++) {
			    	for($d=0;$d<=2; $d++)
			{
				$objWorkSheet->setCellValue('C'.$d, $feebackstatus12[$d]);
				

			}
				 $objValidation = $objPHPExcel->getActiveSheet()->getCell("C".$cnt22)->getDataValidation();
				$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );     
				$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );     
				$objValidation->setAllowBlank(false);
				$objValidation->setShowInputMessage(true);
				$objValidation->setShowErrorMessage(true);
				$objValidation->setShowDropDown(true);
				$objValidation->setErrorTitle('Input error');
				$objValidation->setError('Please choose from dropdown list');
				$objValidation->setPromptTitle('Allowed input');
				$objValidation->setFormula1('=\'autofill\'!$C$1:$C'.$stop_cnt1.'');
				// $objPHPExcel->getActiveSheet()->getCell('C1')->setDataValidation($objValidation);
				// $objValidation->setFormula1('"ItemA"');
			$cnt22++;
			}
			
			
			$col_count = 0;
                 $cnt=2;
                    for($i = 0; $i <= $col_count; $i++)
              {                
              	
			    $dateTimeNow = time();			    
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$cnt, PHPExcel_Shared_Date::PHPToExcel( $dateTimeNow ));
                $objPHPExcel->getActiveSheet()->getStyle('B'.$cnt)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                $cnt++;

               }
			
			
$array5['yh2']=",Yes,No";
$stop_cnt1='2';
       $cnt22=1;
		$col_count1=1000;
		$feebackstatus12=explode(",",$array5['yh2']);
// 		 print_r($feebackstatus1);exit;
        for ($c=0; $c<=1000;$c++) {
			    	for($d=0;$d<=2; $d++)
			{
				$objWorkSheet->setCellValue('E'.$d, $feebackstatus12[$d]);

			}
				 $objValidation = $objPHPExcel->getActiveSheet()->getCell("E".$cnt22)->getDataValidation();
				$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );     
				$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );     
				$objValidation->setAllowBlank(false);
				$objValidation->setShowInputMessage(true);
				$objValidation->setShowErrorMessage(true);
				$objValidation->setShowDropDown(true);
				$objValidation->setErrorTitle('Input error');
				$objValidation->setError('Please choose from dropdown list');
				$objValidation->setPromptTitle('Allowed input');
				$objValidation->setFormula1('=\'autofill\'!$E$1:$E'.$stop_cnt1.'');
				// $objPHPExcel->getActiveSheet()->getCell('C1')->setDataValidation($objValidation);
				// $objValidation->setFormula1('"ItemA"');
			$cnt22++;
			}
			
       $objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
 
 
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="Roles.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  

$objWriter->save('php://output');
$objPHPExcel->removeSheetByIndex(1);
}
	public function download_report_import_export_report()
	{
	     $objPHPExcel    =   new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $data['report_import'] = $this->Common_model->get_entity_data('report_setting_export', array('type'=>1,'IS_DELETED'=>0));
        $objWorkSheet = $objPHPExcel->createSheet();
        $objWorkSheet->setTitle("autofill");
        
        if(!empty($data['report_import'])){
            foreach($data['report_import'] as $row){
               
                if(!empty($row["BOE_Summary"])){
                    
                    
                }
                else if(!empty($row["Bill_Of_Entry"])){
                    
            $bill_of_entry = explode(",",$row["Bill_Of_Entry"]);
            print_r($bill_of_entry); die();
         if(in_array("general_iecno",$bill_of_entry)){$objWorkSheet->setCellValue('A1', 'IEC No.');}
                }
    
	}
        }
	}
    
	public function index()
	{
	    $user_id=$_SESSION["user_id"];
	    if($user_id!=1){
	        $db_name = $_SESSION['database_prefix'].$user_id;
	        $this->db->query("use ".$db_name."");
	    }
	    $iec_id =$_SESSION["iec_no"];
        $data['all_jobs'] = $this->Common_model->get_entity_data('bill_of_entry_summary', array('iec_no'=>$iec_id));
		$this->load->view('common/header');
		$this->load->view('admin/dashboard');
		$this->load->view('common/footer');		
	}
	
	public function saveimport_export_data(){
	    $post=$this->input->post();
	   
	    $bill_summarys=@$post["bill_summary"];
	    $bill_of_entrys=@$post["bill_of_entry"];
	    $Bond_Detailss=@$post["bill_bond_details"];
	    $bill_container_detailss=@$post["bill_container_details"];
	    $Manifest_Detailss=@$post["bill_manifest_details"];
	    $bill_payment_detailss=@$post["bill_payment_details"];
	    $bill_licence_detailss=@$post["bill_licence_details"];
	    $shb_summarys=@$post["shb_summary"];
	    $shipping_bill_summarys=@$post["shipping_bill_summary"];
	    $equipment_detailss=@$post["equipment_details"];
	    $challan_detailss =@$post['challan_details'];
	    $jobbing_detailss =@$post['jobbing_details'];
	    $drawback_detailss =@$post['drawback_details'];
	    $third_party_detailss=@$post['third_party_details'];
	    $item_manufactures=@$post['item_manufacture'];
	    $Rodtep_Detailss=@$post['rodtep_details'];
	    $dfia_licence_detailss =@$post['dfia_licence_details'];
	    $importer_exporters=$post["importer_exporter"];
	    
	    if(!empty($bill_summary)){
	    $bill_summary = implode(', ', $bill_summarys);
	    }
	    if(!empty($bill_of_entrys)){
	    $bill_of_entry = implode(', ', $bill_of_entrys);
	    }
	    if(!empty($Bond_Detailss)){
	    $Bond_Details = implode(', ', $Bond_Detailss);
	    }
	    if(!empty($bill_container_detailss)){
	    $bill_container_details = implode(', ', $bill_container_detailss);
	    }
	    if(!empty($Manifest_Detailss)){
	    $Manifest_Details = implode(', ', $Manifest_Detailss);
	    }
	    if(!empty($bill_payment_detailss)){
	    $bill_payment_details = implode(', ', $bill_payment_detailss);
	    }
	    
	    if(!empty($bill_licence_detailss)){
	    $bill_licence_details = implode(', ', $bill_licence_detailss);
	    }
	    if(!empty($shb_summarys)){
	    $shb_summary = implode(', ', $shb_summarys);
	    }
	    if(!empty($shipping_bill_summarys)){
	    $shipping_bill_summary = implode(', ', $shipping_bill_summarys);
	    }
	    if(!empty($equipment_detailss)){
	    $equipment_details = implode(', ', $equipment_detailss);
	    }
	    
	    if(!empty($challan_detailss)){
	    $challan_details = implode(', ', $challan_detailss);
	    }
	    if(!empty($jobbing_detailss)){
	    $jobbing_details = implode(', ', $jobbing_detailss);
	    }
	    if(!empty($dfia_licence_detailss)){
	    $dfia_licence_details = implode(', ', $dfia_licence_detailss);
	    }
	    
	    if(!empty($drawback_detailss)){
	    $drawback_details = implode(', ', $drawback_detailss);
	    }
	    
	    if(!empty($third_party_detailss)){
	    $third_party_details = implode(', ', $third_party_detailss);
	    }
	    
	    if(!empty($item_manufactures)){
	    $item_manufacture = implode(', ', $item_manufactures);
	    }
	    if(!empty($Rodtep_Detailss)){
	    $Rodtep_Details = implode(', ', $Rodtep_Detailss);
	    }
	    
	    if(!empty($importer_exporters)){
	    $importer_exporter = implode(', ', $importer_exporters);
	    }
	   
	    $check = $this->Common_model->get_entity_data('report_setting_export', array('export_importer_id'=> $importer_exporter,'BOE_Summary'=>@$bill_summary,'Bill_Of_Entry'=>@$bill_of_entry,'Bond_Details'=>@$Bond_Details,'Container_Details'=>@$bill_container_details,'frequency'=>@$post["report_email_frequency"]));
	    print_r($check); die();
	    
	    $data =array(
        "type"                      =>  @$post["type"],
        "export_importer_id"        =>  @$importer_exporter,
        "BOE_Summary"               =>  @$bill_summary,
        "Bill_Of_Entry"             =>  @$bill_of_entry,
        "Bond_Details"              =>  @$Bond_Details,
        "Container_Details"         =>  @$bill_container_details,
        "Manifest_Details"          =>  @$Manifest_Details,
        "Payment_Details"           =>  @$bill_payment_details,
        "License_Details"           =>  @$bill_licence_details,
        "SHB_Summary"               =>  @$shb_summary,
        "Shipping_Bill_Summary"     =>  @$shipping_bill_summary,
        "Equipment_Details"         =>  @$equipment_details,
        "Challan_Details"           =>  @$challan_details,
        "Jobbing_Details"           =>  @$jobbing_details,
        "DFIA_Licence_Details"      =>  @$dfia_licence_details,
        "Drawback_Details"          =>  @$drawback_details,
        "Third_Party_Details"       =>  @$third_party_details,
        "Item_Manufacturer"         =>  @$item_manufacture,
        "Rodtep_Details"            =>  @$Rodtep_Details,
        "frequency"                 =>  @$post["report_email_frequency"],
        "format"                    =>  @$post["optradio"],
        "time"                      =>  @$post["time"],
        'CREATED' =>                    date('Y-m-d h:i:s')
        );
       
        $result = $this->Common_model->insert_iec_report_settings($data);
        $result=1;
        
        	if($result)

		{	
		    $this->session->set_flashdata('success','Report Setting Save Successfully!');
		}
		else

		{
			$this->session->set_flashdata('error','Report Setting Not Saved Please Try Again..!!');
		}

	   redirect('/admin/iec_reports');
        
        if($result) {   
        $db_name = $_SESSION['database_prefix'].$result;
	    
	}
	    
	}
	
	
	public function iec_signup(){
	    $this->load->view('common/header');
		$this->load->view('admin/signup_iec_form.php');
		$this->load->view('common/footer');	
	}
	
	public function register_iec_user(){
	    $post = $this->input->post();
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	     $pass = array(); //remember to declare $pass as an array
	     $alphaLength = strlen($alphabet) - 1;
	      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
    }
    $data =array(
        'fullname'     =>  $post["first_name"]." ".$post["last_name"],
        "email"        =>  $post["iec_email"],
        "iec_no"       =>  $post["iec_no"],
        "mobile"       =>  $post["mobile_no"],
        "password"     =>  implode($pass),
        "role"         =>  "admin",
        'created_at' =>   date('Y-m-d h:i:s')
        );
        //$result = $this->Common_model->insert_iec_user_entry($data);
        $result=1;
        
        if($result) {   
        $db_name = $_SESSION['database_prefix'].$result;
       
        if($this->dbforge->create_database($db_name))
{
    $this->db->query("use ".$db_name."");
    
            $this->db->query("CREATE TABLE `boe_delete_logs` (
  `boe_delete_logs_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `filename` varchar(255),
  `be_no` varchar(255),
  `be_date` datetime,
  `iec_no` varchar(255),
  `br` varchar(255),
  `fullname` varchar(255),
  `email` varchar(255),
  `mobile` varchar(255),
  `deleted_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");
          
          
  $this->db->query("CREATE TABLE `bill_of_entry_summary` (
  `boe_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `boe_file_status_id` integer,
  `invoice_title` varchar(255),
  `port` varchar(255),
  `port_code` varchar(255),
  `be_no` varchar(255),
  `be_date` date,
  `be_type` varchar(255),
  `iec_br` varchar(255),
  `iec_no` varchar(255),
  `br` varchar(255),
  `gstin_type` varchar(255),
  `cb_code` varchar(255),
  `type` varchar(255),
  `nos` integer,
  `pkg` integer,
  `item` integer,
  `g_wt_kgs` integer,
  `cont` integer,
  `be_status` varchar(255),
  `mode` varchar(255),
  `def_be` varchar(255),
  `kacha` varchar(255),
  `sec_48` varchar(255),
  `reimp` varchar(255),
  `adv_be` varchar(255),
  `assess` varchar(255),
  `exam` varchar(255),
  `hss` varchar(255),
  `first_check` varchar(255),
  `prov_final` varchar(255),
  `country_of_origin` varchar(255),
  `country_of_consignment` varchar(255),
  `port_of_loading` varchar(255),
  `port_of_shipment` varchar(255),
  `importer_name_and_address` varchar(255),
  `cb_name` varchar(255),
  `aeo` varchar(255),
  `ucr` varchar(255),
  `bcd` numeric,
  `acd` numeric,
  `sws` numeric,
  `nccd` numeric,
  `add` numeric,
  `cvd` numeric,
  `igst` numeric,
  `g_cess` numeric,
  `sg` numeric,
  `saed` numeric,
  `gsia` numeric,
  `tta` numeric,
  `health` numeric,
  `total_duty` numeric,
  `int` numeric,
  `pnlty` numeric,
  `fine` numeric,
  `tot_ass_val` numeric,
  `tot_amount` numeric,
  `wbe_no` varchar(255),
  `wbe_date` date,
  `wbe_site` varchar(255),
  `wh_code` varchar(255),
  `submission_date` date,
  `assessment_date` date,
  `examination_date` date,
  `ooc_date` date,
  `submission_time` varchar(255),
  `assessment_time` varchar(255),
  `examination_time` varchar(255),
  `ooc_time` varchar(255),
  `submission_exchange_rate` varchar(255),
  `assessment_exchange_rate` varchar(255),
  `ooc_no` varchar(255),
  `ooc_date_` date,
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");



            $this->db->query("CREATE TABLE `invoice_and_valuation_details` (
  `invoice_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `boe_id` integer,
  `s_no` integer,
  `invoice_no` varchar(255),
  `purchase_order_no` varchar(255),
  `lc_no` varchar(255),
  `contract_no` varchar(255),
  `buyer_s_name_and_address` varchar(255),
  `seller_s_name_and_address` varchar(255),
  `supplier_name_and_address` varchar(255),
  `third_party_name_and_address` varchar(255),
  `aeo` varchar(255),
  `ad_code` varchar(255),
  `inv_value` numeric,
  `freight` varchar(255),
  `insurance` varchar(255),
  `hss` varchar(255),
  `loading` varchar(255),
  `commn` varchar(255),
  `pay_terms` varchar(255),
  `valuation_method` varchar(255),
  `reltd` varchar(255),
  `svb_ch` varchar(255),
  `svb_no` varchar(255),
  `date` date,
  `loa` integer,
  `cur` varchar(255),
  `term` varchar(255),
  `c_and_b` varchar(255),
  `coc` varchar(255),
  `cop` varchar(255),
  `hnd_chg` varchar(255),
  `g_and_s` varchar(255),
  `doc_ch` varchar(255),
  `coo` varchar(255),
  `r_and_lf` varchar(255),
  `oth_cost` varchar(255),
  `ld_uld` varchar(255),
  `ws` varchar(255),
  `otc` varchar(255),
  `misc_charge` numeric,
  `ass_value` numeric,
  `invoice_date` date,
  `purchase_date` date,
  `lc_date` date,
  `contract_date` date,
  `freight_cur` varchar(255),
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


   $this->db->query("CREATE TABLE `duties_and_additional_details` (
  `duties_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `boe_id` integer,
  `invoice_id` integer NOT NULL,
  `s_no` integer NOT NULL,
  `cth` text,
  `description` text,
  `unit_price` numeric,
  `quantity` integer,
  `uqc` text,
  `amount` numeric,
  `invsno` integer,
  `itemsn` integer,
  `cth_item_detail` text,
  `ceth` text,
  `item_description` text,
  `fs` text,
  `pq` text,
  `dc` text,
  `wc` text,
  `aq` text,
  `upi` numeric,
  `coo` text,
  `c_qty` text,
  `c_uqc` text,
  `s_qty` numeric,
  `s_uqc` text,
  `sch` text,
  `stdn_pr` text,
  `rsp` text,
  `reimp` text,
  `prov` text,
  `end_use` text,
  `prodn` text,
  `cntrl` text,
  `qualfr`text,
  `contnt` text,
  `stmnt` text,
  `sup_docs` text,
  `assess_value` numeric,
  `total_duty` numeric,
  `bcd_notn_no` text,
  `bcd_notn_sno` text,
  `bcd_rate` integer,
  `bcd_amount` numeric,
  `bcd_duty_fg` numeric,
  `acd_notn_no` text,
  `acd_notn_sno` text,
  `acd_rate` integer,
  `acd_amount` numeric,
  `acd_duty_fg` numeric,
  `sws_notn_no` text,
  `sws_notn_sno` text,
  `sws_rate` integer,
  `sws_amount` numeric,
  `sws_duty_fg` numeric,
  `sad_notn_no` text,
  `sad_notn_sno` text,
  `sad_rate` integer,
  `sad_amount` numeric,
  `sad_duty_fg` numeric,
  `igst_notn_no` text,
  `igst_notn_sno` text,
  `igst_rate` integer,
  `igst_amount` numeric,
  `igst_duty_fg` numeric,
  `g_cess_notn_no` text,
  `g_cess_notn_sno` text,
  `g_cess_rate` integer,
  `g_cess_amount` numeric,
  `g_cess_duty_fg` numeric,
  `add_notn_no` text,
  `add_notn_sno` text,
  `add_rate` integer,
  `add_amount` numeric,
  `add_duty_fg` numeric,
  `cvd_notn_no` text,
  `cvd_notn_sno` text,
  `cvd_rate` integer,
  `cvd_amount` numeric,
  `cvd_duty_fg` numeric,
  `sg_notn_no` text,
  `sg_notn_sno` text,
  `sg_rate` integer,
  `sg_amount` numeric,
  `sg_duty_fg` numeric,
  `t_value_notn_no` text,
  `t_value_notn_sno` text,
  `t_value_rate` integer,
  `t_value_amount` numeric,
  `t_value_duty_fg` numeric,
  `sp_excd_notn_no` text,
  `sp_excd_notn_sno` text,
  `sp_excd_rate` integer,
  `sp_excd_amount` numeric,
  `sp_excd_duty_fg` numeric,
  `chcess_notn_no` text,
  `chcess_notn_sno` text,
  `chcess_rate` integer,
  `chcess_amount` numeric,
  `chcess_duty_fg` numeric,
  `tta_notn_no` text,
  `tta_notn_sno` text,
  `tta_rate` integer,
  `tta_amount` numeric,
  `tta_duty_fg` numeric,
  `cess_notn_no` text,
  `cess_notn_sno` text,
  `cess_rate` integer,
  `cess_amount` numeric,
  `cess_duty_fg` numeric,
  `caidc_cvd_edc_notn_no` text,
  `caidc_cvd_edc_notn_sno` text,
  `caidc_cvd_edc_rate` integer,
  `caidc_cvd_edc_amount` numeric,
  `caidc_cvd_edc_duty_fg` numeric,
  `eaidc_cvd_hec_notn_no` text,
  `eaidc_cvd_hec_notn_sno` text,
  `eaidc_cvd_hec_rate` integer,
  `eaidc_cvd_hec_amount` numeric,
  `eaidc_cvd_hec_duty_fg` numeric,
  `cus_edc_notn_no` text,
  `cus_edc_notn_sno` text,
  `cus_edc_rate` integer,
  `cus_edc_amount` numeric,
  `cus_edc_duty_fg` numeric,
  `cus_hec_notn_no` text,
  `cus_hec_notn_sno` text,
  `cus_hec_rate` integer,
  `cus_hec_amount` numeric,
  `cus_hec_duty_fg` numeric,
  `ncd_notn_no` text,
  `ncd_notn_sno` text,
  `ncd_rate` integer,
  `ncd_amount` numeric,
  `ncd_duty_fg` numeric,
  `aggr_notn_no` text,
  `aggr_notn_sno` text,
  `aggr_rate` integer,
  `aggr_amount` numeric,
  `aggr_duty_fg` numeric,
  `invsno_add_details` integer,
  `itmsno_add_details` integer,
  `refno` text,
  `refdt` text,
  `prtcd_svb_d` text,
  `lab` text,
  `pf` text,
  `load_date` date,
  `pf_` text,
  `beno` text,
  `bedate` date,
  `prtcd` text,
  `unitprice` numeric,
  `currency_code` text,
  `notno` integer,
  `slno` integer,
  `frt` text,
  `ins` text,
  `duty` text,
  `sb_no` text,
  `sb_dt` text,
  `portcd` text,
  `sinv` text,
  `sitemn` text,
  `type` text,
  `manufact_cd` text,
  `source_cy` text,
  `trans_cy` text,
  `address` text,
  `accessory_item_details` text,
  `lic_slno` integer,
  `lic_date` date,
  `code` text,
  `port` text,
  `debit_value` text,
  `qty` integer,
  `uqc_lc_d` text,
  `debit_duty` text,
  `certificate_number` text,
  `date` date,
  `type_cert_d` text,
  `prc_level` text,
  `iec` text,
  `branch_slno` integer,
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


 $this->db->query("CREATE TABLE `bill_manifest_details` (
  `manifest_details_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `boe_id` integer NOT NULL,
  `igm_no` varchar(255),
  `igm_date` date,
  `inw_date` date,
  `gigmno` varchar(255),
  `gigmdt` date,
  `mawb_no` varchar(255),
  `mawb_date` date,
  `hawb_no` varchar(255),
  `hawb_date` date,
  `pkg` integer,
  `gw` integer,
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `bill_bond_details` (
  `bond_details_id` integer PRIMARY KEY AUTO_INCREMENT,
  `boe_id` integer NOT NULL,
  `bond_no` varchar(255),
  `port` varchar(255),
  `bond_cd` varchar(255),
  `debt_amt` numeric,
  `bg_amt` numeric,
  `created_at` datetime) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");
  
  
  $this->db->query("CREATE TABLE `bill_payment_details` (
  `payment_details_id` integer PRIMARY KEY AUTO_INCREMENT,
  `boe_id` integer NOT NULL,
  `sr_no` integer,
  `challan_no` varchar(255),
  `paid_on` date,
  `amount` numeric,
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

  $this->db->query("CREATE TABLE `bill_container_details` (
  `container_details_pk` integer PRIMARY KEY AUTO_INCREMENT,
  `boe_id` integer NOT NULL,
  `sno` integer,
  `lcl_fcl` varchar(255),
  `truck` varchar(255),
  `seal` varchar(255),
  `container_number` varchar(255),
  `created_at` datetime
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

  $this->db->query("CREATE TABLE `sb_file_status` (
  `sb_file_status_id` integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pdf_filepath` varchar(255),
  `pdf_filename` varchar(255),
  `user_iec_no` varchar(255),
  `lucrative_users_id` integer,
  `excel_filepath` varchar(255),
  `excel_filename` varchar(255),
  `pdf_to_excel_date` timestamp,
  `pdf_to_excel_status` varchar(255),
  `file_iec_no` varchar(255),
  `sb_no` varchar(255),
  `sb_date` date,
  `stage` varchar(255),
  `status` varchar(255),
  `remarks` varchar(255),
  `created_at` datetime,
  `br` varchar(255),
  `is_processed` boolean
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `ship_bill_summary` (
  `sbs_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sb_file_status_id` integer,
  `invoice_title` text,
  `port_code` text,
  `sb_no` integer,
  `sb_date` date,
  `iec` text,
  `br` text,
  `iec_br` text,
  `gstin` text,
  `type` text,
  `cb_code` text,
  `inv_nos` text,
  `item_no` text,
  `cont_no` text,
  `address` text,
  `pkg` text,
  `g_wt_unit` text,
  `g_wt_value` text,
  `mode` text,
  `assess` text,
  `exmn` text,
  `jobbing` text,
  `meis` text,
  `dbk` text,
  `rodtp` text,
  `deec_dfia` text,
  `dfrc` text,
  `reexp` text,
  `lut` text,
  `port_of_loading` text,
  `country_of_finaldestination` text,
  `state_of_origin` text,
  `port_of_finaldestination` text,
  `port_of_discharge` text,
  `country_of_discharge` text,
  `exporter_name_and_address` text,
  `consignee_name_and_address` text,
  `declarant_type` text,
  `ad_code` text,
  `gstin_type_` text,
  `rbi_waiver_no_and_dt` text,
  `forex_bank_account_no` text,
  `cb_name` text,
  `dbk_bank_account_no` text,
  `aeo` text,
  `ifsc_code` text,
  `fob_value_sum` text,
  `freight` text,
  `insurance` text,
  `discount` text,
  `com` text,
  `deduction` text,
  `p_c` text,
  `duty` text,
  `cess` text,
  `dbk_claim` text,
  `igst_amt` text,
  `cess_amt` text,
  `igst_value` text,
  `rodtep_amt` text,
  `rosctl_amt` text,
  `mawb_no` text,
  `mawb_dt` text,
  `hawb_no` text,
  `hawb_dt` text,
  `noc` text,
  `cin_no` text,
  `cin_dt` text,
  `cin_site_id` text,
  `seal_type` text,
  `nature_of_cargo` text,
  `no_of_packets` text,
  `no_of_containers` text,
  `loose_packets` text,
  `marks_and_numbers` text,
  `submission_date` text,
  `assessment_date` text,
  `examination_date` text,
  `leo_date` text,
  `submission_time` text,
  `assessment_time` text,
  `examination_time` text,
  `leo_time` text,
  `leo_no` text,
  `leo_dt` text,
  `brc_realisation_date` text,
  `created_at` datetime)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");




$this->db->query("CREATE TABLE `equipment_details` (
  `equip_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sbs_id` integer,
  `container` text,
  `seal` text,
  `date` text,
  `s_no` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

$this->db->query("CREATE TABLE `challan_details` (
  `challan_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sbs_id` integer,
  `sr_no` text,
  `challan_no` text,
  `paymt_dt` text,
  `amount` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `invoice_summary` (
  `invoice_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sbs_id` integer,
  `s_no_inv` text,
  `inv_no` text,
  `inv_date` date,
  `inv_no_date` text,
  `po_no_date` text,
  `loc_no_date` text,
  `contract_no_date` text,
  `ad_code_inv` text,
  `invterm` text,
  `exporters_name_and_address` text,
  `buyers_name_and_address` text,
  `third_party_name_and_address` text,
  `buyers_aeo_status` text,
  `invoice_value` text,
  `invoice_value_currency` text,
  `fob_value_inv` text,
  `fob_value_currency` text,
  `freight_val` text,
  `freight_currency` text,
  `insurance_val` text,
  `insurance_currency` text,
  `discount_val` text,
  `discount_val_currency` text,
  `commison` text,
  `comission_currency` text,
  `deduct` text,
  `deduct_currency` text,
  `p_c_val` text,
  `p_c_val_currency` text,
  `exchange_rate` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `item_details` (
  `item_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `invoice_id` integer,
  `invsn` text,
  `item_s_no` text,
  `hs_cd` text,
  `description` text,
  `quantity` text,
  `uqc` text,
  `rate` text,
  `value_f_c` text,
  `fob_inr` text,
  `pmv` text,
  `duty_amt` text,
  `cess_rt` text,
  `cesamt` text,
  `dbkclmd` text,
  `igststat` text,
  `igst_value_item` text,
  `igst_amount` text,
  `schcod` text,
  `scheme_description` text,
  `sqc_msr` text,
  `sqc_uqc` text,
  `state_of_origin_i` text,
  `district_of_origin` text,
  `pt_abroad` text,
  `comp_cess` text,
  `end_use` text,
  `fta_benefit_availed` text,
  `reward_benefit` text,
  `third_party_item` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");



$this->db->query("CREATE TABLE `drawback_details` (
  `drawback_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `item_id` integer,
  `inv_sno` integer,
  `item_sno` integer,
  `dbk_sno` character varying(1000),
  `qty_wt` character varying(1000),
  `value` character varying(1000),
  `dbk_amt` character varying(1000),
  `stalev` character varying(1000),
  `cenlev` character varying(1000),
  `rosctl_amt` character varying(1000),
  `created_at` timestamp,
  `rate` character varying(1000)
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `aa_dfia_licence_details` (
  `dfia_licence_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `item_id` integer,
  `inv_s_no` text,
  `item_s_no_` text,
  `licence_no` text,
  `descn_of_export_item` text,
  `exp_s_no` text,
  `expqty` text,
  `uqc_aa` text,
  `fob_value` text,
  `sion` text,
  `descn_of_import_item` text,
  `imp_s_no` text,
  `impqt` text,
  `uqc_` text,
  `indig_imp` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");



$this->db->query("CREATE TABLE `jobbing_details` (
  `jobbing_detail_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sbs_id` integer,
  `be_no` text,
  `be_date` text,
  `port_code_j` text,
  `descn_of_imported_goods` text,
  `qty_imp` text,
  `qty_used` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `cb_file_status` (
  `cb_file_status_id` int4 PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pdf_filepath` varchar(255),
  `pdf_filename` varchar(255),
  `user_iec_no` varchar(255),
  `lucrative_users_id` int4,
  `file_iec_no` varchar(255),
  `cb_no` varchar(255),
  `cb_date` date,
  `stage` varchar(255),
  `status` varchar(255),
  `remarks` varchar(255),
  `created_at` timestamp,
  `br` varchar(255),
  `is_processed` bool
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");



$this->db->query("CREATE TABLE `courier_bill_summary` (
  `courier_bill_of_entry_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `cb_file_status_id` integer,
  `current_status_of_the_cbe` varchar(255),
  `cbexiv_number` varchar(255),
  `courier_registration_number` varchar(255),
  `name_of_the_authorized_courier` varchar(255),
  `address_of_authorized_courier` varchar(255),
  `particulars_customs_house_agent_name` varchar(255),
  `particulars_customs_house_agent_licence_no` varchar(255),
  `particulars_customs_house_agent_address` varchar(255),
  `import_export_code` varchar(255),
  `import_export_branch_code` varchar(255),
  `particulars_of_the_importer_name` varchar(255),
  `particulars_of_the_importer_address` varchar(255),
  `category_of_importer` varchar(255),
  `type_of_importer` varchar(255),
  `in_case_of_other_importer` varchar(255),
  `authorised_dealer_code_of_bank` varchar(255),
  `class_code` varchar(255),
  `cb_no` varchar(255),
  `cb_date` date,
  `category_of_boe` varchar(255),
  `type_of_boe` varchar(255),
  `kyc_document` varchar(255),
  `kyc_id` varchar(255),
  `state_code` varchar(255),
  `high_sea_sale` varchar(255),
  `ie_code_of_hss` varchar(255),
  `ie_branch_code_of_hss` varchar(255),
  `particulars_high_sea_seller_name` varchar(255),
  `particulars_high_sea_seller_address` varchar(255),
  `use_of_the_first_proviso_under_section_461customs_act1962` varchar(255),
  `request_for_first_check` varchar(255),
  `request_for_urgent_clear_ance_against_temporary_documentation` varchar(255),
  `request_for_extension_of_time_as_per_section_48customs_act1962` varchar(255),
  `reason_in_case_extension_of_time_limit_is_requested` varchar(255),
  `country_of_origin` varchar(255),
  `country_of_consignment` varchar(255),
  `name_of_gateway_port` varchar(255),
  `gateway_igm_number` varchar(255),
  `date_of_entry_inwards_of_gateway_port` varchar(255),
  `case_of_crn` varchar(255),
  `number_of_invoices` integer,
  `total_freight` varchar(255),
  `total_insurance` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");



$this->db->query("CREATE TABLE `manifest_details` (
  `courier_bill_of_entry_id` integer,
  `manifest_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `import_general_manifest_igm_number` varchar(255),
  `date_of_entry_inward` date,
  `master_airway_bill_mawb_number` varchar(255),
  `date_of_mawb` date,
  `house_airway_bill_hawb_number` varchar(255),
  `date_of_hawb` date,
  `marks_and_numbers` varchar(255),
  `number_of_packages` varchar(255),
  `type_of_packages` varchar(255),
  `interest_amount` varchar(255),
  `unit_of_measure_for_gross_weight` varchar(255),
  `gross_weight` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `procurment_details` (
  `courier_bill_of_entry_id` integer,
  `procurment_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `procurement_under_3696_cus` varchar(255),
  `procurement_certificate_number` varchar(255),
  `date_of_issuance_of_certificate` varchar(255),
  `location_code_of_the_cent_ral_excise_office_the_certificate` varchar(255),
  `commissione_rate` varchar(255),
  `division` varchar(255),
  `range` varchar(255),
  `import_under_multiple_in_voices` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `invoice_details` (
  `courier_bill_of_entry_id` integer,
  `invoice_detail_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `invoice_number` text,
  `date_of_invoice` date,
  `purchase_order_number` text,
  `date_of_purchase_order` text,
  `contract_number` text,
  `date_of_contract` text,
  `letter_of_credit` text,
  `date_of_letter_of_credit` text,
  `supplier_details_name` text,
  `supplier_details_address` text,
  `if_supplier_is_not_the_seller_name` text,
  `if_supplier_is_not_the_seller_address` text,
  `broker_agent_details_name` text,
  `broker_agent_details_address` text,
  `nature_of_transaction` text,
  `if_others` text,
  `terms_of_payment` text,
  `conditions_or_restrictions_if_any_attached_to_sale` text,
  `method_of_valuation` text,
  `terms_of_invoice` text,
  `invoice_value` text,
  `currency` text,
  `freight_rate` text,
  `freight_amount` text,
  `freight_currency` text,
  `insurance_rate` text,
  `insurance_amount` text,
  `insurance_currency` text,
  `loading_unloading_and_handling_charges_rule_rate`text,
  `loading_unloading_and_handling_charges_rule_amount`text,
  `loading_unloading_and_handling_charges_rule_currency` text,
  `other_charges_related_to_the_carriage_of_goods_rate` text,
  `other_charges_related_to_the_carriage_of_goods_amount` text,
  `other_charges_related_to_the_carriage_of_goods_currency` text,
  `brokerage_and_commission_rate` text,
  `brokerage_and_commission_amount` text,
  `brokerage_and_commission_currency` text,
  `cost_of_containers_rate` text,
  `cost_of_containers_amount` text,
  `cost_of_containers_currency` text,
  `cost_of_packing_rate` text,
  `cost_of_packing_amount` text,
  `cost_of_packing_currency` text,
  `dismantling_transport_handling_in_country_export_rate` text,
  `dismantling_transport_handling_in_country_export_amount` text,
  `dismantling_transport_handling_in_country_export_currency` text,
  `cost_of_goods_and_ser_vices_supplied_by_buyer_rate` text,
  `cost_of_goods_and_ser_vices_supplied_by_buyer_amount` text,
  `cost_of_goods_and_ser_vices_supplied_by_buyer_currency` text,
  `documentation_rate` text,
  `documentation_amount` text,
  `documentation_currency` text,
  `country_of_origin_certificate_rate` text,
  `country_of_origin_certificate_amount` text,
  `country_of_origin_certificate_currency` text,
  `royalty_and_license_fees_rate` text,
  `royalty_and_license_fees_amount` text,
  `royalty_and_license_fees_currency` text,
  `value_of_proceeds_which_accrue_to_seller_rate` text,
  `value_of_proceeds_which_accrue_to_seller_amount` text,
  `value_of_proceeds_which_accrue_to_seller_currency` text,
  `cost_warranty_service_if_any_provided_seller_rate` text,
  `cost_warranty_service_if_any_provided_seller_amount` text,
  `cost_warranty_service_if_any_provided_seller_currency`text,
  `other_payments_satisfy_obligation_rate` text,
  `other_payments_satisfy_obligation_amount` text,
  `other_payments_satisfy_obligation_currency` text,
  `other_charges_and_payments_if_any_rate` text,
  `other_charges_and_payments_if_any_amount` text,
  `other_charges_and_payments_if_any_currency` text,
  `discount_amount` text,
  `discount_currency` text,
  `rate` text,
  `amount` text,
  `any_other_information_which_has_a_bearing_on_value` text,
  `are_the_buyer_and_seller_related` text,
  `if_the_buyer_seller_has_the_relationship_examined_earlier_svb`text,
  `svb_reference_number` text,
  `svb_date` text,
  `indication_for_provisional_final` text,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `igm_details` (
  `courier_bill_of_entry_id` integer,
  `igm_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `airlines` varchar(255),
  `flight_no` varchar(255),
  `airport_of_arrival` varchar(255),
  `date_of_arrival` date,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

$this->db->query("CREATE TABLE `container_details` (
  `courier_bill_of_entry_id` integer,
  `container_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `container_details_srno` int,
  `container` varchar(255),
  `seal_number` varchar(255),
  `fcl_lcl` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

$this->db->query("CREATE TABLE `bond_details` (
  `courier_bill_of_entry_id` integer,
  `bond_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `bond_details_srno` int,
  `bond_type` varchar(255),
  `bond_number` varchar(255),
  `clearance_of_imported_goods_bond_already_registered_customs` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `items_details` (
  `courier_bill_of_entry_id` integer,
  `items_detail_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `case_for_reimport` varchar(255),
  `import_against_license` varchar(255),
  `serial_number_in_invoice` varchar(255),
  `item_description` varchar(255),
  `general_description` varchar(255),
  `currency_for_unit_price` varchar(255),
  `unit_price` varchar(255),
  `unit_of_measure` varchar(255),
  `quantity` varchar(255),
  `rate_of_exchange` varchar(255),
  `accessories_if_any` varchar(255),
  `name_of_manufacturer` varchar(255),
  `brand` varchar(255),
  `model` varchar(255),
  `grade` varchar(255),
  `specification` varchar(255),
  `end_use_of_item` varchar(255),
  `country_of_origin` varchar(255),
  `bill_of_entry_number` varchar(255),
  `details_in_case_of_previous_imports_date` varchar(255),
  `details_in_case_previous_imports_currency` varchar(255),
  `unit_value` varchar(255),
  `customs_house` varchar(255),
  `ritc` varchar(255),
  `ctsh` varchar(255),
  `cetsh` varchar(255),
  `currency_for_rsp` varchar(255),
  `retail_sales_price_per_unit` varchar(255),
  `exim_scheme_code_if_any` varchar(255),
  `para_noyear_of_exim_policy` varchar(255),
  `items_details_are_the_buyer_and_seller_related` varchar(255),
  `if_the_buyer_and_seller_relation_examined_earlier_by_svb` varchar(255),
  `svb_reference_number` varchar(255),
  `svb_date` varchar(255),
  `indication_for_provisional_final` varchar(255),
  `shipping_bill_number` varchar(255),
  `shipping_bill_date` varchar(255),
  `port_of_export` varchar(255),
  `invoice_number_of_shipping_bill` varchar(255),
  `item_serial_number_in_shipping_bill` varchar(255),
  `freight` varchar(255),
  `insurance` varchar(255),
  `total_repair_cost_including_cost_of_materials` varchar(255),
  `additional_duty_exemption_requested` varchar(255),
  `notification_number` varchar(255),
  `serial_number_in_notification` varchar(255),
  `license_registration_number` varchar(255),
  `license_registration_date` varchar(255),
  `debit_value_rs` varchar(255),
  `unit_of_measure_for_quantity_to_be_debited` varchar(255),
  `debit_quantity` varchar(255),
  `item_serial_number_in_license` varchar(255),
  `assessable_value` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `notification_used_for_items` (
  `items_detail_id` integer,
  `item_notification_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `notification_item_srno` int,
  `notification_number` varchar(255),
  `serial_number_of_notification` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");


$this->db->query("CREATE TABLE `duty_details` (
  `items_detail_id` integer,
  `duty_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `BCD_duty_head` varchar(255),
  `BCD_ad_valorem` varchar(255),
  `BCD_specific_rate` varchar(255),
  `BCD_duty_forgone` varchar(255),
  `BCD_duty_amount` varchar(255),
  `AIDC_duty_head` varchar(255),
  `AIDC_ad_valorem` varchar(255),
  `AIDC_specific_rate` varchar(255),
  `AIDC_duty_forgone` varchar(255),
  `AIDC_duty_amount` varchar(255),
  `SW_Srchrg_duty_head` varchar(255),
  `SW_Srchrg_ad_valorem` varchar(255),
  `SW_Srchrg_specific_rate` varchar(255),
  `SW_Srchrg_duty_forgone` varchar(255),
  `SW_Srchrg_duty_amount` varchar(255),
  `IGST_duty_head` varchar(255),
  `IGST_ad_valorem` varchar(255),
  `IGST_specific_rate` varchar(255),
  `IGST_duty_forgone` varchar(255),
  `IGST_duty_amount` varchar(255),
  `CMPNSTRY_duty_head` varchar(255),
  `CMPNSTRY_ad_valorem` varchar(255),
  `CMPNSTRY_specific_rate` varchar(255),
  `CMPNSTRY_duty_forgone` varchar(255),
  `CMPNSTRY_duty_amount` varchar(255),
  `dummy5_duty_head` varchar(255),
  `dummy5_ad_valorem` varchar(255),
  `dummy5_specific_rate` varchar(255),
  `dummy5_duty_forgone` varchar(255),
  `dummy5_duty_amount` varchar(255),
  `dummy6_duty_head` varchar(255),
  `dummy6_ad_valorem` varchar(255),
  `dummy6_specific_rate` varchar(255),
  `dummy6_duty_forgone` varchar(255),
  `dummy6_duty_amount` varchar(255),
  `dummy7_duty_head` varchar(255),
  `dummy7_ad_valorem` varchar(255),
  `dummy7_specific_rate` varchar(255),
  `dummy7_duty_forgone` varchar(255),
  `dummy7_duty_amount` varchar(255),
  `dummy8_duty_head` varchar(255),
  `dummy8_ad_valorem` varchar(255),
  `dummy8_specific_rate` varchar(255),
  `dummy8_duty_forgone` varchar(255),
  `dummy8_duty_amount` varchar(255),
  `dummy9_duty_head` varchar(255),
  `dummy9_ad_valorem` varchar(255),
  `dummy9_specific_rate` varchar(255),
  `dummy9_duty_forgone` varchar(255),
  `dummy9_duty_amount` varchar(255),
  `dummy10_duty_head` varchar(255),
  `dummy10_ad_valorem` varchar(255),
  `dummy10_specific_rate` varchar(255),
  `dummy10_duty_forgone` varchar(255),
  `dummy10_duty_amount` varchar(255),
  `dummy11_duty_head` varchar(255),
  `dummy11_ad_valorem` varchar(255),
  `dummy11_specific_rate` varchar(255),
  `dummy11_duty_forgone` varchar(255),
  `dummy11_duty_amount` varchar(255),
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

$this->db->query("CREATE TABLE `payment_details` (
  `courier_bill_of_entry_id` integer,
  `payment_details_id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `payment_details_srno` integer, 
  `tr6_challan_number` varchar(255),
  `total_amount` varchar(255),
  `challan_date` date,
  `created_at` timestamp
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4");

}
}
        
		if($result)

		{	
		    $this->session->set_flashdata('success','IEC User Added Successfully!');
		}
		else

		{
			$this->session->set_flashdata('error','Record not updated!');
		}

	   redirect('/admin/iec_signup');
       
	}
	
	
	 
	public function get_worksheet_name_by_type(){
        $post= $this->input->post();
        $user_id=$_SESSION["user_id"];
	    $iec_id =$_SESSION["iec_no"];
        $db_name = $_SESSION['database_prefix'].$user_id;
        $this->db->query("use ".$db_name."");
        $type = $_POST['type'];
	   /* $sql = 'SELECT *  FROM tbl_sheets  where type_id ='.$type.'';
        $query = $this->db->query( $sql);
         //print_r($this->db->last_query()); die();
        $importers=$query->result_array();
        $data['list_woksheet']=$importers;
        echo json_encode($data['list_woksheet']);*/
        
        
        if(isset($_POST['type']))
{
 //$id = join("','", $_POST['type']);
 $query = "SELECT *  FROM tbl_sheets  where type_id =".$type;
 $statement = $this->db->query($query);
 //$statement->execute();
 $result =$statement->result_array();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["tbl_sheet_name"].'">'.$row["tbl_sheet_name"].'</option>';
 }
 echo $output;
}
        
        
    
}

public function get_worksheet_columns(){
    $data='';
    $user_id=$_SESSION["user_id"];
	$iec_id =$_SESSION["iec_no"];
    $db_name = $_SESSION['database_prefix'].$user_id;
    $this->db->query("use ".$db_name."");
    $post= $this->input->post();
    $data1 = $post['selected1'];   
     
    $len=@strlen(@$data1);
    if($len>0){
    $strs = explode(',', $data1);
      foreach($strs as $str){
           echo $sql ="SHOW COLUMNS FROM ".$str;
        $query = $this->db->query($sql);
        $columns[]=$query->result_array();
        $data['columns'][]=$columns;
      }
        
     }
        echo json_encode($data);
}
	    
	public function iec_reports(){
	    $user_id=$_SESSION["user_id"];
	     $user_id=$_SESSION["user_id"];
	    if($user_id!=1){
	        $db_name = $_SESSION['database_prefix'].$user_id;
	        $this->db->query("use ".$db_name."");
	    }
	    $data["users_list"]=$this->Common_model->get_iec_all_users_list();
	    //print_r($data["users_list"]); die();
	    $iec_id =$_SESSION["iec_no"];
	    $this->load->view('common/header');
		$this->load->view('admin/import_reports_setting',$data);
		$this->load->view('common/footer');	
	}
}