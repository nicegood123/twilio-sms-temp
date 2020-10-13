var table = document.getElementById('table');

for (var i = 1; i<table.rows.length; i++) {

    table.rows[i].onclick=function(){
        document.getElementById("number").value = this.cells[3].innerHTML;
        document.getElementById("user_id").value = this.cells[0].innerHTML;
    };

}
