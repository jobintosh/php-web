<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["stdname"].";".$_POST["stdcode"].";".$_POST["stdlnum"].";";
    $fp = fopen('stdlist.txt', 'a');
    fwrite($fp, $data);
    fclose($fp);
    header("Location: #");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(array_key_exists("n", $_GET)){
        $newNames = "";
        $filename = "stdlist.txt";
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $arr_del = explode(";", $lines[0]);
        for($i = 0; $i < count($arr_del)-1; $i++){
            if($arr_del[$i] == $_GET["n"]){
                $i = $i+3;
            } else {
                $newNames .= $arr_del[$i].";";
            }
        }
        $fp = fopen('stdlist.txt', 'w');
        fwrite($fp, $newNames);
        fclose($fp);
        header("Location: #");
        exit();
    }
}
?>

<html>
<title>ระบบเช็คชื่อมหาวิทยาลัยสวนดุสิต</title>
<body>
    <center><h2>ระบบเช็คชื่อมหาวิทยาลัยสวนดุสิต</h2></center>
    <center><h3>ธราธร จงแสง 6311011940002</h3></center>
    <center>
    <?php 
    $data = file_get_contents("stdlist.txt");
    $arr = explode(";", $data);
    echo '<table style="border: 1px solid black;">';
    echo '<thead>';
    echo '<tr style="border: 1px solid black;">';
    echo '<th style="border: 1px solid black;">ชื่อนักศึกษา</th>';
    echo '<th style="border: 1px solid black;">รหัสนักศึกษา</th>';
    echo '<th style="border: 1px solid black;">เลขนำโชค</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    for($value = 0; $value < count($arr)-1; $value=$value+3) {
        echo '<tr style="border: 1px solid black;">';
        echo '<td style="border: 1px solid black;">'.$arr[$value].'</td>';
        echo '<td style="border: 1px solid black;">'.$arr[$value+1].'</td>';
        echo '<td style="border: 1px solid black;">'.$arr[$value+2].'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>'; 
    ?>
    </center>
    <br>
    <form action="index.php" method="POST">
        <label>รายชื่อนักศึกษา :</label><br>
        <input type="text" id="stdname" name="stdname"  placeholder="ชื่อนักศึกษา" style="width:fit-content;">
        <input type="text" id="stdcode" name="stdcode"  placeholder="รหัสนักศา" syle="width:fit-content;">
        <input type="text" id="stdlnum" name="stdlnum"  placeholder="เลขนำโชค 1-100" style="width:fit-content;">
        <br><br><input type="submit" value="บันทึก">
    </form>
</body>
</html>