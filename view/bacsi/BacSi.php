<?php
    // error_reporting(0);
    include("./controller/cBacSi.php");
    $p = new cbacsi();
    
    $tblBS = $p->getAllBS();
    if(!$tblBS)
				{
					echo 'Không kết nối được';
				}
				elseif($tblBS==-1)
				{
					echo 'Chưa có dữ liệu';
				}
				else
                {
                    $dem=0;
                    
                       

                    while($r = $tblBS->fetch_assoc())
                    {
                        echo '<div class="bs_card">
                            <a href="" style="text-decoration: none">';
                        echo '<img src="https://via.placeholder.com/200x150" alt="" class="image">
                        <div class="bs_info">
                            <h2 class="name">'.$r["HovaTenNV"].'</h2>
                            <p class="department">'.$r["TenKhoa"].'</p>
                        </div>';
                        echo '</a>';
                        echo '</div>';
                    }
                    
                }
?>