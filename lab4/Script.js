$(function () {
    $('h4:first').css("text-align", "center");
    $('div:first').css("text-align", "center");
    $('div').css("background-color", "#c5e3ff");
    $('body').css("background-color", "#fff5cd");
    $('div').css("padding", "5px 10px 20px 10px");
    $('div').css("width", "200px");
    $('img').hide();
    $('#btn').click(function () {
        $('#response').text("clicked");
        var fname, lname, bday, gender;
        fname = document.forms["myForm"]["firstname"].value;
        lname = document.forms["myForm"]["lastname"].value;
        bday = document.forms["myForm"]["bday"].value;
        gender = document.forms["myForm"]["gender"].value;
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $('#response').text("test");
                $('#response').text(this.responseText);
            }
        };
        xhttp.open("GET", "server/getResult.php?fname=" + fname + "&lname=" + lname + "&gender=" + gender + "&bday=" + bday, true);
        xhttp.send();
    });
    $('select').change(function () {
        var prov = document.forms["myForm"]["province"].value;
        $('#prov').text(prov);
        var url = "server/motto/" + prov + ".txt";
        var url_img = "server/sign/" + prov + ".png";
        $('#motto').load(url);
        $('img').show();
        $('img').attr('src', 'url_img');
    });
})
