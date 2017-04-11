var fname,lname,hno,street,city,province,zip,phone,cellphone,bday,citizen,zsign,zyear,bdayOfWeek;
   fname = document.forms["myForm"]["firstname"];
   lname = document.forms["myForm"]["lastname"];
   hno = document.forms["myForm"]["houseNo"];
   street = document.forms["myForm"]["street"];
   city = document.forms["myForm"]["city"];
   province = document.forms["myForm"]["province"];
   zip = document.forms["myForm"]["zipcode"];
   phone = document.forms["myForm"]["phone"];
   cellphone = document.forms["myForm"]["cellphone"];
   bday = document.forms["myForm"]["bday"];
   citizen = document.forms["myForm"]["citizenshipNo"];
   zsign = document.forms["myForm"]["zodiacSign"];
   zyear = document.forms["myForm"]["zodiacYear"];
   bdayOfWeek = document.forms["myForm"]["bdayOfWeek"];

function validateForm() {
   if(isNaN(hno.value.charAt(0))){
	document.getElementById("hne").innerHTML = "* House number must start with number";
	return false;
   }
   if(!validatePhone()){
	document.getElementById("pe").innerHTML = "* Phone number must be in form +662-xxx-xxx";
	return false;
   }
   if(!validateCellphone()){
	document.getElementById("cpe").innerHTML = "* Cell phone number must be in form +66xx-xxx-xxxx";
	return false;
   }
   if(citizen.value.length < 13){
	document.getElementById("cne").innerHTML = "* Citizenship number must be 13 digits";
	return false;
   }
   save();
   alert("Cookie has been created using citizenship number: "+citizen.value+" and phone number: "+phone.value);
   localStorage.setItem("cookieCitizen",citizen.value);
   localStorage.setItem("cookiePhone",phone.value);
}

function validatePhone(){
    var phoneV = phone.value;
    if (phoneV.length != 12 ) {
        return false;
    }
    if (phoneV.slice(0,4)!="+662") {
        return false;
    }
    if(phoneV.charAt(4) != '-' && phoneV.charAt(8) != '-'){
	return false;
    }
    if(isNaN(phoneV.slice(5,8)) || isNaN(phoneV.slice(9,12))){
	return false;
    }
    return true;
}

function validateCellphone(){
    var phoneV = cellphone.value;
    if (phoneV.length != 14 ) {
        return false;
    }
    if (phoneV.slice(0,3)!="+66") {
        return false;
    }
    if(phoneV.charAt(5) != '-' && phoneV.charAt(9) != '-'){
	return false;
    }
    if(isNaN(phoneV.slice(3,5)) || isNaN(phoneV.slice(6,9)) || isNaN(phoneV.slice(10,14))){
	return false;
    }
    return true;
}

function save(){
   localStorage.setItem("fname", fname.value);
   localStorage.setItem("lname", lname.value);
   localStorage.setItem("hno", hno.value);
   localStorage.setItem("street", street.value);
   localStorage.setItem("city", city.value);
   localStorage.setItem("province", province.value);
   localStorage.setItem("zip", zip.value);
   localStorage.setItem("phone", phone.value);
   localStorage.setItem("cellphone", cellphone.value);
   localStorage.setItem("bday", bday.value);
   localStorage.setItem("citizen", citizen.value);
   localStorage.setItem("zsign", zsign.value);
   localStorage.setItem("zyear", zyear.value);
   localStorage.setItem("bdayOfWeek", bdayOfWeek.value);
}

fname.value = localStorage.getItem("fname");
lname.value = localStorage.getItem("lname");
hno.value = localStorage.getItem("hno");
street.value = localStorage.getItem("street");
city.value = localStorage.getItem("city");
province.value = localStorage.getItem("province");
zip.value = localStorage.getItem("zip");
phone.value = localStorage.getItem("phone");
cellphone.value = localStorage.getItem("cellphone");
bday.value = localStorage.getItem("bday");
citizen.value = localStorage.getItem("citizen");
zsign.value = localStorage.getItem("zsign");
zyear.value = localStorage.getItem("zyear");
bdayOfWeek.value = localStorage.getItem("bdayOfWeek");
