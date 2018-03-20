<!DOCTYPE html>
<div class="tab-content">
  
  <div class="right_col" role="main">
          <div class="">
   
    <div class="clearfix"></div>

  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Add Stocks</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addStocks','id="stocks"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addItem">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
                    <br />
<div class="col-md-6" style="padding: 10px; text-align: center; margin-left: 250px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
		
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="stocks" id="inputSuccess2" placeholder="Stock ID" name="stockID" value="<?php echo set_value('stockID'); ?>" id="stockID">
                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" for="stocks" id="inputSuccess2" placeholder="date"  name="date" value="<?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d'); ?>">
                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                      </div>


            <div class="search1">
                 Search: <input type="text" id="myInput" onkeyup="Deliverer()" placeholder="Type any value" title="Type ANY value" class="sround">
            </div><br/>

                      <div style="margin-left: -30px;">
                        <table class="table table-striped" id="myTable">
                                  <thead>
                                      <tr id="trHead">
                              <th><label class="thHead">Item Description</label></th>
                              <th>
                                <label class="thHead" for="quantity">Quantity</label>
                              </th>
                              <th>
                              <label class="thHead" for="itemList[]">ADD</th>
                            </tr>
                          </thead>
                            
                          <tbody>
                              <?php
                          $counter = 0;
                                  if($items != false){
                                      foreach($items as $c){  
                                      $counter++;
                                          echo '<tr><td>'.$c['item_desc'].'</td>
                                              <td class="col-sm-2">             
                                                  <input style="width: 100px;" type="number" form="stocks" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="0" disabled for/>
                                              </td>
                                              
                                              <td>
                                <input   style="margin: 15px;" type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle('."'items".$counter."'".', '."'quantity".$counter."'".')"  /></td>
                                              
                                              ';
                                              
                                                
                                      }
                                  }
                              ?>
                        
                      </tbody>
                    
                     </table>
                     </div>



                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="<?php echo base_url('knoxville/viewItems')?>" style="color: white;">Cancel</a></button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" value="submit" class="subUpdate">Submit</button>
                        </div>
                      </div>
                     
                      
  </form>
  </div>
  </div>
 
   </div>
  </div>

      </div>
       </div>

  </div>
    </div>

	
	
</body>
</html>