<?php function menuKI (){ ?>
    <ul>
        <li><a class="text-right closeclick" href="#">close &times;</a></li>
        <li>
            <div class="imgprofile text-center">
                <?php
                    $sqluserImg = mysql_query("SELECT * FROM user_login WHERE username ='$_SESSION[level]'") or die (mysql_error());
                    $rowImg = mysql_fetch_array($sqluserImg);
                ?>

                <img src="<?php echo $rowImg["images"] == "" ? "images/no-images.png" : "images/".$rowImg["images"] ?>" class="img-circle img-responsive center-block"  />
                <br /><strong><?php echo $_SESSION["nama"];?></strong>
                <a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
            </div>
        </li>
        <li>
            <a href="index.php?dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-folder fa-2x"></i> Penetapan Anggaran<span class=""></span></a>
                <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                        <li class="nav-label">Penetapan Anggaran</li>
                        <li>
                            <a href="index.php?data-penetapan-ai"><i class="fa fa-folder fa-2x"></i> AI</a>
                        </li>
                        <li>
                            <a href="index.php?data-penetapan-ao"><i class="fa fa-folder fa-2x"></i> AO</a>
                        </li>
                        <!--
                        <li>
                            <a href="index.php?sudah-penetapan-ai"><i class="fa fa-folder fa-2x"></i> TETAPAN AI</a>
                        </li>
                        <li>
                            <a href="index.php?sudah-penetapan-ao"><i class="fa fa-folder fa-2x"></i> TETAPAN AO</a>
                        </li>
                        -->
                </ul>
        </li>
        <!--
        <li>
            <a href="#"><i class="fa fa-database fa-2x" aria-hidden="true"></i> Data Master<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Data Master</li>
                    <li>
                        <a href="index.php?fungsi"><i class="fa fa-database fa-2x"></i> Fungsi</a>
                    </li>
                    <li>
                        <a href="index.php?pos-anggaran"><i class="fa fa-database fa-2x"></i> Pos Anggaran</a>
                    </li>
                    <li>
                        <a href="index.php?satuan"><i class="fa fa-database fa-2x"></i> Satuan</a>
                    </li>
                </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-users fa-2x" aria-hidden="true"></i> Daftar Users<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Daftar Users</li>
                    <li>
                        <a href="index.php?listuser"><i class="fa fa-users fa-2x"></i> Users</a>
                    </li>
                </ul>
        </li>
        -->
        <li>
            <a href="#"><i class="fa fa-map-o fa-2x"></i> Rekap Penetapan</a>
            <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Rekap Penetapan</li>
                    <li>
                        <a href="index.php?data-penetapan-ai"><i class="fa fa-map-o fa-2x"></i> AI</a>
                    </li>
                    <li>
                        <a href="index.php?data-penetapan-ao"><i class="fa fa-map-o fa-2x"></i> AO</a>
                    </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-map-o fa-2x"></i> Rekap Anggaran</a>
            <ul>
                    <li><a href="#" class="back">Main Menu</a></li>
                    <li class="nav-label">Rekap Penetapan</li>
                    <li>
                        <a href="index.php?data-rekap-ai"><i class="fa fa-map-o fa-2x"></i> AI</a>
                    </li>
                    <li>
                        <a href="index.php?data-rekap-ao"><i class="fa fa-map-o fa-2x"></i> AO</a>
                    </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i> Laporan<span class=""></span></a>
                <ul >
                    <li><a href="#" class="back">Main Menu</a></li>
                        <li class="nav-label"> Laporan Anggaran</li>
                        <li>
                            <li>
                            <a href="index.php?lap-ai"><i class="fa fa-file-text fa-2x"></i>  AI</a>
                            </li>
                            <li>
                            <a href="index.php?lap-ao"><i class="fa fa-file-text fa-2x"></i>  AO</a>
                            </li>
                        </li>
                        <li class="nav-label"> Laporan Realisasi</li>
                        <li>
                            <li>
                                <a href="#"><i class="fa fa-file-text fa-2x"></i>  AI</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-text fa-2x"></i>  AO</a>
                            </li>
                        </li>
                        <li class="nav-label"> Laporan Penyerapan</li>
                        <li>
                            <li>
                                <a href="#"><i class="fa fa-file-text fa-2x"></i>  AI</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-text fa-2x"></i>  AO</a>
                            </li>
                         </li>
                </ul>
        </li>
    </ul>
<?php } ?>
