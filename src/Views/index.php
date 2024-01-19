<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>

<body>
    <style>
        .main {
            width: 1500px;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            border: 1px solid #ececec;
        }

        .form-buttons {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .form-buttons input[type="text"] {
            width: 50vw;
            padding: 20px;
            border-radius: 5px;
            font-size: 15px;
        }

        .list-data {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <script>
        async function sendAjax(url, params) {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(params)
            });

            //const data = await response.json();
        }

        function saveData(e) {
            e.preventDefault();;
            let params = {
                data: document.querySelector('.save-data').value
            };
            console.log(params);
            sendAjax('/save', params);
        }

        function deleteData() {
            let params = {
                data: document.querySelector('.delete').datatype.id
            };
            sendAjax('/delete', params);
        }

        window.addEventListener('load', function() {
            var save = document.querySelector('.save-button');
            save.addEventListener('click', saveData);

            var del = document.querySelector('.delete-button');
            del.addEventListener('click', deleteData);
        });
    </script>
    <div class="main">
        <div class="form-data">
            <ul class="list-data">
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $item) : ?>
                        <li>Название: <?= $item['name'] ?> Артикул: <?= $item['articul'] ?> <span data-id="<?= $item['id'] ?>">Удалить</span></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="form-buttons">
            <input type="text" class="save-data">
            <a href="/save" class="save-button">save</a>
        </div>
    </div>

</body>

</html>