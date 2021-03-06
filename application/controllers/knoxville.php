<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knoxville extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('client_model','Client');
        $this->load->model('sales_agent_model','SalesAgent');
        $this->load->model('order_model','Order');
        $this->load->model('item_model','Item');
        $this->load->model('transaction_model','Transaction');
        $this->load->model('deliverer_model','Deliverer');
        $this->load->model('shipment_model','Shipment');
        $this->load->model('shipment_status_model','ShipStatus');
        $this->load->model('qoute_model','quote');
        $this->load->model('client_qoute_model','clientQuote');
        $this->load->model('purchase_model','purchase');
        $this->load->model('stock_in_model','Stocks');
        $this->load->model('returns_model','return');
        $this->load->model('defectiveitems_model','Defective');
    }
    
    

    public function index()
    {
        if($this->session->userdata('userID')){
            $session_data=$this->session->userdata('logged_in');
            $data['userID']=$this->session->userdata('userID');
            if($this->session->userdata('isAdmin')>0){
                $header_data['title'] = "Management Dashboard";
                $stock='stocks';
                $condition = "$stock>=1";
                $result_array = $this->Item->read();
                $data['onStock'] = $result_array; 
                $shipped = $this->Shipment->read();
                $orders = $this->Order->read();
                $data['shipped'] = $shipped;
                $data['orders'] = $orders;
                $sales = $this->SalesAgent->read();
                $data['sales'] = $sales;
                $this->load->view('include/header',$header_data);
                $this->load->view('management_dashboard',$data);
                $this->load->view('include/footer');
            }
        }
    }
     public function viewSalesReport(){
    
        if($_POST['range']=='week'){
            $startDate = date('Y-m-d',strtotime('next sunday - 1 week'));
            $endDate = date('Y-m-d',strtotime('next sunday - 1 second'));
            $start = date('jS F, Y',strtotime('next sunday - 1 week'));
            $end = date('jS F, Y',strtotime('next sunday - 1 second'));
            $condition = "date BETWEEN '$startDate' AND '$endDate'";
            $transData=$this->purchase->read($condition);
            $totalQuantity = 0;
            $totalRevenue = 0;
            if($transData!=false){
                foreach($transData as $t){
                   
                        $totalQuantity += $t['quantity'];
                        $totalRevenue += $t['quantity']*$t['unit_price'];
                }
            }
            $data['totalQuantity'] = number_format($totalQuantity);
            $data['totalRevenue'] =  'PHP'.number_format($totalRevenue);
            $sales = $this->SalesAgent->read();
            $orders = $this->Order->read();
            if($sales!=false){
                    foreach($sales as $s){
                    $total = 0;
                    if($orders!=false){
                            foreach($orders as $o){
                                $tOrders = 0;
                                if($s['userID'] == $o['userID']){
                                    $condition1 = "orderID='".$o['orderID']."'";
                                    if($transData!=false){
                                        $trans = $this->purchase->read($condition1." AND ".$condition);
                                            if($trans!=false){
                                             foreach($trans as $t){
                                                if($t['status']=='Purchased'){
                                                    $total += $t['quantity']*$t['unit_price'];
                                                }
                                                else{
                                                    $total -= $t['quantity']*$t['unit_price'];
                                                }
                                            }
                                        }
                                    }
                                    $tOrders++;
                                }
                                
                            }
                        }
                    $data['sales'][] = array('fullname'=>$s['fullname'],'orders'=>number_format($tOrders),'total'=>number_format($total));
                    }
            }
            $data['range'] = 'This Week';
            $data['date'] = $start.' to '.$end;
            echo $this->load->view('sales_report',$data,TRUE);
        }
        else if($_POST['range']=='month'){
           $startDate = date('Y-m-d',strtotime('first day of this month'));
            $endDate = date('Y-m-d',strtotime('last day of this month'));
            $start = date('jS F, Y',strtotime('first day of this month'));
            $end = date('jS F, Y',strtotime('last day of this month'));
            $condition = "date BETWEEN '$startDate' AND '$endDate'";
            $transData=$this->purchase->read($condition);
            
            $totalQuantity = 0;
            $totalRevenue = 0;
            if($transData!=false){
                foreach($transData as $t){
                    {
                        $totalQuantity += $t['quantity'];
                        $totalRevenue += $t['quantity']*$t['unit_price'];
                    }
                }
            }
            $data['totalQuantity'] = number_format($totalQuantity);
            $data['totalRevenue'] = 'PHP'.number_format($totalRevenue);
            $sales = $this->SalesAgent->read();
            $orders = $this->Order->read();
            if($sales!=false){
                foreach($sales as $s){
                $total = 0;
                if($orders!=false){
                        foreach($orders as $o){
                            $tOrders = 0;
                            if($s['userID'] == $o['userID']){
                                $condition1 = "orderID='".$o['orderID']."'";
                                if($transData!=false){
                                    $trans = $this->purchase->read($condition1." AND ".$condition);
                                        if($trans!=false){
                                         foreach($trans as $t){
                                            
                                                $total += $t['quantity']*$t['unit_price'];
                                           
                                        }
                                    }
                                }
                                $tOrders++;
                            }
                            
                        }
                    }
                $data['sales'][] = array('fullname'=>$s['fullname'],'orders'=>number_format($tOrders),'total'=>number_format($total));
                }
            }
            $data['range'] = 'This Month';
            $data['date'] = $start.' to '.$end; 
            $this->load->view('sales_report',$data,TRUE);
        }
        else if($_POST['range']=='day'){
            $date = date('Y-m-d',strtotime('today'));
            //$condition=array('date'=>$date, 'status'=>'Purchased');
           $condition="date='$date'";
            $transData=$this->purchase->read($condition);
            $totalQuantity = 0;
            $totalRevenue = 0;
            if($transData!=false){
                foreach($transData as $t){
                        $totalQuantity += $t['quantity'];
                        $totalRevenue += $t['quantity']*$t['unit_price'];
                }
            }
           $data['totalQuantity'] = number_format($totalQuantity);
            $data['totalRevenue'] =  'PHP'.number_format($totalRevenue);
            $sales = $this->SalesAgent->read();
            $orders = $this->Order->read();
            if($sales!=false){
                foreach($sales as $s){
                $total = 0;
                if($orders!=false){
                        foreach($orders as $o){
                            $tOrders = 0;
                            if($s['userID'] == $o['userID']){
                                $condition1 = "orderID='".$o['orderID']."'";
                                if($transData!=false){
                                    $trans = $this->purchase->read($condition1." AND ".$condition);
                                        if($trans!=false){
                                         foreach($trans as $t){
                                            {
                                                $total += $t['quantity']*$t['unit_price'];
                                            }
                                        }
                                    }
                                }
                                $tOrders++;
                            }
                            
                        }
                    }
                $data['sales'][] = array('fullname'=>$s['fullname'],'orders'=>number_format($tOrders),'total'=>number_format($total));
                }
            }
            $data['range'] = 'Today';
            $date = date('jS F, Y',strtotime('today'));
            $data['date'] = $date; 
            echo  $this->load->view('sales_report',$data,TRUE);
            
           
        }
                 $this->load->view('include/footer');
    }
    
    public function viewSalesAgents(){
        $result_array = $this->SalesAgent->read();
        $data['sales_agents'] = $result_array; 
        $id =  $this->SalesAgent->count();
        $data['id'] = (string) $id++;
        $header_data['title'] = "View Sales Agents";
        $this->load->view('include/header',$header_data);
        $this->load->view('sales_agent_view',$data);
       $this->load->view('include/footer');
        
        
    }
    
    public function addSalesAgent(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'userID', 'label'=>'User ID', 'rules'=>'required'),
                    array('field'=>'pass', 'label'=>'Password', 'rules'=>'required'),
                    array('field'=>'name', 'label'=>'Full Name', 'rules'=>'required'),
                    array('field'=>'bday', 'label'=>'Birthdate', 'rules'=>'required'),
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Add Sales Agent";
            $this->load->view('include/header',$header_data);
            $this->load->view('add_sales_agentForm');
            $this->load->view('include/footer');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $salesAgentRecord=array('userID'=>$_POST['userID'],'password'=>password_hash($_POST['pass'],PASSWORD_BCRYPT),'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->create($salesAgentRecord);
            redirect('knoxville/viewSalesAgents');
        }
    }
    
    public function updateSalesAgent($userID){
        $data['userID']=$userID;
        $condition = array('userID' => $userID);
        $oldRecord = $this->SalesAgent->read($condition);
        foreach($oldRecord as $o){
            $data['userID'] = $o['userID'];
            $data['pass'] = $o['password'];
            $data['name'] = $o['fullname'];
            $data['bday'] = $o['birthdate'];
            $data['email'] = $o['email'];
            $data['cnum'] = $o['contact_no'];
            if($o['isAdmin']>0)
                $isAdmin='checked';
            else
                $isAdmin='';
            $data['isAdmin'] = $isAdmin;

        }
        $rules = array(
                    array('field'=>'userID', 'label'=>'User ID', 'rules'=>'required'),
                    array('field'=>'pass', 'label'=>'Password', 'rules'=>'required'),
                    array('field'=>'name', 'label'=>'Full Name', 'rules'=>'required'),
                    array('field'=>'bday', 'label'=>'Birthdate', 'rules'=>'required'),
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $title['title']="Update Sales Agent";
            $this->load->view('include/header',$title);
            $this->load->view('update_sales_agentForm',$data);
            $this->load->view('include/footer');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $newRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->update($newRecord);
            redirect('knoxville/viewSalesAgents');
        }
    }
    
    public function delSalesAgent($userID){
        $where_array = array('userID'=>$userID);
        $this->SalesAgent->del($where_array);
        redirect('knoxville/viewSalesAgents');
    }
    
    public function viewClients(){
        $result_array = $this->Client->read();
        
        $data['clients'] = $result_array; //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 )
        $header_data['title'] = "View Clients";
        $this->load->view('include/header',$header_data);
        $this->load->view('client_view',$data);
        $this->load->view('include/footer');
    }
    
    public function addClient(){
        //load the view
        //get form data
        //add to db
       $rules = array(
                   array('field'=>'cname', 'label'=>'Client Name', 'rules'=>'required'),
                  array('field'=>'caddress', 'label'=>'Client Address', 'rules'=>'required'),
                   array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
               );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Add Client";
            $this->load->view('include/header',$header_data);
            $this->load->view('add_clientForm');
            $this->load->view('include/footer');
        }
        else{
            $count = $this->Client->count();
            $cid = (string) $count++;
            $id = str_pad($cid, 11, '0', STR_PAD_LEFT);
            $clientRecord=array('clientID'=>$id,'client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->create($clientRecord);
            redirect('knoxville/viewClients');
        }
    }
    
    public function updateClient($clientID){
        $data['clientID']=$clientID;
        $condition = array('clientID' => $clientID);
        $oldRecord = $this->Client->read($condition);
        foreach($oldRecord as $o){
            $data['cname'] = $o['client_name'];
            $data['caddress'] = $o['address'];
            $data['cnum'] = $o['contact_no'];
        }
        $rules = array(
                    array('field'=>'cname', 'label'=>'Client Name', 'rules'=>'required'),
                    array('field'=>'caddress', 'label'=>'Client Address', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Update Clients";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_clientForm',$data);
            $this->load->view('include/footer');
        }
        else{
            $newRecord=array('clientID'=>$clientID,'client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->update($newRecord);
            redirect('knoxville/viewClients');
        }
    }
    
    public function delClient($clientID){
        $where_array = array('clientID'=>$clientID);
        $this->Client->del($where_array);
        redirect('knoxville/viewClients');
    }
    
    public function addOrder (){ 
    
     $header_data['title'] = "Add Orders";
     
     $rules = array(
                    array('field'=>'clientid', 'label'=>'Client', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'time', 'rules'=>'required'),
                    array('field'=>'duedate', 'label'=>'Due date', 'rules'=>'required')
                );
                
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $result_array = $this->Client->read();
            $data['clients'] = $result_array;
            $this->load->model('item_model','Item');
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('add_orders',$data);
            $this->load->view('include/footer');
        }
        else{
            $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }
                 
                 $last=$this->Order->count();
                 $uid = (string) $last++;
                 $id = date("ymd").'-'.substr(str_pad($uid, 4, '0', STR_PAD_LEFT),-4);
                 $orderRecord=array('orderID'=>$id,'clientID'=>$_POST['clientID'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$this->session->userdata('userID'));
                 $this->Order->create($orderRecord);
                 
                 $orderID=$this->Order->getLastRecordID();
                 // $orderID = $orderID['orderID'];
                 $items=$_POST['itemList'];
                 $price=$_POST['price'];
                 $quantity=$_POST['quantity'];
                 for($x = 0; $x<=$count; $x++){
                     if($items[$x] != NULL){
                        $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['trans']);   
                        $this->Transaction->create($transRecord);
                        if($_POST['trans'] == 'Purchased'){
                            $this->Item->subtractStocks($quantity[$x], $items[$x]);
                        }
                     }
                 }
            }
        //redirect('knoxville/viewTransaction/'.$orderID); 
        }
    }
    public function viewQuote($quoteID){
        $data['quoteId']=$quoteID;
        $condition = array('quoteID' =>$quoteID);
        $Record = $this->clientQuote->read($condition);
        foreach($Record as $o){

            $data['quoteID'] = $o['quoteID']; 
            $data['clientID'] = $o['clientID'];
            $data['date'] = $o['date'];
            $data['time'] = $o['time'];
            $data['due'] = $o['due'];
        }
        $rules = array(
                    array('field'=>'quoteID', 'label'=>'User ID', 'rules'=>'required'),
                    array('field'=>'clientID', 'label'=>'Password', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'Full Name', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'Birthdate', 'rules'=>'required'),
                    array('field'=>'due', 'label'=>'Email', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $title['title']="View Quote";
            $this->load->view('include/header',$title);
            $this->load->view('quote_view',$data);
            $this->load->view('include/footer');
        }
        else{
         $last=$this->Order->count();
                 $uid = (string) $last++;
                 $id = date("ymd").'-'.substr(str_pad($uid, 4, '0', STR_PAD_LEFT),-4);
                 $orderRecord=array('orderID'=>$id,'clientID'=>$_POST['clientid'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$this->session->userdata('userID'));
                 $this->Order->create($orderRecord);
            redirect('knoxville/viewOrders');
     }        
    }
    /*public function QuoteToPurchase($quoteID){
        $header_data['title'] = "Add Orders";
     
     $rules = array(
                    array('field'=>'clientid', 'label'=>'Client', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'time', 'rules'=>'required'),
                    array('field'=>'duedate', 'label'=>'Due date', 'rules'=>'required')
                );
                
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $result_array = $this->Client->read();
            $data['clients'] = $result_array;
            $this->load->model('item_model','Item');
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('quote_view',$data);
            $this->load->view('include/footer');
        }
        else{
            $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }
                 
                 $last=$this->Order->count();
                 $uid = (string) $last++;
                 $id = date("ymd").'-'.substr(str_pad($uid, 4, '0', STR_PAD_LEFT),-4);
                 $orderRecord=array('orderID'=>$id,'clientID'=>$_POST['clientid'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$this->session->userdata('userID'));
                 $this->Order->create($orderRecord);
                 
                 $orderID=$this->Order->getLastRecordID();
                 // $orderID = $orderID['orderID'];
                 $items=$_POST['itemList'];
                 $price=$_POST['price'];
                 $quantity=$_POST['quantity'];
                 
                 for($x = 0; $x<$count; $x++){
                    if($items[$x] != NULL){
                        $purchaseRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x]);   
                        $this->purchase->create($purchaseRecord);
                       //if($_POST['trans'] == 'Purchased'){
                        //  $this->Item->subtractStocks($quantity[$x], $items[$x]);
                       // }
                    }
                 }
            }    
             redirect('knoxville/viewOrders'); 
        }
             
    }*/

    public function addQuote(){ 
    
     $header_data['title'] = "Add Orders";
     /*$rules = array(
     
                    array('field'=>'clientid', 'label'=>'Client', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'time', 'rules'=>'required'),
                    array('field'=>'duedate', 'label'=>'Due date', 'rules'=>'required')
                );
                
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){*/
            $result_array = $this->Client->read();
            $data['clients'] = $result_array;
            $this->load->model('item_model','Item');
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('add_quote',$data);
            $this->load->view('include/footer');
        //}
       // else{
            $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }
                 
                 $last=$this->clientQuote->count();
                 $uid = (string) $last++;
                 $id = date("ymd").'-'.substr(str_pad($uid, 4, '0', STR_PAD_LEFT),-4);
                 $quoteRecord=array('quoteID'=>$id,'clientID'=>$_POST['clientID'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$this->session->userdata('userID'));
                 $this->clientQuote->create($quoteRecord);
                 
                 $quoteID=$this->clientQuote->getLastRecordID();
                 // $orderID = $orderID['orderID'];
                 $items=$_POST['itemList'];
                 $price=$_POST['price'];
                 $quantity=$_POST['quantity'];
                 for($x = 0; $x<=$count; $x++){
                     if($items[$x] != NULL){
                        $Quote=array('quoteID'=>$quoteID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x]);   
                        $this->quote->create($Quote);
                        //if($_POST['trans'] == 'Purchased'){
                           // $this->Item->subtractStocks($quantity[$x], $items[$x]);
                        //}
                     }
                     redirect('knoxville/viewOrders'); 
                 }
            }
           
        //}
    }
    public function addPurchasedd($quoteID=null){ 
    
     $header_data['title'] = "Add Orders";
     
    $rules = array(
                    array('field'=>'clientid', 'label'=>'Client', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'time', 'rules'=>'required'),
                    array('field'=>'duedate', 'label'=>'Due date', 'rules'=>'required')
                );
                
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            if(isset($quoteID)){
            $data['quoteID'] = $quoteID;
            $condition = array('quoteID'=>$quoteID);
            $result_array = $this->clientQuote->read($condition);
            $data['quote'] = $result_array;
            $Qrec = $this->quote->read($condition);
            $data['Qrec'] = $Qrec;
            foreach ($result_array as $s)
                $clientID = $s['clientID'];
            $condition = array('clientID'=>$clientID);
            $result_array = $this->Client->read($condition);
            $data['clients'] = $result_array;
            $this->load->model('item_model','Item');
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('add_purchased',$data);
            $this->load->view('include/footer');
            }
            else{
            $data['quoteID'] = NULL;
            $result_array = $this->Client->read();
            $data['clients'] = $result_array;
            $this->load->model('item_model','Item');
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('add_purchased',$data);
            $this->load->view('include/footer');
             }
            }
        else{
            $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }
                 $user = $this->session->userdata('userID');
                 $last=$this->Order->count();
                 $uid = (string) $last++;
                 $id = date("ymd").'-'.substr(str_pad($uid, 4, '0', STR_PAD_LEFT),-4);
                 $orderRecord=array('orderID'=>$id,'clientID'=>$_POST['clientid'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$user);
                 $this->Order->create($orderRecord);
                 
                 $orderID=$this->Order->getLastRecordID();
                 // $orderID = $orderID['orderID'];
                 $items=$_POST['itemList'];
                 $price=$_POST['price'];
                 $quantity=$_POST['quantity'];
                 
                 for($x = 0; $x<$count; $x++){
                    if($items[$x] != NULL){
                        $purchaseRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time']);   
                        $this->purchase->create($purchaseRecord);
                       //if($_POST['trans'] == 'Purchased'){
                        //  $this->Item->subtractStocks($quantity[$x], $items[$x]);
                       // }
                    }
                 }
            }    
            redirect('knoxville/viewOrders'); 
        }
    }
    public function returnItem($orderID){
    $rules = array(
                    
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                );
                
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $data['orderID']=$orderID;
            $condition = array('orderID' => $orderID);
            $orderRec = $this->purchase->read($condition);
            $returnRec = $this->return->read($condition);
            $data['order'] = $orderRec;
            $data['return'] = $returnRec;
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $header_data['title'] = "Return";
            $this->load->view('include/header',$header_data);
            $this->load->view('return_view',$data);  
     }
       else{
        $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }               
               $items=$_POST['itemList'];
             
                 $quantity=$_POST['quantity'];
                 
                 for($x = 0; $x<$count; $x++){
                    if($items[$x] != NULL){
                        $returnRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'reason'=>'Defective Item');   
                        if($_POST['reason']=='Defective Item')
                        {
                            $defect=array('itemID'=>$items[$x],'quantity'=>$quantity[$x]);
                            $this->Defective->create($defect);
                        }
                        $this->return->create($returnRecord);
                    }

                 }
        }
       redirect('knoxville/viewTransaction/'.$orderID);
     } 
    }
    
    public function delOrder($orderID){
        $where_array = array('orderID'=>$orderID);
        $this->Order->del($where_array);
        redirect('knoxville/viewOrders');
    }
    
    public function viewOrders(){
        $result_array = $this->clientQuote->read();
        $data['client_quote'] = $result_array; 
        $result_array = $this->Order->read();
        $data['orders'] = $result_array;
        $result_array = $this->Client->read();
        $data['clients'] = $result_array;

        //$result_array = $this->Client->read();
        //$data['clients'] = $result_array;
        $header_data['title'] = "View Sales";
        $this->load->view('include/header',$header_data);
        $this->load->view('order_view',$data);
        $this->load->view('include/footer');
    }
    public function viewTransaction($orderID){
        $condition = array('orderID' => $orderID);
        $orderRec = $this->Order->read($condition);
        $returnRec = $this->return->read($condition);
        $data['shipment'] = $this->Shipment->read($condition);
        $data['shipStat'] = $this->ShipStatus->read($condition);
        $data['orderID'] = $orderID;
        if($orderRec!=false){
            foreach($orderRec as $o){
                $data['orderID'] = $o['orderID'];
                $data['clientID']  = $o['clientID'];
                $data['date']  = $o['date'];
                $data['time']  = $o['time'];
                $data['due']  = $o['due'];
            }
        }
        
        $data['returnI'] = $returnRec;
        $data['purchased'] = $this->purchase->read($condition);
        $data['items'] = $this->Item->read();
        $data['deliverer'] = $this->Deliverer->read();
        $header_data['title'] = "Order#$orderID: Order Details";
        $this->load->view('include/header',$header_data);
        $this->load->view('order_details_view',$data);
        $this->load->view('include/footer');
    }
    
    public function updateTransaction($transID){
        $data['transID']=$transID;
        $condition = array('transID' => $transID);
        $oldRecord = $this->Transaction->read($condition);
        if($oldRecord != false){
            foreach($oldRecord as $o){
                $data['price'] = $o['unit_price'];
                $data['qty'] = $o['quantity'];
                $orderID = $o['orderID'];
                $itemID = $o['itemID'];
            }
        }
        $condition = array('itemID'=>$itemID);
        $itemRec=$this->Item->read($condition);
        if($itemRec != false){
            foreach($itemRec as $i){
                $data['item_desc'] = $i['item_desc'];
            }
        }
        $rules = array(
                    array('field'=>'price', 'label'=>'Price', 'rules'=>'required'),
                    array('field'=>'qty', 'label'=>'Quantity', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Update Transaction";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_transForm',$data);
            $this->load->view('include/footer');
        }
        else{
            $newRecord=array('unit_price'=>$_POST['price'],'quantity'=>$_POST['qty']);
            $this->Transaction->update($newRecord, $transID);
            redirect('knoxville/viewTransaction/'.$orderID);
        }
    }
    
    public function delTransaction($transID, $orderID){
        $where_array = array('transID'=>$transID);
        $this->Transaction->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('knoxville/viewTransaction/'.$orderID);
    }
    
    public function addPurchase($orderID){
        $data['orderID']=$orderID;
        $header_data['title'] = "Purchase";
        $condition = array('orderID'=>$orderID);
        $TransRec = $this->Transaction->read($condition);
        $data['trans'] = $TransRec;
        $condition = '(orderID = "'.$orderID.'" and status = "Quoted")';
        $QRec = $this->Transaction->read($condition);
        $data['Qrec'] = $QRec;
        $itemsRec = $this->Item->read();
        $data['items'] = $itemsRec;
         $this->load->view('include/header',$header_data);
         $this->load->view('add_purchase',$data);
         $this->load->view('include/footer');
        $count = 0; 
         if(!empty($_POST['itemList'])) {
             foreach($_POST['itemList'] as $check) {
                $count++;
             }
             $items=$_POST['itemList'];
             $price=$_POST['price'];
             $quantity=$_POST['quantity'];
             for($x = 0; $x<=$count; $x++){
                 if($items[$x] != NULL){
                     $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>"Purchased");   
                     $this->Transaction->create($transRecord);
                     $this->Item->subtractStocks($quantity[$x], $items[$x]);
                 }
             }
             redirect('knoxville/viewTransaction/'.$orderID.'');
         }
        
        
    }
    
    public function addRefund($orderID){
        $data['orderID']=$orderID;
        $header_data['title'] = "Refund";
        $condition = array('orderID'=>$orderID);
        $TransRec = $this->Transaction->read($condition);
        $data['trans'] = $TransRec;
        $condition = '(orderID = "'.$orderID.'" and status = "Purchased")';
        $PRec = $this->Transaction->read($condition);
        $data['Prec'] = $PRec;
        $itemsRec = $this->Item->read();
        $data['items'] = $itemsRec;
         $this->load->view('include/header',$header_data);
         $this->load->view('add_refundForm',$data);
         $this->load->view('include/footer');
        $count = 0; 
         if(!empty($_POST['itemList'])) {
             foreach($_POST['itemList'] as $check) {
                $count++;
             }
             $items=$_POST['itemList'];
             $price=$_POST['price'];
             $quantity=$_POST['quantity'];
             $trans=$_POST['trans'];
             for($x = 0; $x<=$count; $x++){
                 if($items[$x] != NULL){
                     $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$trans[$x]);   
                     $this->Transaction->create($transRecord);
                 }
             }
             redirect('knoxville/viewOrders');
         }
        
        
    }
    public function addSched($orderID){
        $data['orderID']=$orderID;
        $header_data['title'] = "Schedule For Delivery";
        $deliverer=$this->Deliverer->read();
        $data['deliverer'] = $deliverer;
         $rules = array(
                    array('field'=>'deliverer', 'label'=>'Assigned Personnel', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('include/header',$header_data);
            $this->load->view('add_schedForm',$data);
            $this->load->view('include/footer');
        }
        else{
        $ShipRecord=array('delivererID'=>$_POST['deliverer'],'orderID'=>$orderID,'MOP'=>$_POST['mop']);
        $this->Shipment->create($ShipRecord);
        $shipID=$this->Shipment->getLastRecordID();
        $ShipStatus=array('orderID'=>$orderID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>'Scheduled');
        $this->ShipStatus->create($ShipStatus);
        redirect('knoxville/viewTransaction/'.$orderID.'');
        }
    }

    public function addDeliveryStatus($orderID){
        $header_data['title'] = "Schedule For Delivery";
        $condition = array('orderID'=>$orderID);
        $orderRec = $this->Order->read($condition);
        $data['orderID'] = $orderID;
        if($orderRec != false){
             foreach($orderRec as $o){
                $clientID = $o['clientID'];
            }
        }
        $condition = array('clientID' => $clientID);
        $clientRec = $this->Client->read($condition);
        if($clientRec != false){
         foreach($clientRec as $o){
            $data['cname'] = $o['client_name'];
            $data['cadd'] = $o['address'];
            $data['cnum'] = $o['contact_no'];
        }
         }   
         $rules = array(
                   array('field'=>'status', 'label'=>'Status', 'rules'=>'required'),
                   array('field'=>'location', 'label'=>'Location', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('include/header',$header_data);
            $this->load->view('order_details_view',$data);
           $this->load->view('include/footer');
       }
       else{
            $ShipStatus=array('orderID'=>$orderID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['status'],'location' => $_POST['location']);
            $this->ShipStatus->create($ShipStatus);
            redirect('knoxville/viewTransaction/'.$orderID.'');
        }
            
    }
    
    public function delDeliveryStatus($statusID, $orderID){
        $where_array = array('statusID'=>$statusID);
        $this->ShipStatus->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('knoxville/viewTransaction/'.$orderID);
    }
    
    public function updateDeliveryStatus($statusID, $orderID){
        $data['statusID']=$statusID;
        $data['orderID']=$orderID;
        $condition = array('statusID'=>$statusID);
        $oldRecord = $this->ShipStatus->read($condition);
        if($oldRecord != false){
            foreach($oldRecord as $o){
                $data['status'] = $o['status'];
                $data['date'] = $o['date'];
                $data['time'] = $o['time'];
                $data['location'] = $o['location'];
            }
        }
        $rules = array(
                    array('field'=>'status', 'label'=>'Status', 'rules'=>'required'),
                    array('field'=>'location', 'label'=>'Location', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'Date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'Time', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==false){
            $header_data['title']='Update Delivery Status';
            $this->load->view('include/header',$header_data);
            $this->load->view('update_DeliveryStatus',$data);
            $this->load->view('include/footer');
        }
        else{
            $ShipStatus=array('date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['status'],'location'=>$_POST['location']);
            $this->ShipStatus->update($ShipStatus,$statusID);
            redirect('knoxville/viewTransaction/'.$orderID.'');
        }
    }
    
    public function viewItems(){
        $result_array = $this->Item->read();     
        $items = $this->Item->read();     
        $data['item'] = $result_array;
        $result_array = $this->Stocks->read();     
        $stocks = $this->Stocks->read();     
        $data['stocks'] = $result_array; 
        $result_array = $this->Defective->read();     
        $data['defect'] = $result_array; 
        $orderID = $this->Order->getLastRecordID();
        $condition = array('orderID' => $orderID);
        $orders = $this->purchase->read($condition);
        $purchase = $this->purchase->read();
        $condition = array('orderID' => $orderID);
        if(!empty($orders)){
        foreach ($orders as $o) {
                $date = $o['date'];
                $time = $o['time'];
             }
         }
        $condition = "date <= '$date'";
        $stockdiff =  $this->Stocks->read($condition);
        if(!empty($items)){
            foreach ($items as $i) {
                $x=0;
                $total =0;
                $itemid = $i['itemID'];
                if(!empty($stockdiff)){
                    foreach($stockdiff as $d){

                            if($d['itemID'] == $itemid)
                            {
                            
                               $total = $total + $d['quantity'];
                            }
                    }
                }
                if(!empty($purchase)){

                     foreach($purchase as $p){
                        if($p['itemID'] == $itemid)
                        {
                               $total = $total - $p['quantity'];
                        }
                    }
                }
            $item[$itemid]=$total;
            }
        }
        $condition = "date >= '$date'";
        $stockdiff =  $this->Stocks->read($condition);
        $defective =  $this->Defective->read();
         foreach ($items as $i) {
                $itemid = $i['itemID'];
                $total=0;
                if($item[$itemid] <= 0)
                  $total = 0;
                if(!empty($stockdiff)){
                    foreach($stockdiff as $d){
                            if($d['itemID'] == $itemid)
                            {
                               if($d['time']>=$time) 
                               $total = $total + $d['quantity'];
                            }
                    }
                if(!empty($defective)){
                    foreach($defective as $d){
                            if($d['itemID'] == $itemid)
                            {
                               $total = $total + $d['quantity'];
                            }
                    }
                }
                $item[$itemid]=$total;
            }
        }
        $data['counter'] = $this->Item->count();
        $data['itemstocks'] = $item;
        $header_data['title'] = "View Inventory";
        $this->load->view('include/header',$header_data);
        $this->load->view('item_view',$data);
        $this->load->view('include/footer');
    }
    
    public function addItem(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'idesc', 'label'=>'Item Description', 'rules'=>'required'),
                    array('field'=>'price', 'label'=>'price', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Add Item";
            $this->load->view('include/header',$header_data);
            $this->load->view('add_itemForm');
            $this->load->view('include/footer');
        }
        else{
            $itemRecord=array('item_desc'=>$_POST['idesc'],'unit_price'=>$_POST['price']);
            $this->Item->create($itemRecord);
            redirect('knoxville/viewItems');
        }
    }

    public function addStocks(){
        //load the view
        //get form data
        //add to db
        date_default_timezone_set('Asia/Manila');
       $rules = array(
                    array('field'=>'stockID', 'label'=>'Stock ID', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'Date', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Add Stocks";
            $result_array = $this->Item->read();
            $data['items'] = $result_array;
            $this->load->view('include/header',$header_data);
            $this->load->view('add_stockForm',$data);
            $this->load->view('include/footer');
        }
     else{
             if(!empty($_POST['itemList'])) {
             foreach($_POST['itemList'] as $check) {
                $count++;
             }
            }
            $items=$_POST['itemList']; 
            $quantity=$_POST['quantity'];
                 for($x = 0; $x<=$count++; $x++){
                     if($items[$x] != NULL){
                        $stockRecord=array('stockID'=>$_POST['stockID'],'itemID'=>$items[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time' => date('H:i'));
                        $this->Stocks->create($stockRecord);
                    }
                   redirect('knoxville/viewItems');
                }
        }
    }

    public function delStock($stockID,$itemID){
        $where_array = array('stockID'=>$stockID,'itemID'=>$itemID);
        $this->Stocks->del($where_array);
        redirect('knoxville/viewItems');
    }
    
    public function delItem($itemID){
        $where_array = array('itemID'=>$itemID);
        $this->Item->del($where_array);
        redirect('knoxville/viewItems');
    }
    
    public function updateItem($itemID){
        $data['itemID']=$itemID;
        $condition = array('itemID' => $itemID);
        $oldRecord = $this->Item->read($condition);
        if($oldRecord != false){
            foreach($oldRecord as $o){
                $data['idesc'] = $o['item_desc'];
                $data['price'] = $o['unit_price'];
            }
        }
        $rules = array(
                    array('field'=>'idesc', 'label'=>'Item Description', 'rules'=>'required'),
                    array('field'=>'price', 'label'=>'Price', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Update Item";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_itemForm',$data);
            $this->load->view('include/footer');
        }
        else{
            $newRecord=array('itemID'=>$itemID,'item_desc'=>$_POST['idesc'],'unit_price'=>$_POST['price']);
            $this->Item->update($newRecord,$itemID);
            redirect('knoxville/viewItems');
        }
    }

    /*public function updateStocks($itemID){
        $data['itemID']=$itemID;
        $condition = array('itemID' => $itemID);
        $oldRecord = $this->Item->read($condition);
        if($oldRecord != false){
            foreach($oldRecord as $o){
                $data['idesc'] = $o['item_desc'];
                $data['price'] = $o['unit_price'];
            }
        }
        $rules = array(
                    array('field'=>'idesc', 'label'=>'Item Description', 'rules'=>'required'),
                    array('field'=>'price', 'label'=>'Price', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Update Item";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_itemForm',$data);
            $this->load->view('include/footer');
        }
        else{
            $newRecord=array('itemID'=>$itemID,'item_desc'=>$_POST['idesc'],'unit_price'=>$_POST['price']);
            $this->Item->update($newRecord,$itemID);
            redirect('knoxville/viewItems');
        }
    }*/
    
    public function viewDeliverer(){
        $result_array = $this->Deliverer->read();
        
        $data['deliverer'] = $result_array; 
        $header_data['title'] = "View Deliverers";
        $id =  $this->Deliverer->count();
        $data['id'] = (string) $id++;
        $this->load->view('include/header',$header_data);
        $this->load->view('deliverer_view',$data);
        $this->load->view('include/footer');
    }
    
    public function addDeliverer(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'vehicle', 'label'=>'Vehicle', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required'),
                    array('field'=>'assigned', 'label'=>'Assigned Personnel', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $header_data['title'] = "Add Deliverer";
            $this->load->view('include/header',$header_data);
            $this->load->view('add_delivererForm');
            $this->load->view('include/footer');
        }
        else{
            $delivererRecord=array('delivererID'=>$_POST['delivererID'],'vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->create($delivererRecord);
            redirect('knoxville/viewDeliverer');
        }
    }
    
    public function updateDeliverer($delivererID){
        $data['delivererID']=$delivererID;
        $condition = array('delivererID' => $delivererID);
        $oldRecord = $this->Deliverer->read($condition);
        if($oldRecord != false){
            foreach($oldRecord as $o){
                $data['vehicle'] = $o['vehicle'];
                $data['cnum'] = $o['contact_no'];
                $data['assigned'] = $o['assigned'];
            }
        }
        $rules = array(
                    array('field'=>'vehicle', 'label'=>'Vehicle', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required'),
                    array('field'=>'assigned', 'label'=>'Assigned Personnel', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $title['title']="Update Deliverer";
            $this->load->view('include/header',$title);
            $this->load->view('update_delivererForm',$data);
            $this->load->view('include/footer');
        }
        else{
            $newRecord=array('delivererID'=>$delivererID,'vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->update($newRecord);
            redirect('knoxville/viewDeliverer');
        }
    }
    
    public function delDeliverer($delivererID){
        $where_array = array('delivererID'=>$delivererID);
        $this->Deliverer->del($where_array);
        redirect('knoxville/viewDeliverer');
    }
    public function changepass(){
        $userID =  $this->session->userdata('userID');
        $condition = array('userID' => $userID);
        $array = $this->SalesAgent->read($condition);
        if($array != false){
            foreach($array as $o){
                        $password = $o['password'];
                        $userID = $o['userID'];  
                        $fullname = $o['fullname'];  
                        $num = $o['contact_no'];  
                        $bday = $o['birthdate'];  
                        $email = $o['email'];  


            }
        }
        $rules = array(
                    array('field'=>'password', 'label'=>'New Password', 'rules'=>'required'),
                    array('field'=>'confirm_password', 'label'=>'New Password', 'rules'=>'required|matches[confirm_password]'),
                    array('field'=>'new_password', 'label'=>'Re-enter New Password', 'rules'=>'required')
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
            $result_array = $this->SalesAgent->read($condition);
            $data['d'] = $result_array;
            $header_data['title'] = "CHANGE PASSWORD";
            $this->load->view('include/header',$header_data);       
            $this->load->view('changepass',$data);
            $this->load->view('include/footer');
        }else{
            $user =  $this->session->userdata('userID');
            $change=array('userID'=>$userID,'password'=>$_POST['new_password'],'fullname'=>$fullname,'contact_no'=>$num,'birthdate'=>$bday,'email'=>$email);
            $this->SalesAgent->update($change);
            redirect('knoxville/viewSalesAgents');
        }
    }
    public function do_upload()
        {
            $type = explode('.', $_FILES["file"]["name"]);
            $type = strtolower($type[count($type)-1]);
            $url = "./assets/uploads/".uniqid(rand()).'.'.$type;
            if(in_array($type, array("jpg", "jpeg", "gif", "png")))
                if(is_uploaded_file($_FILES["file"]["tmp_name"]))
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$url))
                        return $url;
            return "";
        }
}
