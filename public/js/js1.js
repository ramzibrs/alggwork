function suivant(button)
{




    var empt = document.forms["form"]["intitule"].value;
    var empt1 = document.forms["form"]["type"].value;
    var empt2 = document.forms["form"]["besoins"].value;
    var empt3 = document.forms["form"]["beneficier"].value;
    var empt4 = document.forms["form"]["condition"].value;
    var empt5 = document.forms["form"]["wilaya"].value;
    if(empt == "" || empt1== "le type"  || empt5== "choisissez votre wilaya" )
    {
        document.getElementById("input1").required = true;
    document.getElementById("input2").required = true;
    document.getElementById("input6").required = true;
    }
    else {
        document.getElementById("id1").hidden = true;
        document.getElementById("id2").hidden = false;
    }
}

function retour(button)
{
    document.getElementById("id1").hidden = false;
    document.getElementById("id2").hidden = true;

}
