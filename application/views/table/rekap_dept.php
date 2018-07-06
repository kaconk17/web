<div class="panel panel-default">
                        <div class="panel-heading">
                            Details of Usage
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <?php  
                                $this->load->model('system_model');
                                $no=1;
                                foreach ($table as $row) {
                                    
                                    echo " 
                                    <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            
                                            <button class='btn btn-primary btn-block' type='button' data-toggle='collapse' data-target='#collapse".$no."' aria-expanded='false' aria-controls='collapse".$no."'>".$row->dept." Rp. ".number_format($row->total)." 
                                        </h4>
                                    </div>
                                    <div id='collapse".$no."' class='panel-collapse collapse'>
                                        <div class='panel-body'>
                                        <div class='table-responsive' >
                                        <table class='table table-bordered' id='dataTables-example'>
                                            <thead>
                                                
                                                
                                            
                                            
                                                <tr>
                                                <th>Item Code</th>
                                                <th>Item</th>
                                                <th>Spesifikasi</th>
                                                <th>Forecast</th>
                                                <th>Aktual</th>
                                                <th>Uom</th>
                                                <th>Detail</th>
                                                </tr>
        
                                            </thead>
                                            
                                            <tbody>";
                                            $dept = $row->dept;
                                            $list = $this->system_model->list_dept($dept,$tanggal_awal, $tanggal_akhir);

                                                foreach ($list as $key) {
                                                    $plan =number_format($key->quota);
                                                    $pakai =number_format($key->total);
                                                    if ($plan > 0){
                                                        if (($key->total) > ($key->quota)) {
                                                            $color = 'background-color:hsla(9,100%,64%,0.8)';
                                                        } else {
                                                            $color = 'background-color:#ffffff';
                                                        }
                                                        
                                                        
                                                    }else {
                                                        $color = 'background-color:#ffffff';
                                                        }

                                                    echo "<tr style=".$color.">";
                                                    echo "<td>".$key->item_code."</td>";
                                                    
                                                    echo "<td>".$key->item."</td>";
                                                    echo "<td>".$key->spesifikasi."</td>";
                                                    echo "<td align='center'>".$plan."</td>";
                                                    echo "<td align='center'>".$pakai."</td>";
                                                    echo "<td>".$key->uom."</td>";
                                                    echo "<td>Details</td>";
                                                    echo "</tr>";
                                                } 
                                           echo " </tbody>
                                            
                                        </table>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                                    ";
                                    $no++;
                                }
                                
                                ?>
                                
                            
                                

                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->

                   <!-- <a data-toggle='collapse' data-parent='#accordion' href='#collapse".$no."' aria-expanded='false' aria-controls='collapse".$no."'>".$row->dept."  ".$row->total." </a>-->