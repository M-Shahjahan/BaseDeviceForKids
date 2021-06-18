$(document).ready(function () {
    console.log("ready");
    $('#nominationForm').submit(function (event) {

        event.preventDefault();
        var form=$(this);
        document.getElementById("nominate").disabled = true;
        var data=form.serializeArray();
        var values=["Name","Email","School","Address","Connection","Contact","Position","Email Address","Other Info",""];
        let finalData = [
           data[1].value,
           data[2].value,
           data[3].value,
           data[4].value,
           data[6].value,
           data[7].value,
           data[8].value,
           data[9].value,
           data[10].value,
           data[11].value
       ];
        for(var index=0;index<10;++index){

            if(finalData[index]==""){
                if(values[index]==""){
                    document.getElementsByClassName('help-block')[index].innerHTML="Please confirm you are not a bot.";
                }
                else{
                    document.getElementsByClassName('help-block')[index].innerHTML=values[index]+" cannot be blank.";
                }
            }

        }
        $.ajax({
            url: '/web/?r=site/submit',
            type:'POST',
            data: data,
            dataType:'json'
            }
        ).done(function (response) {
            if(response==1){

                document.getElementById('flash_text').innerText="Thank You! You have successfully submitted a nomination";
                document.getElementById('flash_text').style.color="#092864";
                document.getElementById("nominate").disabled = false;
                document.getElementById('nominationform-recaptcha').value="";
                $("#nominationForm").trigger("reset");
                grecaptcha.reset();
            }
            else if(response==0){
                document.getElementById('flash_text').innerText="Please fill the missing fields";
                document.getElementById('flash_text').style.color="white";
                document.getElementById("nominate").disabled = false;
                document.getElementById('nominationform-recaptcha').value="";
                grecaptcha.reset();
            }
        })
    });
})
