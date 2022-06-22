<?php
session_start();
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
include './tresidebar.php';
?>


<div class="content">

    <div class="container my-4">
        <form action="">
            <div class="row">
                <div class="mb-3 col-sm" style="max-width: 20vw;">
                    <label for="exampleFormControlInput1" class="form-label">MONTH : </label><span id="lbmonth"></span>

                    <select onchange="filterreports()" class="form-select" name="month" id="month" aria-label="Default select example" required>
                        <option value="dummy" selected>Select Expense month</option>
                    </select>
                </div>

                <div class="mb-3 col-sm" style="max-width: 20vw;">
                    <label for="exampleFormControlInput1" class="form-label">YEAR : </label>
                    <input name="year" placeholder="enter year of expense" id="year" onchange="filterreports()" onkeyup="filterreports()" value="<?php echo $data['in_year'] ?>" type="number" class="form-control col-7" min="2022" max="2099" required>
                </div>
                <div class="my-2 col-sm" style="max-width: 20vw;">
                    <button class="btn btn-dark mx-3 my-4" onclick="window.print()">Print</button>
                </div>
            </div>
        </form>

    </div>

    <h3>
        <div id="txtHint"><b>Report will be listed here...</b></div>
    </h3>

</div>

<script src="../js/monthyear.js"></script>

<script>
    function filterreports() {
        var month = document.getElementById('month').value;
        var year = document.getElementById('year').value;
        if (month == 'dummy' && year == "") {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getallreports.php?month=" + month + "&year=" + year, true);
            xmlhttp.send();
        }
    }
</script>