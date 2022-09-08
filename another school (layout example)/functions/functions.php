<?php
    $mysqli = false;
    function connectDB () {
        global $mysqli;
        $mysqli = new mysqli("127.0.0.1:3306 ", "root", "root", "school");
        $mysqli->query("SET NAMES 'utf8'");
        if (mysqli_connect_errno()) {
            printf("Не удалось подключиться: %s\n", mysqli_connect_error());
            exit();
        }
    }
    
    function closeDB () {
        global $mysqli;
        $mysqli->close();
    }

    function resultToArray($result) {
        $array = array ();
        // $rows = $result->fetch_all(MYSQLI_ASSOC);
        // foreach ($rows as $row){
        //     $array[] = $row;
        // }
        // $result->data_seek(0);
        // while ($row = $res->fetch_all()) {
        //     $array[] = $row;
        // }
        return $results;
    }

    function getGrade () {
        global $mysqli;
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        connectDB();
        $result = $mysqli->multi_query
        ("SELECT su.subject, su.name_teacher, st.full_name, g.grade, g.data FROM grade g, student st, subject su WHERE g.id_student = st.id_student AND g.id_subject = su.id_subject ORDER BY g.id_subject");
        if(is_null($result)) return -1;
        else return resultToArray($result);
        closeDB();
    }
?>