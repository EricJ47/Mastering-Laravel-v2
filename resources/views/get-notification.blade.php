<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([ 'resources/js/app.js'])
</head>
<body>
    <h2>Here is your notification</h2>
    <ul id="notificationList">
        
    </ul>

    <script type="module">
        Echo.channel('my-channel')
            .listen('MyEvent', (e) => {
                console.log(e);

                let notificationList = document.getElementById('notificationList');
                let newNotification = document.createElement('Li');
                newNotification.textContent = e.message;

                notificationList.appendChild(newNotification);

            });
        
    </script>
</body>
</html>