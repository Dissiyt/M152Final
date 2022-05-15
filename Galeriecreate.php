<?php
//scannt den ordner small thumbs und holt die bilder und weisst ihnen eine nummer zu
$files = scandir('small_thumbs/');
$files_nr= 0;
// get number of files
foreach($files as $file){
    if($file !== "." && $file !== "..") {
        $realfilearray[$files_nr]= $file;
        $files_nr++;
    }
}


//gibt den files nr number of poages und gettet es mit einem isset um zu prüfen ob vorhanden
$results_per_page = 18;
$number_of_page = ceil ($files_nr / $results_per_page);
if (!isset ($_GET['page']) ) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
echo "<div style='margin-top:2%;margin-bottom:2%;'>";
$page_first_result = ($page-1) * $results_per_page;
$i=$page_first_result;
$limit =$page_first_result+$results_per_page;
//display images in small
for($realfilearray; $i<$limit ;$i++){
    if($i<$files_nr){
        echo'
            <a target="_blank" href=thumbs/'.$realfilearray[$i].'>
                <img src=small_thumbs/'.$realfilearray[$i].'>
            </a>
            ';

    }

}
echo "</div>";
//display pages und referenz zur Galerie
for($page = 1; $page<= $number_of_page; $page++) {
    echo '<a href = "Galerie.php?page=' . $page . '">' . $page . ' </a>';
}

?>