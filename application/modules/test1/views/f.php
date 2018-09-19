<?php
echo 'IT IS View from MODULE<br>';
echo 'a: '.$a.'<br>';
echo 'b: '.$b.'<br>';
/*
echo '<pre>';
print_r($user);
*/
echo '<table>';
foreach($user as $item)
{
  echo '<tr>';
  echo '<td class="tblOut">'.$item['id'].'</td>';
  echo '<td class="tblOut">'.$item['title'].'</td>';
  echo '<td class="tblOut">'.$item['description'].'</td>';
  echo '<td class="tblOut">'.$item['datetime'].'</td>';
  echo '</tr>';
}
echo '</table>';
?>