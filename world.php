<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'password';
$dbname = 'world';
$country = $_GET['country'];
$context = $_GET['context'];
var_dump($context);
var_dump($country);
//$continent = $_GET['continent'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");
//$results = $stmt->fetchAll(PDO::FETCH_ASS/OC);
//var_dump($results);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$country = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($country);

$stmt = $conn->query("SELECT c.id,c.district, c.name as city, c.country_code, cs.name as
country, c.population FROM cities c join countries cs on
c.country_code = cs.code WHERE cs.name LIKE '%$context%'");
$context = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($context);

//$stmt = $conn->query("SELECT continent FROM countries");
//$continent = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($continent);

?>

<?php if(!(isset($_GET['context']))):?>

<table  class ="table1">
    <div>
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

<?php else : ?>

<table class=table2>
    <div id="main1">
<thead>
   <th>City Name</th>
   <th>District</th>
   <th>Population</th>
   
</thead>
<tbody>
    <?php foreach ($context as $row): ?>
 <tr>
     <td> <?= $row['city']?></td>
     <td> <?=$row['district']?></td>
     <td> <?=$row['population']?></td>
    
     
 </tr>   
  <?php endforeach; ?>  
    
</tbody>
</div>
</table>
<?php endif; ?>
