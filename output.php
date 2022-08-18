<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="takeoff_db";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn -> connect_errno){
echo "Failed to connect to MySQl:" . $conn -> connect_error;
exit();
}
//SQL QUERY
$sql= " SELECT Project_Name FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
//EXECUTING THE QUERY
$result= mysqli_query($conn,$sql);
               
//FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);


//mysqli_close($conn);


//freeing result from memory

mysqli_free_result($result)

        
?>




<!doctype html>

<html>
    <head>
        <title>Takeoff Developer Application</title>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

    <link rel="stylesheet" href="output.css"/>
        
    </head>
    <body id="b">

            <div class="container text-center">
                  <div class="row row-cols-lg"  style="text-align:center">
                    <div class="col" id="projectNameLine" ><h4>Project Name:  
                      <?php foreach($rows as $row ){ 
                  
                      echo htmlspecialchars($row['Project_Name']);?></h4>
                    <?php } ?>
                    </div >
                </div>
            </div>
            <hr class="my-4">
          <div class="container text-center">
              <div id=appliancegrid class="row row-cols-xl-2">
                  <div class="col" ><h5>Count of Dryers:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                  <div class="col" ><h5>Dryers:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownDryer"  name='dropdownDryer'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='Dryer';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>
                  <div class="col" ><h5>Count of Washer:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                  <div class="col"><h5>Washers:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownWasher"  name='dropdownWasher'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='Washer';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>
                
                  <div class="col"><h5>Count of Refigerators:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                
                  <div class="col" ><h5>Refrigerators:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownREF"  name='dropdownREF'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='REF';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>

                  <div class="col"><h5>Count of Ranges:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                
                  <div class="col" ><h5>Ranges:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownRANGE"  name='dropdownRANGE'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='RANGE';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>
                
                  <div class="col" ><h5>Count of Microwaves:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                    
                
                    <div class="col" ><h5>Microwaves:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownMICRO"  name='dropdownMICRO'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='MICRO';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>

                  <div class="col" ><h5>Count of Dishwashers:
                    <?php
                    $sql= " SELECT Number_Of_Floors*Number_Of_Units_Per_Floor as Total FROM project_tbl ORDER BY ProjectNumber DESC LIMIT 1;";
                    //EXECUTING THE QUERY
                    $result= mysqli_query($conn,$sql);
                                                      
                    //FETCH THE RESULT ROWS AND PUT THEM AS AN ARRAY
                    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    
                    foreach($rows as $row ){ 
                    
                    echo htmlspecialchars($row['Total']);?></h5>
                    <?php } ?>
                    
                
                  </div>
                
                <div class="col" ><h5>Dishwashers:</h5>
                      <div id="dryerdropcontainer" class="col-md-4">
                        <select class="input is-large" id="dropdownDISH"  name='dropdownDISH'>
                        <option value="">Choose...</option>
                        <?php 
                  
                   
                        $query= "SELECT Model_Number FROM product_tbl WHERE Product_Type='DISH';";
                        $result1= mysqli_query($conn,$query);
                        while($row1= mysqli_fetch_array($result1)){ 
                        ?>
                          <option value="<?php echo $row1['Model_Number'];?>"><?php echo $row1['Model_Number'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>

              </div>
            </div>


    </body>

</html>