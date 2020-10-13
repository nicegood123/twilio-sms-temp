var table = document.getElementById('table');
var btnSms = document.getElementById('smsbtn');


for (var i = 1; i<table.rows.length; i++) {

    table.rows[i].onclick=function(){
        document.getElementById("number").value = this.cells[3].innerHTML;
    };

}
