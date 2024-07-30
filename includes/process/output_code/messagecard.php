
<div class="product-card">
    <form action="index.php" method="post">
    <div class="badge">Lucky</div>
    <div class="product-tumb">
        <img src="<?php echo $Plocation; ?>" >
    </div>
    <div class="product-details">
        <!-- <span class="product-catagory">abc pvt</span> -->
        <h4><?php echo $Pname; ?></h4>
        <i class="fa-solid fa-star fa-sm"></i>
        <i class="fa-solid fa-star fa-sm"></i>
        <i class="fa-solid fa-star fa-sm"></i>
        <i class="fa-solid fa-star fa-sm"></i>
        <i class="fa-regular fa-star fa-sm"></i>
        <p><?php echo $Pdescription; ?></p>
        <div class="product-bottom-details">
            <div class="product-price"><?php echo $Pprice ?></div>
        </div>
        <button type="submit" class="add-toCard" name="add-toCard">ADD TO CARD<i class="fa-solid fa-cart-shopping"></i></button>
        <!-- <input type='hidden' name='product-name' value=<?php //echo $Pname;?>> -->
    
        <?php
        ////////////////////////////////////////////////////////////////////////////////
             echo "<input type='hidden' value='".$Pname."' name='product-name'>";
        /////////////////////////////////////////////////////////////////////////////////     
        ?>
        
    </div>
    </form>
</div>
<style>
    .add-toCard{
        /* background-color:#fbb72c; */
        border:1px solid #fbb72c;
        border-radius:5%;
        font-size:15px;
        padding:5px;
        
    }
</style>


