<i class="fa fa-bar-chart-o fa-fw"></i> From <?php echo $tanggal_awal; ?> To <?php echo $tanggal_akhir; ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Departemen</th>
                <th>Total</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach ($table as $row) {
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row->dept."</td>";
                echo "<td align='right'>".number_format($row->total,2)."</td>";
                echo "<td>Details</td>";
                
                echo "</tr>";
                $no ++;
            } 
            
            ?>
        </tbody>
    </table>
    </div>