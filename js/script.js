window.onload = function () {
    realTime();
    displayDateTime();
    homeNav();
    tables();

}

function realTime(){
    var refresh=1000;
    mytime=setTimeout('displayDateTime()',refresh);
}

function displayDateTime() {
    var x =document.getElementById('currentDateTime');
    if(! x){} else {
        var x = new Date();

        if(x.getHours() > 12 ){
            var time = (x.getHours()-12)+ ":" + x.getMinutes() + ":" + x.getSeconds() + " PM";
        } else
            var time = x.getHours()+ ":" + x.getMinutes() + ":" + x.getSeconds() + " AM";

        var monthArr = new Array(12);
        monthArr[0] = "January";
        monthArr[1] = "February";
        monthArr[2] = "March";
        monthArr[3] = "April";
        monthArr[4] = "May";
        monthArr[5] = "June";
        monthArr[6] = "July";
        monthArr[7] = "August";
        monthArr[8] = "September";
        monthArr[9] = "October";
        monthArr[10] = "November";
        monthArr[11] = "December";

        var month = monthArr[x.getMonth()];
        var mo = x.getMonth();
        var date = x.getDate();
        var year = x.getFullYear();
            // year = year.toString().substr(2,2);
        var date = month + ' ' + date + ', ' + year;
        var sqlDate = mo + '/' + date + '/' + year;

        var dateTime = time + '<br><h4>' + date + '</h4>';

        document.getElementById('currentDateTime').innerHTML = dateTime;
        $(".joEmpty #dateOfPrerepairRequest").val(sqlDate); 
    }

    xx = realTime();
}

function homeNav(){
    var activeEl = -1;
    var items = $('#homenav .btn-nav');
    $( items[activeEl] ).addClass('active');
}

function tables(){
    //ingoing supplies
    $("#inSuppliesTable").bootgrid({
        ajax: true,
        url: "data-servers/ingoing-supplies-server.php",
    });
    //outgoing supplies
    $("#outSuppliesTable").bootgrid({
            ajax: true,
            url: "data-servers/outgoing-supplies-server.php",
    });
    //session logs
    $("#sessionsTable").bootgrid({
            ajax: true,
            url: "data-servers/session-logs-server.php",
    });
}

function reload(){
    location.reload();
}


function clearForm() {
    document.getElementById('joForm').reset();
    document.getElementById('joEditForm').reset();
    document.getElementById('fabForm').reset();

}

function printForm(divName) { 
    location.reload();
    var originalContents = document.body.innerHTML;
    var printContents = document.getElementById(divName).innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function checkRemarks(val){
 var element=document.getElementById('others');
 // var element2=document.getElementById('otherslabel');
 if(val=='Select remark'||val=='Others') {
   element.style.display='block';
   // element2.style.display='block';
 } else {  
   element.style.display='none';
   // element2.style.display='none';
   }
}


