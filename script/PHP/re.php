<?session_start();

require_once('../../connection.php');
header('location:../../pages/selectHeroAdmin.php');
// Проверяем, существует ли параметр 'id' в $_GET
if (isset($_GET['id'])) {
    $cardId = $_GET['id'];

    // Проверяем, что $cardId является числом
    if (is_numeric($cardId)) {
        // Проверяем, что карточка с таким идентификатором существует в базе данных
        $result = mysqli_query($link, "SELECT * FROM hero WHERE id = $cardId");
        if (mysqli_num_rows($result) > 0) {
            mysqli_query($link, "DELETE FROM hero WHERE id = $cardId");
        } else {
            // Идентификатор карточки не найден в базе данных
            echo "Карточка с идентификатором $cardId не найдена.";
        }
    } else {
        // Параметр 'id' не является числом
        echo "Недопустимый идентификатор карточки.";
    }
} else {
    // Параметр 'id' не был передан в URL
    echo "Идентификатор карточки не был передан.";
}
?>