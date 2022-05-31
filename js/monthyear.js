{
    var monthArray = new Array();
    monthArray[0] = "January";
    monthArray[1] = "February";
    monthArray[2] = "March";
    monthArray[3] = "April";
    monthArray[4] = "May";
    monthArray[5] = "June";
    monthArray[6] = "July";
    monthArray[7] = "August";
    monthArray[8] = "September";
    monthArray[9] = "October";
    monthArray[10] = "November";
    monthArray[11] = "December";
    for (m = 0; m <= 11; m++) {
        var optn = document.createElement("OPTION");
        optn.text = monthArray[m];
        // server side month start from one
        optn.value = (m + 1);

       

        document.getElementById('month').options.add(optn);
    }
}

{
    for(y = 2022; y <= 2050; y++) {
        var optn = document.createElement('OPTION');
        optn.text = y;
        optn.value = y;
        
        // if year is 2015 selected
        if (y == 2015) {
        optn.selected = true;
        }
        
        document.getElementById('year').options.add(optn);
        }
}

function validateform(){
    let month=document.forms["myform"]["month"].value;
    let year=document.forms["myform"]["year"].value;
    
   // console.log(month);
   // console.log("hello");
    if(month==="dummy"){
        document.getElementById("lbmonth").innerHTML=" *Please Select the month";
       // console.log("month");
        alert("*Please Select the month");
        returnToPreviousPage();
        return false;
    }
    if(year=="dummy"){
        document.getElementById("lbyear").innerHTML=" *Please Select the year";
        //console.log("year");
        alert("*Please Select the Year");
    }
}