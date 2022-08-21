<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
for($i = 0; $i < count($_POST['q']); ++$i) {
    if($_POST['q'][$i] == 'yes') {
        ++$yes;
    }
}
<body>
	<form action="results.php" method="post" enctype="multipart/form-data"><br>
            <p>Have you ever turned a client down?</p>
            <div id="q_1">
                <input type="radio" name="q[]" id="q_1_yes" value="yes">
                <label for="q_1_yes">Yes</label>
                <input type="radio" name="q[]" id="q_1_no" value="no">
                <label for="q_1_no">No</label>
            </div><br>
            <p>Are you comfortable with failure?</p>
            <div id="q_1">
                <input type="radio" name="q[]" id="q_2_yes" value="yes">
                <label for="q_2_yes">Yes</label>
                <input type="radio" name="q[]" id="q_2_no" value="no">
                <label for="q_2_no">No</label>
            </div><br>
            <p>Can your concept be easily described and understood?</p>
            <div id="q_1">
                <input type="radio" name="q[]" id="q_3_yes" value="yes">
                <label for="q_3_yes">Yes</label>
                <input type="radio" name="q[]" id="q_3_no" value="no">
                <label for="q_3_no">No</label>
            </div><br>
                    <input type="submit" name="sub_eit" id="sub_eit" value="Submit">
                </div>
            </form>
</body>
</html>