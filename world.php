<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'password';
$dbname = 'world';
$country = $_GET['country'];
$context = $_GET['context'];
//$continent = $_GET['continent'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");
//$results = $stmt->fetchAll(PDO::FETCH_ASS/OC);
//var_dump($results);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$country = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($country);

$stmt = $conn->query("SELECT cities.name, cities.district, cities.population,
FROM cities INNER JOIN countries ON cities.country_code=countries.code");
$context = $stmt//->fetchAll(PDO::FETCH_ASSOC);
var_dump($context);

//$stmt = $conn->query("SELECT continent FROM countries");
//$continent = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($continent);

?>
<table>
    <div id="main">
<thead>
   <th>Country Name</th>
   <th>Continent</th>
   <th>Independence Year</th>
   <th>Head of State</th>
</thead>
<tbody>
    <?php foreach ($country as $row): ?>
 <tr>
     <td> <?= $row['name']?></td>
     <td> <?=$row['continent']?></td>
     <td> <?=$row['independence_year']?></td>
     <td> <?=$row['head_of_state']?></td>
     
 </tr>   
  <?php endforeach; ?>  
    
</tbody>
</div>
</table>

<ul>
<?php foreach ($country as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
  <!--<li><//?=$row['name']. ' is in ' . $row['continent']; ?></li>-->
<?php endforeach; ?>
</ul>

<ul>
<?php foreach ($context as $row): ?>
  <li><?= $row['name'] . ' district ' . $row['district'] . ' population ' . $row['population']; ?></li>
  <!--<li><//?=$row['name']. ' is in ' . $row['continent']; ?></li>-->
<?php endforeach; ?>
</ul>