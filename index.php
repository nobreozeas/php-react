<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>

<body>

    <output>

    </output>

    <input type="text">


    <script>
        const output = document.querySelector('output');
        const input = document.querySelector('input');

        const ws = new WebSocket('ws://localhost:8001');


        input.addEventListener('keypress', function(event) {
            console.log(event);
            if (event.key === 'Enter') {
                const div = document.createElement('div');
                div.textContent = `Eu: ${input.value}`;
                output.append(div);

                ws.send(input.value);

                input.value = '';
            }
        });

        ws.addEventListener('message', message => {
            const div = document.createElement('div');
            div.textContent = `Alguem: ${message.data}`;
            output.append(div);


            ;
        });
    </script>

</body>

</html>