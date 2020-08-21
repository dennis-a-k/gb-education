function init() {
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        showGoods
    );
}

function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
    let out = '<select>';
    out += '<option data-id="0">Новый товар</option>';
    for (let id in data) {
        out += '<option data-id="' + id + '">' + data[id].title + '</option>';
    }
    out += '</select>';
    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods)
}

function selectGoods() {
    let id = $('.goods-out select option:selected').attr('data-id');

    $.post(
      "core.php",
        {
            "action" : "selectOneGoods",
            "good-id" : id
        },
        function (data) {
          data = JSON.parse(data);
          $('#good-name').val(data.title);
          $('#good-desc').val(data.full_info);
          $('#good-price').val(data.price);
          $('#good-img').val(data.img);
          $('#good-id').val(data.id);
        }
    );
}

function saveToDb() {
    let id = $('#good-id').val();
    if (id != "") {
        $.post(
            "core.php",
            {
                "action" : "updateGoods",
                "id" : id,
                "good-name" : $('#good-name').val(),
                "good-price" : $('#good-price').val(),
                "good-desc" : $('#good-desc').val(),
                "good-img" : $('#good-img').val()

            },
            function (data) {
                if (data == 1) {
                    alert("Запись добавлена")
                    init();
                } else {
                    console.log(data);
                }
            }
        );
    } else {
        $.post(
            "core.php",
            {
                "action" : "newGoods",
                "id" : 0,
                "good-name" : $('#good-name').val(),
                "good-price" : $('#good-price').val(),
                "good-desc" : $('#good-desc').val(),
                "good-img" : $('#good-img').val()

            },
            function (data) {
                if (data == 1) {
                    alert("Запись добавлена");
                    init();
                } else {
                    console.log(data);
                }
            }
        );
    }
}

$(document).ready(function () {
    init();
    $('.add-to-db').on('click', saveToDb)
});