<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<?php if(!empty($taxs)){
    //echo '<pre>'; print_r($taxs); die;
    foreach($taxs as $tax){
        if($tax->coin == 'BTC'){
            
            if($tax->type == 1){
                $buy_btc_tax = $tax->tax/100;
                $buy_btc_comision = $tax->commision/100;
                $buy_btc_charge = $tax->charges;
            }else{
                $sell_btc_tax = $tax->tax/100;
                $sell_btc_comision = $tax->commision/100;
                $sell_btc_charge = $tax->charges;
            }
            
        }elseif($tax->coin == 'LTC'){
            
            if($tax->type == 1){
                $buy_ltc_tax = $tax->tax/100;
                $buy_ltc_comision = $tax->commision/100;
                $buy_ltc_charge = $tax->charges;
            }else{
                $sell_ltc_tax = $tax->tax/100;
                $sell_ltc_comision = $tax->commision/100;
                $sell_ltc_charge = $tax->charges;
            }

        }elseif($tax->coin == 'BCH'){
            
            if($tax->type == 1){
                $buy_bch_tax = $tax->tax/100;
                $buy_bch_comision = $tax->commision/100;
                $buy_bch_charge = $tax->charges;
            }else{
                $sell_bch_tax = $tax->tax/100;
                $sell_bch_comision = $tax->commision/100;
                $sell_bch_charge = $tax->charges;
            }

        }elseif($tax->coin == 'ETH'){
            
            if($tax->type == 1){
                $buy_eth_tax = $tax->tax/100;
                $buy_eth_comision = $tax->commision/100;
                $buy_eth_charge = $tax->charges;
            }else{
                $sell_eth_tax = $tax->tax/100;
                $sell_eth_comision = $tax->commision/100;
                $sell_eth_charge = $tax->charges;
            }

        }elseif($tax->coin == 'XRP'){
            
            if($tax->type == 1){
                $buy_xrp_tax = $tax->tax/100;
                $buy_xrp_comision = $tax->commision/100;
                $buy_xrp_charge = $tax->charges;
            }else{
                $sell_xrp_tax = $tax->tax/100;
                $sell_xrp_comision = $tax->commision/100;
                $sell_xrp_charge = $tax->charges;
            }

        }elseif($tax->coin == 'ADA'){
            
            if($tax->type == 1){
                $buy_ada_tax = $tax->tax/100;
                $buy_ada_comision = $tax->commision/100;
                $buy_ada_charge = $tax->charges;
            }else{
                $sell_ada_tax = $tax->tax/100;
                $sell_ada_comision = $tax->commision/100;
                $sell_ada_charge = $tax->charges;
            }

        }else{
            
        }
    }
   }else{
       
   } //echo $buy_ada_comision; die; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div>
            <h1>
                <?php 
                    if(isset($_SESSION['admin'])){
                        echo 'Welcome to the Admin';
                    }elseif(isset($_SESSION['poweruser'])){
                         echo 'Welcome to the Poweruser';
                    }else{
                        echo 'Welcome to the Operator';
                    } ?>
            </h1>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php
                            if ($total_data && $total_data->num_rows()) {
                                echo $total_data->num_rows();
                            } else {
                                echo '0';
                            }
                            ?></h3>
                        <p>Total User</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="<?php // echo base_url('admin/Users?users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- ./row -->
    </section>
    <!-- Main content -->
    <section class="content-header">
    <div class="row">
        <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cryptocurrency Market Capitalizations</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" style="font-size: 18px;">
                  <thead>
                  <tr>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Market Cap</th>
                    <th>Actual Price</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $i = 1;
                      if($data){
                      foreach($data as $row){ ?>
                  <tr>
                    <td><?php echo $i;?></a></td>
                    <td><?php echo $row->name;?></td>
                    <td><span class="label label-success"><?php echo $row->price_inr;?></span></td>
                    <td><?php echo $row->market_cap_inr;?></td>
                    <td><?php echo round($row->price_inr); ?></td>
                    
                    <?php if($row->symbol == 'BTC'){
                        
                        //BUY Calculate for BTC
                        $buy_total_tax = round($row->price_inr*$buy_btc_tax, 2);
                        $buy_total_commision = round($row->price_inr*$buy_btc_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_btc_charge;
                        
                        //SELL Calculate for BTC
                        $sell_total_tax = round($row->price_inr*$sell_btc_tax, 2);
                        $sell_total_commision = round($row->price_inr*$sell_btc_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_btc_charge;
                        
                    }elseif($row->symbol == 'LTC'){
                        
                        //BUY Calculate for LTC
                        $buy_total_tax = round($row->price_inr*$buy_ltc_tax, 2);
                        $buy_total_commision = round($row->price_inr*$buy_ltc_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_ltc_charge;
                        
                        //SELL Calculate for LTC
                        $sell_total_tax = round($row->price_inr*$sell_ltc_tax, 2);
                        $sell_total_commision = round($row->price_inr*$sell_ltc_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_ltc_charge;
                        
                    }elseif($row->symbol == 'BCH'){
                        
                        //BUY Calculate for BCH
                        $buy_total_tax = round($row->price_inr*$buy_bch_tax, 2);
                        $buy_total_commision = round($row->price_inr*$buy_bch_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_bch_charge;
                        
                        //SELL Calculate for BCH
                        $sell_total_tax = round($row->price_inr*$sell_bch_tax, 2);
                        $sell_total_commision = round($row->price_inr*$sell_bch_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_bch_charge;
                        
                    }elseif($row->symbol == 'ETH'){
                        
                        //BUY Calculate for ETH
                        $buy_total_tax = round(($row->price_inr*$buy_eth_tax)/100, 2);
                        $buy_total_commision = round($row->price_inr*$buy_eth_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_eth_charge;
                        
                        //SELL Calculate for ETH
                        $sell_total_tax = round(($row->price_inr*$sell_eth_tax)/100, 2);
                        $sell_total_commision = round($row->price_inr*$sell_eth_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_eth_charge;
                        
                    }elseif($row->symbol == 'XRP'){
                        
                        //BUY Calculate for XRP
                        $buy_total_tax = round($row->price_inr*$buy_xrp_tax, 2);
                        $buy_total_commision = round($row->price_inr*$buy_xrp_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_xrp_charge;
                        
                        //SELL Calculate for XRP
                        $sell_total_tax = round($row->price_inr*$sell_xrp_tax, 2);
                        $sell_total_commision = round($row->price_inr*$sell_xrp_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_xrp_charge;
                        
                    }elseif($row->symbol == 'ADA'){
                        
                        //BUY Calculate for ADA
                        $buy_total_tax = round($row->price_inr*$buy_ada_tax, 2);
                        $buy_total_commision = round($row->price_inr*$buy_ada_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_ada_charge;
                        
                        //SELL Calculate for ADA
                        $sell_total_tax = round($row->price_inr*$sell_ada_tax, 2);
                        $sell_total_commision = round($row->price_inr*$sell_ada_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_ada_charge;
                        
                    }else{
                        //$comision = '';
                    } ?>
                    <td> <i class="fa fa-rupee"></i> <?php echo round($row->price_inr + $buy_total_value,2); ?></td>
                    <td> <i class="fa fa-rupee"></i> <?php echo round($row->price_inr - $sell_total_value,2); ?></td>
                </tr>
                      <?php $i++; } }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
</div><!-- /.row -->   
</section>

