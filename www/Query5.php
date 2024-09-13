<!DOCTYPE HTML>
<!-- 有需要替還其他模板的話，推薦一個網站:https://html5up.net/ -->
<html>
<head>
	<title>University course registration system</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script>
        // 顯示查無資料的警示訊息
        function showAlert() {
            alert('查無此資料');
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
    $username = "cei111018";//這邊要替換成你系計中的Account
    $password = "lan930513";//這邊要替換成你系計中的Password
    $database = "cei111018_temp";//這邊要替換成你系計中的資料庫名稱1.(如果建在本機的資料庫導出後是無法再匯入系計中的資料庫兩者版本不同)2.(但系計中的資料庫可以在導出後匯入本機的資料庫)

    try {
        $final_db = new mysqli($hostname, $username, $password, $database);
        $final_db->set_charset("utf8");//多這一行的用意在讓程式讀取時，確保在從資料庫擷取數據時，能夠正確地處理和顯示包含中文等多字節、符的資料。

        // 檢查連線是否成功
        if ($final_db->connect_errno) {
            throw new Exception("Failed to connect to MySQL: " . $final_db->connect_error);
        }
        //查詢當學期每個老師教的學生數量
        //SELECT T.TName, T.TID,COUNT(DISTINCT(CL.S_ID)) AS Student_Num
        //FROM `CT`, `Course_List` as CL, `TEACHER` AS T 
        //WHERE CT.Semester = "113-1" AND 
        //CT.Semester = CL.Semester AND 
        //T.TID = CT.TeacherID AND 
        //CT.CourseID = CL.Course_ID GROUP BY T.TID
        // 檢查是否有使用者輸入的關鍵字
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $sql = "SELECT T.TName, T.TID, COUNT(DISTINCT(CL.S_ID)) AS Student_Num  
            FROM `CT`, `Course_List` as CL, `TEACHER` AS T
            WHERE CT.Semester = ? AND
            CT.Semester = CL.Semester AND
            T.TID = CT.TeacherID AND
            CT.CourseID = CL.Course_ID GROUP BY T.TID";

            // 使用預備SQL語句(根據上面的查詢所給的SQL語法，在這邊把它導入)
            $stmt = $final_db->prepare($sql);

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $final_db->error);
            }

            $stmt->bind_param("s", $keyword);

            // 執行查詢
            if ($stmt->execute()) {
                echo "<br/>";
                $result = $stmt->get_result();

                // 取得記錄數
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
                    echo "<br/><b>請重新輸入</b><hr/>";
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
        <br/>輸入要搜尋的學期: <input type="text" name="keyword"  />
        <br/>
        <input type="submit" value="查詢" />
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
