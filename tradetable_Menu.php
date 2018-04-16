<?php
    include 'header.php';
 ?>  
    
    <div id="mainarea">
                
        <div id="shopcontainer">
            <form>
            <ul>
                <li class="shops">
                    <h3>Breakfask</h3>
                    
                    <p>
                        Egg Roll
                        $<span>5.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>   
                    <p>
                        Bacon n'Egg 
                        $<span>7.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Brekki Roll 
                        $<span>10.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Hash Brown 
                        $<span>1.50</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Donut 
                        $<span>2.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        PanCake 
                        $<span>11.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>                   
                    
                </li>
                
                <li class="shops">
                    <h3>Lunch</h3>
                    
                    <p>
                        Hamburger
                        $<span>9.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>   
                    <p>
                        Aussie Burger 
                        $<span>9.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Fry Chips 
                        $<span>5.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Pasta 
                        $<span>9.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Butter Chicken 
                        $<span>7.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Noodle 
                        $<span>7.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    
                </li>
                
                <li class="shops">
                    <h3>Drinks</h3>
                    
                    <p>
                        Coke
                        $<span>3.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>   
                    <p>
                        Sprite 
                        $<span>3.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Flat White 
                        $<span>4.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Long Black 
                        $<span>3.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Cappuccino 
                        $<span>4.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    <p>
                        Mocha 
                        $<span>5.00</span>
                        <input type="number" placeholder="Order Quantity">
                        <input type="text" placeholder="Your Comment">
                    </p>
                    
                </li>
                
            </ul>
                
            <input id="checkout" type="button" value="Check-Out!">
            <button type="reset">Reset</button>
            </form>
        </div>
       
    </div>
    
    <script>
        
        
        $("#loginbox").hide();
        window.onclick = function(event){
            if($(event.target).closest("#loginbtn").length){
                $("#loginbox").show();                                
            } else if($(event.target).closest("#loginbox").length){
                $("#loginbox").show();
            } else {
                $("#loginbox").hide();
            } ;      
        };
        
    </script>
    
    
    
    
</body>
</html>