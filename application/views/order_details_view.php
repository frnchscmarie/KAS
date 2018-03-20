<!DOCTYPE html>
<div class="tab-content">


  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/viewTransaction/'.$orderID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?>
<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Order Purchased Details</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />
          <div class="col-md-4" style="padding: 10px; text-align: center; margin-left: 250px;">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group has-feedback">
                                  <label><?php echo $orderID?></label>
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                  <label><?php echo $clientID?></label>
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
              
                                <div class="form-group has-feedback">
                                  <label><?php echo $date?></label>
                                  <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                                </div>
                      
                               <div class="form-group has-feedback">
                                 <label><?php echo $time?></label>
                                  <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                 <label><?php echo $due?></label>
                                  <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                </div>

                               
                                
            </form>
            </div>
              
            <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary"><a href="<?php echo base_url('knoxville/returnItem/'.$orderID);?>">Return Item</a></button>
                                    <button class="btn btn-success"><a href="">Schedule for delivery</a></button>
                                  </div>
                                </div>
            </div>

            </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>View Order Details</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />


<table class="table table-striped table-bordered">
<thead>
        <tr id="trHead">
          <th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Price <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>          
        </tr>
      </thead>
      <tbody>
        <?php
        $totalPrice = 0;
         
          foreach($purchased as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
            echo "<tr><td>";
            foreach($items as $i)
            {
              if ($t['itemID'] == $i['itemID'])
              echo $i['item_desc'];
            } 
            echo '</td><td>&#x20B1;'.number_format($t['unit_price']).'</td><td>'.$t['quantity'].'</td></tr>';
            //echo base_url('knoxville/delClient/'.c['clientID'])
            }

            echo '<p><b>Subtotal: &#x20B1;</b> '. number_format($totalPrice)."</p>";
        ?>
        
        
        
      </tbody>
    </table>

  </div>
</div>
</div>


  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>View Return Items</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />


<table class="table table-striped table-bordered">
<thead>
        <tr id="trHead">
          <th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>   
          <th>Date<span class="glyphicon glyphicon-sort" style="color: white;"></span></th>   
          <th>Reason<span class="glyphicon glyphicon-sort" style="color: white;"></span></th>          
        </tr>
      </thead>
      <tbody>
        <?php
        $totalPrice = 0;
         
         if($returnI != false){
          foreach($returnI as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
            echo "<tr><td>";
            foreach($items as $i)
            {
              if ($t['itemID'] == $i['itemID'])
              echo $i['item_desc'];
            } 
            echo '</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['reason'].'</td></tr>';
            //echo base_url('knoxville/delClient/'.c['clientID'])
            }
          }
          else{
            echo '<tr><div>No results found.</div></tr>';
          }
        ?>
        
        
        
      </tbody>
    </table>

  </div>
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