<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - SatellaSoft</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body class="bg-img">

    <div class="dv-center">
        <div>

            <div id="chat">
                <!-- <p><span>Gunnar: </span> testando 123</p> -->
            </div>

            <form method="POST" id="frm-chat" class="mb-5">
                <div class="row">
                    <div class="col-md-9">
                        <input type="hidden" id="txt-user-name" value="<?= strip_tags($_POST['txt-name'] ?? 'User') ?>">
                        <input type="text" id="txt-message" placeholder="Put your message" class="form-control w-100">
                    </div>
                    <div class="col-md-3" style="text-align: right;">
                        <button type="submit" class="btn btn-outline-success">Chat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/assets/js/chat.js"></script>
</body>

</html>