<?php
require_once("dbcontroller1.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM login WHERE colaborador like '" . $_POST["keyword"] . "%' ORDER BY colaborador LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["colaborador"]; ?>');"><?php echo $country["colaborador"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>