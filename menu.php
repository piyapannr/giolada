<div style="padding-top:30px;">
    <div style="background:white;">
        <div class="container" >
            <ul class="nav nav-justified">
                <li <?php if ($page == "index.php") echo ' class="active"'; ?>><a href="index.php"><font size="3" color="#73421B" class="boon-300">Home</font></a></li>
                <li<?php if ($page == "about.php") echo ' class="active"'; ?>><a href="about.php"><font size="3" color="#73421B" class="boon-300">About us</font></a></li>
                <li <?php if ($page == "product.php") echo ' class="active"'; ?>class="dropdown">
                    <a href="product.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><font size="3" color="#73421B" class="boon-300">Products<span class="caret"></font></span></a>
                    <ul class="dropdown-menu" style="margin-top:0px;" role="menu">
                        <li><a href="product.php?tid=0"><font size="3" color="#73421B" class="boon-300">Earing</font></a></li>
                        <li class="divider"></li>

                        <li><a href="product.php?tid=1"><font size="3" color="#73421B" class="boon-300">Necklace</font></a></li>
                        <li class="divider"></li>
                        <li><a href="product.php?tid=2"><font size="3" color="#73421B" class="boon-300">Ring</font></a></li>
                        <li class="divider"></li>
                        <li><a href="product.php?tid=3"><font size="3" color="#73421B" class="boon-300">Bangle</font></a></li>
                        <li class="divider"></li>
                        <li><a href="product.php?tid=4"><font size="3" color="#73421B" class="boon-300">Brooch</font></a></li>
                        <li class="divider"></li>
                        <li><a href="product.php?tid=5"><font size="3" color="#73421B" class="boon-300">Set</font></a></li>
                        <li class="divider"></li>
                        <li><a href="product.php?tid=6"><font size="3" color="#73421B" class="boon-300">Watch</font></a></li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a href="#"><font size="3" color="#73421B" class="boon-300">Accessories</font></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">เครื่องประดับผม</a></li>
                                <li><a href="#">Belt(เข็มขัด)</a></li>
                                <li><a href="#">Glasses(แว่นตา)</a></li>
                                <li><a href="#">Jew(จิ้ว)</a></li>
                                <li><a href="#">Case(เคสมือถือ)</a></li>
                                <li><a href="#">Bunch of keys(พวงกุญแจ)</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li <?php if ($page == "contact.php") echo ' class="active"'; ?>><a href="contact.php"><font size="3"color="#73421B" class="boon-300">Contact us</font></a></li>
            </ul>
            </div><!-- .container -->
            </div><!-- .row white-->
            <div><!--  .row menu -->