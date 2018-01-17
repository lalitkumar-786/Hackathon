<?php
include('connection.php');
$q = $_GET['keyword'];
if($q!=""){
    $sql = "SELECT * FROM discussion_thread WHERE topic LIKE '%$q%' OR
                    tags LIKE '%$q%' ";
    $result = $connect->query($sql);
    if(!empty($result)){
?>
        <ul tabindex="2"><br>
        <?php
            foreach($result as $row){
        ?>
            <a href="/view_topic/<?php echo $row['id'];?>">
                <li style="padding:10px;font-size: 20px;border:solid 1px black;border-style: groove;border-radius: 10px;"><?php echo $row["topic"]; ?></li>
            </a>
            <br>
<?php       }
        echo "</ul>";
    }
    if(count($result)<=0){
        echo "<ul><li>No Matching Results Found !</li></ul>";    
    }
}
else{
    echo "<ul><li>Enter Text to Search</li></ul>";
}

?>