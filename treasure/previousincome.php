<?php
session_start();
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
include './tresidebar.php';
?>

<div class="content">
    <a class="btn btn-dark my-5 mx-3 " href="./income.php">Current Month Income</a>
    <a class="btn btn-dark my-5 disabled" href="./previousincome.php">Previous Months' Income</a>

    <form action="">
        <div class="row">
            <div class="mb-3 col-sm" style="max-width: 20vw;">
                <label for="exampleFormControlInput1" class="form-label">MONTH : </label><span id="lbmonth"></span>

                <select onchange="showUser(this.value)" class="form-select" name="month" id="month" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Income month</option>
                </select>
            </div>

            <div class="mb-3 col-sm" style="max-width: 20vw;">
                <label for="exampleFormControlInput1" class="form-label">YEAR : </label>
                <input name="year" placeholder="enter year of income" id="year" onchange="showincomebyyear(this.value)" onkeyup="showincomebyyear(this.value)" value="<?php echo $data['in_year'] ?>" type="number" class="form-control col-7" min="2022" max="2099" required>
            </div>
        </div>
    </form>
    <h3><div id="txtHint"><b>Income info will be listed here...</b></div></h3>

</div>

<script src="../js/monthyear.js"></script>
<script>
    function showUser(month) {
       var year=document.getElementById('year').value;
        if (year == "") {
            document.getElementById("txtHint").innerHTML = "Please Enter Year......";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getincomeajax.php?month=" + month+"&year="+year, true);
            xmlhttp.send();
        }
    }

    function showincomebyyear(year){
        var month=document.getElementById('month').value;
        if(month=="dummy"){
            document.getElementById("txtHint").innerHTML = "Please Select the Month......";
            return;
        }else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getincomeajax.php?month=" + month+"&year="+year, true);
            xmlhttp.send();
        }
    }
</script>

