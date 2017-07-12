<html> 
<body> 
  
<?php 
 
echo "<table border = '1'> \n"; 
echo "<tr><td>Nombre</td><td>E-Mail</td></tr> \n"; 
while ($row = mysql_fetch_row($result)){ 
       echo ""<tr><td>$row[0]</td><td>$row[1]</td></tr> \n; 
} 
echo "</table> \n"; 

?> 
  
</body> 
</html> 