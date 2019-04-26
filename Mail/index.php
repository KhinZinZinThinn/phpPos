<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h2> Send Email</h2>
            <form method="post" action="send">
                <div class="form-group">
                    <input type="email" name="sender_email" class="form-control" placeholder="Enter Sender Email Address">
                </div>
                <div class="form-group">
                    <input type="email" name="receiver_email" class="form-control" placeholder="Enter Receiver Email Address">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Body"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                </div>

            </form>
        </div>
    </div>
    <a href="show/100/Aye Aye/ayeaye@gmail.com">GO to Show</a>
</div>

</body>
</html>