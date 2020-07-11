<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jst extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->library('session');

	 		 // kondisi
	        $this->varX = array(array());

	        // target
	        $this->varTarget = array();


	        $this->data_input = 0;
	        $this->data_hidden = 0;
	        $this->data_output = 0;

	        // learning rate
	        $this->alpha = 0.96;

	        // maximum loop
	        $this->epoch = 1500;

	        // target error
	        $this->target_error = 0.00089;


	        // last error
	        $this->total_error = 0;

	        
	        $this->bobotV = array(array());
	        $this->session->set_userdata('sess_bobotV', $this->bobotV);

	        $this->bobotV0 = array();
	        $this->session->set_userdata('sess_bobotV0', $this->bobotV0);

	        $this->bobotW = array(array());
	        $this->session->set_userdata('sess_bobotW', $this->bobotW);

	        $this->bobotW0 = array();

	        $this->session->set_userdata('sess_bobotW0', $this->bobotW0);

	        $this->varX          =  array(
	                                    array(0.54, 0.58, 0.65, 0.61 ),
	                                    array(0.81, 0.90, 0.80, 0.61),
	                                    array(0.37, 0.54, 0.80, 0.39),
	                                    array(0.59, 0.64, 0.75, 0.39),
	                                    array(0.81, 0.71, 0.50, 0.75),
	                                    array(0.63, 0.64, 0.80, 0.90),
	                                    array(0.50, 0.64, 0.65, 0.54),
	                                    array(0.68, 0.84, 0.85, 0.83),
	                                    array(0.72, 0.80, 0.70, 0.61),
	                                    array(0.81, 0.80, 0.75, 0.83),

	                                );
	        $this->varTarget    =  array(0.57, 0.90, 0.49, 0.60, 0.72, 0.78, 0.57, 0.90, 0.78, 0.89);
	        
	        
	        $this->jml_input       = count($this->varX[0]);
	        $this->jml_hidden      = 3;
	        $this->jml_output      = 1;

	        $this->bobotV     = array(
	        						array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009)),
	        						array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009)),
	        						array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009), $this->float_rand(0.001,0.009)), 
	        						array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009))
	        					);

	        $this->bobotV0    = array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009));
	        $this->bobotW     = array(array($this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009),$this->float_rand(0.001,0.009)));
	        $this->bobotW0    = array($this->float_rand(0.001,0.009));

	        $this->eps = 2.71828182846;


	        $Aw      = array(array());
	        $Aw0     = array(array());

	        $bobotW  = array(array());
	        $bobotW0 = array(array());
	        $bobotV  = array(array());
	        $bobotV0 = array(array());

	        $this->uji  = array(
        			array(0.60, 0.60, 0.56, 0.20),
        			array(0.90, 0.50, 0.67, 0.40),
        			array(0.85, 0.43, 0.79, 0.30),
        			array(0.80, 0.87, 0.61, 0.80),
        			array(0.70, 0.47, 0.27, 0.30),
        			array(0.80, 0.73, 0.10, 0.40),
        			array(0.10, 0.73, 0.84, 0.70),
        			array(0.50, 0.37, 0.50, 0.70),
        			array(0.70, 0.67, 0.56, 0.30 ),
        			array(0.70, 0.83, 0.56, 0.50 )
        		);

	        $this->ujiTarget =  array(0.48, 0.64, 0.60, 0.90, 0.33, 0.49, 0.61, 0.40, 0.58, 0.74);
	        
	 	}

	public function index()
	{

	    $data['alpha']			= $this->alpha;
        $data['epoch']			= $this->epoch;
        $data['target_error']	= $this->target_error;

        $data['varX']			= $this->varX;
        $data['varTarget']		= $this->varTarget;
        

        $data['jml_input']		= $this->jml_input;
        $data['jml_hidden']		= $this->jml_hidden;
        $data['jml_output']		= $this->jml_output;

        $data['bobotV0']  		= $this->bobotV ;


        $data['bobotV0']  		= $this->bobotV0;

        $data['bobotW']   		= $this->bobotW;
 		$data['bobotW0']  		= $this->bobotW0;


        $data['epsilon']  		= $this->eps;
        
		$this->load->view('header', $data);
		$this->load->view('jst_view', $data);
		$this->load->view('footer', $data);
	}

	function float_rand($Min, $Max, $round=0){
    	$min = 0;
		$max = 0;
	    if ($min>$Max) { $min=$Max; $max=$Min; }
	        else { $min=$Min; $max=$Max; }
	    $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
	    if($round>0)
	        $randomfloat = round($randomfloat,$round);
	 
	    return $randomfloat;
	}

	function pelatihan(){
        $dataX[][] = $this->varX;
        $dataT[][] = $this->varTarget;
        $jml_data = count($this->varX);

        $loop 	 = 0;
        $maxloop = $this->epoch;

        $hasilZ  = array();
     	
        $this->load->view('header');
    ?>

    <div class="container">
    <h1>Neural Network Backpropagation <small> (Untuk  Memprediksi Prestasi Siswa) </small></h1>

    <center><h3>Proses Pelatihan <br> <small> Dengan Ketentuan Sebagai Berikut :</small></h3></center>

    <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	       	<tr>
	       		<td>Learning Rate </td>
	       		<td>Epoch </td>
	       		<td>Target Error </td>
	       		<td>Arsitektur Model </td>
	       	</tr>
	       	<tr>
	       		<td><?php echo $this->alpha; ?></td>
	       		<td><?php echo $this->epoch; ?> </td>
	       		<td><?php echo $this->target_error; ?> </td>
	       		<td>4 - 3 - 1 </td>
	       	</tr>
	        <tr>
	            <th>Bobot V</th>
	            <th>Bobot Bias Ke Hidden</th>
	            <th>Bobot W</th>
	            <th>Bobot Bias Ke Output</th>
	        </tr>
	        <tr>
	        	<td>
			        <?php
			          for ($i=0; $i < count($this->bobotV); $i++) {           
			        		for ($j=0; $j < count($this->bobotV[$i]); $j++) { 
			              		echo "V".($i+1)."".($j+1)." = ".$this->bobotV[$i][$j]."<br>"; 
			              	}
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($this->bobotV0); $i++) {           
			              	echo "V0".($i+1)." = ".$this->bobotV0[$i]."<br>"; 
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($this->bobotW); $i++) {           
			        		for ($j=0; $j < count($this->bobotW[$i]); $j++) { 
			              		echo "W".($i+1)."".($j+1)." = ".$this->bobotW[$i][$j]."<br>"; 
			              	}
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($this->bobotW0); $i++) {           
			              	echo "W0".($i+1)." = ".$this->bobotW0[$i]."<br>"; 
			          }
			        ?>	
	        	</td>
	        </tr>
	        
	    </table>
   

    <?php
    do{
    ?>
    <div class='col-md-6 col-xs-12'>
    <center>
     <table  class="table table-striped table-bordered " cellspacing="0"  style="width:90%; font-size:12px;">
        <thead>
        	<tr class='success'>
        		<td colspan="5" class='text-center' style="font-size:15px; color:#000;"><b>Iterasi Ke <?php echo $loop+1; ?></b></td>
        	</tr>
	        <tr>
	            <th>X1 </th>
	            <th>X2</th>
	            <th>X3 </th>
	            <th>X4</th>
	            <th>Perhitungan</th>
	        </tr>
        </thead>

        <tbody>
            
    <?php

            for($h=0; $h<$jml_data; $h++){
           		echo "<tr>";
	            echo "<td>".$this->varX[$h][0]."</td>";
	            echo "<td>".$this->varX[$h][1]."</td>";
	            echo "<td>".$this->varX[$h][2]."</td>";
	            echo "<td>".$this->varX[$h][3]."</td>";

	            echo "<td style='width:300px;'>";

                $z = range(0, count($this->varX)-1);
    ?>
				<center><button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" 
				data-target=<?php echo "#collapse".$loop."".$h; ?> aria-expanded="false" aria-controls="collapseExample">
				  Tampilkan data perhitungan Z dan Y
				</button>
				<br>
				<div class="collapse" id=<?php echo "collapse".$loop."".$h; ?> style='margin-top:20px;'>
				  
				  
    <?php
                echo "<table class='table table-striped table-bordered ' style='font-size:10px !important;'>
                <tr class='active'><td>Z_in</td><td>Zj</td></tr>";
                for($j=0; $j<$this->jml_hidden; $j++){
                    //itung sigma xi vij
                    $jum_xv = 0;
                    
                    for($i=0; $i<$this->jml_input; $i++){
                        $tmp= $this->varX[$h][$i]*$this->bobotV[$i][$j];
                        
                        $jum_xv+=$tmp;
                    }
                    
                    $z_in[$j] = $this->bobotV0[$j]+$jum_xv;


                    $konversi_ke_minus = 0 - $z_in[$j];
                    $hitung_epsilon=  pow($this->eps, $konversi_ke_minus);

                    $z[$j] = 1/(1+$hitung_epsilon);

                    echo "<tr class='info'>";
                    echo "<td>Z_in<sub>".($j+1)."</sub> = ".$z_in[$j]."</td>";

                    echo "<td>Z<sub>".($j+1)."</sub> = ".$z[$j]."</td>";
                    echo "</tr>";
                    
                }

                echo "</table>";
                
                
                //~ itung y_in dan y     (output)
                echo "<table class='table table-striped table-bordered' style='font-size:10px !important;'>
                <tr class='active'><td>Y_in</td><td>Yj</td></tr>";
                for($k=0; $k<$this->jml_output; $k++){
                    $jum_zw=0;
                    for($j=0; $j<$this->jml_hidden ; $j++){
                        $tmp=$z[$j]*$this->bobotW[$k][$j];
                        $jum_zw=$jum_zw+$tmp;
                    }
                    $y_in[$k]=$this->bobotW0[$k]+$jum_zw;

                    $konversi_ke_minus = 0 - $y_in[$k];
                    $hitung_epsilon    =  pow($this->eps, $konversi_ke_minus);
                    
                    $y[$k] = 1/(1+$hitung_epsilon);
                    echo "<tr class='info'>";
                    echo "<td>Y_in<sub>".($k+1)."</sub> = ".$y_in[$k]."</td>";

                    echo "<td>Y<sub>".($k+1)."</sub> = ".$y[$k]."</td>";
                    echo "</tr>";
                }


                echo "</table>";
    ?>
				  
				</div>
				</center>

    <?php

                for($k=0; $k<$this->jml_output; $k++){
                    $error_y[$k]=($this->varTarget[$h]-$y[$k])*$y[$k]*(1-$y[$k]);
                    
                    
                    for($j=0; $j<$this->jml_hidden; $j++){
                        $Aw[$k][$j] = $this->alpha*$error_y[$k]*$z[$j];
                        $Aw0[$k] = $this->alpha*$error_y[$k];
                    }
                }

                echo "</td>";

               
                for($j=0; $j<$this->jml_hidden; $j++){
                    $tmp=0;
                    for($k=0; $k<$this->jml_output; $k++){
                        $tmp = $tmp + ($error_y[$k]*$this->bobotW[$k][$j]);
                        
                    }
                    
                    $error_in[$j]=$tmp;
                    
                    
                    $error_z[$j]=$error_in[$j]*($z[$j])*(1-$z[$j]);
 
                    for($i=0; $i<$this->jml_input; $i++){
                    
                        $Av[$i][$j]=$this->alpha*$error_z[$j]*$this->varX[$h][$i];
                    }
                    
                    $Av0[$j] = $this->alpha*$error_z[$j];
                    
                }

                
                
                
                for($j=0; $j<$this->jml_hidden; $j++){
                    for($k=0; $k<$this->jml_output; $k++){
                        $this->bobotW[$k][$j]=$this->bobotW[$k][$j]+$Aw[$k][$j];
                        $bobotW[$k][$j]      = $this->bobotW[$k][$j];    
                
                    }
                }

                
                for($k=0; $k<$this->jml_output; $k++){
                    $this->bobotW0[$k]=$this->bobotW0[$k]+$Aw0[$k];
                    $bobotW0[$k]      = $this->bobotW0[$k];
                
                    
                }


 
                
                for($i=0; $i<$this->jml_input; $i++){
                    for($j=0; $j<$this->jml_hidden; $j++){
                        $this->bobotV[$i][$j]=$this->bobotV[$i][$j]+$Av[$i][$j];
                        $bobotV[$i][$j]      = $this->bobotV[$i][$j];
                        
                    }
                }

                

                for($j=0; $j<$this->jml_hidden; $j++){
                    $this->bobotV0[$j]= $this->bobotV0[$j]+$Av0[$j];
                    $bobotV0[$j]      = $this->bobotV0[$j];
                    
                }
                
                
               
            echo "</tr>";
            }
    ?>
            
    	
    	<tr>
    		<td colspan="5">
   	<?php 
   			$err = $this->is_stop();
            echo "<div class='col-md-12 text-center'>
            <h4>";
            echo "ERROR : ".$err." > ".$this->target_error;
            echo "</h4></div>";
   	?>
    		</td>
    	</tr>
    	</tbody>
    </table>
    </div>
    </center>
    <?php        
    		$loop++;
            
            
        }while($err>$this->target_error && $loop<$maxloop);

        $this->session->set_userdata('bobotV', $this->bobotV);

        $this->session->set_userdata('bobotV0', $this->bobotV0);

		$this->session->set_userdata('bobotW', $this->bobotW);
		
		$this->session->set_userdata('bobotW0', $this->bobotW0);
		
		
    ?>
    <hr>
    <div class='col-md-12'>
	    <center>
	    	<h3>DATA SELESAI DILATIH DENGAN BOBOT SEBAGAI BERIKUT : </h3>
	    </center>

	    <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	          <tr>
	            <th>#</th>
	            <th>Bobot V</th>
	            <th>Bobot Bias Ke Hidden</th>
	            <th>Bobot W</th>
	            <th>Bobot Bias Ke Output</th>
	          </tr>
	        </thead>
	        <tbody>

	        <tr>
	        	<td><?php echo $i+1; ?></td>
	        	<td>
			        <?php
			          for ($i=0; $i < count($bobotV); $i++) {           
			        		for ($j=0; $j < count($bobotV[$i]); $j++) { 
			              		echo "V".($i+1)."".($j+1)." = ".$bobotV[$i][$j]."<br>"; 
			              	}
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($bobotV0); $i++) {           
			              	echo "V0".($i+1)." = ".$bobotV0[$i]."<br>"; 
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($bobotW); $i++) {           
			        		for ($j=0; $j < count($bobotW[$i]); $j++) { 
			              		echo "W".($i+1)."".($j+1)." = ".$bobotW[$i][$j]."<br>"; 
			              	}
			          }
			        ?>	
	        	</td>

	        	<td>
			        <?php
			          for ($i=0; $i < count($bobotW0); $i++) {           
			              	echo "W0".($i+1)." = ".$bobotW0[$i]."<br>"; 
			          }
			        ?>	
	        	</td>
	        </tr>
	        
	        </tbody>
	    </table>

	    <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	          <tr>
	            <th>#</th>
	            <th>X1</th>
	            <th>X2</th>
	            <th>X3</th>
	            <th>X4</th>
	            <th>Target</th>
	          </tr>
	        </thead>
	        <tbody>
	        <?php
	          for ($i=0; $i < count($this->uji); $i++) {           
	        ?>
	          <tr>
	            <td><?php echo $i+1; ?></td>
	              <?php 
	              for ($j=0; $j < count($this->uji[$i]); $j++) { 
	              ?>
	                  <td><?php echo $this->uji[$i][$j]; ?></td>
	              <?php
	              }
	              ?>
	            <td><?php echo $this->ujiTarget[$i] ?></td>
	          </tr>
	        <?php
	          }
	        ?>
	        </tbody>
	    </table>
	</div>
    <div class="col-xs-12" style="padding:0px; margin-bottom:20px;">
      <a href="<?php echo base_url("testdata"); ?>" class="btn btn-primary" style="width: 100%">MULAI UJI DATA!</a>
    </div>
    </div>

    <?php
        

		$this->load->view('footer');

      	
    }

    public function is_stop(){
        $jumlah_input  = $this->jml_input;
        $jumlah_hidden = $this->jml_hidden;
        $jumlah_output = $this->jml_output;
        $jumlah_data   = count($this->varX);
        $akumY=0;
        
        
        for($h=0; $h<$jumlah_data; $h++){
            $z[] = (float) $jumlah_hidden;
            for($j=0; $j<$jumlah_hidden; $j++){
                
                $z_in[] = (float) count($z);
                $jum_xv=0;
                for($i=0; $i<$jumlah_input; $i++){
                    $tmp=$this->varX[$h][$i]*$this->bobotV[$i][$j];
                    $jum_xv+=$tmp;
                }
                $z_in[$j]=$this->bobotV0[$j]+$jum_xv;
                
                $konversi_ke_minus = 0 - $z_in[$j];
                $hitung_epsilon=  pow($this->eps, $konversi_ke_minus);

                $z[$j] = 1/(1+$hitung_epsilon);
                
            }
 
            
            for($k=0; $k<$jumlah_output; $k++){
                
                $jum_zw=0;
                for($j=0; $j<$jumlah_hidden; $j++){
                    $tmp=$z[$j]*$this->bobotW[$k][$j];
                    $jum_zw+=$tmp;
                }
                $y_in[$k]=$this->bobotW0[$k]+$jum_zw;
                
                $konversi_ke_minus = 0 - $y_in[$k];
                $hitung_epsilon    =  pow($this->eps, $konversi_ke_minus);

                $y[$k] = 1/(1+$hitung_epsilon);
                
                
                $akumY += pow(($this->varTarget[$h]-$y[$k]),2);

                
            }
        }
        $E = $akumY/count($this->varX[0]);
        
        $this->total_error = $akumY;
        
        return $E;
    }

    public function test(){
    	

	    $this->load->view('header');

        echo "<div class='container'>";
        echo "<table  id='table_id' class='table table-striped table-bordered' cellspacing='0' width='100%'>";
        echo "<tr class='active'>
        		<td> x1 </td>
        		<td> x2 </td>
        		<td> x3 </td>
        		<td> x4 </td>
        		<td> target </td>
        		<td> hasil prediksi </td>
        		<td> Selisih Error</td>
        		<td> Persentase Prediksi</td>
        </tr>";
        $tampung_total_persentase = 0;
        


        for ($hitung=0; $hitung < count($this->uji) ; $hitung++) { 
        $style = "class='default'";
        if ($hitung % 2 == 0) {
        	$style = "class='success'";
        }

        echo "<tr $style  style='font-weight:bold;'>";
        	$tampung_total_persentase = $this->proses_test($this->uji[$hitung], $this->ujiTarget[$hitung], $tampung_total_persentase);
		
        echo "</tr>";       
        }


        echo "<tr  style='background:#000 !important; color:#fff; font-weight:bold;'>";
        	echo "<td colspan='7' class='text-right'>";
			echo "Total Persentase Prediksi Keseluruhan ";
			echo "</td>";
			echo "<td colspan='8'>";

        	echo round($tampung_total_persentase / count($this->uji), 2);
        	echo " %</td>";
        echo "</tr>";


        echo "</table>";
        echo "</div>";

        $this->load->view('footer');

    }

    public function proses_test($uji, $target, $totalPersentase){
    	$botV  = $this->session->userdata('bobotV');
    	$botV0 = $this->session->userdata('bobotV0');
    	$botW  = $this->session->userdata('bobotW');
    	$botW0 = $this->session->userdata('bobotW0');
    	$output_yk = array();
    	$dataTarget = $target;

    	//print_r($botV);


        for($j=0; $j<$this->jml_hidden; $j++){
            //$z_in[] = new double[z.length];
            $tmp = 0;
            for($i=0; $i<count($uji); $i++){
                $tmp = $tmp + ($uji[$i] * $botV[$i][$j]);
             	//echo $uji[$i]."*".$botV[$i][$j]."<br>";
            }

            $z_in[$j] = $botV0[$j] + $tmp;
            $konversi_ke_minus = 0 - $z_in[$j];
            $hitung_epsilon=  pow($this->eps, $konversi_ke_minus);

            $z[$j] = 1/(1+$hitung_epsilon);
        }
 
        for($k=0; $k<$this->jml_output; $k++){
            $tmp = 0;
            for($j=0; $j<$this->jml_hidden; $j++){
                $tmp = $tmp + $z[$j] * $botW[$k][$j];
            }
            $y_in[$k] = $botW0[$k] + $tmp;
 
            $konversi_ke_minus = 0 - $y_in[$k];
            $hitung_epsilon    =  pow($this->eps, $konversi_ke_minus);

            $y[$k] = round(1/(1+$hitung_epsilon),2);
            $output_yk[$k] = $y[$k];

        }

 
        for ($i=0; $i < count($uji); $i++) { 
        		echo "<td>".$uji[$i]."</td>";
        }

        for ($i=0; $i < count($target); $i++) {
        		
        	
        		echo "<td>".$target." ";
        		$status = "Gagal Beasiswa";
        		if ($target>=0.60) {
        			$status = "Sukses Beasiswa";
        			echo "  <span class='label label-success pull-right'>$status</span>";
        		} else{

        			echo "  <span class='label label-danger pull-right'>$status</span>";
        		}

        		echo "</td>";

        }



        for ($i=0; $i < count($output_yk); $i++) {
        		$selisih = (round($target,2) - round($output_yk[$i],2));
        		
        		echo "<td>".$output_yk[$i]."";
        		$status = "Gagal Beasiswa";
        		if ($output_yk[$i]>=0.60) {
        			$status = "Sukses Beasiswa";
        			echo "  <span class='label label-success pull-right'>$status</span>";
        		} else{

        			echo "  <span class='label label-danger pull-right'>$status</span>";
        		}


        		echo "</td>";
        		echo "<td>".$selisih."</td>";

        		$hitung_persentase = 100 - ((abs($selisih) / round($target,2)) * 100);
        		$totalPersentase    += $hitung_persentase;

        	echo "<td>".round($hitung_persentase, 2)." %</td>";

        }


        return $totalPersentase;
    }



    public function pengujian(){
    	$dataUji = $this->uji;
    	$dataUjiTarget = $this->ujiTarget;
    	$output_target = array();

    	
    	for($j=0; $j<$this->jml_hidden; $j++){
            
            $tmp = 0;

            for ($a=0; $a < count($dataUji); $a++) { 
            	for($i=0; $i<count($dataUji[$a]); $i++){
            	   $tmp = $tmp + ($dataUji[$i][$j] * $this->bobotV[$i][$j]);
	            }
	            
            }
            

            $z_in[$j] = $this->bobotV0[$j] + $tmp;
            $konversi_ke_minus = 0 - $z_in[$j];
            $hitung_epsilon=  pow($this->eps, $konversi_ke_minus);

            $z[$j] = 1/(1+$hitung_epsilon);

            
        }

        for ($a=0; $a < count($dataUji); $a++) { 
        	$tmp_y = 0;
	        for($k=0; $k<$this->jml_output; $k++){
	            
	            $tmp = 0;

	            for($j=0; $j<$this->jml_hidden; $j++){
	                $tmp = $tmp + $z[$j] * $this->bobotW[$k][$j];
	            }
	            $y_in[$k] = $this->bobotW0[$k] + $tmp;
	 
	            $konversi_ke_minus = 0 - $y_in[$k];
	            $hitung_epsilon    =  pow($this->eps, $konversi_ke_minus);

	            $y[$k] = round(1/(1+$hitung_epsilon),2);
	            $tmp_y = $y[$k];

	        }

	        $output_target[$a] = $tmp_y;
	    }

	?>
	<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>X1</th>
            <th>X2</th>
            <th>X3</th>
            <th>X4</th>
            <th>Target</th>
            <th>Hasil Prediksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          for ($i=0; $i < count($this->varX); $i++) {           
        ?>
          <tr>
            <td><?php echo $i+1; ?></td>
              <?php 
              for ($j=0; $j < count($this->varX[$i]); $j++) { 
              ?>
                  <td><?php echo $this->varX[$i][$j]; ?></td>
              <?php
              }
              ?>
            <td><?php echo $this->varTarget[$i] ?></td>
            <td><?php echo $output_target[$i] ?></td>

          </tr>

        <?php
          }
        ?>
        </tbody>
    </table>

	<?php

	    //print_r($output_target);

        
    }

}
?>