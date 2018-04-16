<?php
include 'header.php'
?>

    <div id="mainarea">

        <div>
            <h3>The Master Selection</h3>
        </div>
        <button id="add">Click to add a new line!</button>

        <p>
            <input type="text" value="Egg Roll"> $
            <input type="number" value="5.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Bacon n'Egg"> $
            <input type="number" value="7.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Brekki Roll"> $
            <input type="number" value="11.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Hash Brown"> $
            <input type="number" value="1.50">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Donut"> $
            <input type="number" value="2.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="PanCake"> $
            <input type="number" value="11.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Hamburger"> $
            <input type="number" value="9.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Aussie Burger"> $
            <input type="number" value="9.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Fry Chips"> $
            <input type="number" value="3.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Pasta"> $
            <input type="number" value="9.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
        <p>
            <input type="text" value="Noodle"> $
            <input type="number" value="7.00">
            <button value="save">Save</button>
            <button value="remove" class="remove">Remove</button>
        </p>
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

        $(".remove").click(function() {
            $(this).parent().remove();
        });

        $("#add").click(function() {
            $("p:last").append('<p><input type="text"> &#36;   <input type="number"> <button value="save">Save</button> <button class="remove">Remove</button> </p>');
        })
    </script>




</body>

</html>
