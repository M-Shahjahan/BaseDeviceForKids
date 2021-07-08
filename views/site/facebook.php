<html>
<head>
    <title>User Meta Data Update</title>
</head>
<body>
    <p id="result-box">Waiting....</p>
</body>
</html>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '253441299477577',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v11.0'
        })
        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me', function(response) {
                    console.log('Good to see you, ' + response.name + '.');
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
        var accessToken;
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                accessToken = response.authResponse.accessToken;
                console.log("connected");
            } else if (response.status === 'not_authorized') {
                console.log("not authorized");
            } else {
                console.log("not logged in");
            }
        });
        console.log(accessToken);
        $.ajax({
                url: 'web/?r=site/instagram',
                type:'POST',
                data: {'accessToken':accessToken},
                dataType:'json'
            }
        ).done(function (response) {
            if(response==0){
                document.getElementById('result-box').innerText="All records are successfully updated";
            }
            else if(response==1){
                document.getElementById('result-box').innerText="Some records are not successfully updated";
            }
        })
    };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

