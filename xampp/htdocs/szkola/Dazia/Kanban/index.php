<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.min.css">
    <title>DDKANBAN</title>

    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  
    <script src="https://www.google.com/recaptcha/api.js?render=6LdPjQ0fAAAAABMsRVAttNKfzaERhBoSzEBMWzEz"></script>

</head>

<body>
    <div class="container">
        <form id="newsletterForm" action="subscribe_newsletter_submit.php" method="post">
            <div>
                <div>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <input type="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#newsletterForm').submit(function(event) {
            event.preventDefault();
            var email = $('#email').val();

            grecaptcha.ready(function() {
                grecaptcha.execute('6LdLk7EUAAAAAEWHuB2tabMmlxQ2-RRTLPHEGe9Y', {
                    action: 'subscribe_newsletter'
                }).then(function(token) {
                    $('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#newsletterForm').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                    $('#newsletterForm').unbind('submit').submit();
                });;
            });
        });
    </script>
</body>

</html>