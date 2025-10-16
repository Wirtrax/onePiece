<?php
session_start();
require_once('../../connection.php');


$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM hero";
if ($search !== '') {
    $sql .= " WHERE name LIKE ? OR nickname LIKE ?";
    $searchTerm = '%' . $search . '%';
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
} else {
    $stmt = $link->prepare($sql);
}
$stmt->execute();
$result = $stmt->get_result();

$html = '';
while ($row = $result->fetch_assoc()) {
    $html .= '<div class="card" style="background-image:url(../entities/img/page2-selectHero/heroImage/bgLogoSelectHero.png);">
                <img src="' . $row['photoOnCard'] . '" alt="" class="card-photoHero">
                <div class="card-hoverInformation">
                    <a href="hero.php?id=' . $row['id'] . '" class="card-hoverInformation__link"><span>' . $row['name'] . '</span></a>
                </div>
            </div>';
}

echo $html;
?>
