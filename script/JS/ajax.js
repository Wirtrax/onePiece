$(document).ready(function(){
    $('#cardSearch').on('input', function(e){
        var searchText = $(this).val().trim().toLowerCase();
        var url = "../SCRIPT/php/ajaxSearch.php";
        if (searchText.length > 0) { // Отправляем запрос только если в поле введен текст
            url += "?search=" + searchText;
        }
        $.get(url, function(data){
            $('#cardsContainer').html(data); // Обновляем контейнер с карточками
        });
    });
});