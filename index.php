<?php
    include 'includes/header.php';
 ?>

    <div id="mainarea">

        <div id="shopcontainer">
            <ul>
                <li class="shops">
                    <a href="Lazenby_Menu.php">
                        <div class="shopimg">
                            <img src="img/lzby.jpg">
                        </div>
                        <div class="shopname">
                            The Lazenbys'
                        </div>
                    </a>
                </li>
                <li class="shops">
                    <a href="Ref_Menu.php">
                        <div class="shopimg"><img src="img/ref.jpg">
                        </div>
                        <div class="shopname">
                            The Ref
                        </div>
                    </a>
                </li>
                <li class="shops">
                    <a href="tradetable_menu.php">
                        <div class="shopimg"><img src="img/ttt.jpg">
                        </div>
                        <div class="shopname">
                            The Trade Table
                        </div>
                    </a>
                </li>

            </ul>

        </div>

    </div>

    <script>
        $("#loginbox").hide();
        window.onclick = function(event) {
            if ($(event.target).closest("#loginbtn").length) {
                $("#loginbox").show();
            } else if ($(event.target).closest("#loginbox").length) {
                $("#loginbox").show();
            } else {
                $("#loginbox").hide();
            };
        };

    </script>




    </body>

    </html>
