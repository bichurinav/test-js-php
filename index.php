<?include "./modules/loadData.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Турнирная таблица | Autoracing</title>
</head>
<body>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr class="text-primary">
                    <th scope="col">Номер места</th>
                    <th scope="col">Имя пилота</th>
                    <th scope="col">Город пилота</th>
                    <th scope="col">Автомобиль</th>
                    <th scope="col">
                        <span class="attempt">1</span>-, <span class="attempt">2</span>-, <span class="attempt">3</span>-, <span class="attempt">4</span>- Попытки
                    </th>
                    <th scope="col" class="points">Сумма очков</th>
                </tr>
            </thead>
            <tbody class="content">
                <?foreach ($arResult as $key => $arItem) :?>
                    <tr>
                        <th><?=$key + 1?></th>
                        <td><?=$arItem["name"]?></td>
                        <td><?=$arItem["city"]?></td>
                        <td><?=$arItem["car"]?></td>
                        <td><?=$arItem["attempts"]?></td>
                        <td><?=$arItem["points"]?></td>
                    </tr>
                <?endforeach?>
            </tbody>
        </table>
    </div>
    <script src="./index.js"></script>
</body>
</html>
