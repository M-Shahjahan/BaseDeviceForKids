$(document).ready(function () {
    console.log("ready");
    $('#nominationForm').submit(function (event) {

        event.preventDefault();
        var form=$(this);

        document.getElementById("nominate").disabled = true;
        var data=form.serializeArray();
        $.ajax({
            url: 'https://localhost/basic/web/?r=site/submit',
            type:'post',
            data: data,
            dataType:'json'
            }
        ).done(function (response) {
            if(response==1){

                document.getElementById('flash_text').innerText="Thank You! You have successfully submitted a Nomination";
                document.getElementById('flash_text').style.color="#092864";
                document.getElementById("nominate").disabled = false;
                document.getElementById('nominationform-recaptcha').value="";
                document.getElementById('nominationForm').reset();
                $("#nominationForm").trigger("reset");
                grecaptcha.reset();
            }
            else if(response==0){
                document.getElementById('flash_text').innerText="Please Fill the Missing Fields";
                document.getElementById('flash_text').style.color="white";
                document.getElementById("nominate").disabled = false;
                document.getElementById('nominationform-recaptcha').value="";
                grecaptcha.reset();
            }
        })
    });
})
