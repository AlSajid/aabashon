<?php
  include 'সংযোগ.php';
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>আবাসন</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <style>
      @font-face {
          font-family: 'bn';
          src: url(char.ttf);
      }
    </style>
  </head>
  <body style="font-family: 'bn'; background-color: #ffffff">
    <h1 class="w3-center" style="font-family: 'bn';"> আবাসন </h1>
    <hr class="w3-margin-left w3-margin-right">
    <?php
      $sql = "SELECT * FROM `amounts`";
      $result = mysqli_query($connect, $sql);

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>

    <script>
      $(document).ready(function() {
        $("#rentt option").filter(function() {
            return $(this).val() == $("#rent").val();
        }).attr('selected', true);

        $("#rentt").live("change", function() {
          $("#rent").val($(this).find("option:selected").attr("id"));
        });
      });
    </script>

    <button onclick="document.getElementById('insert').style.display='block'" class="w3-button w3-margin w3-padding w3-large w3-border w3-green">বিল পরিশোধ ব্যবস্থাপনা</button>
    <div id="insert" class="w3-modal w3-animate-top">
      <div class="w3-modal-content">
        <div class=" w3-margin-bottom w3-padding w3-white">
          <header class="w3-container"> 
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>বিল ব্যবস্থাপনা</h2>
          </header>

          <form class="w3-container w3-large" action="তথ্যযোগ.php" method="post" class="w3-row">
          
            <select name="rentt" class="w3-input w3-quarter w3-round" id="rentt" required>
              <option selected>খাত নির্বাচন...</option>
              <option value="rent" id="<?php echo $row["rent"]; ?>">বাড়ি ভাড়া</option>
              <option value="service" id="<?php echo $row["service"]; ?>">সার্ভিস চার্জ</option>
              <option value="water" id="<?php echo $row["water"]; ?>">পানির বিল</option>
              <option value="electricity" id="<?php echo $row["electricity"]; ?>">বিদ্যুৎ বিল</option>
              <option value="gas" id="<?php echo $row["gas"]; ?>">গ্যাস বিল</option>
            </select>
            
            <select name="rentm" class="w3-input w3-quarter w3-round">
              <option value="<?php echo  date('MY', strtotime("-1 months")); ?>"><?php echo strip_tags(BanglaConverter::en2bn(date('M-Y', strtotime("-1 months")))); ?></option>
              <option value="<?php echo  date('MY'); ?>" selected><?php echo strip_tags(BanglaConverter::en2bn(date('M-Y'))); ?></option>
              <option value="<?php echo  date('MY', strtotime("+1 months")); ?>"><?php echo strip_tags(BanglaConverter::en2bn(date('M-Y', strtotime("+1 months")))); ?></option>
              <option value="<?php echo  date('MY', strtotime("+2 months")); ?>"><?php echo strip_tags(BanglaConverter::en2bn(date('M-Y', strtotime("+2 months")))); ?></option>
              <option value="<?php echo  date('MY', strtotime("+3 months")); ?>"><?php echo strip_tags(BanglaConverter::en2bn(date('M-Y', strtotime("+3 months")))); ?></option>
            </select>

            <input type="date" name="rentd" class="w3-input w3-quarter w3-round" value="<?php echo date('Y-m-d'); ?>">

            <div class="w3-quarter">
              <input type="number" style="text-align:right; outline:0;" name="rent" id="rent" class="w3-input w3-margin-right w3-round" required>
            </div>
            <br>
            <br>
            <br>
            <input type="submit" class="w3-padding w3-button w3-green w3-round" value="জমা দিন">
          </form>
          <br>
          <br>
        </div>
      </div>
    </div>
    <Br>
    <br>

    <?php
        }
      }
    ?>
    <table class="w3-table w3-bordered w3-xlarge" border="1">
      <tr >
        <th class="w3-center">মাসের নাম</th>
        <th class="w3-center">বাড়ি ভাড়া</th>
        <th class="w3-center">সার্ভিস চার্জ</th>
        <th class="w3-center">পানির বিল</th>
        <th class="w3-center">বিদ্যুৎ বিল</th>
        <th class="w3-center">গ্যাস বিল</th>
        <th class="w3-center">মোট</th>
      </tr>

      <?php
        $sql = "SELECT * FROM `bills`";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
      ?>

      <tr > 
        <td> <?php echo strip_tags(BanglaConverter::en2bn(date('M-Y', strtotime($row["Month"]))));  ?></td>
        <?php 
          if ($row["Date"] == "0000-00-00") {
        ?>
        <td class="w3-pale-red" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn(number_format($row["rent"]))) ." টাকা"; ?> <br><?php echo "বকেয়া";  ?></td> 
        
        <?php 
          }else {
        ?>
        <td class="w3-pale-green" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn(number_format($row["rent"])))." টাকা"; ?> <br><small><?php echo strip_tags(BanglaConverter::en2bn(date('d-M-Y', strtotime($row["Date"])))); } ?></small></td>

        <?php 
          if ($row["serviced"] == "0000-00-00") {
        ?>
        <td class="w3-pale-red" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn(number_format($row["service"]))) ." টাকা"; ?> <br><?php echo "বকেয়া";  ?></td> 
        
        <?php 
          }else {
        ?>
        <td class="w3-pale-green" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn(number_format($row["service"]))) ." টাকা"; ?> <br><small><?php echo strip_tags(BanglaConverter::en2bn(date('d-M-Y', strtotime($row["serviced"])))); } ?></small></td>

        <?php 
          if ($row["waterd"] == "0000-00-00") {
        ?>
        <td class="w3-pale-red" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["water"])) ." টাকা"; ?> <br><?php echo "বকেয়া";  ?></td> 
        
        <?php 
          }else {
        ?>
        <td class="w3-pale-green" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["water"])) ." টাকা"; ?> <br><small><?php echo strip_tags(BanglaConverter::en2bn(date('d-M-Y', strtotime($row["waterd"])))); } ?></small></td>

        <?php 
          if ($row["electricityd"] == "0000-00-00") {
        ?>
        <td class="w3-pale-red" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["electricity"])) ." টাকা"; ?> <br><?php echo "বকেয়া";  ?></td> 
        
        <?php 
          }else {
        ?>
        <td class="w3-pale-green" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["electricity"])) ." টাকা"; ?> <br><small><?php echo strip_tags(BanglaConverter::en2bn(date('d-M-Y', strtotime($row["electricityd"])))); } ?></small></td>

        <?php 
          if ($row["gasd"] == "0000-00-00") {
        ?>
        <td class="w3-pale-red" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["gas"])) ." টাকা"; ?> <br><?php echo "বকেয়া";  ?></td> 
        
        <?php 
          } else {
        ?>
        <td class="w3-pale-green" style="text-align:right"><?php echo strip_tags(BanglaConverter::en2bn($row["gas"])) ." টাকা"; ?> <br><small><?php echo strip_tags(BanglaConverter::en2bn(date('d-M-Y', strtotime($row["gasd"])))); } ?></small></td>
        <td style="text-align:right">
          <?php
            $total= $row["rent"] + $row["service"]+ $row["water"] + $row["electricity"] + $row["gas"];
            echo strip_tags(BanglaConverter::en2bn(number_format($total)))." টাকা";          
          ?>
        </td>
        <td style="text-align:right">
          <a href="মুছুনি.php?id=<?php echo $row["No"]; ?>">
            <button class="w3-button w3-red">মুছুন</button>
          </a>
        </td>
      </tr>

      <?php 
          }
        } else {
            echo "<br><h6 class='w3-center'>এখনো কোনো তথ্য জানানো হয়নি</h6><br>";
        }
      ?> 

      <tr >
        <td><b>মোট</b></td>
        <td style="text-align:right">
          <?php
            $sql = "SELECT SUM(rent) AS sum FROM bills";
            $result = mysqli_query($connect, $sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo strip_tags(BanglaConverter::en2bn(number_format($sum1 = $row["sum"]))). " টাকা";
              }
            }
       
          ?>
        </td>
        <td style="text-align:right">
          <?php
            $sql = "SELECT SUM(`service`) AS sum FROM bills";
            $result = mysqli_query($connect, $sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo strip_tags(BanglaConverter::en2bn(number_format($sum2 = $row["sum"]))). " টাকা";
              }
            }
       
          ?>
        </td>
        <td style="text-align:right">
          <?php
            $sql = "SELECT SUM(water) AS sum FROM bills";
            $result = mysqli_query($connect, $sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo strip_tags(BanglaConverter::en2bn(number_format($sum3 = $row["sum"]))). " টাকা";
              }
            }
       
          ?>
        </td>
        <td style="text-align:right">
          <?php
            $sql = "SELECT SUM(electricity) AS sum FROM bills";
            $result = mysqli_query($connect, $sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo strip_tags(BanglaConverter::en2bn(number_format($sum4 = $row["sum"]))). " টাকা";
              }
            }
       
          ?>
        </td>
        <td style="text-align:right">
          <?php
            $sql = "SELECT SUM(gas) AS sum FROM bills";
            $result = mysqli_query($connect, $sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo strip_tags(BanglaConverter::en2bn(number_format($sum5 = $row["sum"]))). " টাকা";
              }
            }
       
          ?>
        </td>
        <td style="text-align:right">
          <?php
            echo strip_tags(BanglaConverter::en2bn(number_format($sum1 + $sum2 + $sum3 + $sum4 + $sum5))). " টাকা";
          ?>
        </td>
      </tr> 
    </table>

    <?php
      mysqli_close($connect); 
    ?> 

  </body>
</html>