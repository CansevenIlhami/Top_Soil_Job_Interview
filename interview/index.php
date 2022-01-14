<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freetimers Candidate Test</title>
</head>
<body>
    <?php 
class TopspoilCalculator {
    public $bags;
    private $totalBags;
    
        function MeasurementUnit() {
            ?>
            <form name="MyForm" action="index.php" method="POST">
                <input type="text" name="Name" placeholder="What is your name?" value="<?php @$_SESSION["Name"];?>" required> <br>
            <label>Please Select Your Measurement Unit:</label> 
                <select name="MeasurementUnit" required>
                    <option name="MeasurementMetres">Metres</option>
                    <option name="MeasurementFeet">Feet</option>
                    <option name="MeasurementYards">Yards</option>
                </select>
            <?php
        }
        function DepthMeasurementUnit() {
            ?><label>Please Select Your Depth Measurement Unit:</label> 
                <select name="DepthMeasurementUnit" required>
                    <option name="DepthMeasurementcentimetres">Centimetres</option>
                    <option name="MeasurementInches">Inches</option>
                </select>
            <?php

        }
        function SetDimensions() {  
            ?> <label>Please Enter Your Dimensions:</label> 
               <input name="Dimensionwidth" type="number" placeholder="Enter The width please" required></input>
               <input name="Dimensionlength" type="number" placeholder="Enter The length please" required></input>
               <input name="Dimensiondepth" type="number" placeholder="Enter The depth please" required></input>
               <input name="myButton" type="submit" value="Submit"></input>
               
               
            <?php

        }
        function CalculateNumberOfBags() {
            
        if(@$_POST["MeasurementUnit"] == "Feet"):
        $feetToMeterWidth = 0;
        $feetToMeterHeight = 0;
        $feetToMeterWidth =  $_POST["Dimensionwidth"] / 3.2808;
        $feetToMeterHeight =  $_POST["Dimensionlength"] / 3.2808;
        $metresSquare = $feetToMeterHeight * $feetToMeterWidth;
        $X = $metresSquare * 0.025; 
        $Y = $X * 1.4;
        $this->bags = ceil($Y);
        echo "You Need"." ".$this->bags." "."Bags of Top Soil For this one <br>"; 

        

        elseif(@$_POST["MeasurementUnit"] == "Yards"):
            $YardToMeterWidth = 0;
            $YardToMeterHeight = 0;
            $YardToMeterWidth =  $_POST["Dimensionwidth"] / 1.0936;
            $YardToMeterHeight =  $_POST["Dimensionlength"] / 1.0936;
            $metresSquare = $YardToMeterHeight * $YardToMeterWidth;
            $X = $metresSquare * 0.025; 
            $Y = $X * 1.4;
            $this->bags = ceil($Y);
            echo "You Need"." ".$this->bags." "."Bags of Top Soil For this one <br>"; 

        elseif(@$_POST["MeasurementUnit"] == "Metres"):
            $MeterWidth = 0;
            $MeterHeight = 0;
            $MeterWidth =  $_POST["Dimensionwidth"];
            $MeterHeight =  $_POST["Dimensionlength"];
            $metresSquare = $MeterHeight * $MeterWidth;
            $X = $metresSquare * 0.025; 
            $Y = $X * 1.4;
            $this->bags = ceil($Y);
            echo "You Need"." ".$this->bags." "."Bags of Top Soil For this one <br>"; 
            
            
        endif;
       
            
        }
         /// 
    function addToBasket($name) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        

        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        
        @$sql = "insert into basket(Name,TotalBags) values(?,?)";
        @$inserter = $conn->prepare($sql);
        @$inserter->execute(array($name,$this->bags));

        @$sqlSum = $conn->prepare("select SUM(TotalBags) as value from basket WHERE Name=?");
        @$sqlSum->execute(array($name));
        $row = $sqlSum->fetch(PDO::FETCH_ASSOC);
        echo "You Need". " ". $row["value"]. " "."Bags of Top soil for all.";

        $sqlCollectData = $conn->prepare("insert into myvalues(Name,MeasurementUnit,DepthMeasurementUnit,Dimensionwidth,Dimensionlength,Dimensiondepth) values(?,?,?,?,?,?)");
        $sqlCollectData->execute(array($name,@$_POST["MeasurementUnit"],@$_POST["DepthMeasurementUnit"],@$_POST["Dimensionwidth"],@$_POST["Dimensionlength"],@$_POST["Dimensiondepth"]));
       

    }
}



@$_SESSION["Name"] = $_POST["Name"];

$MyClass = new TopspoilCalculator();
$MyMeasurementFunction = $MyClass->MeasurementUnit(); echo "<br>";
$MyDepthMeasurementFunction = $MyClass->DepthMeasurementUnit(); echo "<br>";
$MySetDimensionsFunction = $MyClass->SetDimensions(); echo "<br>";
$myCalculateFunc = $MyClass->CalculateNumberOfBags();
$MyAddTobasketFunction =$MyClass->addToBasket(@$_SESSION["Name"]); echo "<br>";
?>
</form>  
</body>
</html>
