function validateNames(in_,inmsg)
{
    var regex = new RegExp('^([a-zA-Z]{1,}( |-)?)+[a-zA-Z]{1,}$','g');
    var txt = document.getElementById(in_).value;
    if(regex.test(txt) == true)
    {
        document.getElementById(in_).setAttribute("class","form-control");
        document.getElementById(inmsg).innerHTML = "format respecte";   
        document.getElementById(inmsg).setAttribute("class","alert alert-success");   
    }
    else
    {
        document.getElementById(in_).setAttribute("class","form-control is-invalid");
        document.getElementById(inmsg).innerHTML = "lettre majuscule et minuscule, espace et -";   
        document.getElementById(inmsg).setAttribute("class","alert alert-danger");   
    }
}

function validatePostalCode(in_,inmsg)
{
    var regex = new RegExp('^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}(\s)?[0-9]{1}[a-zA-Z]{1}[0-9]{1}$','g');
    var txt = document.getElementById(in_).value;
    if(regex.test(txt) == true)
    {
        document.getElementById(in_).setAttribute("class","form-control is-valid");
        document.getElementById(inmsg).innerHTML = "format respecte";   
        document.getElementById(inmsg).setAttribute("class","alert alert-success");   
    }
    else
    {
        document.getElementById(in_).setAttribute("class","form-control is-invalid");
        document.getElementById(inmsg).innerHTML = "Format accepte : A0A 0A0,a0a a0a,A0A0A0,a0a0a0";   
        document.getElementById(inmsg).setAttribute("class","alert alert-danger");   
    }
}

function validateEmail(in_,inmsg)
{
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var txt = document.getElementById(in_).value;
        if(regex.test(txt) == true)
        {
            document.getElementById(in_).setAttribute("class","form-control alert alert-success");
            document.getElementById(inmsg).innerHTML = "format respecte";  
            document.getElementById(inmsg).setAttribute("alert alert-success"); 
        }
        else
        {
            document.getElementById(in_).setAttribute("class","form-control alert alert-danger");
            document.getElementById(inmsg).innerHTML = "doit comporter @ et .com";   
            document.getElementById(inmsg).setAttribute("class","alert alert-danger");   
        }
}

function validatePhone(in_,inmsg)
{
    var regex = /^(\s)*([0-9]+(-|\s){0,1})*(\s)*$/;
    var txt = document.getElementById(in_).value;
        if(regex.test(txt) == true)
        {
            document.getElementById(in_).setAttribute("class","form-control is-valid");
            document.getElementById(inmsg).innerHTML = "format respecte";  
            document.getElementById(inmsg).setAttribute("class","alert alert-success");
        }
        else
        {
            document.getElementById(in_).setAttribute("class","form-control is-invalid");
            document.getElementById(inmsg).innerHTML = "doit comporter seulement des numero - et espace";   
            document.getElementById(inmsg).setAttribute("class","alert alert-danger");   
        }
}

function validatePassword(in1,in1msg)
{
    var regex = new RegExp('^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])\\w{6,}$','g');

    var txt = document.getElementById(in1).value;
    if(regex.test(txt) == true)//password is valid
    {
        document.getElementById(in1).setAttribute("class","form-control is-valid");
        document.getElementById(in1msg).innerHTML = "format respecte";     
        document.getElementById(in1msg).setAttribute("class","alert alert-success");   
    }
    else//password is in valid
    {
        document.getElementById(in1).setAttribute("class","form-control is-invalid");
        document.getElementById(in1msg).innerHTML = "6 - 12 charactere, 1 majuscule et 1 nombre 0 - 9";
        document.getElementById(in1msg).setAttribute("class","alert alert-danger");
    }
}

function validateCheckBox(in1,in2)
{
    if(document.getElementById(in1).checked == true)
    {
        document.getElementById(in2).checked = false;
    }
    if(document.getElementById(in2).checked == true)
    {
        document.getElementById(in1).checked = false;
    }
}

function validatePasswords(in1,in2,in2msg)
{
    var str1 = document.getElementById(in1).value;
    var str2 = document.getElementById(in2).value;
    if(str1.localeCompare(str2) == 0)
    {
        document.getElementById(in2).setAttribute("class","form-control is-valid");
        document.getElementById(in2msg).innerHTML = "les mots de passe concordent";
        document.getElementById(in2msg).setAttribute("class","alert alert-success");
    }
    else
    {
        document.getElementById(in2).setAttribute("class","form-control is-invalid");
        document.getElementById(in2msg).innerHTML = "les mots de passe ne concordent pas";
        document.getElementById(in2msg).setAttribute("class","alert alert-danger");
    }
}
function emailIsAlreadyTaken(last_name, validLastName, first_name,validFirstName,inputEmail,validEmail,inputPassword,validPassword,inputPasswordConfirm,passwordMatches)
{
    validateNames(last_name,validLastName);
    validateNames(first_name,validFirstName);
    validatePassword(inputPassword,validPassword,inputPasswordConfirm,passwordMatches);
    validatePasswords(inputPassword,inputPasswordConfirm,passwordMatches);
    document.getElementById(inputEmail).setAttribute("class","alert alert-danger");
    document.getElementById(validEmail).innerHTML = "cette adresse est deja prise";   
    document.getElementById(validEmail).setAttribute("class","alert alert-danger"); 
}
