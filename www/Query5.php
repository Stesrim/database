<!DOCTYPE HTML>
<!-- ���ݭn���٨�L�ҪO���ܡA���ˤ@�Ӻ���:https://html5up.net/ -->
<html>
<head>
	<title>University course registration system</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script>
        // ��ܬd�L��ƪ�ĵ�ܰT��
        function showAlert() {
            alert('�d�L�����');
        }
    </script>
</head>
    
    <body class="is-preload">
    
<!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Header -->
        <header id="header">
            <div class="content">    
                <div class="inner">
                    <h1>The number of students taught by each teacher</h1>
                </div>
        </div>  
        </header>

    <!-- Menu -->
    <?php
    $hostname = "web.csie2.nptu.edu.tw";
    $username = "cei111018";//�o��n�������A�t�p����Account
    $password = "lan930513";//�o��n�������A�t�p����Password
    $database = "cei111018_temp";//�o��n�������A�t�p������Ʈw�W��1.(�p�G�ئb��������Ʈw�ɥX��O�L�k�A�פJ�t�p������Ʈw��̪������P)2.(���t�p������Ʈw�i�H�b�ɥX��פJ��������Ʈw)

    try {
        $final_db = new mysqli($hostname, $username, $password, $database);
        $final_db->set_charset("utf8");//�h�o�@�檺�ηN�b���{��Ū���ɡA�T�O�b�q��Ʈw�^���ƾڮɡA������T�a�B�z�M��ܥ]�t���嵥�h�r�`�B�Ū���ơC

        // �ˬd�s�u�O�_���\
        if ($final_db->connect_errno) {
            throw new Exception("Failed to connect to MySQL: " . $final_db->connect_error);
        }
        //�d�߷�Ǵ��C�ӦѮv�Ъ��ǥͼƶq
        //SELECT T.TName, T.TID,COUNT(DISTINCT(CL.S_ID)) AS Student_Num
        //FROM `CT`, `Course_List` as CL, `TEACHER` AS T 
        //WHERE CT.Semester = "113-1" AND 
        //CT.Semester = CL.Semester AND 
        //T.TID = CT.TeacherID AND 
        //CT.CourseID = CL.Course_ID GROUP BY T.TID
        // �ˬd�O�_���ϥΪ̿�J������r
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $sql = "SELECT T.TName, T.TID, COUNT(DISTINCT(CL.S_ID)) AS Student_Num  
            FROM `CT`, `Course_List` as CL, `TEACHER` AS T
            WHERE CT.Semester = ? AND
            CT.Semester = CL.Semester AND
            T.TID = CT.TeacherID AND
            CT.CourseID = CL.Course_ID GROUP BY T.TID";

            // �ϥιw��SQL�y�y(�ھڤW�����d�ߩҵ���SQL�y�k�A�b�o��⥦�ɤJ)
            $stmt = $final_db->prepare($sql);

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $final_db->error);
            }

            $stmt->bind_param("s", $keyword);

            // ����d��
            if ($stmt->execute()) {
                echo "<br/>";
                $result = $stmt->get_result();

                // ���o�O����
                $total_records = $result->num_rows;

                if ($total_records > 0) {
                    echo "<table>";
                    echo "<br/>";
                    echo "<br/>";
                    echo "<tr><th>Name</th><th>Teacher_ID</th><th>Student_Num</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["TName"] . "</td>";
                        echo "<td>" . $row["TID"] . "</td>";
                        echo "<td>" . $row["Student_Num"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<script>showAlert();</script>"; 
                    echo "<br/>";
                    echo "<br/><b>�Э��s��J</b><hr/>";
                }
            } else {
                throw new Exception("Error executing statement: " . $stmt->error);
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $final_db->close();
    ?>

    <br/>
    <br/>
    <form method="post" action="">
        <br/>��J�n�j�M���Ǵ�: <input type="text" name="keyword"  />
        <br/>
        <input type="submit" value="�d��" />
    </form>
    <br/>
    <a href="index.php"><button>Back</button></a>
    </div>
    <!--BG-->
        <div id="bg"></div>
    <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
	    <script src="assets/js/browser.min.js"></script>
	    <script src="assets/js/breakpoints.min.js"></script>
	    <script src="assets/js/util.js"></script>
	    <script src="assets/js/main.js"></script>

    </body>
</html>
