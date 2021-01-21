<?php
function show($data,$title='',$stop=1){
  if($title!=''){
    echo "<pre><h2> $title </h2></pre>";
  }
  echo "<pre style='font-weight:bold'>";
  print_r($data);
  echo "</pre>";
  if($stop){
    die();
  }
}
?>
