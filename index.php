<!-- начало хедера -->
<html>
<head>
    <title>Библиотека.</title>
    <meta name="description" content="Библиотека стихотворений по школьным классам">
    <meta name="keywords" content="Библиотека стихотворений по школьным классам главная">
</head>
<body>
<table width="1200px" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="313233" bgcolor="#cbe3ec">
<tr>
<td><h1 align="center">Библиотека.</h1></td>
</tr>
</table>
<!-- конец хедера -->

<table width="1200px" height="600px" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="313233">
<tr>
    <!-- Начало блока левого меню -->
    <?php 
    $selectedClass = (int) $_GET['selectClass'];
    $inputAuthor = (string) $_GET['inoutAuthor'];
    ?>
    <td colspan="2" valign="top" style="font-size: 14px; font-family: Arial" bgcolor="#ecf8fc">
    <ul>
        <form action="index.php" method="get">
            <h3>Выбор доступных элементов.</h3>
            <p>Класс</p>
            <select value="" name="selectClass">
                <option value="5" <?php if ($selectedClass == "5"): ?>selected<?php endif; ?>>5</option>
                <option value="6" <?php if ($selectedClass == '6'): ?>selected<?php endif; ?>>6</option>
                <option value="7" <?php if ($selectedClass == '7'): ?>selected<?php endif; ?>>7</option>
                <option value="8" <?php if ($selectedClass == '8'): ?>selected<?php endif; ?>>8</option>
                <option value="9" <?php if ($selectedClass == '9'): ?>selected<?php endif; ?>>9</option>
                <option value="10" <?php if ($selectedClass == '10'): ?>selected<?php endif; ?>>10</option>
                <option value="11" <?php if ($selectedClass == '11'): ?>selected<?php endif; ?>>11</option>
            </select>
            <p>Автор</br><input maxlength="25" size="25" type="text" name="inoutAuthor" placeholder="Введите автора..." value=""></p>
            <p><input type="submit" name="submit" value="Показать!"></p>
        </form>
    </ul>
    </td>
    <!-- Конец блока левого меню -->

    <!-- Начало основного блока -->
    <td width="900px" valign="top" align="center">
        <h2  style="color:blue;" ></h2>
        <?php
        class Poem
        {
            // объявление свойств
            public $schoolClass = 0;
            public $authorPoem = '';
            public $titlePoem = '';
            public $textPoem = '';
            public $analysPoem = '';

            function __construct(int $schoolClass, string $authorPoem, string $titlePoem, string $textPoem, string $analysPoem) {
                $this->schoolClass = $schoolClass;
                $this->authorPoem = $authorPoem;
                $this->titlePoem = $titlePoem;
                $this->textPoem = $textPoem;
                $this->analysPoem = $analysPoem;
            }

            // Показать всей информации о стихотворении
            public function displayAllInfoPoem() {
                echo "<h3>" . $this->authorPoem . "</h3>" . "<h3>" . $this->titlePoem . "</h3>";
                echo "<p>" . nl2br($this->textPoem) . "</p> Анализ: <p>" . nl2br($this->analysPoem) . "</p>";
            }
            
            // Показать автора стихотворения
            public function displayAuthorPoem() {
                echo "<form action='index.php' method='post'>";
                // echo  "<input type='text' style='visibility: hidden;' name='postClass' value='" . $this->schoolClass . "'>";
                echo "<h3><button type='submit' name='findPoem'>" . "<input type='text' style='visibility: hidden;' name='postClass' value='" . $this->schoolClass . "'>" . $this->authorPoem . "<input type='text' style='visibility: hidden;' name='postAuthor'  value='" . $this->authorPoem . "'>" . "</button> </h3>";
                // echo "<input type='text' style='visibility: hidden;' name='postAuthor'  value='" . $this->authorPoem . "'>";
                echo "</form>";
            }
        }

        // Массив объектов класса стихотворений
        $poems = array();

        // Ввод из файла всего текста
        $file_input = file('data.txt');
        $schoolClass = 0;
        $authorPoem = '';
        $titlePoem = '';
        $textPoem = '';
        $analysPoem = '';
        for($i = 0; $i < count($file_input); $i++) {
            // Определение для какого класса считываются стихи
            if(strncmp($file_input[$i], "5 класс", 2) == 0) {
                $schoolClass = 5;
                continue;
            }
            elseif(strncmp($file_input[$i], "6 класс", 2) == 0) {
                $schoolClass = 6;
                continue;
            }
            elseif(strncmp($file_input[$i], "7 класс", 2) == 0) {
                $schoolClass = 7;
                continue;
            }
            elseif(strncmp($file_input[$i], "8 класс", 2) == 0) {
                $schoolClass = 8;
                continue;
            }
            elseif(strncmp($file_input[$i], "9 класс", 2) == 0) {
                $schoolClass = 9;
                continue;
            }
            elseif(strncmp($file_input[$i], "10 класс", 2) == 0) {
                $schoolClass = 10;
                continue;
            }
            elseif(strncmp($file_input[$i], "11 класс", 2) == 0) {
                $schoolClass = 11;
                continue;
            }
            // Определение Автора стиха
            if(strncmp($file_input[$i], "ав:", 3) == 0) {
                $i++;
                $authorPoem = $file_input[$i];
                continue;
            }
            // Определение Названия стиха
            if(strncmp($file_input[$i], "нз:", 3) == 0) {
                $i++;
                $titlePoem = $file_input[$i];
                $i++;
                $textPoem = '';
                //Считывание текста стихотворения
                while(strncmp($file_input[$i], "ан:", 3) != 0) {
                    $textPoem .= $file_input[$i];
                    $i++;
                }
            }
            // Считывание Анализа стиха
            if(strncmp($file_input[$i], "ан:", 3) == 0) {
                $i++;
                $analysPoem = '';
                while((strncmp($file_input[$i], "нз:", 3) != 0) && (strncmp($file_input[$i], "аа:", 3) != 0) && ($i < count($file_input) - 1)) {
                    if(strncmp($file_input[$i], "5 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "6 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "7 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "8 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "9 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "10 класс", 2) == 0) {
                        break;
                    }
                    elseif(strncmp($file_input[$i], "11 класс", 2) == 0) {
                        break;
                    }
                    $analysPoem .= $file_input[$i];
                    $i++;
                }
                $i--;
            }
            // Сохранение доступной информации о стихотворении в массив
            $poems[] = new Poem($schoolClass, $authorPoem, $titlePoem, $textPoem, $analysPoem);
        }
        // Получаем введенную информацию о поиске
        $selectedClass = (int) $_GET['selectClass'];
        $inputAuthor = (string) $_GET['inoutAuthor'];       
        // Если НЕ выбран автор - показывать всех авторов данного класса
        if($inputAuthor == "") {
            if( isset( $_POST['findPoem'] ) ) {
                $selectedClass = (int) $_POST['postClass'];
                $inputAuthor = (string) $_POST['postAuthor'];
                echo "<h2>Выбранный класс: " . $selectedClass . ".</h2><h2>Выбранный автор: " . $inputAuthor . ".</h2><h2>Стихотворения:</h2>";
                for ($i = 0; $i < count($poems); $i++) {
                    if(($selectedClass == $poems[$i]->schoolClass) && (strncasecmp($poems[$i]->authorPoem, $inputAuthor, strlen($inputAuthor)) == 0)){
                        $poems[$i]->displayAllInfoPoem();
                    }
                }
            }
            else {
                echo "<h2>Выбранный класс: " . $selectedClass . ".</h2><h2>Перечень авторов: </h2>";
                for ($i = 0; $i < count($poems); $i++) {
                    if(($selectedClass == $poems[$i]->schoolClass) && ($inputAuthor == "")  && ($poems[$i]->authorPoem != $poems[$i+1]->authorPoem)){
                        $poems[$i]->displayAuthorPoem();
                    }
                }
            }
        }
        // Автор выбран - показывать все стихотворения Автора данного класса
        else {
            echo "<h2>Выбранный класс: " . $selectedClass . ".</h2><h2>Выбранный автор: " . $inputAuthor . ".</h2><h2>Стихотворения:</h2>";
            for ($i = 0; $i < count($poems); $i++) {
                if(($selectedClass == $poems[$i]->schoolClass) && (strncasecmp($poems[$i]->authorPoem, $inputAuthor, strlen($inputAuthor)) == 0)){
                    $poems[$i]->displayAllInfoPoem();
                }
            }
        }  
        // foreach($poems as $data){
        //     $data->displayAllInfoPoem();
        // }
        ?>
    </td>
    <!-- Конец основного блока -->
</tr>
</table>

<!-- начало футера -->
<table width="1200px" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="313233" bgcolor="#cbe3ec">
<tr>
    <td align="center" colspan="3">
        <h3 style="color:#cbe3ec;">A</h3>
    </td>
</tr>
</table>
</body>
</html>
<!-- Конец футера -->