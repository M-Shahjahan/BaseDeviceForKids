$(document).ready(function () {
    console.log("ready");
    $('#nominationForm').submit(function (event) {

        event.preventDefault();
        var form=$(this);

        document.getElementById("nominate").disabled = true;
        var data=form.serializeArray();
        /*let finalData = {
            name:data[1].value,
            email:data[2].value,
            school:data[3].value,
            address:data[4].value,
            connection: data[6].value,
            contact:data[7].value,
            position:data[8].value,
            emailAddress:data[9].value,
            otherInfo:data[10].value,
            reCaptcha:data[11].value
        };*/
        $.ajax({
            url: 'https://localhost/basic/web/?r=site/submit',
            type:'post',
            data: data,
            dataType:'json'
            }
        ).done(function (response) {
            if(response==1){
                document.getElementById('nominationForm').reset();
                document.getElementById('flash_text').innerText="Thank You! You have successfully submitted a Nomination";
                document.getElementById('flash_text').style.color="#092864";
                document.getElementById("nominate").disabled = false;
                document.getElementById('nominationform-recaptcha').value="";
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
